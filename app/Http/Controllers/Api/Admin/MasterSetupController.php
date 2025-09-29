<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class MasterSetupController extends Controller
{
    protected function index(Request $request)
    {
        return view('admin.master_setup.index');
    }

    protected function getMasterParent(Request $request)
    {
        $masterTypeId = $request->input('masterType_id');

        $data = Masters::where('master_type_id', $masterTypeId)
            ->whereNull('parent_id')
            ->get();

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    protected function save(Request $request)
    {
        // dd($request->all());

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'masterType' => 'required|exists:master_types,id',
                'status' => 'required|in:Active,Inactive',
            ], [
                'name.required' => 'Please enter a master name.',
                'masterType.required' => 'Please select a master type.',
                'status.required' => 'Please select a status.',
            ]);
            if($request->master_id)
            {
                $id = custom_decrypt($request->master_id);
                $master = Masters::find($id);
                if(!$master){
                    return response()->json([
                        'status' => false,
                        'message' => 'Master not found.',
                    ], 404);
                }
                $msg = "Master updated successfully!";
            }else{
                $master = new Masters;
                $msg = "Master created successfully!";
            }
                // Update existing master
                $master->name = $request->name;
                $master->master_type_id = $request->masterType;
                $master->parent_id = $request->parentName ?? null;
                $master->description = $request->description;
                $master->status = $request->status;
                $master->save();

                return response()->json([
                    'status' => true,
                    'message' => $msg,
                ]);
            

        } catch (\Exception $e) {
            Log::error('Master Setup Save Error: '.$e->getMessage().' Line: '.$e->getLine());

            return response()->json([
                'status' => false,
                'message' => 'Failed to save master. Please try again.',
            ], 500);
        }
    }

    public function getMasterSetupData(Request $request)
    {
        $masters = Masters::with(['masterTypeDetails', 'parent'])->select('masters.*');
        if ($request->name) {
            $masters->where('name', 'like', '%' . $request->name . '%');
        }
    
        if ($request->status && $request->status !== 'All') {
            $masters->where('status', $request->status);
        }
        return DataTables::of($masters)
            ->addColumn('master_type', function ($row) {
                return $row->masterTypeDetails->name ?? '-';
            })
            ->addColumn('parent_name', function ($row) {
                return $row->parent->name ?? '-';
            })
            ->addColumn('action', function ($row) {
                // Render the Blade partial
                return view('admin.master_setup.actions', ['row' => $row])->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    protected function delete($id)
    {
        try {
            $decryptedId = custom_decrypt($id);
            $master = Masters::find($decryptedId);

            if (!$master) {
                return response()->json([
                    'status' => false,
                    'message' => 'Master not found.',
                ], 404);
            }

            // Check if the master has child records
            $childCount = Masters::where('parent_id', $decryptedId)->count();
            if ($childCount > 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Cannot delete master with child records. Please remove child records first.',
                ], 400);
            }

            $master->delete();

            return response()->json([
                'status' => true,
                'message' => 'Master deleted successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Master Deletion Error: '.$e->getMessage().' Line: '.$e->getLine());

            return response()->json([
                'status' => false,
                'message' => 'Failed to delete master. Please try again.',
            ], 500);
        }
    }
}
