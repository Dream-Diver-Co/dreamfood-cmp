<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade;
use PDF;
use App\Models\ConsecutiveOrder;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationUserMail;
use App\Mail\OrderConfirmationAdminMail;
use Carbon\Carbon; // Make sure to include this at the top



class OrderController extends Controller
{
    public function index()
    {
        // Retrieve orders with pagination
        $orders = Order::with('user')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        // Retrieve the specific order and its items
        $order = Order::with('user', 'items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate(['status' => 'required|string']);
        $order = Order::findOrFail($id);
        $order->update(['status' => $validated['status']]);
        return redirect()->back()->with('success', 'Order status updated successfully');
    }

    public function confirmation($id)
    {
        // Retrieve the specific order
        $order = Order::findOrFail($id);
        $this->trackConsecutiveOrders($order->id);

        // Calculate 200% cashback
        $cashbackAmount = $order->total_amount * 2; // 200% of the total order amount
        $order->update(['cashback_amount' => $cashbackAmount]);

        // Check for the gift eligibility
        $giftEligible = $this->checkGiftEligibility($order->user_id);

        // Send email to the user
        Mail::to($order->email)->send(new OrderConfirmationUserMail($order));

        // Send email to the admin
        Mail::to(config('mail.admin_email'))->send(new OrderConfirmationAdminMail($order));

        // Display the order confirmation page
        return view('frontend.order.confirmation', compact('order', 'cashbackAmount', 'giftEligible'));
    }

    public function userOrders($userId)
    {
        // Retrieve all orders for the user
        $orders = Order::where('user_id', $userId)->get();
        $orderCount = $orders->count();
        $totalCashback = $orders->sum('cashback_amount');
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
        $order->items()->delete();
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }

    // private function checkGiftEligibility($userId)
    // {
    //     // Get the last 7 days of orders for the user
    //     $sevenDaysAgo = now()->subDays(6);
    //     $orders = Order::where('user_id', $userId)
    //         ->where('created_at', '>=', $sevenDaysAgo)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     // Check if the user has orders for 7 consecutive days
    //     $orderDates = $orders->pluck('created_at')->map(function ($date) {
    //         return \Carbon\Carbon::parse($date)->format('Y-m-d');
    //     })->toArray();

    //     $consecutiveDays = 0;
    //     $currentDate = now()->format('Y-m-d');

    //     // Iterate over the last 7 days to check for consecutive orders
    //     for ($i = 0; $i < 7; $i++) {
    //         $dateToCheck = now()->subDays($i)->format('Y-m-d');
    //         if (in_array($dateToCheck, $orderDates)) {
    //             $consecutiveDays++;
    //         } else {
    //             break;
    //         }
    //     }

    //     return $consecutiveDays === 7; // Return true if they ordered for 7 consecutive days
    // }

    // private function checkGiftEligibility($userId)
    // {
    //     // Retrieve orders from the last 7 days for the user
    //     $sevenDaysAgo = now()->subDays(6);
    //     $orders = Order::where('user_id', $userId)
    //         ->where('created_at', '>=', $sevenDaysAgo)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     // Extract order dates
    //     $orderDates = $orders->pluck('created_at')->map(function ($date) {
    //         return \Carbon\Carbon::parse($date)->format('Y-m-d');
    //     })->toArray();

    //     $consecutiveDays = 0;

    //     // Check each day in the past 7 days for consecutive orders
    //     for ($i = 0; $i < 7; $i++) {
    //         $dateToCheck = now()->subDays($i)->format('Y-m-d');
    //         if (in_array($dateToCheck, $orderDates)) {
    //             $consecutiveDays++;
    //         } else {
    //             break;
    //         }
    //     }

    //     return $consecutiveDays === 7;
    // }

    // frontend-user-07-day-order

    private function checkGiftEligibility($userId)
    {
        $sevenDaysAgo = now()->subDays(6);
        $orders = Order::where('user_id', $userId)
            ->where('created_at', '>=', $sevenDaysAgo)
            ->orderBy('created_at', 'desc')
            ->get();

        $orderDates = $orders->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        $consecutiveDays = 0;
        for ($i = 0; $i < 7; $i++) {
            $dateToCheck = now()->subDays($i)->format('Y-m-d');
            if (in_array($dateToCheck, $orderDates)) {
                $consecutiveDays++;
            } else {
                break;
            }
        }

        // If the user has not yet received a gift and qualifies, mark the latest order with the gift
        if ($consecutiveDays === 7 && !$orders->where('gift_received', true)->count()) {
            $orders->first()->update(['gift_received' => true]);
            return true;
        }

        return false;
    }

    // public function showGiftStatus($userId)
    // {
    //     $order = Order::where('user_id', $userId)->latest()->first();
    //     return view('frontend.order.gift', compact('order'));
    // }

    public function showGiftStatus()
    {
        // Ensure the user is authenticated
        if (!auth()->check()) {
            abort(403, 'Unauthorized access');
        }

        $userId = auth()->id();

        // Fetch orders for the last 7 days for the authenticated user
        $sevenDaysAgo = now()->subDays(6);
        $orders = Order::where('user_id', $userId)
            ->where('created_at', '>=', $sevenDaysAgo)
            ->orderBy('created_at', 'desc')
            ->get();

        // Count the consecutive days of orders
        $orderDates = $orders->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        $consecutiveDays = 0;
        for ($i = 0; $i < 7; $i++) {
            $dateToCheck = now()->subDays($i)->format('Y-m-d');
            if (in_array($dateToCheck, $orderDates)) {
                $consecutiveDays++;
            } else {
                break;
            }
        }

        // Calculate orders remaining to reach the 7-day streak
        $ordersLeft = max(0, 7 - $consecutiveDays);
        $giftEligible = $consecutiveDays === 7;

        return view('frontend.order.gift', compact('consecutiveDays', 'ordersLeft', 'giftEligible'));
    }








// backend-admin-07-day-order

// old-ok

// public function trackConsecutiveOrders($orderId)
// {
//     $order = Order::findOrFail($orderId);
//     $user = $order->user;

//     // Check if there's an existing consecutive order record for the user
//     $lastOrder = ConsecutiveOrder::where('user_id', $user->id)->latest('order_date')->first();

//     if ($lastOrder) {
//         // Convert order_date to Carbon if it's not already
//         $orderDate = Carbon::parse($lastOrder->order_date);

//         if ($orderDate->diffInDays(now()) == 1) {
//             // Increment consecutive order days if order is on the next day
//             $lastOrder->increment('total_order_days');

//             // Check if total order days reached 7 for a gift
//             if ($lastOrder->total_order_days >= 7 && !$lastOrder->gift_awarded) {
//                 $lastOrder->update(['gift_awarded' => true]);
//             }
//         }
//     } else {
//         // Create a new consecutive order entry if no previous record or not consecutive
//         ConsecutiveOrder::create([
//             'user_id' => $user->id,
//             'name' => $user->name,
//             'email' => $user->email,
//             'phone' => $user->phone,
//             'address' => $user->address,
//             'order_date' => now(),
//             'total_order_days' => 1,
//         ]);
//     }

// }


public function trackConsecutiveOrders($orderId)
{
    $order = Order::findOrFail($orderId);
    $user = $order->user;

    // Check if user has previous consecutive order record
    $lastOrder = ConsecutiveOrder::where('user_id', $user->id)->latest('order_date')->first();

    if ($lastOrder) {
        $orderDate = \Carbon\Carbon::parse($lastOrder->order_date);

        if ($orderDate->diffInDays(now()) == 1) {
            // If the order is one day apart, extend the consecutive days
            $lastOrder->increment('total_order_days');

            if ($lastOrder->total_order_days >= 7 && !$lastOrder->gift_awarded) {
                $lastOrder->update(['gift_awarded' => true]);
            }
        } else {
            // If there is a gap of one day, reset the record
            $lastOrder->update([
                'total_order_days' => 1,
                'gift_awarded' => false,
                'order_date' => now(),
            ]);
        }
    } else {
        // If there is no previous record, create a new consecutive order
        ConsecutiveOrder::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'order_date' => now(),
            'total_order_days' => 1,
        ]);
    }
}

