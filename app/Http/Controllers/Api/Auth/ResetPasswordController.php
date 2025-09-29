<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token)
    {
        $decryptedEmail = custom_decrypt($request->email);

        return view('auth.passwords.reset', [
            'token' => $token,
            'email' => $decryptedEmail,
        ]);
    }

    public function reset(Request $request, $token)
    {
        try {
            $request->validate([
                'token' => 'required',
                'email' => 'required|string',
                'password' => 'required|min:8|confirmed',
            ]);

            // Decrypt the email (use your custom_decrypt helper)
            $email = custom_decrypt($request->email);
            $user = User::where('email', $email)->first();

            if (! $user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found.',
                ], 404);
            }

            // Retrieve the stored hashed token from DB
            $record = DB::table('password_reset_tokens')
                ->where('email', $user->email)
                ->first();

            // Validate token existence and match
            if (! $record || ! Hash::check($request->token, $record->token)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid or expired token.',
                ], 400);
            }

            // Optional: Check if token is expired (older than 60 minutes)
            if (Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Token has expired.',
                ], 400);
            }

            // Reset the password
            $user->password = Hash::make($request->password);
            $user->save();

            // Delete the token after successful reset
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();
            // Send password reset success email
            $content = 'Your password has been changed successfully.<br>';
            $content .= 'If you did not perform this change, please contact support immediately.';

            \Illuminate\Support\Facades\Mail::to($user->email)->send(
                new \App\Mail\AllMail(
                    'Password Changed Successfully',
                    $user,
                    $content
                )
            );

            Log::info('Password reset successful', [
                'email' => $user->email,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Password has been reset successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error resetting password: '.$e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'An error occurred while resetting the password.',
            ], 500);
        }
    }
}
