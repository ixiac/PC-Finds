<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderHistory;

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
}
