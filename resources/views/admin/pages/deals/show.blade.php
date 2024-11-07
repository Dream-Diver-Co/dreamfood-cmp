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

<h1>Deal Details</h1>
<p><strong>Product:</strong> {{ $deal->product->name }}</p>
<p><strong>Discount:</strong> {{ $deal->discount }}%</p>
<p><strong>Frequency:</strong> {{ $deal->frequency }}</p>
<p><strong>Total Use:</strong> {{ $deal->total_use }}</p>
<a href="{{ route('deals.index') }}" class="btn btn-primary">Back to Deals</a>

@endsection

