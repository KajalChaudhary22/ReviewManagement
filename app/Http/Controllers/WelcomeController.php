<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    MasterType,
    Masters,
    Product,
    Review
};

class WelcomeController extends Controller
{
    protected function home()
    {
        $masterTypeId = MasterType::where('name','Product Category')->first()?->id;
        $productCategoies = Masters::where('master_type_id',$masterTypeId)->where('status','Active')->with('images')->get();
        $latestReviews = Review::where('status','Active')->with(['productDetails','customerDetails'])->latest()->take(3)->get();
        // dd($productCategoies);
        return view('home.welcome',compact('productCategoies','latestReviews'));
    }
    protected function categories()
    {
        return view('home.categories');
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
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'CategoryProducts') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $categoryId = custom_decrypt($request->id);
            $allProducts = Product::where('productCategory_id',$categoryId)->where('status','Active')->get();
            $masterTypeId = MasterType::where('name','Location')->first()?->id;
            $locations = Masters::where('master_type_id',$masterTypeId)->where('status','Active')->with('images')->get();
            // Build the business data array safely with null operators
            $businessData = $allProducts->map(function($product) {
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
                    'url' => route('show.product', ['id' => custom_encrypt($product?->id) , 'ty' => custom_encrypt('ProductDetails')])
                ];
            });
            return view('home.category_products',compact('locations','businessData'));
        }
    }
    protected function showProduct(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'ProductDetails') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $productId = custom_decrypt($request->id);
            $productDetails = Product::where('id',$productId)->where('status','Active')->with(['categoryDetails','images'])->first();
            if(!$productDetails){
                abort(404);
            }
            return view('home.product_details',compact('productDetails'));
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

}
