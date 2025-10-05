<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use App\Models\Masters;
use App\Models\MasterType;
use App\Models\{
    Product,
    ProductResources
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    //
    protected function addProduct(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validate request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'sku' => 'required|string|min:8|unique:products,sku',
                'productCategory_id' => 'required|exists:product_categories,id',
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:1',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
                $validated['image'] = $imagePath;
            }

            // Create product
            $product = Product::create($validated);

            DB::commit();

            return response()->json(['product' => $product], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            // Log error with full trace
            Log::error('Product creation failed: '.$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);

            return response()->json([
                'error' => 'Failed to create product. Please try again later.',
            ], 500);
        }
    }

    protected function index(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (! $url || $url !== 'BusinessProductList') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Product Category')->first();
            if ($mastertypId) {
                $categories = $mastertypId?->getActiveMasterData;
            } else {
                $categories = collect();
            }

            return view('business.products.index', compact('categories'));
        }
    }

    public function getProductsData(Request $request)
    {
        // dd($request->all());
        $query = Product::with(['categoryDetails:id,name'])
            ->select('id', 'name', 'productCategory_id', 'type', 'price', 'status');

        // 🔹 Apply filters if provided
        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('category_id')) {
            $query->where('productCategory_id', $request->category_id);
        }

        if ($request->filled('sort')) {
            if ($request->sort == 'Oldest') {
                $query->orderBy('id', 'asc');
            } elseif ($request->sort == 'Name') {
                $query->orderBy('name', 'desc');
            } else {
                $query->latest('id');
            }
        } else {
            $query->latest('id');
        }

        // dd($query->get());
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('category', function ($row) {
                return $row->categoryDetails?->name ?? '-';
            })
            ->editColumn('item_type', function ($row) {
                return ucfirst($row->type);
            })
            ->editColumn('status', function ($row) {
                $badgeClass = $row->status === 'Active' ? 'success' : 'danger';

                return "<span class='badge bg-{$badgeClass}'>{$row->status}</span>";
            })
            ->addColumn('actions', function ($row) {
                return view('business.products.actions', ['row' => $row])->render();
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    // 🔹 New function for DataTables
    // public function getProductsData(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $query = Product::with('categoryDetails');

    //         // Search filter
    //         if ($request->search) {
    //             $search = $request->search;
    //             $query->where(function ($q) use ($search) {
    //                 $q->where('name', 'like', "%$search%")
    //                     ->orWhere('sku', 'like', "%$search%");
    //             });
    //         }

    //         // Category filter
    //         if ($request->category_id && $request->category_id != 'All') {
    //             $query->where('productCategory_id', $request->category_id);
    //         }
    //         // 🔄 Sorting
    //         if ($request->sort == 'oldest') {
    //             $query->orderBy('created_at', 'asc');
    //         } elseif ($request->sort == 'name') {
    //             $query->orderBy('name', 'asc');
    //         } else {
    //             $query->orderBy('created_at', 'desc'); // newest default
    //         }
    //         $products = $query->paginate(6); // 6 cards per page
    //         // Encrypt IDs before returning
    //         $products->getCollection()->transform(function ($item) {
    //             $item->enc_id = custom_encrypt($item->id);

    //             return $item;
    //         });

    //         return response()->json($products);

    //     }

    //     return response()->json(['message' => 'Invalid request'], 400);
    // }

    protected function show($encryptedId)
    {
        $id = custom_decrypt($encryptedId); // decrypt back
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    public function saveProduct(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'sku' => 'required|string|max:100',
            'product_category' => 'required|exists:masters,id',
            'subcategory_id' => 'required|exists:masters,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'item_type' => 'required|in:Product,Service',
            'certificates' => 'array',
            'certificates.*' => 'string|in:gmp,fda,iso,who,other',
            'overview' => 'nullable|string',
            'specification' => 'nullable|string',
            'resource_title' => 'array',
            'resource_title.*' => 'nullable|string|max:255',
            'resource_file' => 'array',
            'resource_file.*' => 'file|mimes:pdf,doc,docx,png,jpg,jpeg,gif|max:10240', // 10MB
        ]);
        if ($validator->fails()) {
            dd($validator->errors());

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            if ($request->product_id) {
                // 🔹 Update product
                $product_id = custom_decrypt($request->product_id);
                $product = Product::findOrFail($product_id);
                $product->update([
                    'name' => $request->product_name,
                    'description' => $request->description,
                    'sku' => $request->sku,
                    'productCategory_id' => $request->product_category,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'subcategory_id' => $request->subcategory_id,
                    'type' => $request->item_type,
                    'overview' => $request->overview,
                    'specification' => $request->specification,
                ]);

                $message = '✅ Product updated successfully!';
            } else {
                // 🔹 Create product
                $code = \App\Helpers\CodeGenerator::generate('products', 'code');
                $product = Product::create([
                    'code' => $code,
                    'name' => $request->product_name,
                    'description' => $request->description,
                    'sku' => $request->sku,
                    'productCategory_id' => $request->product_category,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'business_id' => Auth::user()?->business_id,
                    'status' => 'Active',
                    'created_by' => Auth::id(),
                    'subcategory_id' => $request->subcategory_id,
                    'type' => $request->item_type,
                    'overview' => $request->overview,
                    'specification' => $request->specification,
                ]);

                $message = '✅ Product created successfully!';
            }

            // 🔹 Certificates (clear old & insert new)
            if ($request->has('certificates')) {
                $product->certificates()->delete();
                foreach ($request->certificates as $cert) {
                    $product->certificates()->create(['certificate_name' => $cert]);
                }
            }

            // 🔹 Resources (title + file)
            if ($request->hasFile('resource_file')) {
                $product->resources()->delete();

                foreach ($request->resource_title as $key => $title) {
                    $filePath = null;

                    // Make sure file exists for this index
                    if (isset($request->file('resource_file')[$key])) {
                        $file = $request->file('resource_file')[$key];

                        if ($file && $file->isValid()) {
                            $filename = time().'_'.rand(1000, 9999).'.'.$file->getClientOriginalExtension();
                            $folder = 'Resources';
                            $file->move(public_path($folder), $filename);
                            $filePath = $folder.'/'.$filename;
                        }
                    }

                    // Only create resource if title or file exists
                    if (! empty($title) || $filePath) {
                        $product->resources()->create([
                            'resource_name' => $title,
                            'resource_url' => $filePath,
                        ]);
                    }
                }
            }
            // 🔹 Attachments (morphMany)
            if ($request->hasFile('product_images')) {
                $product->images()->delete();
                foreach ($request->file('product_images') as $file) {
                    $filename = time().'_'.rand(1000, 9999).'.'.$file->getClientOriginalExtension();
                    // dd( $filename);
                    $folder = 'ProductsImages';
                    $file->move(public_path($folder), $filename);

                    $product->images()->create([
                        'path' => $folder.'/'.$filename,
                        'file_type' => $file->getClientOriginalExtension(),
                    ]);
                }
            }
            // dd($product);
            DB::commit();
            Alert::success('Success', $message);

            return redirect()->route('business.product.list', ['ty' => custom_encrypt('BusinessProductList')]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            Log::error('Save Product Error: '.$e->getMessage());
            Alert::error('Error', $e->getMessage());

            return redirect()->back()->with('error', '❌ Something went wrong while saving product!');
        }

    }

    protected function addProductPage(Request $request)
    {
        // dd($request->all());
        $url = custom_decrypt($request->ty);
        if (! $url || $url !== 'BusinessProductAdd') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Product Category')->first();
            if ($mastertypId) {
                $categories = $mastertypId?->getActiveMasterData;
            } else {
                $categories = collect();
            }
            $id = null;
            $subcategories = collect();
            if ($request->id) {
                $id = custom_decrypt($request->id);

            }
            $productData = Product::with(['certificates', 'resources', 'images'])->find($id);
            $existingCerts = $productData?->certificates?->pluck('certificate_name')->toArray() ?? [];
            if ($productData) {
                $subcategories = Masters::ActiveOnly()->where('parent_id', $productData?->productCategory_id)->get(['id', 'name']);
            }

            return view('business.products.add', compact('categories', 'productData', 'subcategories', 'existingCerts'));
        }
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = Masters::ActiveOnly()->where('parent_id', $categoryId)->get(['id', 'name']);

        return response()->json(['data' => $subcategories]);
    }

    public function deleteResource($id)
    {
        $resource = ProductResources::find($id);
        if ($resource) {
            // optionally delete file from public folder
            if ($resource->resource_url && file_exists(public_path($resource->resource_url))) {
                unlink(public_path($resource->resource_url));
            }
            $resource->delete();

            return response()->json(['success' => true, 'message' => 'Resource deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Resource not found.']);
    }
}
