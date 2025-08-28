<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{
    Business,
    MasterType
};
use Illuminate\Support\Facades\{
    DB,
    Log
};
use App\Helpers\Helpers;


class BusinessProfileController extends Controller
{
    protected function editProfile(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'UpdateBusinessProfile') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $businessId = Auth::user()->business_id;
            $profileData = Business::find($businessId);

            // return view('business.profile.edit',compact('profileData'));

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
            return view('business.profile.edit', compact('profileData', 'industries', 'locations'));
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $id = Auth::user()?->business_id;

            DB::beginTransaction();

            $business = Business::with('userDetails')->findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'category' => 'required|integer|exists:masters,id',
                'year' => 'nullable|integer|min:1900|max:' . date('Y'),
                'email' => 'required|email',
                'contact_number' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:100',
                'state' => 'nullable|string|max:100',
                'zip_code' => 'nullable|string|max:20',
                'country' => 'nullable|string|max:100',
                'description' => 'nullable|string|max:500',
                'primary_contact' => 'nullable|string|max:100',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);

            // handle logo upload if provided
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('logos', $filename, 'public'); // storage/app/public/logos
                $validated['logo'] = "/storage/" . $path;
            }

            // Update Business
            $business->update([
                'name' => $validated['name'],
                'master_id' => $validated['category'],
                'year' => $validated['year'] ?? null,
                'email' => $validated['email'] ?? null,
                'contact_number' => $validated['contact_number'] ?? null,
                'address' => $validated['address'] ?? null,
                'city' => $validated['city'] ?? null,
                'state' => $validated['state'] ?? null,
                'zip_code' => $validated['zip_code'] ?? null,
                'country' => $validated['country'] ?? null,
                'description' => $validated['description'] ?? null,
                'primary_contact' => $validated['primary_contact'] ?? null,
                'logo' => $validated['logo'] ?? $business->logo_url, // keep old if not updated
            ]);

            // Update related User record
            if ($business->userDetails) {
                $business->userDetails->update([
                    'name'  => $validated['name'],
                    'email' => $validated['email'] ?? null,
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Business updated successfully',
                'logo'  => $business->logo, // return updated logo to frontend
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
}
