<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Product,
    Inquiries,
    Review,
    MasterType,
};
use Illuminate\Support\Facades\DB;

class BusinessDashboardController extends Controller
{
    // protected function dashboard(Request $request)
    // {
    //     $url = custom_decrypt($request->ty);
    //     if(!$url || $url !== 'BusinessDashboard') {
    //         // If the URL is not valid, redirect to a 404 page or handle the error as needed
    //         abort(404);
    //     }else{
    //         $businessId = Auth::user()->business_id;
    //         // Example counts
            
    //         return view('business.dashboard.dashboard');
    //     }
    // }

    protected function dashboard(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'BusinessDashboard') {
            abort(404);
        }

        $businessId = Auth::user()->business_id;
        $currentMonth = now()->startOfMonth();
        $lastMonth = now()->subMonth()->startOfMonth();

        // Total Products
        $totalProducts = DB::table('products')
            ->where('business_id', $businessId)
            ->count();
        $currentMonthProducts = DB::table('products')
            ->where('business_id', $businessId)
            ->where('created_at', '>=', $currentMonth)
            ->count();
        $lastMonthProducts = DB::table('products')
            ->where('business_id', $businessId)
            ->whereBetween('created_at', [$lastMonth, $currentMonth])
            ->count();
        $productsChange = $this->calculatePercentage($currentMonthProducts, $lastMonthProducts);

        // Active Inquiries
        $totalInquiries = DB::table('inquiries')
            ->where('business_id', $businessId)
            ->where('status', 'Pending')
            ->count();
        $currentMonthInquiries = DB::table('inquiries')
            ->where('business_id', $businessId)
            ->where('created_at', '>=', $currentMonth)
            ->count();
        $lastMonthInquiries = DB::table('inquiries')
            ->where('business_id', $businessId)
            ->whereBetween('created_at', [$lastMonth, $currentMonth])
            ->count();
        $inquiriesChange = $this->calculatePercentage($currentMonthInquiries, $lastMonthInquiries);

        // New Reviews
        $totalReviews = DB::table('reviews')
            ->where('business_id', $businessId)
            ->count();
        $currentMonthReviews = DB::table('reviews')
            ->where('business_id', $businessId)
            ->where('created_at', '>=', $currentMonth)
            ->count();
        $lastMonthReviews = DB::table('reviews')
            ->where('business_id', $businessId)
            ->whereBetween('created_at', [$lastMonth, $currentMonth])
            ->count();
        $reviewsChange = $this->calculatePercentage($currentMonthReviews, $lastMonthReviews);

        // Profile Views
        // $totalViews = DB::table('profile_views')
        //     ->where('business_id', $businessId)
        //     ->count();
        // $currentMonthViews = DB::table('profile_views')
        //     ->where('business_id', $businessId)
        //     ->where('created_at', '>=', $currentMonth)
        //     ->count();
        // $lastMonthViews = DB::table('profile_views')
        //     ->where('business_id', $businessId)
        //     ->whereBetween('created_at', [$lastMonth, $currentMonth])
        //     ->count();
        // $viewsChange = $this->calculatePercentage($currentMonthViews, $lastMonthViews);

        $recentInquiries = Inquiries::with(['businessDetails:id,name', 'productDetails:id,name'])->where('business_id', $businessId)->latest()->take(5)->get();
        $latestreviews = Review::with(['customerDetails:id,name'])->latest()->take(5)->get();
        $mastertypId = MasterType::with('getActiveMasterData')->where('name', 'Product Category')->first();
        if ($mastertypId) {
            $categories = $mastertypId?->getActiveMasterData;
        } else {
            $categories = collect();
        }
        $topProducts = Product::with(['categoryDetails:id,name'])->latest()->take(3)->get();
    // dd($businessId);
        return view('business.dashboard.dashboard', [
            'data' => [
                'products' => ['total' => $totalProducts, 'change' => $productsChange],
                'inquiries' => ['total' => $totalInquiries, 'change' => $inquiriesChange],
                'reviews' => ['total' => $totalReviews, 'change' => $reviewsChange],
                // 'views' => ['total' => $totalViews, 'change' => $viewsChange],
            ],
            'recentInquiries' => $recentInquiries,
            'latestreviews' => $latestreviews,
            'categories' => $categories,
            'topProducts' => $topProducts,
        ]);
    }

    private function calculatePercentage($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        return round((($current - $previous) / $previous) * 100, 2);
    }

}
