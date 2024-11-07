<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{

//     public function add(Request $request)
// {
//     // Ensure the user is authenticated
//     if (!auth()->check()) {
//         return redirect()->route('login')->with('error', 'You must be logged in to add items to the cart.');
//     }

//     $request->validate([
//         'product_id' => 'required|exists:products,id',
//         'quantity' => 'required|integer|min:1',
//         'size' => 'nullable|string',
//         'color' => 'nullable|string',
//     ]);

//     $product = Product::find($request->product_id);
//     $totalPrice = $product->price * $request->quantity;

//     $cart = Cart::updateOrCreate(
//         [
//             'user_id' => auth()->id(),
//             'product_id' => $request->product_id,
//             'size' => $request->size,
//             'color' => $request->color,
//         ],
//         [
//             'quantity' => $request->quantity,
//             'total_price' => $totalPrice,
//         ]
//     );

//     return redirect()->back()->with('success', 'Product added to cart');
// }

public function add(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to add items to the cart.');
    }

    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'size' => 'nullable|string',
        'color' => 'nullable|string',
    ]);

    $product = Product::find($request->product_id);

    // Use the discount price from the form if available
    $price = $request->price ? $request->price : $product->price;
    $totalPrice = $price * $request->quantity;

    $cart = Cart::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'size' => $request->size,
            'color' => $request->color,
        ],
        [
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'source' => $request->source ?? null,
            'is_deal' => $request->source === 'deal_page' ? true : false, // Set is_deal if it's from deal page
        ]
    );

    return redirect()->back()->with('success', 'Product added to cart');
}





// public function showDealCart()
// {
//     // $userId = auth()->id();
//     // $cartItems = Cart::where('user_id', $userId)
//     //                 ->where('source', 'deal_page') // Filter for deal items
//     //                 ->with('product')
//     //                 ->get();

//     // $totalPrice = $cartItems->sum(fn($item) => $item->total_price);


//     // return view('frontend.cart.deal_cart', compact('cartItems', 'totalPrice'));



//     // $userId = auth()->id();

//     //     // Retrieve all orders for the user and check if cashback has been applied


//     //     // Retrieve the cart items
//     //     $cartItems = Cart::where('user_id', $userId)
//     //         ->with('product')
//     //         ->get();


//     //         return view('frontend.cart.deal_cart', compact('cartItems'));


//     $userId = auth()->id();

//     // Retrieve cart items with 'deal' source
//     $cartItems = Cart::where('user_id', $userId)
//         ->where('source', 'deal') // Filter for 'deal' items only
//         ->with('product')
//         ->get();

//     return view('frontend.cart.deal_cart', compact('cartItems'));





// }


// public function showDealCart()
// {
//     $userId = auth()->id();

//         // Retrieve all orders for the user and check if cashback has been applied


//         // Retrieve the cart items
//         $cartItems = Cart::where('user_id', $userId)
//             ->with('product')
//             ->get();

//         return view('frontend.cart.deal_cart', compact('cartItems'));
// }




// public function show()
// {
//         $userId = auth()->id();

//         // Retrieve all orders for the user and check if cashback has been applied
//         $orders = Order::where('user_id', $userId)->get();
//         $totalCashback = $orders->sum('cashback_amount');
//         $cashbackApplied = $orders->where('cashback_applied', true)->isNotEmpty();

//         // Retrieve the cart items
//         $cartItems = Cart::where('user_id', $userId)
//             ->with('product')
//             ->get();

//         // Calculate the cart subtotal (total price)
//         $totalPrice = $cartItems->sum(fn($item) => $item->total_price, 2);

//         // Calculate the applicable cashback discount
//         $applicableCashbackDiscount = $cashbackApplied ? 0 : min($totalCashback * 0.5, $totalPrice * 0.5);

//         // Calculate the final total
//         $finalCartTotal = $totalPrice - $applicableCashbackDiscount;

//         $isDealCart = $cartItems->where('is_deal', true)->count() > 0;


//         return view('frontend.cart.show', compact('cartItems', 'totalCashback', 'applicableCashbackDiscount', 'finalCartTotal', 'totalPrice', 'cashbackApplied'));
// }


