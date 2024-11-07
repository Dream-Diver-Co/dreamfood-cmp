
@extends('admin.layouts.master')

@section('title', 'Foods Details')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Foods Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Foods</a></li>
                    <li class="breadcrumb-item active">Foods Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-header">Foods Details</div>
    <div class="card-body">
        <h1>{{ $product->name }}</h1>
        <p><strong>Title:</strong> {{ $product->title }}</p>
        <p><strong>Sub Title:</strong> {{ $product->sub_title }}</p>
        <p><strong>Country Foods:</strong> {{ $product->category->name }}</p>
        <p><strong>Foods Items:</strong> {{ $product->subcategory->name }}</p>
        {{-- <p><strong>Sizes:</strong> {{ implode(', ', $product->sizes) }}</p>
        <p><strong>Colors:</strong> {{ implode(', ', $product->colors) }}</p> --}}
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Old Price:</strong> ${{ $product->old_price }}</p>
        <p><strong>Sub Description:</strong> {{ $product->sub_description }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Information:</strong> {{ $product->information }}</p>
        <!-- Check if the product is available -->
        <p><strong>Status:</strong> {{ $product->status_1 }}</p>

        <p><strong>Image:</strong>
        @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="300">
        @endif
        </p>

        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm action-btn">Edit</a>
        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm action-btn" title="Delete product" onclick="return confirm('Confirm delete?')">Delete</button>
        </form>
        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm action-btn" style="width: 114px">Back to Products</a>
    </div>
</div>

@endsection
