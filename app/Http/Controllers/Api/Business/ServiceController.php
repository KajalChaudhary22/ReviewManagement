<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    //
    protected function addService(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validate request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
                $validated['image'] = $imagePath;
            }

            // Create service
            $service = Service::create($validated);

            DB::commit();

            return response()->json(['service' => $service], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            // Log error with full trace
            Log::error('Service creation failed: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'input' => $request->all()
            ]);

            return response()->json([
                'error' => 'Failed to create product. Please try again later.'
            ], 500);
        }
    }
}
