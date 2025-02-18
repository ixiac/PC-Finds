<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function getCategoryProducts($categoryId)
    {
        // Fetch all products for the given category ID
        $products = DB::table('product')
            ->where('category_id', $categoryId)
            ->get();

        // Generate HTML response for AJAX
        $output = '';
        foreach ($products as $product) {
            $output .= '
                <div class="product-card">
                    <div class="card">
                        <img src="' . asset('images/' . $product->image) . '" class="card-images" alt="' . htmlspecialchars($product->product_name) . '">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($product->product_name) . '</h5>
                            <p class="card-text">₱' . number_format($product->selling_price, 2) . '</p>
                        </div>
                    </div>
                </div>';
        }

        return response()->json($output);
    }
}