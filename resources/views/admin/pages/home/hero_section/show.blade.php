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
  <div class="card-header">Hero Details</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Title : {{ $hero->title }}</h5>
        <p class="card-text">Description : {{ $hero->description }}</p>
        <p class="card-text">Image : <img src="{{ asset('storage/' . $hero->image) }}" width="300"></p>
  </div>
    </hr>
  </div>
</div>

@endsection
