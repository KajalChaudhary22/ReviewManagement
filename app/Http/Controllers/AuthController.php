<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\
{
    Business,
    MasterType
};

class AuthController extends Controller
{
    public function showAdminLogin()
    {
        return view('admin.auth.login');
    }
    public function showBusinessLogin()
    {
        $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Industries')->first();
        $locationMasterId = MasterType::with('getActiveMasterData')->where('name', 'Location')->first();
        if($mastertypId)
        {
            $industries = $mastertypId?->getActiveMasterData;
        }else{
            $industries = collect();
        }
        if($locationMasterId)
        {
            $locations = $locationMasterId?->getActiveMasterData;
        }
        else{
            $locations = collect();
        }
        return view('business.auth.login', compact('industries','locations'));
    }
    public function showCustomerLogin()
    {
        return view('customer.auth.login');
    }
    public function checkLogin()
    {
        // Check if user is authenticated
        if (auth()->check()) {
            return response()->json([
                'loggedIn' => true,
                'user' => Auth::user() // optional, if you want to return user info
            ]);
        }

        return response()->json(['loggedIn' => false]);
    }
    
}
