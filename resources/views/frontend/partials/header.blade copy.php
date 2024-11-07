<!-- Navbar start -->
<div class="container-fluid nav-bar bg-white">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg">
            <a href="index.html" class="navbar-brand">
                <h1 class="text-primary fw-bold mb-0">Dream<span class="text-dark">Foods</span></h1>
            </a>
            <a href="{{ route('cart.show')}}" class="navbar-toggler py-2 px-3">
                <i class="fa fa-shopping-cart mr-1"></i>
                    <span class="">
                        <span id="overall-quantity">
                            @isset($cartItems)
                                {{ $cartItems->sum('quantity') }}
                            @else
                                0
                            @endisset
                        </span>
                    </span>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('index')}}" class="nav-item nav-link active">Home</a>
                    {{-- <a href="{{ route('about') }}" class="nav-item nav-link">About</a> --}}
                    <a href="{{ route('shop')}}" class="nav-item nav-link">Menu</a>
                    <a href="{{ route('featured')}}" class="nav-item nav-link">Featured-Bonus</a>
                    <a href="{{ route('subscription')}}" class="nav-item nav-link">Subscription</a>
                    <a href="{{ route('chef')}}" class="nav-item nav-link">Chef-At-Home</a>

                    <!-- Pages Dropdown -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('about') }}" class="dropdown-item">About</a>
                            <a href="{{ route('cart.show') }}" class="dropdown-item">Cart</a>
                            <a href="{{ route('checkout.index') }}" class="dropdown-item">Checkout</a>
                            <a href="{{ route('booking') }}" class="dropdown-item">Booking</a>
                        </div>
                    </div>

                    <a href="{{ route('contact')}}" class="nav-item nav-link">Contact</a>

                </div>

                <!-- My Account Dropdown -->
                <div class="btn-group nav-item me-4">
                    <button type="button" class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        My Account
                    </button>
                    <div class="dropdown-menu dropdown-menu-right cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                        <ul class="list-unstyled p-2">
                            @if(auth()->check())
                                @if(auth()->user()->role === 'user')
                                    <li>
                                        <a href="{{ route('dashboard') }}" target="_blank"><i class="fi fi-rs-user mr-10"></i>Dashboard</a>
                                    </li>
                                @elseif(auth()->user()->role === 'admin')
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}" target="_blank"><i class="fi fi-rs-user mr-10"></i>Dashboard</a>
                                    </li>
                                @elseif(auth()->user()->role === 'vendor')
                                    <li>
                                        <a href="{{ route('vendor.dashboard') }}" target="_blank"><i class="fi fi-rs-user mr-10"></i>Dashboard</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="#"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <i class="fi fi-rs-sign-out mr-10"></i>
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}"><i class="fi fi-rs-user-add mr-10"></i>Create an Account</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}"><i class="fi fi-rs-sign-in mr-10"></i>Sign In</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Cart -->
                <a href="{{ route('cart.show') }}" class="btn btn-primary btn-md-square mobile-view">
                    <i class="fa fa-shopping-cart mr-1"></i>
                    <span class="cart-count">
                        <span id="overall-quantity">
                            @isset($cartItems)
                                {{ $cartItems->sum('quantity') }}
                            @else
                                0
                            @endisset
                        </span>
                    </span>
                </a>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
