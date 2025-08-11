<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Customer,
    User,
};
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\{
    Hash,
    DB,
    Log
};
use App\Helpers\Helpers;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $routeUrl = custom_decrypt($request->ty);
        if (!$routeUrl || $routeUrl !== 'UserManagement') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }
        
        return view('admin.userManagement.index');
    }
    public function usersList(Request $request)
    {
        $query = Customer::with('userDetails:id,customer_id,status')->latest();

        // Status filter (from related userDetails table)
        if ($request->status && $request->status !== 'all') {
            $query->whereHas('userDetails', function ($q) use ($request) {
                $q->where('status', $request->status);
            });
        }

        // Registration date filter
        if ($request->date_range && $request->date_range !== 'all') {
            $days = (int) $request->date_range;
            $query->where('created_at', '>=', now()->subDays($days));
        }
        // Custom search filter
        if (!empty($request->search_input)) {
            $searchTerm = $request->search_input;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                ->orWhere('email', 'like', "%{$searchTerm}%")
                ->orWhere('contact_number', 'like', "%{$searchTerm}%");
            });
        }
        // dd($query->get());
        return DataTables::of($query)
        ->addColumn('status_badge', function ($row) {
            return Helpers::showStatus($row->userDetails?->status);
        })
        ->addColumn('actions', function ($row) {
            return view('admin.userManagement.action',['data' => $row
            ])->render();
        })
        ->rawColumns(['status_badge', 'actions'])
        ->make(true);
    }
    public function userView($id)
    {
        $id = custom_decrypt($id); // Decrypt before use
        $user = Customer::with('userDetails')->findOrFail($id);
        return response()->json($user);
    }
    public function userUpdate(Request $request, $encryptedId)
    {
        try {
            $id = custom_decrypt($encryptedId);

            DB::beginTransaction();

            $customer = Customer::with('userDetails')->findOrFail($id);

            $validated = $request->validate([
                'name'  => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . ($customer->userDetails->id ?? 'NULL'),
                'phone' => 'nullable|string|max:20',
            ]);

            // Update Customer
            $customer->update([
                'name'           => $validated['name'],
                'email'          => $validated['email'],
                'contact_number' => $validated['phone'] ?? null,
            ]);

            // Update related User record
            if ($customer->userDetails) {
                $customer->userDetails->update([
                    'name'  => $validated['name'],
                    'email' => $validated['email'],
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('User Update Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.'
            ], 500);
        }
    }
    public function userAdd(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'contact_number' => 'nullable|string|max:20',
                'password' => 'required|min:6',
            ]);

            DB::beginTransaction();

            $existCustomer = Customer::where('email', $validated['email'])->first();
            if ($existCustomer) {
                DB::rollBack();
                // Store error in laravel.log
                Log::error('User Add Error: User with this email already exists.', [
                    'email' => $validated['email'],
                    'request_data' => $request->all()
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'User with this email already exists.'
                ], 400);
            }

            $code = \App\Helpers\CodeGenerator::generate('CUST', 'customers', 'code', 8);
            $customer = Customer::create([
                'code' => $code,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'contact_number' => $validated['contact_number'] ?? null,
            ]);

            $code = \App\Helpers\CodeGenerator::generate('USR', 'users', 'code', 10);
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'status' => 'Active',
                'type' => 'Customer',
                'code' => $code,
                'customer_id' => $customer->id,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User created successfully!',
                'data' => $user
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('User Add Validation Error: ' . $e->getMessage(), [
                'errors' => $e->errors(),
                'request_data' => $request->all()
            ]);
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Throwable $e) {
            DB::rollBack();

            // Store error in laravel.log with stack trace
            Log::error('User Add Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.'
            ], 500);
        }
    }
    public function userDelete(Request $request, $encryptedId)
    {
        try {
            $id = custom_decrypt($encryptedId);

            DB::beginTransaction();

            $customer = Customer::findOrFail($id);
            $user = User::where('customer_id', $customer->id)->first();

            if ($user) {
                $user->delete();
            }
            $customer->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully'
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('User Delete Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.'
            ], 500);
        }
    }

    public function changeStatus(Request $request, $id)
    {
        $id = custom_decrypt($id);

        $request->validate([
            'status' => 'required|string|in:Active,Suspended,Rejected'
        ]);

        DB::beginTransaction();
        try {
            $customer = Customer::findOrFail($id);
            // dd($customer);
            // Update customer related user
            $customer->userDetails()->update([
                'status' => $request->status
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "User status changed to {$request->status}."
            ]);
        } catch (\Throwable $e) {
            dd($e);
            DB::rollBack();
            Log::error('User status change failed: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to change user status.'
            ], 500);
        }
    }
    
    

}
