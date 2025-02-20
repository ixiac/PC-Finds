<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\OrderHistory;
use App\Models\OrderItem;
use App\Models\Account;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $userId = Auth::id();

        // Fetch cart items of the logged-in user
        $cartItems = Cart::where('id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        // Retrieve user's shipping address from the 'account' table
        $user = Account::where('id', $userId)->first();
        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        // Calculate total amount
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->selling_price;
        });

        // Insert into order_history
        $order = OrderHistory::create([
            'account_id' => $userId, // Store the user's ID in order_history
            'date_order_history' => now(),
            'total_amount' => $totalAmount,
            'order_status' => 1, // 1 = Pending
            'shipping_address' => $user->address, // Use user's saved address
        ]);

        // Insert order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_history_id' => $order->order_history_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->selling_price,
                'subtotal' => $item->quantity * $item->product->selling_price,
            ]);
        }

        // Clear cart after checkout
        Cart::where('id', $userId)->delete();

        $product = Product::find($item->product_id);
        if ($product) {
            $product->update([
                "quantity" => max(0, $product->quantity - $item->quantity),
                "quantity_sold" => $product->quantity_sold + $item->quantity,
            ]);
        }


        return redirect()->route('product-page')->with('success', 'Checkout successful!');
    }
}

