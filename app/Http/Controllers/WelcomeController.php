<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    MasterType,
    Masters,
    Product,
    Review,
    Business
};
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    protected function home()
    {
        $masterTypeId = MasterType::where('name', 'Product Category')->first()?->id;
        $productCategoies = Masters::where('master_type_id', $masterTypeId)->where('status', 'Active')->with('images')->get();
        $latestReviews = Review::where('status', 'Active')->with(['productDetails', 'customerDetails'])->latest()->take(3)->get();
        $companies = Business::all(); // fetch all companies
        // dd($productCategoies);
        return view('home.welcome', compact('productCategoies', 'latestReviews', 'companies'));
    }
    protected function categories()
    {
        $masterTypeId = MasterType::where('name', 'Product Category')->first()?->id;
        $productCategoies = Masters::where('master_type_id', $masterTypeId)->where('status', 'Active')->with('images')->get();
        $masterSubcatId = MasterType::where('name', 'Product Sub Category')->first()?->id;
        $productSubCategories = Masters::where('master_type_id', $masterSubcatId)->where('status', 'Active')->with('images')->latest()->get()->map(function ($item) {
            return [
                'id' => custom_encrypt($item?->id),
                'cat_id' => custom_encrypt($item?->parent_id),
                'icon' => 'fa-solid fa-box', // static fallback or map dynamically
                'title' => $item?->name, // map from DB
                'description' => $item?->description ?? 'No description available', // fallback
                'tags' => [Str::lower($item?->parent?->name) ?? []], // empty array if not in DB
                'popularity' => rand(60, 100), // fake popularity for now
                'dateAdded' => $item?->created_at?->toDateString(), // from DB
                'image' => $item?->images?->first()?->path 
                    ? asset('storage/'.$item?->images?->first()?->path)
                    : asset('images/default-category.jpg'),
            ];
        });
        // dd($productSubCategories);
        return view('home.categories', compact('productCategoies', 'productSubCategories'));
    }
    protected function blogs()
    {
        return view('home.blog');
    }
    protected function aboutUs()
    {
        return view('home.about_us');
    }
    protected function contactUs()
    {
        return view('home.contact_us');
    }
    protected function categoryProducts(Request $request)
    {
        // dd($request->all());
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'CategoryProducts') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $categoryId = custom_decrypt($request->id);
            $subCategoryId = $request->subCat ? custom_decrypt($request->subCat) : null;
            $allProducts = Product::where('productCategory_id', $categoryId)->where('status', 'Active')->get();
            $masterTypeId = MasterType::where('name', 'Location')->first()?->id;
            $locations = Masters::where('master_type_id', $masterTypeId)->where('status', 'Active')->with('images')->get();
            $subcategories = Masters::where('parent_id', $categoryId)->where('status', 'Active')->with('images')->get();
            // Build the business data array safely with null operators
            $businessData = $allProducts->map(function ($product) {
                return [
                    'id' => $product?->id,
                    'name' => $product?->name,
                    'logo' => $product?->images?->first()?->url ?? 'https://via.placeholder.com/80',
                    'rating' => round((float) ($product?->rating ?? 0), 1),
                    'reviews' => $product?->reviews_count ?? 0,
                    'description' => $product?->description ?? '',
                    'categories' => [$product?->categoryDetails?->name ?? ''],
                    'certifications' => $product?->certifications ?? [],
                    'location' => [
                        'id' => $product?->location?->id ?? '',
                        'country' => $product?->location?->name ?? 'Unknown'
                    ],
                    'verified' => $product?->is_verified ?? false,
                    'dateAdded' => $product?->created_at?->format('Y-m-d') ?? '',
                    'url' => route('show.product', ['id' => custom_encrypt($product?->id), 'ty' => custom_encrypt('ProductDetails')])
                ];
            });
            return view('home.category_products', compact('locations', 'businessData'));
        }
    }
    protected function showProduct(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'ProductDetails') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $productId = custom_decrypt($request->id);
            $productDetails = Product::where('id', $productId)->where('status', 'Active')->with(['categoryDetails', 'images'])->first();
            if (!$productDetails) {
                abort(404);
            }
            return view('home.product_details', compact('productDetails'));
        }
    }
    protected function terms()
    {
        return view('home.terms');
    }
    protected function privacy()
    {
        return view('home.privacy');
    }

    protected function showBusinessProfile(Request $request)
    {
        // dd($request->all());
        $businessId = custom_decrypt($request->id);
        $businessDetails = Business::where('id', $businessId)->with(['userDetails', 'masterType', 'locationDetails', 'reviews.customerDetails'])->first();
        if (!$businessDetails) {
            abort(404);
        }
        return view('home.business_profile', compact('businessDetails'));
    }
}
