<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\{
    Log,
    Auth
};
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    //
    protected function saveService(Request $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();

            // Validate request
            $validated = $request->validate([
                'service_name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
            ]);

            // Create service
            $service = Service::create([
                'code' => \App\Helpers\CodeGenerator::generate('services', 'code'),
                'name' => $validated['service_name'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'business_id' => Auth::user()?->business_id,
                'status' => 'Active',
            ]);

            DB::commit();

            return response()->json(['status' => true,'message' => 'Record added successfully'], 201);
        } catch (\Exception $e) {
            dd($e->getMessage());
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
    protected function getServiceData(Request $request)
    {
        if ($request->ajax()) {
            // $services = Service::all();
            $data = Service::select('id','name','description','price')->latest();

            return DataTables::of($data)
                ->addColumn('actions', function ($row) {
                    return '
                        <button class="btn btn-sm btn-primary editService" data-id="'.$row->id.'">✏️</button>
                        <button class="btn btn-sm btn-danger deleteService" data-id="'.$row->id.'">🗑️</button>
                    ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return response()->json(['services' => $services], 200);
    }
}
