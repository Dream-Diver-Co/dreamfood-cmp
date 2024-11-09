<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Product;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        $deals = Deal::with('product')->get();
        return view('admin.pages.deals.index', compact('deals'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.pages.deals.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount' => 'required|numeric',
            'frequency' => 'nullable|integer',
            'total_use' => 'nullable|integer',
        ]);

        // Calculate the product price and discount price
        $product = Product::find($request->product_id);
        $discountPrice = $product->price - ($product->price * ($request->discount / 100));

        // Create the deal with calculated discount price
        Deal::create(array_merge($request->all(), ['discount_price' => $discountPrice]));

        return redirect()->back()->with('success', 'Deal created successfully.');
    }

    public function show(Deal $deal)
    {
        return view('admin.pages.deals.show', compact('deal'));
    }

    public function edit(Deal $deal)
    {
        $products = Product::all();
        return view('admin.pages.deals.edit', compact('deal', 'products'));
    }

    public function update(Request $request, Deal $deal)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount' => 'required|numeric',
            'frequency' => 'nullable|integer',
            'total_use' => 'nullable|integer',
        ]);

        // Calculate the product price and discount price
        $product = Product::find($request->product_id);
        $discountPrice = $product->price - ($product->price * ($request->discount / 100));

        // Update the deal with calculated discount price
        $deal->update(array_merge($request->all(), ['discount_price' => $discountPrice]));

        return redirect()->route('deals.index')->with('success', 'Deal updated successfully.');
    }

    public function destroy(Deal $deal)
    {
        $deal->delete();
        return redirect()->route('deals.index')->with('success', 'Deal deleted successfully.');
    }
}
