<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthenticationService;
use Illuminate\Support\Facades\{
    Validator,
    Log,
    DB
};

class AdminAuthController extends Controller
{
    /**
     * Handle the admin login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */ 
    protected $authService;
    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
        
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $data = $this->authService->adminLogin($request->only('email', 'password'));
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Login successful.',
                'token' => $data['token'],
                'user' => $data['user'],
                'route' => route('admin.dashboard.show',['ty'=>custom_encrypt('AdminDashboard')]),
            ]);

        } catch (\Exception $e) {
            // dd($e);
            DB::rollBack();
            Log::error('Admin Login Error: ' . $e->getMessage(), [
                'email' => $request->input('email'),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => false,
                'message' => $e->getMessage() === 'Invalid credentials' 
                    ? 'Invalid email or password.' 
                    : 'Something went wrong during login.'
            ], 401);
        }
    }
}
