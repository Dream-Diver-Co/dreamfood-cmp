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
    <h1>Edit Coupon</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This method is required for updating the coupon -->

        <div class="form-group">
            <label for="code">Coupon Code</label>
            <input type="text" name="code" class="form-control" value="{{ old('code', $coupon->code) }}">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control">
                <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>Percent</option>
                <option value="dollar" {{ $coupon->type == 'dollar' ? 'selected' : '' }}>Dollar</option>
                <option value="euro" {{ $coupon->type == 'euro' ? 'selected' : '' }}>Euro</option>
            </select>
        </div>

        <div class="form-group">
            <label for="discount_amount">Discount Amount</label>
            <input type="number" step="0.01" name="discount_amount" class="form-control" value="{{ old('discount_amount', $coupon->discount_amount) }}">
        </div>

        <div class="form-group">
            <label for="total_use">Total Users</label>
            <input type="number" name="total_use" class="form-control" value="{{ old('total_use', $coupon->total_use) }}">
        </div>

        <div class="form-group">
            <label for="max_users">Max Users</label>
            <input type="number" name="max_users" class="form-control" value="{{ old('max_users', $coupon->max_users) }}">
        </div>

        <div class="form-group">
            <label for="max_user_uses">Max User Uses</label>
            <input type="number" name="max_user_uses" class="form-control" value="{{ old('max_user_uses', $coupon->max_user_uses) }}">
        </div>

        <div class="form-group">
            <label for="min_amount">Minimum Order Amount</label>
            <input type="number" step="0.01" name="min_amount" class="form-control" value="{{ old('min_amount', $coupon->min_amount) }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $coupon->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $coupon->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        {{-- <div class="form-group">
            <label for="start_at">Start Date</label>
            <input type="date" name="start_at" class="form-control" value="{{ old('start_at', $coupon->start_at ? $coupon->start_at->format('Y-m-d') : '') }}">
        </div>

        <div class="form-group">
            <label for="expires_at">Expiry Date</label>
            <input type="date" name="expires_at" class="form-control" value="{{ old('expires_at', $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : '') }}">
        </div> --}}

        <div class="form-group">
            <label for="start_at">Start Date</label>
            <input type="datetime-local" name="start_at" class="form-control"
                   value="{{ old('start_at', isset($coupon->start_at) ? \Carbon\Carbon::parse($coupon->start_at)->format('Y-m-d') : '') }}">
        </div>

        <div class="form-group">
            <label for="expires_at">Expiry Date</label>
            <input type="datetime-local" name="expires_at" class="form-control"
                   value="{{ old('expires_at', isset($coupon->expires_at) ? \Carbon\Carbon::parse($coupon->expires_at)->format('Y-m-d') : '') }}">
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $coupon->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Coupon</button>
    </form>
</div>

@endsection

