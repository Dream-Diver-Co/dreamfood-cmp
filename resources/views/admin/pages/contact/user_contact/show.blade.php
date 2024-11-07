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
  <div class="card-header">UserContact Details</div>
  <div class="card-body">
    <h5 class="card-title">Name: {{ $usercontacts->name }}</h5>
    <p class="card-text">Email: {{ $usercontacts->email }}</p>
    <p class="card-text">Mobile: {{ $usercontacts->phone }}</p>
    <p class="card-text">Subject: {{ $usercontacts->subject }}</p>
    <p class="card-text">Note: {{ $usercontacts->note }}</p>
  </div>
</div>

@endsection

