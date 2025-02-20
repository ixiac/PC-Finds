<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function lowStockData()
    {
        $lowStockProducts = Report::select('product_name', 'quantity', 'quantity_sold')
            ->orderByRaw('(quantity - quantity_sold) ASC') // Sort by lowest stock first
            ->limit(7) // Limit to 7 items
            ->get()
            ->map(function ($product) {
                return [
                    'product_name' => $product->product_name,
                    'remaining_stock' => max(0, $product->quantity - $product->quantity_sold)
                ];
            });

        if ($lowStockProducts->isEmpty()) {
            return response()->json([
                "message" => "No low-stock products found",
                "labels" => [],
                "data" => [],
                "colors" => []
            ]);
        }

        // Generate unique colors for each item
        $colors = ['#FF5733', '#33B5E5', '#FFC107', '#8E44AD', '#2ECC71', '#E91E63', '#009688'];

        return response()->json([
            'labels' => $lowStockProducts->pluck('product_name')->toArray(),
            'data' => $lowStockProducts->pluck('remaining_stock')->toArray(),
            'colors' => array_slice($colors, 0, $lowStockProducts->count()) // Limit colors to available products
        ]);
    }


}
