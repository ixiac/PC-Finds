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
        $selectedCartIds = array_map('intval', $request->input('cartItems', []));

        if (empty($selectedCartIds)) {
            return back()->with('error', 'No items selected for checkout.');
        }

        $cartItems = Cart::where('id', $userId)->whereIn('cart_id', $selectedCartIds)->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Selected items not found in the cart.');
        }

        $user = Account::where('id', $userId)->first();
        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $totalAmount = $cartItems->sum(fn($item) => $item->quantity * $item->product->selling_price);

        $order = OrderHistory::create([
            'account_id' => $userId,
            'date_order_history' => now(),
            'total_amount' => $totalAmount,
            'order_status' => 1,
            'shipping_address' => $user->address,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_history_id' => $order->order_history_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->selling_price,
                'subtotal' => $item->quantity * $item->product->selling_price,
            ]);
        }

        Cart::where('id', $userId)->whereIn('cart_id', $selectedCartIds)->delete();

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

