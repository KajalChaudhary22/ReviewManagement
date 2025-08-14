<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterSetupController extends Controller
{
    protected function index(Request $request)
    {
        return view('admin.master_setup.index');
    }
}
