@extends('admin.layouts.master')

@section('title', 'Profile')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="container">
    <h1>Coupons</h1>
    <a href="{{ route('coupons.create') }}" class="btn btn-primary mb-3">Create Coupon</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Type</th>
                <th>Discount</th>
                <th>Total Use</th>
                <th>Status</th>
                <th>Expires At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ ucfirst($coupon->type) }}</td>
                    <td>{{ $coupon->discount_amount }}</td>
                    <td>{{ $coupon->total_use }}</td>
                    <td>{{ ucfirst($coupon->status) }}</td>
                    <td>{{ $coupon->expires_at }}</td>
                    <td>
                        <a href="{{ route('coupons.show', $coupon->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

