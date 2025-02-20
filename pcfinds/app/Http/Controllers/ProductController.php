<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function show_category()
    {
        $categories = Category::select('category_id', 'category_name')->get();
        return view('content.add_product', compact('categories'));
    }

    public function product_table()
    {
        $products = Product::all();
        return view('content.manage_product', compact('products'));
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'product_name' => ['required', 'string', 'max:255', 'unique:product,product_name'],
            'retail_price' => ['required', 'numeric', 'min:0'],
            'selling_price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:1', 'lt:500'],
            'category_id' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'description' => ['nullable', 'string', 'max:500', 'unique:product,description'],
        ], [
            'product_name.required' => 'Product name is required.',
            'product_name.string' => 'Product name must be a valid string.',
            'product_name.max' => 'Product name must not exceed 255 characters.',
            'product_name.unique' => 'Product name must be unique. This name has already been taken.',
            'retail_price.required' => 'Retail price is required.',
            'retail_price.numeric' => 'Retail price must be a valid number.',
            'retail_price.min' => 'Retail price must be at least 0.',
            'selling_price.required' => 'Selling price is required.',
            'selling_price.numeric' => 'Selling price must be a valid number.',
            'selling_price.min' => 'Selling price must be at least 0.',
            'quantity.required' => 'Product stock is required.',
            'quantity.integer' => 'Product stock must be an integer.',
            'quantity.min' => 'Product stock must be at least 1.',
            'quantity.lt' => 'Product stock cannot be 500 or more because that is too much.',
            'category.required' => 'Category is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpg, jpeg, png.',
            'image.max' => 'The image must not be greater than 2MB.',
            'description.string' => 'Product name must be a valid string.',
            'description.max' => 'Product name must not exceed 500 characters.',
            'description.unique' => 'Product name must be unique. This name has already been taken.',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        } else {
            $imagePath = null;
        }

        Product::create([
            'product_name' => $request->input('product_name'),
            'quantity' => $request->input('quantity'),
            'retail_price' => $request->input('retail_price'),
            'selling_price' => $request->input('selling_price'),
            'date_added' => now(),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        $category = Category::find($request->input('category_id'));
        $user = Auth::user();

        DB::table('product_logs')->insert([
            'product_name' => $request->input('product_name'),
            'category_name' => $category ? $category->category_name : 'Unknown',
            'restocked_by' => $user->first_name . ' ' . $user->last_name,
            'quantity_in_stock' => 0,
            'quantity_added' => $request->input('quantity'),
            'quantity_total' => $request->input('quantity'),
            // date_restocked will be set automatically using useCurrent()
        ]);

        return back()->with('success', 'Product added successfully!');
    }

    public function edit_product($product_id)
    {
        $product = Product::with('category')->find($product_id);
        $categories = Category::select('category_id', 'category_name')->get();
        return view('content.edit_product', compact('product', 'categories'));
    }

    public function update_product(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $user = Auth::user();

        // Get the quantity from the request and convert empty values to 0
        $quantityInput = $request->input('quantity');
        $quantity = ($quantityInput === null || $quantityInput === '') ? 0 : $quantityInput;

        if ($user->role == 2) {
            // Validate only the quantity field as nullable, but then override with 0 if empty
            $request->validate([
                'quantity' => 'nullable|integer|min:0',
            ]);

            $product->quantity = $quantity;
        } else {
            // Validate all fields for users with full access; make quantity nullable
            $request->validate([
                'product_name' => 'required|string|max:255',
                'retail_price' => 'required|numeric|min:0',
                'selling_price' => 'required|numeric|min:0',
                'quantity' => 'nullable|integer|min:0',
                'category_id' => 'required|exists:category,category_id',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'description' => 'nullable|string|max:500',
            ]);

            // Handle file upload
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('images'), $imageName);
                $imagePath = 'images/' . $imageName;
            } else {
                $imagePath = null;
            }

            // Update all fields
            $product->product_name = $request->input('product_name');
            $product->retail_price = $request->input('retail_price');
            $product->selling_price = $request->input('selling_price');
            $product->category_id = $request->input('category_id');
            $product->description = $request->input('description');
            $product->image = $imagePath;
            $product->quantity = $quantity; // Use our calculated $quantity value
        }

        $product->save();

        $category = Category::find($product->category_id);

        // Fetch the last log entry for this product (by product name)
        $last_log = DB::table('product_logs')
            ->where('product_name', $product->product_name)
            ->orderBy('log_id', 'desc')
            ->first();

        $last_updated_quantity_total = $last_log ? $last_log->quantity_total : 0;
        $new_total = $last_updated_quantity_total + $quantity;

        DB::table('product_logs')->insert([
            'product_name' => $product->product_name,
            'category_name' => $category ? $category->category_name : 'Unknown',
            'restocked_by' => $user->first_name . ' ' . $user->last_name,
            'quantity_in_stock' => $last_updated_quantity_total,
            'quantity_added' => $quantity,
            'quantity_total' => $new_total,
        ]);

        // Update the product's quantity in the database with a where clause
        DB::table('product')
            ->where('product_id', $product_id)
            ->update(['quantity' => $new_total]);

        return redirect()->route('manage-product')->with('success', 'Product updated successfully!');
    }

    public function delete_product($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }

    public function show_product_logs()
    {
        $logs = DB::table('product_logs')
            ->orderBy('log_id', 'desc')
            ->get();
        return view('content.product_logs', compact('logs'));
    }

}
