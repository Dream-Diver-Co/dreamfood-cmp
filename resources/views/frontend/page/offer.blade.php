@extends("frontend.layouts.master")

@section("content")

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('index') }}">Home</a>
                <span class="breadcrumb-item active">Offer List</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Products Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Offer Featured Products</span></h2>
    <div class="row px-xl-5">
        @foreach($offerProducts as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset('storage/'. $product->image) }}" alt="">
                    <div class="product-action">
                        @if($product->title)
                            <a class="label">{{ $product->title }}</a>
                        @endif
                        <a href="{{ route('product_details', ['id' => $product->id]) }}" class="btn btn-outline-dark btn-square">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-outline-dark btn-square product-heart-btn" data-name="{{ $product->name }}" data-price="{{ $product->price }}" data-image="{{ asset('storage/'. $product->image) }}" href="#"><i class="far fa-heart"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>${{ $product->price }}</h5>
                        @if($product->old_price)
                            <h6 class="text-muted ml-2"><del>${{ $product->old_price }}</del></h6>
                        @endif
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Products End -->

@endsection
