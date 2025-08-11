<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessManagementController extends Controller
{
    public function index(Request $request)
    {
        $routeUrl = custom_decrypt($request->ty);
        if (!$routeUrl || $routeUrl !== 'BusinessManagement') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }
        $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Industries')->first();
        $locationMastertypId = MasterType::with('getActiveMasterData')->where('name', 'Location')->first();
            if($mastertypId)
            {
                $industries = $mastertypId?->getActiveMasterData;
            }else{
                $industries = collect();
            }
        if($locationMastertypId)
        {
            $locations = $locationMastertypId?->getActiveMasterData;
        }else{
            $locations = collect();
        }
        return view('admin.businessManagement.index',compact('industries','locations'));
    }
}
