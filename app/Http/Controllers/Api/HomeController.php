<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;
use App\Models\Quote;
use App\Models\SpecialistRequest;
use App\Models\WebsiteReview;


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
        } catch (\Exception $e) {
            Log::error('Error saving message: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to save message: ' . $e->getMessage()
            ], 500);
        }
    }

    public function subscribeStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you for subscribing!',
        ]);
    }

    public function quoteStore(Request $request)
    {
        try {
            $request->validate([
                'product_id'   => 'nullable|integer',
                'customer_id' => 'nullable|integer',
                'name'         => 'required|string|max:255',
                'email'        => 'required|email',
                'phone'        => 'required|string|max:20',
                'quantity'     => 'required|integer|min:1',
                'organization' => 'nullable|string|max:255',
                'message'      => 'nullable|string|max:1000',
            ]);

            $quote = Quote::create([
                'product_id'   => $request->product_id,
                'customer_id' => $request->customer_id,
                'name'         => $request->name,
                'email'        => $request->email,
                'phone'        => $request->phone,
                'quantity'     => $request->quantity,
                'organization' => $request->organization,
                'message'      => $request->message,
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Your quote request has been submitted successfully!',
                'data'    => $quote,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Quote validation error: ' . $e->getMessage());
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error saving quote: ' . $e->getMessage());
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to save quote: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function specialistStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_id' => 'nullable|integer',
                'customer_id' => 'nullable|integer',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'organization' => 'required|string|max:255',
                'department' => 'nullable|string|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:2000',
                'urgency' => 'nullable|string|in:low,medium,high',
            ]);

            $requestData = SpecialistRequest::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Your request has been submitted successfully!',
                'data' => $requestData,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error saving request: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! Please try again later.',
            ], 500);
        }
    }

    public function writeReview(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'company_name' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
                'rating' => 'nullable|integer|min:1|max:5',
                'message' => 'required|string|max:2000',
            ]);

            $review = WebsiteReview::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you! Your review has been submitted successfully.',
                'data' => $review
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            dd($e);
            Log::error('Review submission failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! Please try again later.'
            ], 500);
        }
    }
}
