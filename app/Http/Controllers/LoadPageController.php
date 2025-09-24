<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    MasterType,
    AdminPreference
};

class LoadPageController extends Controller
{
    public function masterSetup(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'MasterSetup') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            return view('admin.master_setup.index');
        }
    }
    public function masterSetupAdd(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'MasterSetupAdd') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $masterTypes = MasterType::where('status','Active')->get();
            // dd($masterTypes);
            return view('admin.master_setup.add',compact('masterTypes'));
        }
    }
    protected function indexSetting(Request $request)
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
    protected function indexUserManagement(Request $request)
    {
        // dd($request->all());
        $routeUrl = custom_decrypt($request->ty);
        if (!$routeUrl || $routeUrl !== 'UserManagement') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }else{
            $adminPreferences = AdminPreference::find(1);
            return view('admin.userManagement.index',compact('adminPreferences'));
        }
        
    }
    public function indexBusinessManagement(Request $request)
    {
        $routeUrl = custom_decrypt($request->ty);
        if (!$routeUrl || $routeUrl !== 'BusinessManagement') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        }
        $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Industries')->first();
        $locationMastertypId = MasterType::with('getActiveMasterData')->where('name', 'Location')->first();
        if ($mastertypId) {
            $industries = $mastertypId?->getActiveMasterData;
        } else {
            $industries = collect();
        }
        if ($locationMastertypId) {
            $locations = $locationMastertypId?->getActiveMasterData;
        } else {
            $locations = collect();
        }
        return view('admin.businessManagement.index', compact('industries', 'locations'));
    }
}
