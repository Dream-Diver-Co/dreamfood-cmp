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

<h1>Create Deal</h1>
<form action="{{ route('deals.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="product_id">Product</label>
        <select name="product_id" id="product_id" class="form-control" onchange="updatePrice()">
            <option value="">Select a product</option>
            @foreach($products as $product)
            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" id="price" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="discount">Discount (%)</label>
        <input type="number" name="discount" id="discount" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="discount">Discount Price</label>
        <input type="number" name="discount_price" id="discount" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="frequency">Frequency</label>
        <input type="number" name="frequency" id="frequency" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="total_use">Total Use</label>
        <input type="number" name="total_use" id="total_use" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save Deal</button>
</form>

<script>
    function updatePrice() {
        const productSelect = document.getElementById('product_id');
        const priceInput = document.getElementById('price');
        const selectedOption = productSelect.options[productSelect.selectedIndex];

        // Get the price from the selected option's data attribute
        const price = selectedOption ? selectedOption.getAttribute('data-price') : '';

        // Set the price input value
        priceInput.value = price ? price : '';
    }
</script>

@endsection
