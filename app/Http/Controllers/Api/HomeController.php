<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'fullName' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            $contact = Contact::create([
                'full_name' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Message saved successfully!',
                'data' => $contact
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
        catch (\Exception $e) {
            Log::error('Error saving message: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to save message: ' . $e->getMessage()
            ], 500);
        }
    }
}
