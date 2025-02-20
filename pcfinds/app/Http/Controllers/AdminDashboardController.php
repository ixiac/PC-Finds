<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function topSellingProducts()
    {
        $topSellingProducts = Report::select('product_name', 'quantity_sold')
            ->orderBy('quantity_sold', 'DESC')
            ->limit(10) 
            ->get();

        if ($topSellingProducts->isEmpty()) {
            return response()->json([
                "message" => "No sales data available",
                "labels" => [],
                "data" => []
            ]);
        }

        return response()->json([
            'labels' => $topSellingProducts->pluck('product_name')->toArray(),
            'data' => $topSellingProducts->pluck('quantity_sold')->toArray(),
        ]);
    }

    public function categorySalesProgress()
    {
        $categorySales = DB::table('category')
            ->leftJoin('product', 'product.category_id', '=', 'category.category_id')
            ->select(
                'category.category_name',
                DB::raw('COALESCE(SUM(product.quantity_sold), 0) as total_sold'),
                DB::raw('COALESCE(SUM(product.quantity + product.quantity_sold), 0) as total_stock')
            )
            ->groupBy('category.category_name')
            ->get();

        $salesData = [];

        foreach ($categorySales as $category) {
            // Calculate percentage, ensuring division by zero is avoided
            $percentage = $category->total_stock > 0 ? ($category->total_sold / $category->total_stock) * 100 : 0;

            $salesData[] = [
                'category_name' => $category->category_name,
                'percentage' => round($percentage, 2)
            ];
        }

        return response()->json($salesData);
    }


}
