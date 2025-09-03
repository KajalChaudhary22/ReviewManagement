<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    protected function index(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'AnalyticsList') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            // $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Product Category')->first();
            // if ($mastertypId) {
            //     $categories = $mastertypId?->getActiveMasterData;
            // } else {
            //     $categories = collect();
            // }
            return view('business.analytics.index');
        }
    }
}
