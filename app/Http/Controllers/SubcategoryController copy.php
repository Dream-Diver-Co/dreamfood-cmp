<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        // $subcategories = Subcategory::with('category')->get();
        $subcategories = Subcategory::withCount('products')->get();
        return view('admin.pages.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('subcategories');
        }

        Subcategory::create($data);

        return redirect()->back()->with('success', 'SubCategory created successfully!');
    }




    public function show(Subcategory $subcategory)
    {
        $subcategory->load('products');
        return view('admin.pages.subcategories.show', compact('subcategory'));
    }

    public function showProducts(Subcategory $subcategory)
    {
        $products = $subcategory->products()->get();

        return view('admin.pages.subcategories.products', compact('subcategory', 'products'));
    }


    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.pages.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('subcategories');
        }

        $subcategory->update($data);

        return redirect()->route('subcategories.index')->with('success', 'SubCategory Update successfully!');
    }




    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index');
    }
}
