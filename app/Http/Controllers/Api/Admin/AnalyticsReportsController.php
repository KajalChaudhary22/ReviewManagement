<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Analytic;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use Exception;
use Carbon\Carbon;

class AnalyticsReportsController extends Controller
{
    /**
     * Show the Analytics Reports page.
     */
    protected function index(Request $request)
    {
        try {
            $routeUrl = custom_decrypt($request->ty);

            if (!$routeUrl || $routeUrl !== 'AnalyticsReports') {
                Log::warning('Invalid route access in AnalyticsReportsController@index', [
                    'encrypted' => $request->ty,
                    'decrypted' => $routeUrl
                ]);
                abort(404);
            }

            return view('admin.analyticsReports.index');

        } catch (Exception $e) {
            Log::error('Error loading analytics reports page', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->view('errors.500', [], 500);
        }
    }



}