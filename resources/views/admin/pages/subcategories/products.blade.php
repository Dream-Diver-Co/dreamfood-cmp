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

<h1>Products of {{ $subcategory->name }}</h1>
<a href="{{ route('products.create') }}">Create Product</a>
<ul>
    @foreach($products as $product)
        <li>
            <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
            <a href="{{ route('products.edit', $product) }}">Edit</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
<a href="{{ route('subcategories.index') }}">Back to Subcategories</a>

@endsection


