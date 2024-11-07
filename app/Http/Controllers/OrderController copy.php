<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationUserMail;
use App\Mail\OrderConfirmationAdminMail;


class OrderController extends Controller
{
    public function index()
    {
        // Retrieve orders with pagination
        $orders = Order::with('user')->paginate(10);

        // Display the orders list page
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        // Retrieve the specific order and its items
        $order = Order::with('user', 'items.product')->findOrFail($id);

        // Display the order details page
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'status' => 'required|string'
        ]);

        // Retrieve the specific order
        $order = Order::findOrFail($id);

        // Update the status of the order
        $order->update(['status' => $validated['status']]);

        // Redirect back to the orders list page with a success message
        // return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
        return redirect()->back()->with('success', 'Order status updated successfully');

    }


    public function confirmation($id)
    {
        // Retrieve the specific order
        $order = Order::findOrFail($id);

        // Calculate 200% cashback
        $cashbackAmount = $order->total_amount * 2; // 200% of the total order amount

        // Update the order with the cashback amount
        $order->update(['cashback_amount' => $cashbackAmount]);

        // Send email to the user
        Mail::to($order->email)->send(new OrderConfirmationUserMail($order));


        // Send email to the admin
        Mail::to(config('mail.admin_email'))->send(new OrderConfirmationAdminMail($order));

        // Display the order confirmation page
        return view('frontend.order.confirmation', compact('order', 'cashbackAmount'));
    }

    // public function confirmation($id)
    // {
    //     // Retrieve the specific order
    //     $order = Order::findOrFail($id);

    //     // Initialize cashback amount
    //     $cashbackAmount = 0; // Default value

    //     // Check if this is the first time cashback is being awarded
    //     if ($order->cashback_applied === false) {
    //         // Calculate 200% cashback
    //         $cashbackAmount = $order->total_amount * 2; // 200% of the total order amount

    //         // Update the order with the cashback amount and set cashback_applied to true
    //         $order->update([
    //             'cashback_amount' => $cashbackAmount,
    //             'cashback_applied' => true
    //         ]);
    //     } else {
    //         // If cashback has already been applied, you can either set it to 0 or retain the previous value
    //         $cashbackAmount = $order->cashback_amount; // Or set to 0 if you don't want to show anything
    //     }

    //     // Send email to the user
    //     Mail::to($order->email)->send(new OrderConfirmationUserMail($order));

    //     // Send email to the admin
    //     Mail::to(config('mail.admin_email'))->send(new OrderConfirmationAdminMail($order));

    //     // Display the order confirmation page
    //     return view('frontend.order.confirmation', compact('order', 'cashbackAmount'));
    // }








    public function userOrders($userId)
    {
        // Retrieve all orders for the user
        $orders = Order::where('user_id', $userId)->get();

        // Count the number of orders
        $orderCount = $orders->count();

        // Calculate the total cashback the user has earned
        $totalCashback = $orders->sum('cashback_amount');

        // Display the orders along with the order count and total cashback
        return view('frontend.user.orders', compact('orders', 'orderCount', 'totalCashback'));
    }






    public function downloadInvoice($orderId)
    {
        $order = Order::with('items.product')->findOrFail($orderId);

        $pdf = PDF::loadView('frontend.order.invoice', compact('order'));

        return $pdf->download('invoice-' . $order->id . '.pdf');
    }


    public function destroy($id)
    {
        // Retrieve the specific order
        $order = Order::findOrFail($id);

        // Delete the order and its associated items
        $order->items()->delete();
        $order->delete();

        // Redirect back to the orders list page with a success message
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }

}
