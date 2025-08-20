<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    MasterType,
    Business,
    User
};
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\{
    Hash,
    DB,
    Log
};
use App\Helpers\Helpers;

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
        if ($mastertypId) {
            $industries = $mastertypId?->getActiveMasterData;
        } else {
            $industries = collect();
        }
        if ($locationMastertypId) {
            $locations = $locationMastertypId?->getActiveMasterData;
        } else {
            $locations = collect();
        }
        return view('admin.businessManagement.index', compact('industries', 'locations'));
    }
    public function businessList(Request $request)
    {
        $query = Business::with(['userDetails:id,business_id,status', 'locationDetails:id,name', 'masterType:id,name'])->latest();

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
                return view('admin.businessManagement.action', [
                    'data' => $row
                ])->render();
            })
            ->rawColumns(['status_badge', 'actions', 'industry', 'location'])
            ->make(true);
    }
    public function businessView($id)
    {
        $id = custom_decrypt($id); // Decrypt before use
        $business = Business::with('userDetails')->findOrFail($id);
        return response()->json($business);
    }
    public function businessUpdate(Request $request, $encryptedId)
    {
        try {
            $id = custom_decrypt($encryptedId);

            DB::beginTransaction();

            $business = Business::with('userDetails')->findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'category' => 'required|integer|exists:categories,id',
                'location' => 'required|integer|exists:locations,id',
                'email' => 'required|email|unique:users,email',
                'contact_number' => 'nullable|string|max:20',

            ]);

            // Update Business
            $business->update([
                'name'           => $validated['name'],
                'email'          => $validated['email'],
                'contact_number' => $validated['contact_number'] ?? null,
                'location_id'       => $validated['location'] ?? null,
                'master_id'      => $validated['category'] ?? null,
            ]);

            // Update related User record
            if ($business->userDetails) {
                $business->userDetails->update([
                    'name'  => $validated['name'],
                    'email' => $validated['email'],
                    'location_id' => $validated['location'] ?? null,
                    'master_id' => $validated['category'] ?? null,
                    'contact_number' => $validated['contact_number'] ?? null,
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Business updated successfully'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Business Update Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.'
            ], 500);
        }
    }
    public function businessAdd(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'nullable|string|max:20',
            'password' => 'required|min:6',
            'description' => 'nullable|string',

        ]);
        try {

            DB::beginTransaction();

            $existBusiness = Business::where('email', $validated['email'])->first();
            if ($existBusiness) {
                DB::rollBack();
                // Store error in laravel.log
                Log::error('Business Add Error: Business with this email already exists.', [
                    'email' => $validated['email'],
                    'request_data' => $request->all()
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Business with this email already exists.'
                ], 400);
            }

            $code = \App\Helpers\CodeGenerator::generate( 'customers', 'code');
            $customer = Customer::create([
                'code' => $code,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'contact_number' => $validated['contact_number'] ?? null,
                'location_id' => $validated['location'] ?? null,
                'master_id' => $validated['category'] ?? null,
            ]);

            $code = \App\Helpers\CodeGenerator::generate('users', 'code');
            $user = User::create([
                'name' => $validated['name'],
                'status' => 'Active',
                'type' => 'Business',
                'code' => $code,
                'business_id' => $business->id,
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Business created successfully!',
                'data' => $user
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Business Add Validation Error: ' . $e->getMessage(), [
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
            Log::error('Business Add Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.'
            ], 500);
        }
    }
    public function businessDelete(Request $request, $encryptedId)
    {
        try {
            $id = custom_decrypt($encryptedId);

            DB::beginTransaction();

            $business = Business::findOrFail($id);
            $business = Business::where('business_id', $business->id)->first();

            if ($business) {
                $business->delete();
            }
            $business->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Business deleted successfully'
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Business Delete Error: ' . $e->getMessage(), [
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