// public function trackConsecutiveOrders($orderId)
// {
//     $order = Order::findOrFail($orderId);
//     $user = $order->user;

//     // Check if user has a previous consecutive order record
//     $lastOrder = ConsecutiveOrder::where('user_id', $user->id)->latest('order_date')->first();

//     if ($lastOrder) {
//         $orderDate = \Carbon\Carbon::parse($lastOrder->order_date);

//         if ($orderDate->diffInDays(now()) == 1) {
//             // If the order is one day apart, extend the consecutive days
//             $lastOrder->increment('total_order_days');

//             if ($lastOrder->total_order_days >= 7 && !$lastOrder->gift_awarded) {
//                 $lastOrder->update(['gift_awarded' => true]);
//             }
//         } else {
//             // If there is a gap of one day, reset the record
//             $lastOrder->update([
//                 'total_order_days' => 1,
//                 'gift_awarded' => false,
//                 'order_date' => now(),
//             ]);
//         }
//     } else {
//         // If there is no previous record, create a new consecutive order
//         ConsecutiveOrder::create([
//             'user_id' => $user->id,
//             'name' => $user->name,
//             'email' => $user->email,
//             'phone' => $user->phone,
//             'address' => $user->address,
//             'order_date' => now(),
//             'total_order_days' => 1,
//         ]);
//     }
// }











