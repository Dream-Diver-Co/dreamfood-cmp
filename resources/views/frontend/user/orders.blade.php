@extends('layouts.master')

@section('title', 'User Orders')
@section('content')

<!-- Start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 text-primary font-weight-bold">User Orders</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">User Orders</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End page title -->

<div class="container mt-4 p-4 bg-white shadow rounded">

    <div class="d-flex justify-content-between mb-3">
        <p><strong>Total Orders:</strong> {{ $orderCount }}</p>
        <p><strong>Total Cashback Earned:</strong> ${{ number_format($totalCashback, 2) }}</p>
    </div>

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>User Name</th>
                <th>Order Name</th>
                <th>Total Amount</th>
                <th>Cashback Amount</th>
                <th>Status</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->first_name }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td>${{ number_format($order->cashback_amount, 2) }}</td>
                    <td><span class="badge {{ $order->status == 'Completed' ? 'bg-success' : 'bg-warning' }}">{{ $order->status }}</span></td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
