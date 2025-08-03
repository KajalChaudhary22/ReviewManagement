<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Business;
use App\Models\Admin;
use App\Models\User;


class AdminAuthController extends Controller
{
    /**
     * Add a new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|string|max:20',
            'user_type' => 'required|in:customer,business,admin', // Assuming user_type can be customer, business, or admin
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }
        // Prepare data for the user creation
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'Active',
        ];

        // Add phone only if the model/table supports it
        if ($request->user_type !== 'customer') {
            $data['contact_number'] = $request->phone; // Assuming contact_number is the field for phone in other models
        }

        if ($request->user_type !== 'business') {
            $data['contact_number'] = $request->phone; // Assuming contact_number is the field for phone in other models
        }

        switch ($request->user_type) {
            case 'customer':
                \App\Models\Customer::create($data);
                break;
            case 'business':
                \App\Models\Business::create($data);
                break;
            case 'admin':
                \App\Models\Admin::create($data);
                break;
        }

        // Also create a User record if needed
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => $request->remember_token ?? null,
        ]);
        // Return a success response
        return response()->json([
            'status' => true,
            'message' => 'Add user successfully.',
        ]);
    }
}
