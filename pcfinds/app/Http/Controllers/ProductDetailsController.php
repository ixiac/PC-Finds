<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{
    public function show($id)
    {
        $product = DB::table('product')->where('product_id', $id)->first();
        
        if (!$product) {
            return abort(404);
        }

        return view('content.product_details', compact('product', 'id'));
    }
}

