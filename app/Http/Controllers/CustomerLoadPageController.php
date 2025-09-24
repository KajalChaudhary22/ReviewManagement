<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Inquiries,
    SavedBusiness,
    Review,
    Customer,
    Notifications,
    Customer_setting
};
use Illuminate\Support\Facades\Auth;

class CustomerLoadPageController extends Controller
{
    public function dashboard(Request $request)
    {
        // dd(auth()->check());
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
    public function showProfile(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'CustomerProfileShow') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $customer_id = Auth::user()?->customer_id;
            $myProfile = Customer::where('id', $customer_id)->first();
            return view('customer.profile.profile',compact('myProfile'));
        }
    }
    protected function showNotifications(Request $request)
    {
        $url = custom_decrypt($request->ty);
        // dd($url);
        if(!$url || $url !== 'CustomerNotificationsShow') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $user_id = Auth::user()?->id;
            // Get offset from request, default to 0
            $offset = $request->input('offset', 0);
            $allNotifications = Notifications::where('user_id',$user_id)->latest()->skip($offset)->take(10)->get();
             // Check if this is an AJAX request to load more
            if ($request->ajax()) {
                return view('customer.notifications.notifications_list', compact('allNotifications'))->render();
            }
            return view('customer.notifications.notifications',compact('allNotifications'));
        }
    }
    protected function showSettings(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'CustomerSettingsShow') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
             $user = Auth::user();
             $notificationPreference = Customer_setting::where('user_id', $user?->id)->first();
            //  dd($notificationPreference);
            return view('customer.settings.settings',compact('user','notificationPreference'));
        }
    }
    protected function clearNotifications(Request $request)
    {
        $user_id = Auth::user()?->id;

        Notifications::where('user_id', $user_id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'All notifications have been cleared.'
        ]);
    }
}
