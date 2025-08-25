<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class BusinessDashboardController extends Controller
{
    protected function dashboard(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'BusinessDashboard') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $businessId = Auth::user()->business_id;
            // Example counts
        $totalProducts   = Product::where('business_id', $businessId)->count();
        // $activeInquiries = Inquiry::where('business_id', $businessId)->where('status', 'active')->count();
        // $newReviews      = Review::where('business_id', $businessId)->whereMonth('created_at', now()->month)->count();
        // $profileViews    = ProfileView::where('business_id', $businessId)->sum('views');
            return view('business.dashboard.dashboard');
        }
    }
}
