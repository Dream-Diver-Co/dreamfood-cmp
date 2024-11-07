<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('subcategory', 'category')->get();
        return view('admin.pages.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.pages.products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            // 'sizes' => 'required|array|min:1|max:6',
            // 'colors' => 'required|array|min:1|max:6',
            'price' => 'required|numeric',
            'subcategory_id' => 'required|exists:subcategories,id',
            'category_id' => 'required|exists:categories,id',

        ]);

        $product = new Product($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        // $product->sizes = $request->sizes;
        // $product->colors = $request->colors;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.pages.products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            // 'sizes' => 'required|array|min:1|max:6',
            // 'colors' => 'required|array|min:1|max:6',
            'price' => 'required|numeric',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product->fill($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        // $product->sizes = $request->sizes;
        // $product->colors = $request->colors;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.pages.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function updateStatus(Request $request, Product $product)
    {
        $request->validate([
            // 'status' => 'required|string|in:Regular,Featured,Recent,Offer',
            'status' => 'required|string|in:breakfast,lunch,dinner,drinks,dessert',

        ]);

        $product->status = $request->status;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product status updated successfully.');
    }

    public function updateStatus_1(Request $request, Product $product)
    {
        $request->validate([
            'status_1' => 'required|string|in:In Stock,Out of Stock',
        ]);


        $product->status_1 = $request->status_1;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product status updated successfully.');
    }






}
