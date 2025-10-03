<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use App\Models\Masters;
use App\Models\MasterType;
use App\Models\{
    Product,
    ProductCertificates,
    ProductResources,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\{
    Log,
    Validator
};
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

    // 🔹 New function for DataTables
    public function getProductsData(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::with('categoryDetails');

            // Search filter
            if ($request->search) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                        ->orWhere('sku', 'like', "%$search%");
                });
            }

            // Category filter
            if ($request->category_id && $request->category_id != 'All') {
                $query->where('productCategory_id', $request->category_id);
            }
            // 🔄 Sorting
            if ($request->sort == 'oldest') {
                $query->orderBy('created_at', 'asc');
            } elseif ($request->sort == 'name') {
                $query->orderBy('name', 'asc');
            } else {
                $query->orderBy('created_at', 'desc'); // newest default
            }
            $products = $query->paginate(6); // 6 cards per page
            // Encrypt IDs before returning
            $products->getCollection()->transform(function ($item) {
                $item->enc_id = custom_encrypt($item->id);

                return $item;
            });

            return response()->json($products);

        }

        return response()->json(['message' => 'Invalid request'], 400);
    }

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
            'sku' => 'required|string|max:100|unique:products,sku',
            'product_category' => 'required|exists:masters,id',
            'subcategory_id' => 'required|exists:masters,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'item_type' => 'required|in:product,service',
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
                $product = Product::findOrFail($request->product_id);
                $product->update([
                    'name' => $request->product_name,
                    'description' => $request->description,
                    'sku' => $request->sku,
                    'productCategory_id' => $request->category_id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
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
                    $product->certificates()->create(['name' => $cert]);
                }
            }

            // 🔹 Resources (title + file)
            if ($request->has('resource_title')) {
                $product->resources()->delete();

                foreach ($request->resource_title as $key => $title) {
                    $filePath = null;

                    if ($request->hasFile("resource_file.$key")) {
                        $file = $request->file("resource_file.$key");
                        $filename = time().'_'.rand(1000, 9999).'.'.$file->extension();
                        $folder = 'resources';
                        $file->move(public_path($folder), $filename);
                        $filePath = $folder.'/'.$filename;
                    }

                    $product->resources()->create([
                        'title' => $title,
                        'file_path' => $filePath,
                    ]);
                }
            }

            // 🔹 Attachments (morphMany)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filename = time().'_'.rand(1000, 9999).'.'.$file->extension();
                    $folder = 'ProductsImages';
                    $file->move(public_path($folder), $filename);

                    $product->images()->create([
                        'path' => $folder.'/'.$filename,
                        'file_type' => $file->extension(),
                    ]);
                }
            }

            // 🔹 Product Image (main thumbnail)
            if ($request->hasFile('image')) {
                $filename = time().'_'.rand(1000, 9999).'.'.$request->image->extension();
                $folder = 'Products';
                $request->image->move(public_path($folder), $filename);

                $product->update(['product_image' => $folder.'/'.$filename]);
            }

            DB::commit();

            return redirect()->back()->with('success', '✅ Product saved successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            Log::error('Save Product Error: '.$e->getMessage());

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

            return view('business.products.add', compact('categories'));
        }
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = Masters::ActiveOnly()->where('parent_id', $categoryId)->get(['id', 'name']);

        return response()->json(['data' => $subcategories]);
    }
}
