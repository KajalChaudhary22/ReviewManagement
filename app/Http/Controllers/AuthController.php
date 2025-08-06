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
        if($mastertypId)
        {
            $industries = $mastertypId?->getActiveMasterData;
        }else{
            $industries = collect();
        }
        return view('business.auth.login', compact('industries'));
    }
    public function showCustomerLogin()
    {
        return view('customer.auth.login');
    }
}
