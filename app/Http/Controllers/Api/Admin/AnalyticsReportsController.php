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
        $totalRevenue = 0; //Order::whereBetween('created_at', [$from, $to])->sum('amount');

        // ✅ Business Metrics by Type
        $businessByType = Business::select('type_id', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('type_id')
            ->with('type:id,name') // assumes relation business->type
            ->get()
            ->mapWithKeys(fn ($b) => [$b->type->name => $b->total]);

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
}
