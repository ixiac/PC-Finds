<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
            'product_stock' => ['required', 'integer', 'min:0', 'lt:500'],
            'category_id' => ['required'],
            'product_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'description' => ['nullable', 'string', 'max:255', 'unique:product,description'],
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
            'product_stock.required' => 'Product stock is required.',
            'product_stock.integer' => 'Product stock must be an integer.',
            'product_stock.min' => 'Product stock must be at least 0.',
            'product_stock.lt' => 'Product stock cannot be 500 or more because that is too much.',
            'category.required' => 'Category is required.',
            'product_image.image' => 'The file must be an image.',
            'product_image.mimes' => 'The image must be a file of type: jpg, jpeg, png.',
            'product_image.max' => 'The image must not be greater than 2MB.',
        ]);

        // Handle file upload
        if ($request->hasFile('product_image')) {
            $imageName = time() . '.' . $request->file('product_image')->getClientOriginalExtension();
            $imagePath = $request->file('product_image')->storeAs('products', $imageName);
        } else {
            $imagePath = null;
        }

        Product::create([
            'product_name' => $request->input('product_name'),
            'retail_price' => $request->input('retail_price'),
            'selling_price' => $request->input('selling_price'),
            'date_added' => now(),
            'category_id' => $request->input('category_id'),
            'quantity' => $request->input('product_stock'), // Corrected mapping
            'description' => $request->input('description'),
            'image' => $imagePath, // Corrected mapping
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
        $request->validate([
            'product_name' => 'required|string|max:255',
            'retail_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'product_stock' => 'required|integer|min:0', // Corrected mapping
            'category_id' => 'required|exists:category,category_id',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($product_id);

        if ($request->hasFile('product_image')) { // Corrected field name
            $imagePath = $request->file('product_image')->store('products', 'public');
        } else {
            $imagePath = $product->image;
        }

        // Corrected quantity update
        if ($product->quantity != $request->input('product_stock')) {
            $product->quantity = $request->input('product_stock');
        }

        $product->product_name = $request->input('product_name');
        $product->retail_price = $request->input('retail_price');
        $product->selling_price = $request->input('selling_price');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->image = $imagePath;

        $product->save();

        return redirect()->route('manage-product')->with('success', 'Product updated successfully!');
    }

    public function delete_product($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }
}
