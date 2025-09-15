<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoadPageController extends Controller
{
    public function masterSetup(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'MasterSetup') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            return view('admin.master_setup.index');
        }
    }
    public function masterSetupAdd()
    {
        return view('admin.master_setup.add');
    }
}
