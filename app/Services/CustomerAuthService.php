<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Exception;

class CustomerAuthService
{
    public function register(array $data)
    {
        DB::beginTransaction();

        try {
            // Create customer
            $customer = Customer::create([
                'name'  => $data['name'],
                'email' => $data['email'],
            ]);

            // Create user
            $user = User::create([
                'name'        => $data['name'],
                'email'       => $data['email'],
                'password'    => Hash::make($data['password']),
                'customer_id' => $customer->id,
                'type'        => 'Customer',
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

    public function login(array $data)
    {
        try {
            $customer = Customer::where('email', $data['email'])->first();

            if (!$customer) {
                return [
                    'status'  => false,
                    'message' => 'Customer not found.',
                ];
            }

            $user = User::where('email', $data['email'])
                        ->where('type', 'Customer')
                        ->where('customer_id', $customer->id)
                        ->first();

            if (!$user || !Hash::check($data['password'], $user->password)) {
                return [
                    'status'  => false,
                    'message' => 'Invalid email or password.',
                ];
            }

            $token = $user->createToken('customer-token')->plainTextToken;

            return [
                'status'  => true,
                'message' => 'Login successful.',
                'token'   => $token,
                'user'    => [
                    'id'    => $user->id,
                    'name'  => $user->name,
                    'email' => $user->email,
                    'type'  => $user->type,
                ]
            ];
        } catch (Exception $e) {
            Log::error('Customer login failed: ' . $e->getMessage(), [
                'data' => $data,
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return [
                'status'  => false,
                'message' => 'Login failed. Please try again later.',
            ];
        }
    }
}
