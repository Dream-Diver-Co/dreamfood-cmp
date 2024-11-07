
@extends('admin.layouts.master')

@section('title', 'Foods Items')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Foods Items</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Foods Items</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-header">Edit Foods Items</div>
    <div class="card-body">
        <form action="{{ route('subcategories.update', $subcategory) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="category_id">Category Select <i class="fa-solid fa-caret-down"></i></label><br>
            <select name="category_id" id="category_id" class="form-control" required><br>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
            </select><br>
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" class="form-control" value="{{ $subcategory->name }}" required><br>
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image" class="form-control"><br>
            {{-- <span value="{{ $subcategory->image }}">
                @if($subcategory->image)
                    <img style="height: 100px; width: 150px;" src="{{ asset('storage/' . $subcategory->image) }}" alt="Product Image" width="300">
                @endif
            </span><br> --}}
            <label for="description">Description</label><br>
            <textarea name="description" id="description" class="form-control">{{ $subcategory->description }}</textarea><br>
            <button type="submit" class="btn btn-success">Update</button><br>
        </form>
    </div>
</div>

@endsection
