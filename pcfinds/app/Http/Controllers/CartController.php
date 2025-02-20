<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validate input
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Get logged-in user
        if (!Auth::check()) {
            return response()->json(['error' => 'You must be logged in to add to cart'], 401);
        }

        $userId = Auth::id();

        // Retrieve the product to check its available quantity
        $product = Product::where('product_id', $request->product_id)->first();
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Check if product already exists in cart
        $cartItem = Cart::where('id', $userId)
            ->where('product_id', $request->product_id)
            ->first();

        // Determine the new total quantity after the addition
        $newQuantity = $request->quantity;
        if ($cartItem) {
            $newQuantity += $cartItem->quantity;
        }

        // Restriction: new quantity must not exceed the available product quantity
        if ($newQuantity > $product->quantity) {
            return response()->json([
                'error' => 'The quantity you are trying to add exceeds the available stock.'
            ], 400);
        }

        if ($cartItem) {
            // Update quantity if already exists
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        } else {
            // Create new cart entry
            Cart::create([
                'id' => $userId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json(['message' => 'Product added to cart']);
    }

    public function showCart()
    {
        $cartItems = Cart::where('id', auth()->id())->with('product')->get();
        return view('content.c_cart', compact('cartItems'));
    }

    public function removeFromCart($cart_id)
    {
        $cartItem = Cart::find($cart_id);

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.show')->with('success', 'Item removed from cart.');
        }

        return redirect()->route('cart.show')->with('error', 'Item not found.');
    }
}
