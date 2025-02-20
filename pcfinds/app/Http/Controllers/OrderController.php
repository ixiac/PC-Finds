<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function show_pending_order()
    {
        // Fetch pending orders along with the concatenated customer name from the account table
        $pending_orders = DB::table('order_history')
            ->join('account', 'order_history.account_id', '=', 'account.id')
            ->select(
                'order_history.*',
                DB::raw("CONCAT(account.first_name, ' ', account.last_name) as customer_name")
            )
            ->where('order_history.order_status', 1)
            ->get();

        // For each pending order, fetch order items joined with product and category data
        foreach ($pending_orders as $order) {
            $order->items = DB::table('order_item')
                ->join('product', 'order_item.product_id', '=', 'product.product_id')
                ->join('category', 'product.category_id', '=', 'category.category_id')
                ->select(
                    'order_item.*',
                    'product.product_name',
                    'category.category_name'
                )
                ->where('order_item.order_history_id', $order->order_history_id)
                ->get();
        }

        return view('content.pending_order', compact('pending_orders'));
    }

    public function approve(Request $request)
    {
        // Update the order_status to 2 for the provided order_id
        DB::table('order_history')
            ->where('order_history_id', $request->order_id)
            ->update(['order_status' => 2]);

        return response()->json(['success' => true]);
    }

    // New method to cancel an order (if needed)
    public function cancel(Request $request)
    {
        DB::table('order_history')
            ->where('order_history_id', $request->order_id)
            ->update(['order_status' => 5]);

        return response()->json(['success' => true]);
    }

    public function show_approved_order()
    {
        // Fetch pending orders along with the concatenated customer name from the account table
        $approved_orders = DB::table('order_history')
            ->join('account', 'order_history.account_id', '=', 'account.id')
            ->select(
                'order_history.*',
                DB::raw("CONCAT(account.first_name, ' ', account.last_name) as customer_name")
            )
            ->where('order_history.order_status', 2)
            ->get();

        foreach ($approved_orders as $order) {
            $order->items = DB::table('order_item')
                ->join('product', 'order_item.product_id', '=', 'product.product_id')
                ->join('category', 'product.category_id', '=', 'category.category_id')
                ->select(
                    'order_item.*',
                    'product.product_name',
                    'category.category_name'
                )
                ->where('order_item.order_history_id', $order->order_history_id)
                ->get();
        }

        return view('content.approved_order', compact('approved_orders'));
    }

    public function to_deliver(Request $request)
    {
        DB::table('order_history')
            ->where('order_history_id', $request->order_id)
            ->update([
                'order_status' => 3,
            ]);

        return response()->json(['success' => true]);
    }

    public function show_to_deliver_order()
    {
        // Fetch pending orders along with the concatenated customer name from the account table
        $to_deliver_orders = DB::table('order_history')
            ->join('account', 'order_history.account_id', '=', 'account.id')
            ->select(
                'order_history.*',
                DB::raw("CONCAT(account.first_name, ' ', account.last_name) as customer_name")
            )
            ->where('order_history.order_status', 3)
            ->get();

        foreach ($to_deliver_orders as $order) {
            $order->items = DB::table('order_item')
                ->join('product', 'order_item.product_id', '=', 'product.product_id')
                ->join('category', 'product.category_id', '=', 'category.category_id')
                ->select(
                    'order_item.*',
                    'product.product_name',
                    'category.category_name'
                )
                ->where('order_item.order_history_id', $order->order_history_id)
                ->get();
        }

        return view('content.to_deliver_order', compact('to_deliver_orders'));
    }

    public function completed(Request $request)
    {
        DB::table('order_history')
            ->where('order_history_id', $request->order_id)
            ->update([
                'order_status' => 4,
            ]);

        return response()->json(['success' => true]);
    }

    public function show_completed_order()
    {
        // Fetch pending orders along with the concatenated customer name from the account table
        $completed_orders = DB::table('order_history')
            ->join('account', 'order_history.account_id', '=', 'account.id')
            ->select(
                'order_history.*',
                DB::raw("CONCAT(account.first_name, ' ', account.last_name) as customer_name")
            )
            ->where('order_history.order_status', 4)
            ->get();

        foreach ($completed_orders as $order) {
            $order->items = DB::table('order_item')
                ->join('product', 'order_item.product_id', '=', 'product.product_id')
                ->join('category', 'product.category_id', '=', 'category.category_id')
                ->select(
                    'order_item.*',
                    'product.product_name',
                    'category.category_name'
                )
                ->where('order_item.order_history_id', $order->order_history_id)
                ->get();
        }

        return view('content.completed_order', compact('completed_orders'));
    }

    public function show_cancelled_order()
    {
        // Fetch pending orders along with the concatenated customer name from the account table
        $cancelled_orders = DB::table('order_history')
            ->join('account', 'order_history.account_id', '=', 'account.id')
            ->select(
                'order_history.*',
                DB::raw("CONCAT(account.first_name, ' ', account.last_name) as customer_name")
            )
            ->where('order_history.order_status', 4)
            ->get();

        foreach ($cancelled_orders as $order) {
            $order->items = DB::table('order_item')
                ->join('product', 'order_item.product_id', '=', 'product.product_id')
                ->join('category', 'product.category_id', '=', 'category.category_id')
                ->select(
                    'order_item.*',
                    'product.product_name',
                    'category.category_name'
                )
                ->where('order_item.order_history_id', $order->order_history_id)
                ->get();
        }

        return view('content.cancelled_order', compact('cancelled_orders'));
    }

}


