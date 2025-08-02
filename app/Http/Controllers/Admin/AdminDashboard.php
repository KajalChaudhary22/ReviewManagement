<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    protected function dashboard()
    {
        // This method will return the admin dashboard view
        return view('admin.dashboard.dashboard');
    }
}
