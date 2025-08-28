<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Product,
    MasterType,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
    Auth
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
            Log::error('Product creation failed: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'input' => $request->all()
            ]);

            return response()->json([
                'error' => 'Failed to create product. Please try again later.'
            ], 500);
        }
    }
    protected function index(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'BusinessProductList') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Product Category')->first();
            if ($mastertypId) {
                $categories = $mastertypId?->getActiveMasterData;
            } else {
                $categories = collect();
            }
            return view('business.products.index',compact('categories'));
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
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => 'required|string|max:100',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:5120',
        ]);

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

                // handle image update if provided
                if ($request->hasFile('image')) {
                    $random = rand(1000, 9999); // random 4-digit number
                    $filename = time() . '_' . $random . '.' . $request->image->extension();
                    $folder = 'Products';
                
                    $request->image->move(public_path($folder), $filename);
                
                    // Save with folder name in DB
                    $product->product_image = $folder . '/' . $filename;
                    $product->save();
                }

                $message = "✅ Product updated successfully!";
            } else {
                $code = \App\Helpers\CodeGenerator::generate('products', 'code');
                // 🔹 Create product
                $product = new Product();
                $product->code = $code;
                $product->name = $request->product_name;
                $product->description = $request->description;
                $product->sku = $request->sku;
                $product->productCategory_id = $request->category_id;
                $product->price = $request->price;
                $product->quantity = $request->quantity;
                $product->business_id = Auth::user()?->business_id; // assuming business_id is from authenticated user
                $product->status = 'Active';
                $product->created_by = Auth::user()?->id;

                if ($request->hasFile('image')) {
                    $random = rand(1000, 9999); // random 4-digit number
                    $filename = time() . '_' . $random . '.' . $request->image->extension();
                    $folder = 'Products';
                
                    $request->image->move(public_path($folder), $filename);
                
                    // Save with folder name in DB
                    $product->product_image = $folder . '/' . $filename;
                    $product->save();
                }

                $product->save();
                $message = "✅ Product created successfully!";
            }

            DB::commit();

            return response()->json(['status' => true, 'message' => $message]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            Log::error('Save Product Error: '.$e->getMessage());

            return response()->json([
                'status' => false,
                'message' => '❌ Something went wrong while saving product!'
            ], 500);
        }
    }

}
