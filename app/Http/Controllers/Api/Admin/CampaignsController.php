<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    protected function index(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if(!$url || $url !== 'Campaigns') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
            // Fetch campaigns from the database or any other source

            return view('admin.campaigns.index');
        }
    }
}
