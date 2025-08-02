<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusinessAuthController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:businesses,email',
            'contact_number'        => 'required|string',
            'industry_id'           => 'required|exists:masters,id', // Adjust table name if needed
            'password'              => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $business = Business::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'contact_number' => $request->contact_number,
            'master_id'    => $request->industry_id,
            'password'       => Hash::make($request->password),
            'status'         => 'Pending',
        ]);

        $token = $business->createToken('business-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Business registered successfully.',
            'token' => $token,
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Business::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['status' => false, 'message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('BusinessToken')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }

}
