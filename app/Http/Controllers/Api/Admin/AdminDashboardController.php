<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterType;

class AdminDashboardController extends Controller
{
    protected function dashboard(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'AdminDashboard') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Industries')->first();
            if($mastertypId)
            {
                $industries = $mastertypId?->getActiveMasterData;
            }else{
                $industries = collect();
            }
            return view('admin.dashboard.dashboard',compact('industries'));
        }
    }
}
