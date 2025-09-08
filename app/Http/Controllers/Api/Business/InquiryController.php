<?php

namespace App\Http\Controllers\Api\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiries;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Helpers\Helpers;


class InquiryController extends Controller
{
    protected function index(Request $request)
    {
        $total = Inquiries::count();
        $active = Inquiries::where('status', 'In Progress')->count();
        $completed = Inquiries::where('status', 'Completed')->count();

        // Date ranges
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

        // --- Growth percentages ---
        $lastMonthTotal = Inquiries::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $lastMonthActive = Inquiries::where('status', 'active')
            ->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $lastMonthCompleted = Inquiries::where('status', 'completed')
            ->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();

        $growthTotal = $lastMonthTotal > 0 ? round((($total - $lastMonthTotal) / $lastMonthTotal) * 100, 1) : 0;
        $growthActive = $lastMonthActive > 0 ? round((($active - $lastMonthActive) / $lastMonthActive) * 100, 1) : 0;
        $growthCompleted = $lastMonthCompleted > 0 ? round((($completed - $lastMonthCompleted) / $lastMonthCompleted) * 100, 1) : 0;

        return view('business.inquiry.index', compact(
            'total',
            'active',
            'completed',
            // 'avgResponseHours',
            'growthTotal',
            'growthActive',
            'growthCompleted'
        ));
    }

    // protected function index(Request $request)
    // {
    //     // Total inquiries
    //     $total = Inquiries::count();

    //     // Active inquiries
    //     $active = Inquiries::where('status', 'Pending')->count();

    //     // Completed inquiries
    //     $completed = Inquiries::where('status', 'Completed')->count();

    //     // Average response time (example: assume there's a responded_at timestamp)
    //     // $avgResponse = Inquiries::whereNotNull('responded_at')
    //     //     ->selectRaw('AVG(TIMESTAMPDIFF(SECOND, created_at, responded_at)) as avg_seconds')
    //     //     ->value('avg_seconds');
    //     // $avgResponseHours = $avgResponse ? round($avgResponse / 3600, 1) : 0;

    //     // --- Growth compared to last month ---
    //     $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
    //     $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

    //     $lastMonthTotal = Inquiries::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();

    //     $growthTotal = $lastMonthTotal > 0 
    //         ? round((($total - $lastMonthTotal) / $lastMonthTotal) * 100, 1)
    //         : 0;

    //     return view('business.inquiry.index', compact(
    //         'total',
    //         'active',
    //         'completed',
    //         // 'avgResponseHours',
    //         'growthTotal'
    //     ));
    // }

    // public function getInquiryStats()
    // {
    //     $total = Inquiries::count();
    //     $active = Inquiries::where('status', 'Inprogress')->orWhere('status', 'Pending')->count();
    //     $completed = Inquiries::where('status', 'Completed')->count();

    //     // Example calculation for avg. response time (dummy if you don’t store response_time)
    //     $avgResponseTime = Inquiries::avg('response_time'); // assuming you store it in hours

    //     return response()->json([
    //         'total' => $total,
    //         'active' => $active,
    //         'completed' => $completed,
    //         'avg_response_time' => $avgResponseTime ? round($avgResponseTime, 1) . 'h' : 'N/A',
    //     ]);
    // }

    public function getData(Request $request)
    {
        $query = Inquiries::with(['businessDetails:id,name,email', 'productDetails:id,name', 'customerDetails:id,name,email']);
        // Apply filter if status is selected
        if ($request->status && $request->status !== 'All') {
            $query->where('status', $request->status);
        }
        // dd($request->all(), $query->get());
        return DataTables::of($query)
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d M Y');
            })
            ->addColumn('company', function ($row) {
                return $row->businessDetails->name ?? '-';
            })
            ->addColumn('contact', function ($row) {
                return $row->businessDetails->email ?? '-';
            })
            ->addColumn('product', function ($row) {
                return $row->productDetails->name ?? '-';
            })
            ->addColumn('status_badge', function ($row) {
                // $class = strtolower($row->status); // pending, inprogress, completed
                return Helpers::showStatus($row->status);
            })
            ->addColumn('actions', function ($row) {
                return '
                    <button class="reply-inquiry-btn" data-id="' . $row->id . '" style="background:none; border:none; cursor:pointer;">✉️</button>
                    <button class="view-inquiry-btn" data-id="' . $row->id . '" style="background:none; border:none; cursor:pointer;">👁️</button>
                ';
            })
            ->rawColumns(['status_badge', 'actions']) // allow HTML rendering
            ->make(true);
    }

    public function show($id)
    {
        $inquiry = Inquiries::with(['businessDetails', 'productDetails', 'customerDetails'])->findOrFail($id);
        return response()->json([
            'id' => $inquiry->id,
            'company' => $inquiry->businessDetails->name ?? '-',
            'email' => $inquiry->businessDetails->email ?? '-',
            'product' => $inquiry->productDetails->name ?? '-',
            'quantity' => $inquiry->quantity,
            'message' => $inquiry->message,
            'status' => $inquiry->status,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Inprogress,Completed',
        ]);
        $inquiry = Inquiries::findOrFail($id);
        $inquiry->status = $request->status;
        $inquiry->save();

        return response()->json(['success' => true, 'message' => 'Inquiry updated successfully']);
    }
}
