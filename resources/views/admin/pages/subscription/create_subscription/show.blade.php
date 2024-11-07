
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
  <div class="card-header">ChefContact Details</div>
  <div class="card-body">
    <h5 class="card-title">Name: {{ $chefcontacts->name }}</h5>
    <p class="card-text">Email: {{ $chefcontacts->email }}</p>
    <p class="card-text">Mobile: {{ $chefcontacts->phone }}</p>
    <p class="card-text">Address: {{ $chefcontacts->address }}</p>
    <p class="card-text">Date: {{ $chefcontacts->date }}</p>
    <p class="card-text">Time: {{ $chefcontacts->time }}</p>
    <p class="card-text">Event Name: {{ $chefcontacts->event_name }}</p>
    <p><strong>Image:</strong>
        @if($chefcontacts->image)
        <img src="{{ asset('storage/' . $chefcontacts->image) }}" alt="chefcontacts Image" width="300">
        @endif
    </p>
    <p class="card-text">Note: {{ $chefcontacts->note }}</p>
  </div>
</div>

@endsection
