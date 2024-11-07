
@extends('admin.layouts.master')

@section('title', 'Gift Awarded Orders')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Gift Awarded Orders</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Gift Awarded Orders</li>
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
    <div class="card-header">Gift Awarded Orders</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="bg-success text-white">
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Last Order Date</th>
                        <th scope="col">Total Order Days</th>
                        <th scope="col">Gift Awarded</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($giftAwardedOrders as $order)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                            <td class="text-center">{{ $order->total_order_days }}</td>
                            <td>{{ $order->gift_awarded ? 'Yes' : 'No' }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.consecutive_orders.sendMail', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm mx-1">Send Mail</button>
                                </form>

                                <a href="{{ route('admin.consecutive_orders.view', $order->id) }}" class="btn btn-info btn-sm mx-1">View</a>


                                {{-- <form action="{{ route('admin.consecutive_orders.delete', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                </form> --}}

                                <form action="{{ route('admin.consecutive_orders.deleteFromAwarded', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
