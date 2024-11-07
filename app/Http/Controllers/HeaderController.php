<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Order;

class HeaderController extends Controller
{

    // public function index() {
    //     $cartItems = Auth::check() ? Cart::where('user_id', Auth::id())->get() : collect();
    //     return view('frontend.partials.header', compact('cartItems'));
    // }

    public function index() {

        // Fetch the most recent order for the authenticated user
        $order = Order::where('user_id', auth()->id())->latest()->first();



        $cartItems = Auth::check() ? Cart::where('user_id', Auth::id())->get() : collect();
        $totalQuantity = $cartItems->sum('quantity');

        return view('frontend.partials.header', compact('cartItems', 'totalQuantity','order'));
    }

    public function someMethod()
    {
        // Fetch the most recent order for the authenticated user
        $order = Order::where('user_id', auth()->id())->latest()->first();

        return view('frontend.user.orders', compact('order'));
    }



}





