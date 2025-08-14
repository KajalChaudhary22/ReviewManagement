<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;

use Illuminate\Support\Facades\{
    Validator,
    DB,
    Log
};
use App\Services\AuthenticationService;     

class BusinessAuthController extends Controller
{
    protected $authService;
    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
        
    }
    public function register(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:businesses,email',
            'contact_number'        => 'required|string',
            'industry_id'           => 'required|exists:masters,id', // Adjust table name if needed
            'location_id'           => 'required|exists:masters,id', // Adjust table name if needed
            'password'              => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }        

        $response = $this->authService->businessRegistration($request);
        return response()->json($response, $response['status'] ? 200 : 500);
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
        DB::beginTransaction();
        try {
           

            $data = $this->authService->businessLogin($request->only('email', 'password'));
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Login successful.',
                'token' => $data['token'],
                'user' => $data['user'],
                'route' => route('business.dashboard.show',['ty'=>custom_encrypt('BusinessDashboard')]),
            ]);

        } catch (\Exception $e) {
            // dd($e);
            DB::rollBack();
            Log::error('Business Login Error: ' . $e->getMessage(), [
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

        // $user = Business::where('email', $request->email)->first();

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     return response()->json(['status' => false, 'message' => 'Invalid credentials'], 401);
        // }

        // $token = $user->createToken('BusinessToken')->plainTextToken;

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Login successful',
        //     'token' => $token,
        //     'user' => $user
        // ]);
    }

}