// old-ok

// public function consecutiveOrders()
// {
//     $consecutiveOrders = ConsecutiveOrder::with('user')->get();
//     return view('admin.consecutive_orders.index', compact('consecutiveOrders'));
// }


public function consecutiveOrders()
{
    // Will only return orders that are currently running consecutively and have not received a gift.
    $consecutiveOrders = ConsecutiveOrder::with('user')
        ->where('total_order_days', '>=', 1)
        ->where('gift_awarded', false)
        ->get();

    return view('admin.consecutive_orders.index', compact('consecutiveOrders'));
}





// 29-ok

// public function trackConsecutiveOrders($orderId)
// {
//     $order = Order::findOrFail($orderId);
//     $user = $order->user;

//     // Check if user has a previous consecutive order record
//     $lastOrder = ConsecutiveOrder::where('user_id', $user->id)->latest('order_date')->first();

//     if ($lastOrder) {
//         $orderDate = \Carbon\Carbon::parse($lastOrder->order_date);

//         // If the order is exactly one day after the last order date, continue tracking
//         if ($orderDate->diffInDays(now()) == 1) {
//             $lastOrder->increment('total_order_days');

//             // If the user reaches 7 consecutive days, award the gift
//             if ($lastOrder->total_order_days >= 7 && !$lastOrder->gift_awarded) {
//                 $lastOrder->update(['gift_awarded' => true]);
//             }
//         } else {
//             // If more than one day has passed, reset by deleting the record
//             $lastOrder->delete();
//         }
//     } else {
//         // If no previous record exists, start a new consecutive order tracking
//         ConsecutiveOrder::create([
//             'user_id' => $user->id,
//             'name' => $user->name,
//             'email' => $user->email,
//             'phone' => $user->phone,
//             'address' => $user->address,
//             'order_date' => now(),
//             'total_order_days' => 1,
//         ]);
//     }
// }


// public function consecutiveOrders()
// {
//     // Fetch consecutive orders that are actively running and haven't missed a day
//     $consecutiveOrders = ConsecutiveOrder::with('user')
//         ->where('total_order_days', '>=', 1)
//         ->where('gift_awarded', false)
//         ->whereDate('order_date', '>=', now()->subDay())
//         ->get();

//     return view('admin.consecutive_orders.index', compact('consecutiveOrders'));
// }


// protected function schedule(Schedule $schedule)
// {
//     $schedule->call(function () {
//         ConsecutiveOrder::whereDate('order_date', '<', now()->subDay())->delete();
//     })->daily();
// }











public function viewConsecutiveOrder($id)
{
    // Retrieve the specific consecutive order
    $consecutiveOrder = ConsecutiveOrder::with('user')->findOrFail($id);

    // Generate all consecutive order dates based on the starting order date
    $orderDates = [];
    $startDate = \Carbon\Carbon::parse($consecutiveOrder->order_date);

    for ($i = 0; $i < $consecutiveOrder->total_order_days; $i++) {
        $orderDates[] = $startDate->copy()->addDays($i)->format('Y-m-d');
    }

    return view('admin.consecutive_orders.view', compact('consecutiveOrder', 'orderDates'));
}

public function deleteConsecutiveOrder($id)
{
    $order = ConsecutiveOrder::findOrFail($id);
    $order->delete();

    return redirect()->route('admin.consecutive_orders.index')->with('success', 'Order deleted successfully.');
}










}
