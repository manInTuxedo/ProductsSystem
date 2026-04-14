<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Show all products
    public function getProducts() {
        $products = Product::with('category')->get();
        return view('layouts.products', compact('products'));
    }

    // Show the add-product form
    public function viewForm() {
        $categories = Category::all();
        return view('layouts.insertProduct', compact('categories'));
    }

    // Save a new product from the form
    public function addProduct(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:category,id',
            'status' => 'required|in:available,out_of_stock',
        ]);

        Product::create($data);

        return redirect('/getProducts')->with('success', 'Product created successfully.');
    }

    // Show edit form for existing product
    public function editProduct(Product $product) {
        $categories = Category::all();
        return view('layouts.editProduct', compact('product', 'categories'));
    }

    // Update existing product
    public function updateProduct(Request $request, Product $product) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:category,id',
            'status' => 'required|in:available,out_of_stock',
        ]);

        $product->update($data);

        return redirect('/getProducts')->with('success', 'Product updated successfully.');
    }

    // Delete a product
    public function deleteProduct(Product $product) {
        $product->delete();

        return redirect('/getProducts')->with('success', 'Product deleted successfully.');
    }
}
 