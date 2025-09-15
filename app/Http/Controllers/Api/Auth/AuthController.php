<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        try {
            // Handle API token logout if token-based authentication is being used
            if ($request->user() && method_exists($request->user(), 'tokens')) {
                $request->user()->tokens()->delete();
            }
    
           // Web session logout
            if (auth('web')->check()) {
                auth('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
    
            // Decide on response based on request type
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Logged out successfully'
                ]);
            }
    
            return redirect('/')->with('message', 'Logged out successfully');
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while logging out.',
                'error' => $e->getMessage()
            ], 500);
        }
        
    }
}
