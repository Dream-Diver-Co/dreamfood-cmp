@extends('frontend.layouts.master')

@section('title', 'Log In')

@section('content')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('index') }}">Home</a>
                    <span class="breadcrumb-item active">Log In</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Section Start -->
    <div class="login-section pt-150 pb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img class="border-radius-15 img-fluid rounded" src="{{ asset('frontend/img/logo1.jpg') }}" alt="logo" />
                        </div>
                        <div class="col-lg-6 col-md-8 bg-wheat shadow-sm rounded p-4">
                            <div class="login-wrap">
                                <h1 class="mb-4 text-center">Login</h1>
                                <p class="text-center text-danger mb-4"><b>Don't have an account? </b><a href="{{ route('register') }}" class="text-success">Create here</a></p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" required name="email" placeholder="Email Address *" class="form-control @error('email') is-invalid @enderror" />
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" required name="password" placeholder="Your password *" class="form-control @error('password') is-invalid @enderror" />
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="login-footer form-group mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="rememberMe" />
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <a class="text-muted d-block mt-2" href="{{ route('password.request') }}">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section End -->

@endsection
