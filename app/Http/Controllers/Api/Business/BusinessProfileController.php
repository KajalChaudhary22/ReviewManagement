<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessProfileController extends Controller
{
    protected function editProfile(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'UpdateBusinessProfile') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            // Logic to edit the business profile goes here
            return view('business.profile.edit');
        }
    }
}
