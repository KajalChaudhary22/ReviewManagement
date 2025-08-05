<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\{
    Password,
    Log,
    DB,
    Hash
};
use Illuminate\Support\Carbon;

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

            if (!$user) {
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
                if (!$record || !Hash::check($request->token, $record->token)) {
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

            Log::info('Password reset successful', [
                'email' => $user->email,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Password has been reset successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error resetting password: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'An error occurred while resetting the password.',
            ], 500);
        }
    }

//     public function reset(Request $request, $token)
//     {
//         // dd($request->all());
//         try {
//             $request->validate([
//                 'token' => 'required',
//                 'email' => 'required|string',
//                 'password' => 'required|min:8|confirmed',
//             ]);

//             // Decrypt the email (use your custom_decrypt helper)
//             $email = custom_decrypt($request->email);
//             $user = User::where('email', $email)->first();

//             if (!$user) {
//                 return response()->json([
//                     'status' => false,
//                     'message' => 'User not found.',
//                 ], 404);
//             }

//             // Check if the token is valid
//             if (!Password::tokenExists($user, $token)) {
//                 return response()->json([
//                     'status' => false,
//                     'message' => 'Invalid or expired token.',
//                 ], 400);
//             }

//             // Reset the password
//             $user->password = Hash::make($request->password);
//             $user->save();

//             $stored = DB::table('password_reset_tokens')->where('email', $user->email)->first();
//             if ($stored) {
//                 Log::info('Stored hashed token:', [$stored->token]);
//                 Log::info('Incoming token:', [$token]);
//                 Log::info('Token match:', [Hash::check($token, $stored->token)]);
//             }

//             Log::info('Password reset successful', [
//                 'email' => $user->email,
//             ]);

//             return response()->json([
//                 'status' => true,
//                 'message' => 'Password has been reset successfully.',
//             ]);

//         } catch (\Exception $e) {
//             Log::error('Error resetting password: ' . $e->getMessage());

//             return response()->json([
//                 'status' => false,
//                 'message' => 'An error occurred while resetting the password.',
//             ], 500);
//         }
//     }
}
