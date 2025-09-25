<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\CustomResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate(['email' => 'required|email']);
            $user = User::where('email', $request->email)->first();

            if (! $user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found with the given email address.',
                ], 404);
            }
            $token = Password::createToken($user);
            $hashedToken = Hash::make($token);
            // Delete any existing tokens for this email
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();
            // Store new token
            DB::table('password_reset_tokens')->insert([
                'email' => $user->email,
                'token' => $hashedToken,
                'created_at' => Carbon::now(),
            ]);
            $encryptedEmail = custom_encrypt($user->email);
            $url = url("/api/reset-password/{$token}?email={$encryptedEmail}");
            $user->notify(new CustomResetPassword($token, $user->email));

            // Log the reset attempt
            Log::info('Password reset email sent', [
                'email' => $user->email,
                'token' => $token,
                'url' => $url,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Password reset link sent successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error sending reset link: '.$e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'An error occurred while sending the reset link. Please try again later.',
            ], 500);
        }

    }
}
