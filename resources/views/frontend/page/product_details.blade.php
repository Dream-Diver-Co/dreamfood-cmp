@extends("frontend.layouts.master")

@section("content")

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('index') }}">Home</a>
                    <span class="breadcrumb-item active">Product Details</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

        <!-- Shop Detail Start  -->
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 rounded bg-wheat p-3 mb-30">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                {{-- <img class="w-100 h-100" src="img/product-1.jpg" alt="Image"> --}}
                                @if($product->image)
                                    <img class="w-100 h-100" src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                                @endif
                            </div>
                            {{-- <div class="carousel-item">
                                <img class="w-100 h-100" src="img/product-2.jpg" alt="Image">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 h-100" src="img/product-3.jpg" alt="Image">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 h-100" src="img/product-4.jpg" alt="Image">
                            </div> --}}
                        </div>
                        {{-- <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a> --}}
                    </div>
                </div>

                <div class="col-lg-7 rounded bg-wheat p-3 h-auto mb-30">
                    <div class="product-content h-100 bg-light p-30">
                        <h3>{{ $product->name }}</h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>

                        <div class = "product-price">
                        <h3 class = "text-danger">Old Price: $<del>{{ $product->old_price }}</del></h3>
                        <h3 class = "text-success">New Price: <span>${{ $product->price }}</span></h3>
                        </div>

                        <div class = "product-detail">
                        <h2>about this item: </h2>
                        <p class="mb-4">{{ $product->sub_title }}</p>

                        <ul>
                            <li><b>Country Foods:</b> <span>{{ optional($product->category)->name }}</span></li>
                            <li><b>Foods Items:</b> <span>{{ optional($product->subcategory)->name }}</span></li>
                            <li>Available: <span>{{ $product->status_1 }}</span></li>
                            {{-- <li>Shipping Area: <span>All over the world</span></li>
                            <li>Shipping Fee: <span>Free</span></li> --}}
                        </ul>
                        </div>


                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            {{-- <div class="d-flex mb-3">
                                <strong class="text-dark mr-3">Sizes:</strong>
                                @if(!empty($product->sizes))
                                    @foreach($product->sizes as $index => $size)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="size-{{ $index }}" name="size" value="{{ $size }}" required>
                                            <label class="custom-control-label" for="size-{{ $index }}">{{ $size }}</label>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No sizes available</p>
                                @endif
                            </div>

                            <div class="d-flex mb-4">
                                <strong class="text-dark mr-3">Colors:</strong>
                                @if(!empty($product->colors))
                                    @foreach($product->colors as $index => $color)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="color-{{ $index }}" name="color" value="{{ $color }}" required>
                                            <label class="custom-control-label" for="color-{{ $index }}">{{ ucfirst($color) }}</label>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No colors available</p>
                                @endif
                            </div> --}}

                            <div class="d-flex align-items-center mb-4 pt-2">
                                <div class="input-group quantity mr-3" style="width: 115px; margin-right: 5px;">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quantity" id="itemModalQuantity" class="form-control bg-white border-0 text-center" value="1" min="1">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary add-to-cart-from-modal-btn">
                                    <i class="fa fa-shopping-cart mr-1"></i>Add to Cart
                                </button>
                            </div>
                        </form>


                        <div class="d-flex pt-2">
                            <strong class="text-dark mr-2">Share on:</strong>
                            <div class="d-inline-flex">
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col rounded bg-wheat p-3">
                    <div class="bg-light p-30">
                        <!-- Nav tabs -->
                        <div class="nav nav-tabs rounded bg-white mb-4" role="tablist">
                            <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1" role="tab">Description</a>
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2" role="tab">Information</a>
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3" role="tab">Reviews (0)</a>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Description Tab -->
                            <div class="tab-pane fade show active" id="tab-pane-1" role="tabpanel">
                                <h4 class="mb-3">Product Description</h4>
                                <p>{{ $product->description }}</p>
                            </div>

                            <!-- Information Tab -->
                            <div class="tab-pane fade" id="tab-pane-2" role="tabpanel">
                                <h4 class="mb-3">Additional Information</h4>
                                <p>{{ $product->information }}</p>
                            </div>

                            <!-- Reviews Tab -->
                            <div class="tab-pane fade" id="tab-pane-3" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-4">1 review for "Product Name"</h4>
                                        <div class="media mb-4">
                                            <img src="{{ asset('frontend/img/user.jpg')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                                <div class="text-primary mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Leave a Review -->
                                    <div class="col-md-6">
                                        <h4 class="mb-4">Leave a review</h4>
                                        <small>Your email address will not be published. Required fields are marked *</small>
                                        <div class="d-flex my-3">
                                            <p class="mb-0 mr-2">Your Rating * :</p>
                                            <div class="text-primary">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="form-group">
                                                <label for="message">Your Review *</label>
                                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Your Name *</label>
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Your Email *</label>
                                                <input type="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Detail End -->


<!-- Add Bootstrap JS and dependencies before the closing body tag -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Optionally, you can initialize the tabs using JS -->
<script>
    $(document).ready(function () {
        $('.nav-tabs a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
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
