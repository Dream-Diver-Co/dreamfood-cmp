{{-- @extends('admin.layouts.master')

@section('title', 'View Consecutive Order')

@section('content')
<div class="container">
    <h2>Order Details</h2>
    <p><strong>Customer ID:</strong> {{ $order->user->id }}</p>
    <p><strong>Name:</strong> {{ $order->name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Order Date:</strong> {{ $order->order_date->format('Y-m-d') }}</p>
    <p><strong>Total Order Days:</strong> {{ $order->total_order_days }}</p>
    <p><strong>Gift Awarded:</strong> {{ $order->gift_awarded ? 'Yes' : 'No' }}</p>

    <a href="{{ route('admin.consecutive_orders.index') }}" class="btn btn-secondary">Back to Orders List</a>
</div>
@endsection --}}













{{-- ok --}}
{{--
@extends('admin.layouts.master')

@section('title', 'View Consecutive Order')

@section('content')
<div class="container">
    <h2>Order History for {{ $consecutiveOrder->name }}</h2>
    <p><strong>Customer ID:</strong> {{ $consecutiveOrder->user->id }}</p>
    <p><strong>Name:</strong>{{ $consecutiveOrder->name }}</p>
    <p><strong>Email:</strong> {{ $consecutiveOrder->email }}</p>
    <p><strong>Total Order Days:</strong> {{ $consecutiveOrder->total_order_days }}</p>
    <p><strong>Gift Awarded:</strong> {{ $consecutiveOrder->gift_awarded ? 'Yes' : 'No' }}</p>

    <h3>All Order Dates</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDates as $date)
                <tr>
                    <td>{{ $date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.consecutive_orders.index') }}" class="btn btn-secondary">Back to Orders List</a>
</div>
@endsection --}}



{{-- osman vai --}}


@extends('admin.layouts.master')

@section('title', 'View Consecutive Order')

@section('content')
<div class="container">
    <h2>Order History for {{ $consecutiveOrder->name }}</h2>
    <p><strong>Customer ID:</strong> {{ $consecutiveOrder->user->id }}</p>
    <p><strong>Name:</strong> {{ $consecutiveOrder->name }}</p>
    <p><strong>Email:</strong> {{ $consecutiveOrder->email }}</p>
    <p><strong>Total Order Days:</strong> {{ $consecutiveOrder->total_order_days }}</p>
    <p><strong>Gift Awarded:</strong> {{ $consecutiveOrder->gift_awarded ? 'Yes' : 'No' }}</p>

    <h3>All Order Dates</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach (array_slice($orderDates, 0, $consecutiveOrder->total_order_days) as $date)
                <tr>
                    <td>{{ $date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.consecutive_orders.index') }}" class="btn btn-secondary">Back to Orders List</a>
</div>
@endsection