public function show()
{
    $userId = auth()->id();

    // Retrieve all orders for the user and check if cashback has been applied
    $orders = Order::where('user_id', $userId)->get();
    $totalCashback = $orders->sum('cashback_amount');
    $cashbackApplied = $orders->where('cashback_applied', true)->isNotEmpty();

    // Retrieve the cart items
    $cartItems = Cart::where('user_id', $userId)
        ->with('product')
        ->get();

    // Calculate the cart subtotal (total price)
    $totalPrice = $cartItems->sum(fn($item) => $item->total_price, 2);

    // Calculate the applicable cashback discount
    $applicableCashbackDiscount = $cashbackApplied ? 0 : min($totalCashback * 0.5, $totalPrice * 0.5);

    // Calculate the final total
    $finalCartTotal = $totalPrice - $applicableCashbackDiscount;

    // Check if the cart has any deal items
    $isDealCart = $cartItems->where('is_deal', true)->count() > 0;


    // Pass all necessary variables to the view
    return view('frontend.cart.show', compact(
        'cartItems',
        'totalCashback',
        'applicableCashbackDiscount',
        'finalCartTotal',
        'totalPrice',
        'cashbackApplied',
        'isDealCart' // Include $isDealCart here
    ));
}






public function applyCashback(Request $request)
{
    $userId = auth()->id();

    // Check if cashback was already applied
    $order = Order::where('user_id', $userId)->where('cashback_applied', false)->first();

    if (!$order) {
        return response()->json([
            'success' => false,
            'message' => 'Cashback discount has already been applied.'
        ]);
    }

    $totalCashback = Order::where('user_id', $userId)->sum('cashback_amount');

    // Retrieve the cart items
    $cartItems = Cart::where('user_id', $userId)
        ->with('product')
        ->get();

    // Calculate the cart subtotal (total price)
    $totalPrice = $cartItems->sum(fn($item) => $item->total_price);

    // Calculate the applicable cashback discount (50% of the total cashback or 50% of the total price)
    $applicableCashbackDiscount = min($totalCashback * 0.5, $totalPrice * 0.5);

    // Calculate the final total after applying the cashback discount
    $finalCartTotal = $totalPrice - $applicableCashbackDiscount;

    // Update total cashback in the database by subtracting the applied cashback discount
    $remainingCashback = $totalCashback - $applicableCashbackDiscount;
    Order::where('user_id', $userId)->update(['cashback_amount' => $remainingCashback, 'cashback_applied' => true]);

    // Update each cart item's total price proportionally
    foreach ($cartItems as $item) {
        $item->total_price -= ($item->total_price * ($applicableCashbackDiscount / $totalPrice));
        $item->save(); // Save the updated total price
    }

    // Return the response with updated cashback and cart total
    return response()->json([
        'success' => true,
        'finalCartTotal' => $finalCartTotal,
        'applicableCashbackDiscount' => $applicableCashbackDiscount,
        'remainingCashback' => $remainingCashback,
    ]);
}


    public function update(Request $request)
{
    $cart = Cart::where('user_id', auth()->id())
        ->where('product_id', $request->product_id)
        ->first();

    if ($cart) {
        $product = $cart->product;
        $newQuantity = $request->quantity;
        $newTotalPrice = $product->price * $newQuantity;

        // Update the cart with the new quantity and total price
        $cart->update([
            'quantity' => $newQuantity,
            'total_price' => $newTotalPrice,
        ]);

        $itemTotal = $cart->total_price;
        $overallTotal = Cart::where('user_id', auth()->id())
            ->get()
            ->sum('total_price');
        $overallQuantity = Cart::where('user_id', auth()->id())->sum('quantity');

        return response()->json([
            'success' => true,
            'itemTotal' => $itemTotal,
            'overallTotal' => $overallTotal,
            'overallQuantity' => $overallQuantity,
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Item not found in cart'], 404);
}



    public function remove(Request $request)
    {
        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->delete();
            return response()->json(['message' => 'Product removed from cart']);
        }

        return response()->json(['message' => 'Item not found in cart'], 404);
    }


}
