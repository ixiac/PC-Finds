<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderHistory;
use App\Models\OrderItem;
use App\Models\Refund;


class OrderHistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Get the logged-in user's ID

        // Fetch all orders for the user, including order items and product details
        $orders = OrderHistory::where('account_id', $userId)
            ->with(['items.product'])
            ->orderBy('date_order_history', 'desc')
            ->get();

        return view('content.c_history', compact('orders'));
    }

    public function cancelOrder($itemId)
    {
        $orderItem = OrderItem::where('item_id', $itemId)
            ->whereHas('order', function ($query) {
                $query->where('account_id', Auth::id())
                    ->where('order_status', 1); // Only pending orders
            })
            ->first();

        if (!$orderItem) {
            return response()->json(['success' => false, 'message' => 'Item not found or cannot be canceled'], 404);
        }

        // Delete the specific item from the order
        $orderItem->delete();

        // Check if all items in the order are canceled, then update order status
        $remainingItems = OrderItem::where('order_history_id', $orderItem->order_history_id)->count();
        if ($remainingItems == 0) {
            OrderHistory::where('order_history_id', $orderItem->order_history_id)->update(['order_status' => 5]); // Set to Cancelled
        }

        return response()->json(['success' => true, 'message' => 'Item canceled successfully']);
    }




    public function requestRefund(Request $request, $orderId)
    {
        $order = OrderHistory::where('order_history_id', $orderId)
            ->where('account_id', Auth::id()) // Ensure user owns the order
            ->where('order_status', 4) // Only completed orders can be refunded
            ->first();

        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order not eligible for refund.'], 400);
        }

        // Create refund record with status 1 (Pending)
        Refund::create([
            'order_history_id' => $orderId,
            'account_id' => Auth::id(),
            'reason' => $request->reason,
            'image' => $request->hasFile('image') ? $request->file('image')->store('refunds', 'public') : null,
            'status' => 1 // Pending in refunds table
        ]);

        // Update order status to "Waiting for Refund" in order_history table
        $order->update(['order_status' => 6]);

        return response()->json(['status' => 'success', 'message' => 'Refund request submitted successfully.']);
    }

}
