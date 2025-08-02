<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class CustomerAuthController extends Controller
{

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:customers,email',
            'password'              => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $customer = Customer::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
        ]);

        $token = $customer->createToken('customer-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Customer registered successfully.',
            'token' => $token,
        ]);
    }

    public function login(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|exists:customers,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        // Find customer by email
        $customer = Customer::where('email', $request->email)->first();

        // Check password
        if (!$customer || !Hash::check($request->password, $customer->password)) {
            return response()->json([
                'status'  => false,
                'message' => 'Invalid email or password.',
            ], 401);
        }

        // Create token
        $token = $customer->createToken('customer-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful.',
            'token' => $token,
        ]);
    }
}
