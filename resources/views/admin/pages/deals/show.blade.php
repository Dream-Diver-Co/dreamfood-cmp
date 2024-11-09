@extends('admin.layouts.master')

@section('title', 'Deals')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Deals</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Deals</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="card">
    <div class="card-header">Deals Details</div>
    <div class="card-body">

        <p><strong>Food Name:</strong> {{ $deal->product->name }}</p>
        <p><strong>Price:</strong> {{ $deal->product->price }}</p>
        <p><strong>Discount:</strong> {{ $deal->discount }}%</p>
        <p><strong>Discount Price:</strong> {{ $deal->discount_price }}</p>
        {{-- <p><strong>Frequency:</strong> {{ $deal->frequency }}</p>
        <p><strong>Total Use:</strong> {{ $deal->total_use }}</p> --}}
        <a href="{{ route('deals.index') }}" class="btn btn-primary">Back to Deals</a>
    </div>
</div>



@endsection

