<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\AdminPreference;

class SettingController extends Controller
{
    
    public function save(Request $request)
    {
        // dd($request->all());
        try {
            $prefs = AdminPreference::updateOrCreate(
                ['id' =>$request->id], // or a fixed admin if single user
                [
                    'results_per_page'    => $request->results_per_page,
                    'notif_user'          => $request->notif_user,
                    'notif_business'      => $request->notif_business,
                    'notif_review'        => $request->notif_review,
                    'notification_method' => $request->notification_method,
                ]
            );

            return response()->json([
                'status' => true,
                'message' => 'Settings saved successfully!',
                'data' => $prefs
            ]);

        } catch (Exception $e) {
            Log::error('Error saving settings', [
                'message' => $e->getMessage()
            ]);
            return response()->json([
                'status' => false,
                'message' => 'Failed to save settings.'
            ], 500);
        }
    }
}
