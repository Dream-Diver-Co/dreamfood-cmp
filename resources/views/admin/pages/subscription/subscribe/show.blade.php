@extends('admin.layouts.master')

@section('title', 'subscribecontact')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Subscription</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Subscribe Contact</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
  <div class="card-header">Subscribe Contact Details</div>
  <div class="card-body">
    <h5 class="card-title">Name: {{ $subscribecontact->name }}</h5>
    <p class="card-text">Email: {{ $subscribecontact->email }}</p>
    <p class="card-text">Mobile: {{ $subscribecontact->phone }}</p>
    <p class="card-text">Subscription: {{ $subscribecontact->subject }}</p>
    <p class="card-text">Note: {{ $subscribecontact->note }}</p>
  </div>
</div>

@endsection

