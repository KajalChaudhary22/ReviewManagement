<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    protected function index(Request $request)
    {
        return view('business.inquiry.index');
    }
}
