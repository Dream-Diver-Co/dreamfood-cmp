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

<div class="card">
  <div class="card-header">Admincontact Details</div>
    <div class="card-body">
        <h1>{{ $mychef->name }}</h1>
        <p><strong>Description:</strong> {{ $mychef->description }}</p>
        <p><strong>Image:</strong>
            @if($mychef->image)
            <img src="{{ asset('storage/' . $mychef->image) }}" alt="mychef Image" width="300">
            @endif
        </p>

        <a href="{{ route('mychef.edit', $mychef) }}" class="btn btn-warning btn-sm action-btn">Edit</a>
        <form action="{{ route('mychef.destroy', $mychef) }}" method="POST" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm action-btn" title="Delete mychef" onclick="return confirm('Confirm delete?')">Delete</button>
        </form>
        <a href="{{ route('mychef.index') }}" class="btn btn-secondary btn-sm action-btn" style="width: 114px">Back to Chef List</a>
    </div>
</div>
@endsection


