<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function getData(Request $request)
    {
        try {
            $products = Product::with('category')->select('product.*');

            return DataTables::of($products)
                ->orderColumn('product_id', 'product_id $1') // Ensure sorting by product_id
                ->addColumn('category', function ($product) {
                    return optional($product->category)->category_name ?? 'N/A';
                })
                ->addColumn('actions', function ($product) {
                    return '<a href="#" class="btn btn-sm btn-primary">Edit</a> 
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
