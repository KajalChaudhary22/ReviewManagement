<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Customer_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class CustomerSettingController extends Controller
{
    //Show customer account settings page
    public function index()
    {
        $user = Auth::user(); // get logged-in customer
        $notificationPreference = Customer_setting::where('user_id', Auth::id())->first();
        return view('customer.settings.index', compact('user', 'notificationPreference'));
    }

    // Update email
    public function updateEmail(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validate request
            $validated = $request->validate([
                'email' => 'required|email|unique:users,email,' . Auth::id(),
            ]);

            // Get logged-in user
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated',
                ], 401);
            }

            // Update email in users table
            $user->email = $validated['email'];
            $user->save();   // direct save in users table

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Email updated successfully!',
                'email'   => $user->email, // return updated email to frontend
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Email Update Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }

    // Change password
    public function updatePassword(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validate inputs
            $validated = $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:8|confirmed',
                // `confirmed` means it will check against `new_password_confirmation`
            ]);

            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated',
                ], 401);
            }

            // Check if current password matches
            if (!Hash::check($validated['current_password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Current password is incorrect.',
                ], 422);
            }

            // Update password
            $user->password = Hash::make($validated['new_password']);
            $user->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Password updated successfully!',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Password Update Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }

    // Update notification preferences
    public function updateNotifications(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            // Validate request
            $validated = $request->validate([
                'email_notifications' => 'required|boolean',
            ]);

            // Find or create preference
            $preference = Customer_setting::firstOrCreate(
                ['user_id' => $user->id],
                ['email_notifications' => $validated['email_notifications']]
            );

            // Update if exists
            $preference->update([
                'email_notifications' => $validated['email_notifications'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Notification preferences updated successfully',
                'data' => $preference
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Throwable $e) {
            // Any other errors
            Log::error('Notification Update Error: ' . $e->getMessage(), [
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
