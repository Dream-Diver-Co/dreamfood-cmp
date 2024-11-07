@extends("frontend.layouts.master")

@section("content")

<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <div class="col-12">
                @if(session('success'))
                    <div id="success-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Breadcrumb Start -->
     <div class="container-fluid bg-light mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Products Items</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Products Items</li>
            </ol>
        </div>
    </div>
<!-- Breadcrumb End -->

<!-- Products Start -->
{{-- <div class="container-fluid menu bg-light">
    <div class="container">
        <div class="tab-class text-center">
            <div class="tab-content">
                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                        <div class="bg-wheat rounded menu-2">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid rounded animated zoomIn" alt="">
                                    <a href="{{ route('product_details', ['id' => $product->id]) }}">
                                        <h4 class="mb-3">{{ $product->name }}</h4>
                                    </a>
                                    <p class="mb-4">{{ $product->sub_title }}</p>

                                    <div class="row product-status">
                                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex">
                                            <h4 class="text-white product-status-text">{{ $product->status_1 }}</h4>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class=" col-md-6 col-sm-12 d-flex">
                                            <h4 class="text-success">${{ $product->price }}</h4>
                                        </div>
                                        <div class=" col-md-6 col-sm-12 d-flex" >
                                            <h4 class="text-danger">$<del>{{ $product->old_price }}</del></h4>
                                        </div>
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="d-flex align-items-center mb-4 pt-2">
                                                <div class="input-group quantity mr-3" style="width: 107px; margin-right: 5px;">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-primary btn-minus">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="quantity" id="itemModalQuantity" class="form-control border-0 text-center bg-white" value="1" min="1">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-primary btn-plus">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary add-to-cart-from-modal-btn" style=" margin-right: 5px;">
                                                    <i class="fa fa-shopping-cart mr-1"></i>
                                                </button>

                                                <a href="{{ route('product_details', ['id' => $product->id]) }}" class="btn btn-primary add-to-cart-from-modal-btn">
                                                    <i class="fa-solid fa-eye mr-1"></i>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Products End -->

<!-- Menu Start -->
<div class="container-fluid menu bg-light">
    <div class="container">
        {{-- <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <h1 class="display-5 mb-5">Most Popular Food in the World</h1>
        </div> --}}
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                <li class="nav-item p-2">
                    <i class="fa-solid fa-mug-saucer menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill active" data-bs-toggle="pill" href="#tab-6">
                        <span class="text-dark" style="width: 150px;">Breakfast</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <i class="fa-solid fa-plate-wheat menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill" data-bs-toggle="pill" href="#tab-7">
                        <span class="text-dark" style="width: 150px;">Lunch</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <i class="fa-solid fa-utensils menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill" data-bs-toggle="pill" href="#tab-8">
                        <span class="text-dark" style="width: 150px;">Dinner</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <i class="fa-solid fa-wine-glass-empty menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill" data-bs-toggle="pill" href="#tab-9">
                        <span class="text-dark" style="width: 150px;">Drinks</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <i class="fa-solid fa-ice-cream menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill" data-bs-toggle="pill" href="#tab-10">
                        <span class="text-dark" style="width: 150px;">Dessert</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab-6" class="tab-pane fade show p-0 active">
                    {{-- <div class="row g-4">
                        @foreach($category->subCategories as $subCategory)
                            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                                <a href="{{ route('subcategories.products', $subCategory->id) }}">
                                    <div class="menu-item d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded-circle" src="{{ asset('storage/' . $subCategory->image) }}" alt="{{ $subCategory->name }}">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                                <h4>{{ $subCategory->name }}</h4>
                                            </div>
                                            <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut labore.
                                                <span class="subcategory-btn">more food</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div> --}}
                    <div class="row g-4">
                        @foreach($products->where('status', 'breakfast') as $product)
                        <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                            <div class="bg-wheat rounded menu-2">
                                <div class="service-content d-flex align-items-center justify-content-center p-4">
                                    <div class="service-content-icon text-center">
                                        <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid rounded animated zoomIn" alt="">
                                        <a href="{{ route('product_details', ['id' => $product->id]) }}">
                                            <h4 class="mb-3">{{ $product->name }}</h4>
                                        </a>
                                        <p class="mb-4">{{ $product->sub_title }}</p>

                                        <div class="row product-status">
                                            <div class="col-lg-6 col-md-6 col-sm-12 d-flex">
                                                <h4 class="text-white product-status-text">{{ $product->status_1 }}</h4>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class=" col-md-6 col-sm-12 d-flex">
                                                <h4 class="text-success">${{ $product->price }}</h4>
                                            </div>
                                            <div class=" col-md-6 col-sm-12 d-flex" >
                                                <h4 class="text-danger">$<del>{{ $product->old_price }}</del></h4>
                                            </div>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <div class="d-flex align-items-center mb-4 pt-2">
                                                    <div class="input-group quantity mr-3" style="width: 107px; margin-right: 5px;">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-primary btn-minus">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" name="quantity" id="itemModalQuantity" class="form-control border-0 text-center bg-white" value="1" min="1">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-primary btn-plus">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary add-to-cart-from-modal-btn" style=" margin-right: 5px;">
                                                        <i class="fa fa-shopping-cart mr-1"></i>
                                                    </button>

                                                    <a href="{{ route('product_details', ['id' => $product->id]) }}" class="btn btn-primary add-to-cart-from-modal-btn">
                                                        <i class="fa-solid fa-eye mr-1"></i>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="tab-7" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($products->where('status', 'lunch') as $product)
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="bg-wheat rounded menu-2">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid rounded animated zoomIn" alt="">
                                            <a href="{{ route('product_details', ['id' => $product->id]) }}">
                                                <h4 class="mb-3">{{ $product->name }}</h4>
                                            </a>
                                            <p class="mb-4">{{ $product->sub_title }}</p>

                                            <div class="row product-status">
                                                <div class="col-lg-6 col-md-6 col-sm-12 d-flex">
                                                    <h4 class="text-white product-status-text">{{ $product->status_1 }}</h4>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class=" col-md-6 col-sm-12 d-flex">
                                                    <h4 class="text-success">${{ $product->price }}</h4>
                                                </div>
                                                <div class=" col-md-6 col-sm-12 d-flex" >
                                                    <h4 class="text-danger">$<del>{{ $product->old_price }}</del></h4>
                                                </div>
                                                <form action="{{ route('cart.add') }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <div class="d-flex align-items-center mb-4 pt-2">
                                                        <div class="input-group quantity mr-3" style="width: 107px; margin-right: 5px;">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-primary btn-minus">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="quantity" id="itemModalQuantity" class="form-control border-0 text-center bg-white" value="1" min="1">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-primary btn-plus">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary add-to-cart-from-modal-btn" style=" margin-right: 5px;">
                                                            <i class="fa fa-shopping-cart mr-1"></i>
                                                        </button>

                                                        <a href="{{ route('product_details', ['id' => $product->id]) }}" class="btn btn-primary add-to-cart-from-modal-btn">
                                                            <i class="fa-solid fa-eye mr-1"></i>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="tab-8" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($products->where('status', 'dinner') as $product)
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="bg-wheat rounded menu-2">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid rounded animated zoomIn" alt="">
                                            <a href="{{ route('product_details', ['id' => $product->id]) }}">
                                                <h4 class="mb-3">{{ $product->name }}</h4>
                                            </a>
                                            <p class="mb-4">{{ $product->sub_title }}</p>

                                            <div class="row product-status">
                                                <div class="col-lg-6 col-md-6 col-sm-12 d-flex">
                                                    <h4 class="text-white product-status-text">{{ $product->status_1 }}</h4>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class=" col-md-6 col-sm-12 d-flex">
                                                    <h4 class="text-success">${{ $product->price }}</h4>
                                                </div>
                                                <div class=" col-md-6 col-sm-12 d-flex" >
                                                    <h4 class="text-danger">$<del>{{ $product->old_price }}</del></h4>
                                                </div>
                                                <form action="{{ route('cart.add') }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <div class="d-flex align-items-center mb-4 pt-2">
                                                        <div class="input-group quantity mr-3" style="width: 107px; margin-right: 5px;">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-primary btn-minus">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="quantity" id="itemModalQuantity" class="form-control border-0 text-center bg-white" value="1" min="1">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-primary btn-plus">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary add-to-cart-from-modal-btn" style=" margin-right: 5px;">
                                                            <i class="fa fa-shopping-cart mr-1"></i>
                                                        </button>

                                                        <a href="{{ route('product_details', ['id' => $product->id]) }}" class="btn btn-primary add-to-cart-from-modal-btn">
                                                            <i class="fa-solid fa-eye mr-1"></i>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div id="tab-9" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($products->where('status', 'drinks') as $product)
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="bg-wheat rounded menu-2">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid rounded animated zoomIn" alt="">
                                            <a href="{{ route('product_details', ['id' => $product->id]) }}">
                                                <h4 class="mb-3">{{ $product->name }}</h4>
                                            </a>
                                            <p class="mb-4">{{ $product->sub_title }}</p>

                                            <div class="row product-status">
                                                <div class="col-lg-6 col-md-6 col-sm-12 d-flex">
                                                    <h4 class="text-white product-status-text">{{ $product->status_1 }}</h4>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class=" col-md-6 col-sm-12 d-flex">
                                                    <h4 class="text-success">${{ $product->price }}</h4>
                                                </div>
                                                <div class=" col-md-6 col-sm-12 d-flex" >
                                                    <h4 class="text-danger">$<del>{{ $product->old_price }}</del></h4>
                                                </div>
                                                <form action="{{ route('cart.add') }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <div class="d-flex align-items-center mb-4 pt-2">
                                                        <div class="input-group quantity mr-3" style="width: 107px; margin-right: 5px;">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-primary btn-minus">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="quantity" id="itemModalQuantity" class="form-control border-0 text-center bg-white" value="1" min="1">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-primary btn-plus">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary add-to-cart-from-modal-btn" style=" margin-right: 5px;">
                                                            <i class="fa fa-shopping-cart mr-1"></i>
                                                        </button>

                                                        <a href="{{ route('product_details', ['id' => $product->id]) }}" class="btn btn-primary add-to-cart-from-modal-btn">
                                                            <i class="fa-solid fa-eye mr-1"></i>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="tab-10" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($products->where('status', 'dessert') as $product)
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="bg-wheat rounded menu-2">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid rounded animated zoomIn" alt="">
                                            <a href="{{ route('product_details', ['id' => $product->id]) }}">
                                                <h4 class="mb-3">{{ $product->name }}</h4>
                                            </a>
                                            <p class="mb-4">{{ $product->sub_title }}</p>

                                            <div class="row product-status">
                                                <div class="col-lg-6 col-md-6 col-sm-12 d-flex">
                                                    <h4 class="text-white product-status-text">{{ $product->status_1 }}</h4>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class=" col-md-6 col-sm-12 d-flex">
                                                    <h4 class="text-success">${{ $product->price }}</h4>
                                                </div>
                                                <div class=" col-md-6 col-sm-12 d-flex" >
                                                    <h4 class="text-danger">$<del>{{ $product->old_price }}</del></h4>
                                                </div>
                                                <form action="{{ route('cart.add') }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <div class="d-flex align-items-center mb-4 pt-2">
                                                        <div class="input-group quantity mr-3" style="width: 107px; margin-right: 5px;">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-primary btn-minus">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="quantity" id="itemModalQuantity" class="form-control border-0 text-center bg-white" value="1" min="1">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-primary btn-plus">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary add-to-cart-from-modal-btn" style=" margin-right: 5px;">
                                                            <i class="fa fa-shopping-cart mr-1"></i>
                                                        </button>

                                                        <a href="{{ route('product_details', ['id' => $product->id]) }}" class="btn btn-primary add-to-cart-from-modal-btn">
                                                            <i class="fa-solid fa-eye mr-1"></i>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        }
    });
</script>
 <!-- Include jQuery for easier DOM manipulation (Optional, can be pure JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Increment quantity
        $('.btn-plus').click(function() {
            let quantityInput = $(this).closest('.input-group').find('input[name="quantity"]');
            let currentValue = parseInt(quantityInput.val());
            if (!isNaN(currentValue)) {
                quantityInput.val(currentValue + 1);
            }
        });

        // Decrement quantity
        $('.btn-minus').click(function() {
            let quantityInput = $(this).closest('.input-group').find('input[name="quantity"]');
            let currentValue = parseInt(quantityInput.val());
            if (!isNaN(currentValue) && currentValue > 1) {  // Prevent going below 1
                quantityInput.val(currentValue - 1);
            }
        });
    });
</script>

@endsection
