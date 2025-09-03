<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessSettingController extends Controller
{
    protected function index(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'BusinessSetting') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
           
            return view('business.setting.index');
        }
    }
}
