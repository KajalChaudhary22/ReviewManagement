<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessDashboardController extends Controller
{
    protected function dashboard(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'BusinessDashboard') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            // If the URL is valid, proceed with the request
            // You can also perform additional checks or actions here if needed
            // This method will return the admin dashboard view
            return view('business.dashboard.dashboard');
        }
    }
}
