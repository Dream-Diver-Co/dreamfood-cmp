@extends('frontend.layouts.master')

@section('title', 'Register')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('index') }}">Home</a>
                <span class="breadcrumb-item active">My Account</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-7 col-md-8">
                        <div class="login_wrap widget-taber-content  bg-wheat p-4 rounded shadow-sm">
                            <div class="heading_s1 text-center mb-4">
                                <h1 class="mb-3">Create an Account</h1>
                                <p class="mb-3">Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a></p>
                            </div>
                            <form method="post" action="{{ route('register') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-group">
                                    <input type="text" required name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" />
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Username" />
                                    @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" required name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" required name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" required name="password_confirmation" class="form-control" placeholder="Confirm Password" />
                                </div>
                                <div class="login_footer form-group mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="terms" id="termsCheckbox" required/>
                                        <label class="custom-control-label" for="termsCheckbox">I agree to <a href="#" class="text-primary">terms &amp; policy</a></label>
                                        @error('terms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg font-weight-bold">Submit &amp; Register</button>
                                </div>
                                <p class="font-xs text-muted text-center"><strong>Note:</strong> Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 pr-30 d-none d-lg-block">
                        <img class="border-radius-15 img-fluid rounded" src="{{ asset('frontend/img/logo1.jpg') }}" alt="logo" />
                        <div class="card-login  mt-4">
                            <a href="#" class="social-login facebook-login d-flex align-items-center  bg-wheat mb-3 p-3 border rounded">
                                <img src="{{ asset('frontend/img/facebook.png') }}" style="width: 30px" alt="Facebook" class="mr-3" />
                                <span class="m-2">Continue with Facebook</span>
                            </a>
                            <a href="#" class="social-login google-login d-flex align-items-center bg-wheat p-3 border rounded">
                                <img src="{{ asset('frontend/img/google.png') }}" style="height: 30px;" alt="Google" class="mr-3" />
                                <span class="m-2">Continue with Google</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
