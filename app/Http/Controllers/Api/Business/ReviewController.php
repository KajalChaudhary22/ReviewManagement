<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Review,
    Inquiries
};

class ReviewController extends Controller
{
    protected function index(Request $request)
    {
        $url = custom_decrypt($request->ty);
        if (!$url || $url !== 'ReviewsList') {
            // If the URL is not valid, redirect to a 404 page or handle the error as needed
            abort(404);
        } else {
             // Assuming business_id is stored in auth user (if not, adjust accordingly)
            $businessId = auth()->user()->business_id;

            // Total reviews
            $totalReviews = Review::count();

            // Average rating
            $avgRating = Review::avg('rating');

            // 5-star reviews
            $fiveStarReviews = Review::where('rating', 5)->count();

            // Response rate (percentage of reviews with a reply)
            $responseRate = Inquiries::whereNotNull('response')->count();
            $responseRatePercent = $totalReviews > 0 ? round(($responseRate / $totalReviews) * 100, 2) : 0;

            // Compare with last month
            $thisMonth = now()->startOfMonth();
            $lastMonth = now()->subMonth()->startOfMonth();

            $totalLastMonth = Review::whereBetween('created_at', [$lastMonth, $thisMonth])->count();
            $totalThisMonth = Review::where('created_at', '>=', $thisMonth)->count();
            $totalChange = $totalLastMonth > 0 
                ? round((($totalThisMonth - $totalLastMonth) / $totalLastMonth) * 100, 2) 
                : 100;

            $avgLastMonth = Review::whereBetween('created_at', [$lastMonth, $thisMonth])->avg('rating') ?? 0;
            $avgChange = $avgLastMonth > 0 ? round($avgRating - $avgLastMonth, 2) : $avgRating;

            $fiveStarLastMonth = Review::whereBetween('created_at', [$lastMonth, $thisMonth])->where('rating', 5)->count();
            $fiveStarThisMonth = Review::where('created_at', '>=', $thisMonth)->where('rating', 5)->count();
            $fiveStarChange = $fiveStarLastMonth > 0 ? ($fiveStarThisMonth - $fiveStarLastMonth) : $fiveStarThisMonth;

            $responseLastMonth = Inquiries::whereBetween('created_at', [$lastMonth, $thisMonth])->whereNotNull('response')->count();
            $responseThisMonth = Inquiries::where('created_at', '>=', $thisMonth)->whereNotNull('response')->count();
            $responseChange = $responseLastMonth > 0 
                ? round((($responseThisMonth - $responseLastMonth) / $responseLastMonth) * 100, 2) 
                : 100;
                
        return view('business.reviews.index', [
            'stats' => [
                'total' => ['value' => $totalReviews, 'change' => $totalChange],
                'average' => ['value' => round($avgRating, 1), 'change' => $avgChange],
                'fiveStar' => ['value' => $fiveStarReviews, 'change' => $fiveStarChange],
                'responseRate' => ['value' => $responseRatePercent, 'change' => $responseChange],
            ]
        ]);
            }
    }
    public function getReviews(Request $request)
    {
        $query = Review::query();

        // Filter by rating if provided
        if ($request->has('rating') && $request->rating != '') {
            $query->where('rating', $request->rating);
        }

        // Get reviews with customer & business info if needed
        $reviews = $query->latest()->get();

        return response()->json([
            'status' => true,
            'data' => $reviews
        ]);
    }
}
