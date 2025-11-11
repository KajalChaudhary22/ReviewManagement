<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Review;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AnalyticsReportsController extends Controller
{
    /**
     * Show the Analytics Reports page.
     */
    // protected function index(Request $request)
    // {
    //     try {
    //         $routeUrl = custom_decrypt($request->ty);

    //         if (!$routeUrl || $routeUrl !== 'AnalyticsReports') {
    //             Log::warning('Invalid route access in AnalyticsReportsController@index', [
    //                 'encrypted' => $request->ty,
    //                 'decrypted' => $routeUrl
    //             ]);
    //             abort(404);
    //         }

    //         return view('admin.analyticsReports.index');

    //     } catch (Exception $e) {
    //         Log::error('Error loading analytics reports page', [
    //             'message' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString()
    //         ]);
    //         return response()->view('errors.500', [], 500);
    //     }
    // }

    protected function index(Request $request)
    {
        try {
            $routeUrl = custom_decrypt($request->ty);

            if (! $routeUrl || $routeUrl !== 'AnalyticsReports') {
                abort(404);
            }

            // Periods
            $previousStart = Carbon::now()->subMonth()->startOfMonth();
            $previousEnd = Carbon::now()->subMonth()->endOfMonth();

            // --- Overall totals (all-time) ---
            $totalCustomers = Customer::count();
            $totalBusinesses = Business::count();
            $totalReviews = Review::count();

            // --- Previous period (last month only) ---
            $prevCustomers = Customer::whereBetween('created_at', [$previousStart, $previousEnd])->count();
            $prevBusinesses = Business::whereBetween('created_at', [$previousStart, $previousEnd])->count();
            $prevReviews = Review::whereBetween('created_at', [$previousStart, $previousEnd])->count();

            // --- Calculate growth vs last month ---
            $customerChange = $totalCustomers > 0 && $prevCustomers > 0
                ? round((($totalCustomers - $prevCustomers) / $prevCustomers) * 100, 1)
                : 0;

            $businessChange = $totalBusinesses > 0 && $prevBusinesses > 0
                ? round((($totalBusinesses - $prevBusinesses) / $prevBusinesses) * 100, 1)
                : 0;

            $reviewChange = $totalReviews > 0 && $prevReviews > 0
                ? round((($totalReviews - $prevReviews) / $prevReviews) * 100, 1)
                : 0;

            $reviewByRating = Review::select('rating', DB::raw('COUNT(*) as count'))
                ->groupBy('rating')
                ->orderBy('rating', 'desc')
                ->get();

            $totalReviews = $reviewByRating->sum('count');

            $reviewData = [];
            foreach ($reviewByRating as $row) {
                $percentage = $totalReviews > 0 ? round(($row->count / $totalReviews) * 100, 1) : 0;
                $reviewData[] = [
                    'rating' => $row->rating,
                    'count' => $row->count,
                    'percentage' => $percentage,
                ];
            }

            // --- Customers Growth Data ---
            // Daily (last 7 days)
            $customerDaily = Customer::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
                ->where('created_at', '>=', Carbon::now()->subDays(7))
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            // Weekly (last 8 weeks)
            $customerWeekly = Customer::select(
                DB::raw('YEARWEEK(created_at, 1) as week'),
                DB::raw('COUNT(*) as count')
            )
                ->where('created_at', '>=', Carbon::now()->subWeeks(8))
                ->groupBy('week')
                ->orderBy('week')
                ->get();

            // Monthly (last 6 months)
            $months = collect();
            for ($i = 5; $i >= 0; $i--) {
                $months->push(Carbon::now()->subMonths($i)->format('Y-m'));
            }

            $customerMonthlyRaw = Customer::select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as count')
            )
                ->where('created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('count', 'month');

            // Merge into full 6 months (fill 0 if missing)
            $customerMonthly = $months->map(function ($m) use ($customerMonthlyRaw) {
                return [
                    'month' => $m,
                    'count' => $customerMonthlyRaw[$m] ?? 0,
                ];
            });

            return view('admin.analyticsReports.index', compact(
                'totalCustomers',
                'totalBusinesses',
                'totalReviews',
                'customerChange',
                'businessChange',
                'reviewChange',
                'reviewData',
                'totalReviews',
                'customerDaily',
                'customerWeekly',
                'customerMonthly'
            ));
        } catch (Exception $e) {
            Log::error('Error loading analytics reports page', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back();
        }
    }

    public function getAnalyticsData(Request $request)
    {
        $dateRange = $request->dateRange;
        $from = null;
        $to = now();

        if ($dateRange === '7') {
            $from = now()->subDays(7);
        } elseif ($dateRange === '30') {
            $from = now()->subDays(30);
        } elseif ($dateRange === '90') {
            $from = now()->subDays(90);
        } elseif ($dateRange === '365') {
            $from = now()->startOfYear();
        } elseif ($dateRange === 'custom') {
            $from = $request->fromDate;
            $to = $request->toDate;
        }

        // ✅ Stats
        $totalCustomers = Customer::whereBetween('created_at', [$from, $to])->count();
        $totalBusinesses = Business::whereBetween('created_at', [$from, $to])->count();
        $totalReviews = Review::whereBetween('created_at', [$from, $to])->count();
        $totalRevenue = 0; // Order::whereBetween('created_at', [$from, $to])->sum('amount');

        // ✅ Business Metrics by Type
        $businessByType = Business::select('master_id', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('master_id')
            ->with('masterType:id,name') // assumes relation business->type
            ->get()
            ->mapWithKeys(fn ($b) => [$b->masterType?->name => $b->total]);

        // ✅ Business Metrics by Location
        $businessByLocation = Business::select('location_id', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('location_id')
            ->with('location:id,name') // assumes relation business->location
            ->get()
            ->mapWithKeys(fn ($b) => [$b->location->name => $b->total]);

        return response()->json([
            'totalCustomers' => $totalCustomers,
            'totalBusinesses' => $totalBusinesses,
            'totalReviews' => $totalReviews,
            'totalRevenue' => $totalRevenue,
            'reviewActivity' => [
                5 => 45, 4 => 20, 3 => 15, 2 => 12, 1 => 8,
            ],
            'businessMetrics' => [
                'type' => $businessByType,
                'location' => $businessByLocation,
            ],
        ]);
    }

    public function getUserGrowth(Request $request)
    {
        return response()->json([
            ['month' => 'Jan', 'total' => 75],
            ['month' => 'Feb', 'total' => 112],
            ['month' => 'Mar', 'total' => 150],
            ['month' => 'Apr', 'total' => 187],
        ]);
    }

    public function getReviewMetrics(Request $request)
    {
        // dd($request->all());
        $type = $request->get('type', 'overTime'); // default
        $dateRange = $request->get('dateRange', 30);
        $from = $request->get('from');
        $to = $request->get('to');

        $query = Review::query();

        // 🗓️ Apply date filters
        if ($dateRange === 'custom' && $from && $to) {
            $query->whereBetween(DB::raw('DATE(reviews.created_at)'), [$from, $to]);
        } else {
            $days = is_numeric($dateRange) ? (int) $dateRange : 30;
            $query->where('reviews.created_at', '>=', Carbon::now()->subDays($days));
        }

        // 📊 Group by type
        if ($type === 'reviewCategory') {
            // Group by reviewType_id (category)
            $data = $query->join('masters as m', 'reviews.reviewType_id', '=', 'm.id')
                ->select('m.name as category_name', DB::raw('COUNT(*) as total'))
                ->groupBy('m.name')
                ->orderByDesc('total')
                ->get();

            $total = $data->sum('total');

            $data = $data->map(function ($item) use ($total) {
                $percentage = $total > 0 ? round(($item->total / $total) * 100, 1) : 0;

                return [
                    'category_name' => $item->category_name,
                    'total' => (int) $item->total,
                    'percentage' => $percentage,
                    'label' => "{$item->rating} Star ".($item->rating > 1 ? 's' : '')." ({$percentage}%)",
                ];
            });

        } else {
            // ⭐ Default: Rating-based Over Time view
            $data = $query->select('rating', DB::raw('COUNT(*) as total'))
                ->groupBy('rating')
                ->orderByDesc('rating')
                ->get();

            $total = $data->sum('total');

            $data = $data->map(function ($item) use ($total) {
                $percentage = $total > 0 ? round(($item->total / $total) * 100, 1) : 0;

                return [
                    'rating' => (int) $item->rating,
                    'total' => (int) $item->total,
                    'percentage' => $percentage,
                    'label' => "{$item->rating} Star ".($item->rating > 1 ? 's' : '')." ({$percentage}%)",
                ];
            });
        }
        // 🧩 Include total count for chart center
        return response()->json([
            'total_reviews' => $data->sum('total'),
            'data' => $data->values(),
        ]);
    }

    // public function getReviewMetrics(Request $request)
    // {
    //     return response()->json([
    //         ['rating' => 5, 'total' => 45],
    //         ['rating' => 4, 'total' => 20],
    //         ['rating' => 3, 'total' => 15],
    //         ['rating' => 2, 'total' => 12],
    //         ['rating' => 1, 'total' => 8],
    //     ]);
    // }
    //     public function getReviewMetrics(Request $request)
    // {
    //     $dateRange = $request->get('dateRange', 30);
    //     $from = $request->get('from');
    //     $to = $request->get('to');

    //     // 🗓️ Build query with date filters
    //     $query = Review::query();

    //     if ($dateRange === 'custom' && $from && $to) {
    //         $query->whereBetween(DB::raw('DATE(reviews.created_at)'), [$from, $to]);
    //     } else {
    //         $days = is_numeric($dateRange) ? (int) $dateRange : 30;
    //         $query->where('reviews.created_at', '>=', Carbon::now()->subDays($days));
    //     }

    //     // ⭐ Group reviews by rating (1–5)
    //     $data = $query->select('rating', DB::raw('COUNT(*) as total'))
    //         ->groupBy('rating')
    //         ->orderByDesc('rating')
    //         ->get()
    //         ->map(function ($item) {
    //             return [
    //                 'rating' => (int) $item->rating,
    //                 'total' => (int) $item->total,
    //             ];
    //         });

    //     // 🧩 If no data, return sample default
    //     // if ($data->isEmpty()) {
    //     //     $data = collect([
    //     //         ['rating' => 5, 'total' => 45],
    //     //         ['rating' => 4, 'total' => 20],
    //     //         ['rating' => 3, 'total' => 15],
    //     //         ['rating' => 2, 'total' => 12],
    //     //         ['rating' => 1, 'total' => 8],
    //     //     ]);
    //     // }

    //     return response()->json($data->values());
    // }

    public function getBusinessMetrics(Request $request)
    {
        // dd($request->all());
        $type = $request->get('type', 'businessLocation'); // default to location
        $dateRange = $request->get('dateRange', 30);
        $from = $request->get('from');
        $to = $request->get('to');
        $query = Business::query();

        if ($dateRange === 'custom' && $from && $to) {
            $query->whereBetween(DB::raw('DATE(businesses.created_at)'), [$from, $to]);
        } else {
            $days = is_numeric($dateRange) ? (int) $dateRange : 30;
            $query->where('businesses.created_at', '>=', Carbon::now()->subDays($days));
        }

        // 🏢 Group by Business Type
        if ($type === 'businessType') {
            $data = $query->select('m.name as business_type', DB::raw('COUNT(businesses.id) as total'))
                ->join('masters as m', 'm.id', '=', 'businesses.master_id')
                ->groupBy('m.name')
                ->orderByDesc('total')
                ->get()
                ->map(function ($item) {
                    return [
                        'business_type' => $item->business_type,
                        'total' => (int) $item->total,
                    ];
                });

            return response()->json($data);
        }

        // 📍 Group by Location
        $data = $query->select('loc.name as location_name', DB::raw('COUNT(businesses.id) as total'))
            ->join('masters as loc', 'loc.id', '=', 'businesses.location_id')
            ->groupBy('loc.name')
            ->orderByDesc('total')
            ->get()
            ->map(function ($item) {
                return [
                    'location_name' => $item->location_name,
                    'total' => (int) $item->total,
                ];
            });

        return response()->json($data);
        // if ($request->type === 'businessType') {
        //     return response()->json([
        //         ['business_type' => 'Retail', 'total' => 50],
        //         ['business_type' => 'Services', 'total' => 30],
        //         ['business_type' => 'Manufacturing', 'total' => 20],
        //     ]);
        // }
        // return response()->json([
        //     ['location_name' => 'Mumbai', 'total' => 40],
        //     ['location_name' => 'Delhi', 'total' => 35],
        //     ['location_name' => 'Pune', 'total' => 25],
        // ]);
    }
}
