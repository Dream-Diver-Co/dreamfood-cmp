@extends('admin.layouts.master')

@section('title', 'Order Details')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Manage Orders</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Order Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<!-- success message -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Check for success message -->
            @if(session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
<!-- success message -->

<div class="card">
    <div class="card-header">Order Details</div>
    <div class="card-body">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0">Order Items</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product Name</th>
                                {{-- <th scope="col">Size</th>
                                <th scope="col">Color</th> --}}
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        @if($item->product && $item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" width="50">
                                        @else
                                            <span>No Image Available</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->product->name }}</td>
                                    {{-- <td>{{ $item->size }}</td>
                                    <td>{{ $item->color }}</td> --}}
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Customer Information</h5>
            </div>
            <div class="card-body">
                <p><strong>First Name:</strong> {{ $order->first_name }}</p>
                <p><strong>Last Name:</strong> {{ $order->last_name }}</p>
                <p><strong>phone Number:</strong> {{ $order->mobile_no }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Address-1:</strong> {{ $order->address_line1 }}</p>
                <p><strong>Address-2:</strong> {{ $order->address_line2 }}</p>
                <p><strong>Country:</strong> {{ $order->country }}</p>
                <p><strong>City:</strong> {{ $order->city }}</p>
                <p><strong>State:</strong> {{ $order->state }}</p>
                <p><strong>Zip Code:</strong> {{ $order->zip_code }}</p>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Order Summary</h5>
            </div>
            <div class="card-body">
                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>

            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">User Information</h5>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $order->user ? $order->user->name : 'Unknown' }}</p>
                <p><strong>Email:</strong> {{ $order->user ? $order->user->email : 'Unknown' }}</p>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>

            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Order</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Auto-hide the success message after 5 seconds
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });
</script>

@endsection
