<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //fetch all products
    public function index()
{
    $products = Product::all();
    return view('index', compact('products'));
}


// create new product
public function store(Request $request)
{
 // Validate the request data
 $validated = $request->validate([
    'product_name' => 'required|string|max:255',
    'quantity_in_stock' => 'required|integer|min:0',
    'price_per_item' => 'required|numeric|min:0',
]);

// Save the product data to the database
Product::create([
    'name' => $validated['product_name'],
    'quantity' => $validated['quantity_in_stock'],
    'price' => $validated['price_per_item'],
]);
    return redirect()->route('products.index');
}

// edit product
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

// update product
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'product_name' => 'required|string|max:255',
        'quantity_in_stock' => 'required|integer|min:0',
        'price_per_item' => 'required|numeric|min:0',
    ]);

    $product = Product::findOrFail($id);
    $product->update([
        'name' => $validated['product_name'],
        'quantity' => $validated['quantity_in_stock'],
        'price' => $validated['price_per_item'],
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}


}
