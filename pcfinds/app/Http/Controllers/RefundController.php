<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Refund;
use App\Models\OrderHistory;
use App\Models\OrderItem;

class RefundController extends Controller
{
    public function requestRefund(Request $request, $itemId)
    {
        try {
            // Validate input
            $request->validate([
                'refund_reason' => 'required|string|max:255',
                'refund_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Find the order item
            $orderItem = OrderItem::where('item_id', $itemId)
                ->whereHas('order', function ($query) {
                    $query->where('account_id', Auth::id())
                        ->where('order_status', 4);
                })
                ->first();

            if (!$orderItem) {
                return response()->json(['success' => false, 'message' => 'Item not found or not eligible for refund'], 404);
            }

            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('refund_image')) {
                $imagePath = $request->file('refund_image')->store('refunds', 'public');
            }

            // Create refund request
            Refund::create([
                'order_history_id' => $orderItem->order_history_id,
                'account_id' => Auth::id(),
                'refund_amount' => $orderItem->subtotal,
                'refund_reason' => $request->refund_reason,
                'refund_image' => $imagePath,
                'refund_status' => 1,
                'refund_date' => now(),
            ]);

            // Update order status
            OrderHistory::where('order_history_id', $orderItem->order_history_id)
                ->update(['order_status' => 6]);

            return response()->json(['success' => true, 'message' => 'Refund request submitted successfully']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

}
