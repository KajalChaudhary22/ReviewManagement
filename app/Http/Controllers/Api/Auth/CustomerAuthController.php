<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Customer,
    User
};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\AuthenticationService;



class CustomerAuthController extends Controller
{
    protected $authService;

    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }

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
        $response = $this->authService->a($request->all());
        return response()->json($response, $response['status'] ? 200 : 422);
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

        $data = $this->authService->customerLogin($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Login successful.',
            'token' => $data['token'],
            'user' => $data['user'],
            'route' => route('customer.dashboard.show',['ty'=>custom_encrypt('CustomerDashboard')]),
        ]);
    }
}
