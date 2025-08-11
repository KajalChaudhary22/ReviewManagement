<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    MasterType,
    Business
};

class BusinessManagementController extends Controller
{
    public function index(Request $request)
    {
        $routeUrl = custom_decrypt($request->ty);
        if (!$routeUrl || $routeUrl !== 'BusinessManagement') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }
        $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Industries')->first();
        $locationMastertypId = MasterType::with('getActiveMasterData')->where('name', 'Location')->first();
            if($mastertypId)
            {
                $industries = $mastertypId?->getActiveMasterData;
            }else{
                $industries = collect();
            }
        if($locationMastertypId)
        {
            $locations = $locationMastertypId?->getActiveMasterData;
        }else{
            $locations = collect();
        }
        return view('admin.businessManagement.index',compact('industries','locations'));
    }
    public function BusinessList(Request $request)
    {
        $query = Business::with(['userDetails:id,business_id,status','location:id,name','masterType:id,name'])->latest();

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
        ->addColumn('industry', function ($row) {
            return $row->masterType?->name;
        })
        ->addColumn('location', function ($row) {
            return $row->locationDetails?->name;
        })
        ->addColumn('actions', function ($row) {
            return view('admin.businessManagement.action',['data' => $row
            ])->render();
        })
        ->rawColumns(['status_badge', 'actions','industry','location'])
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
}
