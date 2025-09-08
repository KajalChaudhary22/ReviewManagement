<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Analytic;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use Exception;
use Carbon\Carbon;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Review;
use Illuminate\Support\Facades\DB;


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

            if (!$routeUrl || $routeUrl !== 'AnalyticsReports') {
                abort(404);
            }

            // Periods
            $previousStart = Carbon::now()->subMonth()->startOfMonth();
            $previousEnd   = Carbon::now()->subMonth()->endOfMonth();

            // --- Overall totals (all-time) ---
            $totalCustomers  = Customer::count();
            $totalBusinesses = Business::count();
            $totalReviews    = Review::count();

            // --- Previous period (last month only) ---
            $prevCustomers   = Customer::whereBetween('created_at', [$previousStart, $previousEnd])->count();
            $prevBusinesses  = Business::whereBetween('created_at', [$previousStart, $previousEnd])->count();
            $prevReviews     = Review::whereBetween('created_at', [$previousStart, $previousEnd])->count();

            // --- Calculate growth vs last month ---
            $customerChange  = $totalCustomers > 0 && $prevCustomers > 0
                ? round((($totalCustomers - $prevCustomers) / $prevCustomers) * 100, 1)
                : 0;

            $businessChange  = $totalBusinesses > 0 && $prevBusinesses > 0
                ? round((($totalBusinesses - $prevBusinesses) / $prevBusinesses) * 100, 1)
                : 0;

            $reviewChange    = $totalReviews > 0 && $prevReviews > 0
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
                    'count' => $customerMonthlyRaw[$m] ?? 0
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
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back();
        }
    }
}
