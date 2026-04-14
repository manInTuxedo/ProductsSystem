<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Show all categories
    public function getCategories() {
        $categories = Category::all();
        return view('layouts.categories', compact('categories'));
    }

    // Show the add-category form
    public function viewForm() {
        return view('layouts.insertCategory');
    }

    // Save a new category from the form
    public function addCategory(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:category,name',
        ]);

        Category::create($data);

        return redirect('/getCategories')->with('success', 'Category created successfully.');
    }

    // Show edit form for existing category
    public function editCategory(Category $category) {
        return view('layouts.editCategory', compact('category'));
    }

    // Update existing category
    public function updateCategory(Request $request, Category $category) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:category,name,' . $category->id,
        ]);

        $category->update($data);

        return redirect('/getCategories')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function deleteCategory(Category $category) {
        $category->delete();

        return redirect('/getCategories')->with('success', 'Category deleted successfully.');
    }
}
