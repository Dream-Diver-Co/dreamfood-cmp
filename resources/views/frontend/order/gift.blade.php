@extends('layouts.master')

@section('title', '07 Days Order Gift')
@section('content')

<!-- Start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 text-primary font-weight-bold">07 Days Order Gift</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">07 Days Order Gift</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End page title -->

<div class="container mt-4 p-4 bg-white shadow rounded">
    <h2 class="text-center text-success font-weight-bold mb-4">07 Days Order Gift Status</h2>

    <div class="text-center mb-4">
        <p class="lead">You have ordered for <strong>{{ $consecutiveDays }}</strong> consecutive days.</p>
    </div>

    @if ($giftEligible)
        <div class="alert alert-success text-center">
            🎉 <strong>Congratulations!</strong> You have ordered for 7 consecutive days and will receive a special gift with your next order!
        </div>
    @else
        <div class="alert alert-info text-center">
            Keep going! You need <strong>{{ $ordersLeft }}</strong> more consecutive day(s) of orders to receive the gift.
        </div>
    @endif
</div>

@endsection
