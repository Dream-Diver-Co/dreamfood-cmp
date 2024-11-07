<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponUse;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class CouponController extends Controller
{
    // Show all coupons
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.pages.coupons.index', compact('coupons'));
    }

    // Show the form for creating a new coupon
    public function create()
    {
        return view('admin.pages.coupons.create');
    }

    // Store a newly created coupon in the database
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required|in:percent,dollar,euro',
            'discount_amount' => 'required|numeric|min:0',
            'total_use' => 'required|integer|min:0',
            'max_users' => 'required|integer|min:1',
            'max_user_uses' => 'required|integer|min:1',
            'min_amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'start_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after_or_equal:start_at',
            'description' => 'nullable|string',
        ]);

        Coupon::create($request->all());

        return redirect()->route('coupons.index')->with('success', 'Coupon created successfully.');
    }

    // Show the form for editing a coupon
    public function edit(Coupon $coupon)
    {
        return view('admin.pages.coupons.edit', compact('coupon'));
    }

    // Update the coupon in the database
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code,' . $coupon->id,
            'type' => 'required|in:percent,dollar,euro',
            'discount_amount' => 'required|numeric|min:0',
            'total_use' => 'required|integer|min:0',
            'max_users' => 'required|integer|min:1',
            'max_user_uses' => 'required|integer|min:1',
            'min_amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'start_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after_or_equal:start_at',
            'description' => 'nullable|string',
        ]);

        $coupon->update($request->all());

        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully.');
    }

    // Show a single coupon
    public function show(Coupon $coupon)
    {
        return view('admin.pages.coupons.show', compact('coupon'));
    }

    // Delete a coupon
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully.');
    }

    // public function applyCoupon(Request $request)
    // {
    //     Log::info('Coupon application started', ['request' => $request->all()]);

    //     // Validate the request input
    //     $request->validate([
    //         'coupon_code' => 'required|string'
    //     ]);

    //     // Retrieve the coupon by code
    //     $coupon = Coupon::where('code', $request->coupon_code)->first();

    //     // Check if the coupon exists
    //     if (!$coupon) {
    //         Log::warning('Invalid coupon code', ['coupon_code' => $request->coupon_code]);
    //         return response()->json(['success' => false, 'message' => 'Invalid coupon code.']);
    //     }

    //     // Check if the coupon is active
    //     if ($coupon->start_at && $coupon->start_at > now()) {
    //         Log::info('Coupon not yet active', ['coupon' => $coupon->code]);
    //         return response()->json(['success' => false, 'message' => 'Coupon is not yet active.']);
    //     }

    //     // Check if the coupon has expired
    //     if ($coupon->expires_at && $coupon->expires_at < now()) {
    //         Log::info('Coupon has expired', ['coupon' => $coupon->code]);
    //         return response()->json(['success' => false, 'message' => 'Coupon has expired.']);
    //     }

    //     // Check if the coupon can still be used (based on total_use)
    //     if ($coupon->total_use <= 0) {
    //         Log::info('Coupon has reached its usage limit', ['coupon' => $coupon->code]);
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Coupon has reached its usage limit.'
    //         ]);
    //     }

    //     // Calculate total price from cart items for the authenticated user
    //     $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
    //     $total = $cartItems->sum(fn($item) => $item->total_price);

    //     // Log the total value for debugging
    //     Log::info('Total calculated from cart items', ['total' => $total]);

    //     // Check if the total meets the minimum amount required by the coupon
    //     if ($coupon->min_amount && $total < $coupon->min_amount) {
    //         Log::info('Total amount is less than the required minimum for coupon', [
    //             'total' => $total,
    //             'min_amount' => $coupon->min_amount
    //         ]);
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Total amount must be at least ' . number_format($coupon->min_amount, 2) . ' to use this coupon.'
    //         ]);
    //     }

    //     // Check if the coupon has a valid discount amount
    //     if (!$coupon->discount_amount || $coupon->discount_amount <= 0) {
    //         return response()->json(['success' => false, 'message' => 'Invalid coupon discount amount.']);
    //     }


    //     // Calculate the discount
    //     $discount = 0;
    //     if ($coupon->type == 'percent') {
    //         $discount = min(($coupon->discount_amount / 100) * $total, $total); // Percentage discount
    //     } elseif ($coupon->type == 'dollar') {
    //         $discount = min($coupon->discount_amount, $total); // Fixed dollar discount
    //     } elseif ($coupon->type == 'euro') {
    //         // Convert dollars to euros using a static rate or a conversion API
    //         $conversionRate = 1.14; // Example static rate for USD to EUR conversion
    //         $discount = min($coupon->discount_amount * (1 / $conversionRate), $total); // Euro discount
    //     }

    //     // Ensure the discounted total is not less than zero
    //     $discountedTotal = max($total - $discount, 0);

    //     // Log the discount and the final discounted total
    //     Log::info('Discount applied', [
    //         'coupon' => $coupon->code,
    //         'discount' => $discount,
    //         'discountedTotal' => $discountedTotal
    //     ]);

    //     // Decrease total_use by 1 since the coupon has been applied
    //     $coupon->decrement('total_use');

    //     // Return the response with the discount details and updated total_use value
    //     return response()->json([
    //         'success' => true,
    //         'discount' => number_format($discount, 2),
    //         'discountedTotal' => number_format($discountedTotal, 2),
    //         'total_use' => $coupon->total_use // Return the updated total_use value
    //     ]);
    // }


    public function applyCoupon(Request $request)
{
    Log::info('Coupon application started', ['request' => $request->all()]);

    // Validate the request input
    $request->validate([
        'coupon_code' => 'required|string'
    ]);

    // Retrieve the coupon by code
    $coupon = Coupon::where('code', $request->coupon_code)->first();

    // Check if the coupon exists
    if (!$coupon) {
        Log::warning('Invalid coupon code', ['coupon_code' => $request->coupon_code]);
        return response()->json(['success' => false, 'message' => 'Invalid coupon code.']);
    }

    // Check if the coupon is active
    if ($coupon->start_at && $coupon->start_at > now()) {
        Log::info('Coupon not yet active', ['coupon' => $coupon->code]);
        return response()->json(['success' => false, 'message' => 'Coupon is not yet active.']);
    }

    // Check if the coupon has expired
    if ($coupon->expires_at && $coupon->expires_at < now()) {
        Log::info('Coupon has expired', ['coupon' => $coupon->code]);
        return response()->json(['success' => false, 'message' => 'Coupon has expired.']);
    }

    // Check if the coupon can still be used (based on total_use)
    if ($coupon->total_use <= 0) {
        Log::info('Coupon has reached its usage limit', ['coupon' => $coupon->code]);
        return response()->json([
            'success' => false,
            'message' => 'Coupon has reached its usage limit.'
        ]);
    }

    // Calculate total price from cart items for the authenticated user
    $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
    $total = $cartItems->sum(fn($item) => $item->total_price);

    // Log the total value for debugging
    Log::info('Total calculated from cart items', ['total' => $total]);

    // Check if the total meets the minimum amount required by the coupon
    if ($coupon->min_amount && $total < $coupon->min_amount) {
        Log::info('Total amount is less than the required minimum for coupon', [
            'total' => $total,
            'min_amount' => $coupon->min_amount
        ]);
        return response()->json([
            'success' => false,
            'message' => 'Total amount must be at least ' . number_format($coupon->min_amount, 2) . ' to use this coupon.'
        ]);
    }

    // Check if the coupon has a valid discount amount
    if (!$coupon->discount_amount || $coupon->discount_amount <= 0) {
        return response()->json(['success' => false, 'message' => 'Invalid coupon discount amount.']);
    }

    // Calculate the discount
    $discount = 0;
    if ($coupon->type == 'percent') {
        $discount = min(($coupon->discount_amount / 100) * $total, $total); // Percentage discount
    } elseif ($coupon->type == 'dollar') {
        $discount = min($coupon->discount_amount, $total); // Fixed dollar discount
    } elseif ($coupon->type == 'euro') {
        // Convert dollars to euros using a static rate or a conversion API
        $conversionRate = 1.14; // Example static rate for USD to EUR conversion
        $discount = min($coupon->discount_amount * (1 / $conversionRate), $total); // Euro discount
    }

    // Ensure the discounted total is not less than zero
    $discountedTotal = max($total - $discount, 0);

    // Log the discount and the final discounted total
    Log::info('Discount applied', [
        'coupon' => $coupon->code,
        'discount' => $discount,
        'discountedTotal' => $discountedTotal
    ]);

    // Calculate and proportionally apply the discount to each cart item's total price
    foreach ($cartItems as $cartItem) {
        $itemProportion = $cartItem->total_price / $total;
        $itemDiscount = $itemProportion * $discount;
        $newTotalPrice = max($cartItem->total_price - $itemDiscount, 0);

        // Update the cart item's total price in the database
        $cartItem->update([
            'total_price' => $newTotalPrice
        ]);
    }

    // Decrease total_use by 1 since the coupon has been applied
    $coupon->decrement('total_use');

    // Return the response with the discount details and updated total_use value
    return response()->json([
        'success' => true,
        'discount' => number_format($discount, 2),
        'discountedTotal' => number_format($discountedTotal, 2),
        'total_use' => $coupon->total_use // Return the updated total_use value
    ]);
}





















}
