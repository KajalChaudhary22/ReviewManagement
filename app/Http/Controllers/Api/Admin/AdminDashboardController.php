<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterType;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    protected function dashboard(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'AdminDashboard') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Industries')->first();
            if($mastertypId)
            {
                $industries = $mastertypId?->getActiveMasterData;
            }else{
                $industries = collect();
            }
            return view('admin.dashboard.dashboard',compact('industries'));
        }
    }
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Create customer record
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact_number' => $request->phone ?? null,
            ]);

            // Create user record with reference to the customer
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'type' => 'customer', // or whatever value fits
                // 'email_verified_at' => now(),
                'password' => Hash::make($request->password),
                'customer_id' => $customer->id,
                'status' => 'Active',
                'code' => 'CUST' . str_pad($customer->id, 6, '0', STR_PAD_LEFT),
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Customer and user added successfully.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
}




