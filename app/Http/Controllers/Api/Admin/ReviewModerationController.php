<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewModerationController extends Controller
{
    protected function index(Request $request)
    {
        $routeUrl = custom_decrypt($request->ty);
        if (!$routeUrl || $routeUrl !== 'ReviewModeration') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }
        return view('admin.reviewModeration.index');
    }
}
