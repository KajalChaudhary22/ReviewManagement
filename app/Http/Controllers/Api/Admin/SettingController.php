<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\AdminPreference;

class SettingController extends Controller
{
    protected function index(Request $request)
    {
        try {
            $routeUrl = custom_decrypt($request->ty);

            if (!$routeUrl || $routeUrl !== 'Settings') {
                Log::warning('Invalid route access in Settings@index', [
                    'encrypted' => $request->ty,
                    'decrypted' => $routeUrl
                ]);
                abort(404);
            }
            $adminPreferences = AdminPreference::find(1);

            return view('admin.setting.index',compact('adminPreferences'));

        } catch (Exception $e) {
            Log::error('Error loading review moderation page', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->view('errors.500', [], 500);
        }
    }
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
