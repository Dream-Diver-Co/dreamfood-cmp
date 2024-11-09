@extends('admin.layouts.master')

@section('title', 'Create Deal')
@section('content')

 <!-- Success and error messages -->
<div class="container my-3">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->has('error'))
                <div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Create Deal</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Create Deal</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-header">Foods Details</div>
    <div class="card-body">

    </div>
</div>

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
        <input type="number" name="discount" id="discount" class="form-control" required oninput="calculateDiscountPrice()">
    </div>

    <div class="form-group">
        <label for="discount_price">Discount Price</label>
        <input type="text" name="discount_price" id="discount_price" class="form-control" readonly>
    </div>

    {{-- <div class="form-group">
        <label for="frequency">Frequency</label>
        <input type="number" name="frequency" id="frequency" class="form-control" >
    </div>

    <div class="form-group">
        <label for="total_use">Total Use</label>
        <input type="number" name="total_use" id="total_use" class="form-control">
    </div> --}}

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
        calculateDiscountPrice(); // Call to update discount price when a product is selected
    }

    function calculateDiscountPrice() {
        const price = parseFloat(document.getElementById('price').value);
        const discount = parseFloat(document.getElementById('discount').value);

        if (!isNaN(price) && !isNaN(discount)) {
            // Calculate discount price
            const discountPrice = price - (price * (discount / 100));
            document.getElementById('discount_price').value = discountPrice.toFixed(2); // Set the discount price, formatted to 2 decimal places
        } else {
            document.getElementById('discount_price').value = ''; // Clear discount price if input is invalid
        }
    }
</script>

<script>
    // Auto-hide success and error messages after 5 seconds
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');

        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        }

        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000);
        }
    });
</script>

@endsection
