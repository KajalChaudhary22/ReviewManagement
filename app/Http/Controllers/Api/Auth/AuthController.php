<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        try {
            // Check if the user is authenticated
            if (!$request->user()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized'
                ], 401);
            }
            $request->user()->tokens()->delete(); // delete all tokens

            return response()->json([
                'status' => true,
                'message' => 'Logged out successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while logging out.'
            ], 500);
        }
        
    }
}
