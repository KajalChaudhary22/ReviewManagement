<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Customer;
use App\Models\MasterType;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminDashboardController extends Controller
{
    protected function dashboard(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (! $url || $url !== 'AdminDashboard') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Industries')->first();
            if ($mastertypId) {
                $industries = $mastertypId?->getActiveMasterData;
            } else {
                $industries = collect();
            }
            $now = Carbon::now();
            $lastMonth = $now->copy()->subMonth();
            $customers = Customer::orderBy('id', 'desc')->take(5)->get();
            $pendingBusiness = Business::where('status', 'Pending')->orderBy('id', 'desc')->take(3)->get();
            $latestReviews = Review::orderBy('id', 'desc')->take(5)->get();
            $total_users = Customer::count();
            $users_last_month = Customer::whereMonth('created_at', $lastMonth->month)
                ->whereYear('created_at', $lastMonth->year)
                ->count();
            $users_change = $users_last_month > 0
                ? round((($total_users - $users_last_month) / $users_last_month) * 100, 2)
                : 0;
            // 🔹 Active Businesses
            $active_businesses = Business::where('status', 'Active')->count();
            $business_last_month = Business::where('status', 'Active')
                ->whereMonth('created_at', $lastMonth->month)
                ->whereYear('created_at', $lastMonth->year)
                ->count();
            $business_change = $business_last_month > 0
                ? round((($active_businesses - $business_last_month) / $business_last_month) * 100, 2)
                : 0;
            $pending_reviews = Review::where('status', 'Pending')->count();
            $reviews_last_month = Review::where('status', 'Pending')
                ->whereMonth('created_at', $lastMonth->month)
                ->whereYear('created_at', $lastMonth->year)
                ->count();
            $reviews_change = $reviews_last_month > 0
                ? round((($pending_reviews - $reviews_last_month) / $reviews_last_month) * 100, 2)
                : 0;
            // 🔹 Monthly Revenue
            //     $monthly_revenue = Payment::whereMonth('created_at', $now->month)
            //     ->whereYear('created_at', $now->year)
            //     ->sum('amount');
            // $revenue_last_month = Payment::whereMonth('created_at', $lastMonth->month)
            //         ->whereYear('created_at', $lastMonth->year)
            //         ->sum('amount');
            // $revenue_change = $revenue_last_month > 0
            // ? round((($monthly_revenue - $revenue_last_month) / $revenue_last_month) * 100, 2)
            // : 0;
            // dd($total_users, $users_last_month,$users_change);

            $compactData = compact('industries', 'customers', 'pendingBusiness', 'latestReviews', 'total_users', 'users_change',
                'active_businesses', 'business_change', 'pending_reviews', 'reviews_change');

            return view('admin.dashboard.dashboard')->with($compactData);
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
                'code' => 'CUST'.str_pad($customer->id, 6, '0', STR_PAD_LEFT),
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
                'message' => 'An error occurred: '.$e->getMessage(),
            ], 500);
        }
    }

    public function updateApproval(Request $request, $id)
    {
        $status = $request->status;

        try {
            DB::beginTransaction();
            $business = Business::findOrFail(custom_decrypt($id));
            
            $user = $business->userDetails;
            if ($user) {
                if ($status == 'Reject') {
                    $user->status = 'Rejected';
                    $business->status = 'Rejected';
                } elseif ($status == 'Approved') {
                    $user->status = 'Active';
                    $business->status = 'Active';
                }
            
                $user->save();
            }
            $business->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Business status updated to {$status} successfully.",
            ]);

        } catch (\Throwable $e) {
            // dd($e);
            DB::rollBack();
            Log::error('Business approval failed', [
                'business_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating status.',
            ], 500);
        }
    }

    public function viewBusiness($id)
    {
        try {
            $business = Business::with(['locationDetails', 'masterType','userDetails'])
                ->findOrFail(custom_decrypt($id));

                return response()->json([
                    'id' => $business?->id,
                    'name' => $business?->name,
                    'email' => $business?->email,
                    'contact_number' => $business?->contact_number,
                    'status' => $business?->userDetails?->status,
                    'last_active' => $business?->last_active,
                    'business_type' => $business?->masterType?->name ?? null,
                    'location' => $business?->locationDetails?->name ?? null,
                    'created_at' => $business?->created_at,
                ]);
        } catch (\Throwable $e) {
            Log::error('View business failed', ['business_id' => $id, 'error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Business not found.',
            ], 404);
        }
    }
}
