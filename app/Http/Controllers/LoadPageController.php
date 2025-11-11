<?php

namespace App\Http\Controllers;

use App\Models\AdminPreference;
use App\Models\EmailTemplate;
use App\Models\Masters;
use App\Models\MasterType;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\{
    Log,
    DB
};

class LoadPageController extends Controller
{
    public function masterSetup(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (! $url || $url !== 'MasterSetup') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $adminPreferences = AdminPreference::find(1);

            return view('admin.master_setup.index', compact('adminPreferences'));
        }
    }

    public function masterSetupAdd(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (! $url || $url !== 'MasterSetupAdd') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $masterTypes = MasterType::where('status', 'Active')->get();
            $id = null;
            if ($request->has('id')) {
                $id = custom_decrypt($request->id);
            }
            $masterData = Masters::find($id);
            $parentMasters = collect();
            if ($masterData?->master_type_id) {
                $parentMasters = Masters::where('master_type_id', $masterData->master_type_id)->ActiveOnly()->whereNull('parent_id')->get();

            }

            // dd($parentMasters);
            return view('admin.master_setup.add', compact('masterTypes', 'masterData', 'parentMasters'));
        }
    }

    protected function indexSetting(Request $request)
    {
        try {
            $routeUrl = custom_decrypt($request->ty);

            if (! $routeUrl || $routeUrl !== 'Settings') {
                Log::warning('Invalid route access in Settings@index', [
                    'encrypted' => $request->ty,
                    'decrypted' => $routeUrl,
                ]);
                abort(404);
            }
            $adminPreferences = AdminPreference::find(1);

            return view('admin.setting.index', compact('adminPreferences'));

        } catch (Exception $e) {
            Log::error('Error loading review moderation page', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->view('errors.500', [], 500);
        }
    }

    protected function indexUserManagement(Request $request)
    {
        // dd($request->all());
        $routeUrl = custom_decrypt($request->ty);
        if (! $routeUrl || $routeUrl !== 'UserManagement') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $adminPreferences = AdminPreference::find(1);

            return view('admin.userManagement.index', compact('adminPreferences'));
        }

    }

    public function indexBusinessManagement(Request $request)
    {
        $routeUrl = custom_decrypt($request->ty);
        if (! $routeUrl || $routeUrl !== 'BusinessManagement') {
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

    protected function emailTemplate(Request $request)
    {
        $routeUrl = custom_decrypt($request->ty);
        if (! $routeUrl || $routeUrl !== 'EmailTemplates') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $adminPreferences = AdminPreference::find(1);

            return view('admin.email_template.index', compact('adminPreferences'));
        }

    }

    protected function emailTemplateEdit(Request $request)
    {
        $routeUrl = custom_decrypt($request->ty);
        if (! $routeUrl || $routeUrl !== 'EmailTemplateEdit') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $id = custom_decrypt($request->id);
            $emailTemplate = EmailTemplate::find(1);

            return view('admin.email_template.edit', compact('emailTemplate'));
        }

    }

    protected function notificationList(Request $request)
    {
        $routeUrl = custom_decrypt($request->ty);
        if (! $routeUrl || $routeUrl !== 'AdminNotifications') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            $id = custom_decrypt($request->id);
            $notifications = Notifications::where('user_id', Auth::user()?->id)->get();

            return view('admin.notification.index', compact('notifications'));
        }

    }

    // protected function notificationRead(Request $request)
    // {
    //     DB::beginTransaction();
    //     try{
    //         $notifications = Notifications::where('user_id',Auth::user()?->id)->where('is_read','No')->get();
    //         foreach($notifications as $notification){
    //             $notification->is_read = 'Yes';
    //             $notification->save();
    //         }
    //         DB::commit();
    //         return redirect()->back()->with('success','All notifications marked as read.');
    //     }catch(\Exception $e){
    //         DB::rollBack();
    //         Log::error('Error marking notifications as read', [
    //             'message' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString()
    //         ]);
    //         return redirect()->back()->with('error','An error occurred while marking notifications as read.');
    //     }
    // }
    public function markAllRead()
    {
        DB::beginTransaction();
        try{
        Notifications::where('user_id', Auth::id())
            ->where('is_read', 0)
            ->update(['is_read' => 1]);

        return response()->json(['success' => true,'message' => 'All notifications marked as read']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error marking all notifications as read', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['success' => false], 500);
        }
    }

    public function markRead($id)
    {
        DB::beginTransaction();
        try{
        $notification = Notifications::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (! $notification) {
            return response()->json(['success' => false], 404);
        }

        $notification->update(['is_read' => 1]);

        return response()->json(['success' => true, 'message' => 'Notification marked as read.']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error marking notification as read', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['success' => false], 500);
        }
    }
}
