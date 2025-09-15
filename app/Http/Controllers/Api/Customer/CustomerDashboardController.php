<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Inquiries,
    SavedBusiness
};
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'CustomerDashboard') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $customer_id = Auth::user()?->customer_id;
            $inquires = Inquiries::where('customer_id', $customer_id)->with(['businessDetails', 'productDetails', 'customerDetails'])
                        ->orderBy('id', 'DESC')->get();
            $activeInquiresCount = $inquires->where('status','Pending')->count();
            $savedBusiness = SavedBusiness::where('customer_id', $customer_id)->with('businessDetails')->latest()->get();
            $savedBusinessCounts = $savedBusiness->count();
            $reviews = Review::where('customer_id', $customer_id)->with(['businessDetails', 'productDetails', 'customerDetails'])
                        ->orderBy('id', 'DESC')->get();
            $totalReviews = $reviews->count();
            return view('customer.dashboard.dashboard',compact('inquires','savedBusiness','reviews','activeInquiresCount','savedBusinessCounts','totalReviews'));
        }
    }
}
