<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\User;


class AdminAuthController extends Controller
{
    //
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|string|max:20',
            // 'status' => 'required|in:customer,business,admin', // Assuming status can be customer, business, or admin
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 'Active', // Assuming 'active' is the default status
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(), // Assuming email verification is required
            'password' => Hash::make($request->password),
            'remember_token' => $request->remember_token ?? null, // Optional remember token
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Add user successfully.',
        ]);
    }
}
