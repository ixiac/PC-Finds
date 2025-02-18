<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Fetch products matching the search query (by name or category)
        $products = Product::where('product_name', 'LIKE', "%$query%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('category_name', 'LIKE', "%$query%");
            })
            ->with('category')
            ->get();

        return response()->json($products);
    }
}
