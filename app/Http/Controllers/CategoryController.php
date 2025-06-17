<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{

     // Display all categories
   public function create()
   {

       return view('backend.categories.create');
   }
   // Store a new category
   public function store(Request $request)
   {
       $validated = $request->validate([
           'name' => 'required|string|max:255', // Validate 'name' field
       ]);

       $category = Category::create($validated);

       return redirect()->route('categories')
       ->with('success', 'Category created successfully.');
   }

    // Edit a category
    public function edit(Category $category)
    {
        // $category = Category::findOrFail($id);

        return view('backend.categories.edit', compact('category'));
    }

  // Update a category
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // $category = Category::findOrFail($id);
        $category->update($validated);

        return redirect()->route('categories') // Correct route name for resourceful routes
            ->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        // $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories') // Correct route name for resourceful routes
            ->with('success', 'Category deleted successfully.');
    }
}
