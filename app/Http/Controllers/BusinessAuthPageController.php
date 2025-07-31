<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\
{
    Business,
    MasterType
};

class BusinessAuthPageController extends Controller
{
    public function show()
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
}
