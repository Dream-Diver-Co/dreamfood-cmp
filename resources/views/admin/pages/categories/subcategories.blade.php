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

<h1>Subcategories of {{ $category->name }}</h1>
<a href="{{ route('subcategories.create') }}">Create Subcategory</a>
<ul>
    @foreach($subcategories as $subcategory)
        <li>
            <a href="{{ route('subcategories.show', $subcategory) }}">{{ $subcategory->name }}</a>
            <a href="{{ route('subcategories.products', $subcategory) }}">
                {{ $subcategory->products_count }} Products
            </a>
            <a href="{{ route('subcategories.edit', $subcategory) }}">Edit</a>
            <form action="{{ route('subcategories.destroy', $subcategory) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
<a href="{{ route('categories.index') }}">Back to Categories</a>

@endsection

