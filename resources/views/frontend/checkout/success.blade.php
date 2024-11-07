@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <div class="alert alert-success">
        <h1>Payment Successful!</h1>
        <p>Your payment was processed successfully. Thank you for your purchase.</p>
        <a href="{{ route('index') }}" class="btn btn-primary">Back to Home</a>
    </div>
</div>
@endsection
