<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('subcategories')->get();

        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories');
        }

        Category::create($data);

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function show(Category $category)
    {
        $category->load('subcategories');

        return view('admin.pages.categories.show', compact('category'));
    }

    public function showSubcategories(Category $category)
    {
        $subcategories = $category->subcategories()->withCount('products')->get();

        return view('admin.pages.categories.subcategories', compact('category', 'subcategories'));
    }

    public function edit(Category $category)
    {
        return view('admin.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories');
        }


        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category Update successfully!');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
