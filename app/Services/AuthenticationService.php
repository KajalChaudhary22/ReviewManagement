<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Business,
    User,
    Customer
};
use Illuminate\Support\Facades\{
    Hash,
    Log,
    DB
};
use App\Helpers\CodeGenerator;

class AuthenticationService
{
    public function adminLogin(array $credentials)
    {
        if (!Auth::guard('web')->attempt($credentials)) {
            throw new \Exception('Invalid credentials');
        }

        $user = Auth::guard('web')->user();
        // dd($user);
        // Optional: check user type
        if ($user->type !== 'Admin') {
            Auth::logout();
            throw new \Exception('Unauthorized user type');
        }
        // ✅ Check if status is 'active' (or 1, depending on your DB value)
    if ($user->status !== 'Active') {
        Auth::logout();
        throw new \Exception('Your account is inactive. Please contact the administrator.');
    }

        return [
            'token' => $user->createToken('admin_token')->plainTextToken,
            'user' => $user
        ];
    }
    public function customerLogin(array $credentials)
    {
        if (!Auth::guard('web')->attempt($credentials)) {
            throw new \Exception('Invalid credentials');
        }

        $user = Auth::guard('web')->user();
        // dd($user);
        // Optional: check user type
        if ($user->type !== 'Customer') {
            Auth::logout();
            throw new \Exception('Unauthorized user type');
        }
         // ✅ Check if status is 'active' (or 1, depending on your DB value)
        if ($user->status !== 'Active') {
            Auth::logout();
            throw new \Exception('Your account is inactive. Please contact the administrator.');
        }

        return [
            'token' => $user->createToken('customer_token')->plainTextToken,
            'user' => $user
        ];
    }
    public function businessLogin(array $credentials)
    {
        if (!Auth::guard('web')->attempt($credentials)) {
            throw new \Exception('Invalid credentials');
        }

        $user = Auth::guard('web')->user();
        // dd($user);
        // Optional: check user type
        if ($user->type !== 'Business') {
            Auth::logout();
            throw new \Exception('Unauthorized user type');
        }
         // ✅ Check if status is 'active' (or 1, depending on your DB value)
        if ($user->status !== 'Active') {
            Auth::logout();
            throw new \Exception('Your account is inactive. Please contact the administrator.');
        }

        return [
            'token' => $user->createToken('business_token')->plainTextToken,
            'user' => $user
        ];
    }
    public function businessRegistration($request)
    {
        DB::beginTransaction();
        try {
            $code = CodeGenerator::generate('businesses', 'code');
            $business = Business::create([
                'name'           => $request->name,
                'email'          => $request->email,
                'contact_number' => $request->contact_number,
                'master_id'      => $request->industry_id,
                'status'         => 'Pending',
                'location_id'         => $request->location_id,
                'code'          => $code,
            ]);
            $userCode = CodeGenerator::generate('users', 'code');
            $user = User::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
                'type'         => 'Business',
                'business_id'  => $business->id,
                'status'       => 'Active',
                'code'         => $userCode,
            ]);
            DB::commit();

            $token = $user->createToken('business_token')->plainTextToken;

            return [
                'status' => true,
                'message' => 'Business registered successfully.',
                'token' => $token,
                'user' => $user,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Business registration failed', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return [
                'status' => false,
                'message' => 'Registration failed. Please try again later.',
            ];
        }
    }

    public function customerRegistration(array $data)
    {
        DB::beginTransaction();

        try {
            // Create customer
            $code = \App\Helpers\CodeGenerator::generate('customers', 'code');
            $customer = Customer::create([
                'name'  => $data['name'],
                'email' => $data['email'],
                'code'  => $code,
                'status' => 'Active',
            ]);

            // Create user
            $user = User::create([
                'name'        => $data['name'],
                'email'       => $data['email'],
                'password'    => Hash::make($data['password']),
                'customer_id' => $customer->id,
                'type'        => 'Customer',
                'status' => 'Active',
            ]);

            // Create token
            $token = $user->createToken('customer-token')->plainTextToken;

            DB::commit();

            return [
                'status'  => true,
                'message' => 'Customer registered successfully.',
                'token'   => $token,
            ];
        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Customer registration failed: ' . $e->getMessage(), [
                'data' => $data,
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return [
                'status'  => false,
                'message' => 'Registration failed. Please try again later.',
            ];
        }
    }
}