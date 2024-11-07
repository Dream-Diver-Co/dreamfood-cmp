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
    <h1>Coupon Details</h1>

    <ul>
        <li><strong>Code:</strong> {{ $coupon->code }}</li>
        <li><strong>Type:</strong> {{ ucfirst($coupon->type) }}</li>
        <li><strong>Discount Amount:</strong> {{ $coupon->discount_amount }}</li>
        <li><strong>Total Users:</strong> {{ $coupon->total_use }}</li>
        <li><strong>Max Users:</strong> {{ $coupon->max_users }}</li>
        <li><strong>Max User Uses:</strong> {{ $coupon->max_user_uses }}</li>
        <li><strong>Minimum Order Amount:</strong> {{ $coupon->min_amount }}</li>
        <li><strong>Status:</strong> {{ ucfirst($coupon->status) }}</li>
        <li><strong>Start Date:</strong> {{ $coupon->start_at }}</li>
        <li><strong>Expiry Date:</strong> {{ $coupon->expires_at }}</li>
        <li><strong>Description:</strong> {{ $coupon->description }}</li>
    </ul>

    <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>


@endsection

