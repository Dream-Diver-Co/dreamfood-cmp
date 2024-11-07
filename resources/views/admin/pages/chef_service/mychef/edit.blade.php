@extends('admin.layouts.master')

@section('title', 'Edit Mychef')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Mychef</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Mychef</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="card">
    <div class="card-header">Edit Mychef</div>
    <div class="card-body">
        <form action="{{ route('mychef.update', $mychef->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" value="{{ $mychef->name }}" class="form-control"><br>
            <label for="description">Description</label><br>
            <textarea name="description" id="description" class="form-control">{{ $mychef->description }}</textarea><br>
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image" class="form-control"><br>
            <p>Current Image: <img src="{{ asset('storage/'.$mychef->image) }}" alt="{{ $mychef->name }}" width="100"></p>
           <button type="submit" class="btn btn-success">Update</button><br>
        </form>
    </div>
</div>

@endsection


