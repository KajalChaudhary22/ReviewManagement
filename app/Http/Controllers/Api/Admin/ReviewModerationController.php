<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use Exception;
use Carbon\Carbon;

class ReviewModerationController extends Controller
{
    /**
     * Show the Review Moderation page.
     */
    protected function index(Request $request)
    {
        try {
            $routeUrl = custom_decrypt($request->ty);

            if (!$routeUrl || $routeUrl !== 'ReviewModeration') {
                Log::warning('Invalid route access in ReviewModerationController@index', [
                    'encrypted' => $request->ty,
                    'decrypted' => $routeUrl
                ]);
                abort(404);
            }

            return view('admin.reviewModeration.index');

        } catch (Exception $e) {
            Log::error('Error loading review moderation page', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->view('errors.500', [], 500);
        }
    }

    /**
     * Get reviews list for DataTables.
     */
    public function list(Request $request)
    {
        try {
            $query = Review::with(['customerDetails:id,name', 'businessDetails:id,name']);
            
            // Search filter
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->whereHas('customerDetails', function ($q2) use ($request) {
                    $q2->where('name', 'like', "%{$request->search}%");
                })
                ->orWhereHas('businessDetails', function ($q2) use ($request) {
                    $q2->where('name', 'like', "%{$request->search}%");
                })
                ->orWhere('comment', 'like', "%{$request->search}%");
            });
        }

        // Status filter
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Rating filter
        if ($request->rating && $request->rating !== 'all') {
            $query->where('rating', $request->rating);
        }
            
            $reviews = $query->latest()->paginate(10);
            // Transform for frontend
            $reviews->getCollection()->transform(function ($review) {
                return [
                    'id'            => custom_encrypt($review->id),
                    'customer_name' => $review->customerDetails ? $review->customerDetails->name : 'N/A',
                    'business_name' => $review->businessDetails ? $review->businessDetails->name : 'N/A',
                    'created_at'    => $review->created_at->format('d M Y h:i A'),
                    'rating'        => $review->rating,
                    'comment'       => $review->comment,
                    'status'        => $review->status
                ];
            });
            // dd($reviews);

            return response()->json([
                'status' => true,
                'data' => $reviews
            ]);
        } catch (\Throwable $e) {
            Log::error("Error fetching reviews: " . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error fetching reviews'
            ], 500);
        }
    }
    public function updateStatus(Request $request)
    {
        try {
            $review = Review::findOrFail($request->id);
            $review->status = $request->status;
            $review->save();

            return response()->json([
                'status' => true,
                'message' => 'Review status updated successfully'
            ]);
        } catch (Exception $e) {
            Log::error('Error approving review', [
                'review_id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['status' => false, 'message' => 'Failed to update status'], 500);
        }
    }
    public function show($encryptedId)
    {
        try {
            // decrypt id
            $id = custom_decrypt($encryptedId);
            // dd($id);
            // get review with business and customer info
            $review = Review::with(['businessDetails:id,name', 'customerDetails:id,name'])
                ->findOrFail($id);

            return response()->json([
                'status' => true,
                'data' => [
                    'id'            => encrypt($review->id),
                    'business_name' => $review->business->name ?? '',
                    'customer_name' => $review->customer->name ?? '',
                    'review'        => $review->review_text,
                    'created_at'    => Carbon::parse($review->created_at)->format('d M Y h:i A'),
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error("Review fetch error: " . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Unable to fetch review'
            ], 500);
        }
    }

    /**
     * Approve a review.
     */
    public function approve($id)
    {
        try {
            $updated = Review::where('id', $id)->update(['status' => 'Approved']);

            if ($updated) {
                return response()->json(['status' => true, 'message' => 'Review approved successfully']);
            } else {
                return response()->json(['status' => false, 'message' => 'Review not found'], 404);
            }

        } catch (Exception $e) {
            Log::error('Error approving review', [
                'review_id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['status' => false, 'message' => 'Failed to approve review'], 500);
        }
    }

    /**
     * Reject a review.
     */
    public function reject($id)
    {
        try {
            $updated = Review::where('id', $id)->update(['status' => 'rejected']);

            if ($updated) {
                return response()->json(['status' => true, 'message' => 'Review rejected successfully']);
            } else {
                return response()->json(['status' => false, 'message' => 'Review not found'], 404);
            }

        } catch (Exception $e) {
            Log::error('Error rejecting review', [
                'review_id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['status' => false, 'message' => 'Failed to reject review'], 500);
        }
    }
}
