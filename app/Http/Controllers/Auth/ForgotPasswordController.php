<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm(Request $request)
    {
        $routeURL = custom_decrypt($request->ty);
        if (!$routeURL || $routeURL !== 'ResetPasswordEmail') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }
        return view('auth.passwords.email');
    }
}
