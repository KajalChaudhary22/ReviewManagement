<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'CustomerDashboard') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            // If the URL is valid, proceed with the request
            // You can also perform additional checks or actions here if needed
            // This method will return the customer dashboard view
            return view('customer.dashboard.dashboard');
        }
    }
}
