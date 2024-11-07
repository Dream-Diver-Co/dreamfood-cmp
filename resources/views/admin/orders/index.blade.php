@extends('admin.layouts.master')

@section('title', 'Orders List')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Manage Orders</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Order List</li>
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
    <div class="card-header">Order List</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">SL</th>
                        {{-- <th scope="col">Order ID</th> --}}
                        <th scope="col">Name</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Placed On</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ $order->id }}</td> --}}
                            <td>{{ $order->first_name }}</td>
                            {{-- <td>
                                @if($order->user)
                                    {{ $order->user->name }}
                                @else
                                    <em>Unknown User</em>
                                @endif
                            </td> --}}
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <!-- Update Order Status Form -->
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="d-inline-block mb-1">
                                   @csrf
                                   @method('PATCH')
                                   <select name="status" class="form-control form-control-sm d-inline-block w-auto mb-2">
                                       <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                       <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                       <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                       <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                       <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                   </select>
                                   <button type="submit" class="btn btn-sm btn-success">Update</button>
                               </form>
                           </td>

                            <td class="text-center">
                                <!-- View Order Details -->
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary mb-1">View</a>

                                <!-- Delete Order Form -->
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline-block mb-1" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Pagination -->
    {{-- <div class="d-flex justify-content-center mt-4">
        {{ $orders->links() }}
    </div> --}}
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg">
                {{ $orders->onEachSide(1)->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
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
