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

<h1>Edit Deal</h1>
<form action="{{ route('deals.update', $deal->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="product_id">Product</label>
        <select name="product_id" id="product_id" class="form-control" required>
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ $deal->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="discount">Discount (%)</label>
        <input type="number" name="discount" id="discount" class="form-control" value="{{ $deal->discount }}" required>
    </div>
    <div class="form-group">
        <label for="frequency">Frequency</label>
        <input type="number" name="frequency" id="frequency" class="form-control" value="{{ $deal->frequency }}" required>
    </div>
    <div class="form-group">
        <label for="total_use">Total Use</label>
        <input type="number" name="total_use" id="total_use" class="form-control" value="{{ $deal->total_use }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update Deal</button>
    <a href="{{ route('deals.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection

