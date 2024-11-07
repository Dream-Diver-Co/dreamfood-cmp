@extends('admin.layouts.master')

@section('title', 'View Consecutive Order')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Consecutive Order Details</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Consecutive Order View</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<!-- success message -->
<div class="container mt-3">
    @if(session('success'))
        <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<!-- end success message -->

<!-- Order Details Card -->
<div class="card my-4">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0">Order Gift View for {{ $consecutiveOrder->name }}</h5>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Customer ID:</strong> {{ $consecutiveOrder->user->id }}</p>
                <p><strong>Name:</strong> {{ $consecutiveOrder->name }}</p>
                <p><strong>Email:</strong> {{ $consecutiveOrder->email }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Total Order Days:</strong> {{ $consecutiveOrder->total_order_days }}</p>
                <p><strong>Gift Awarded:</strong> <span class="badge {{ $consecutiveOrder->gift_awarded ? 'bg-success' : 'bg-danger' }}">
                    {{ $consecutiveOrder->gift_awarded ? 'Yes' : 'No' }}</span></p>
            </div>
        </div>

        <h5 class="mt-4">All Order Dates</h5>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Order Date</th>
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
        </div>
    </div>
    <div class="card-footer text-end">
        <a href="{{ route('admin.consecutive_orders.index') }}" class="btn btn-secondary">Back to Orders List</a>
    </div>
</div>

<!-- Auto-hide success message -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        }
    });
</script>

@endsection
