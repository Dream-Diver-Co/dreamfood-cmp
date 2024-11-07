
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dream Ecommerce</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Dream Shop" name="keywords">
    <meta content="Dream Shop" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/add-to-card.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

</head>

<body>

    {{-- header start --}}
    @include("frontend.partials.header")
    {{-- header end --}}

    <!--Product Success Message Modal -->
    <!-- <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-primary">
                <div class="modal-body text-center">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <p>Product has been successfully added to the cart!</p>
                </div>
            </div>
        </div>
    </div> -->


    @yield("content")

    <!-- Modal start -->
    <section>
        <!-- Product view modal start -->
        <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-view">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="itemModalLabel">Item Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container-fluid pb-5">
                        <div class="row px-xl-5">
                            <div class="col-lg-5 mb-30">
                                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner bg-light">
                                        <div class="carousel-item active">
                                            <img id="itemModalImage" src="" alt="Item Image" style="width: 100%; height: auto;">
                                        </div>
                                    </div>
                                    {{-- <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                                    </a> --}}
                                </div>
                            </div>

                            <div class="col-lg-7 h-auto mb-30">
                                <div class="h-100 bg-light p-30">
                                    <h3 id="itemModalName"></h3>
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
                                    <h3 class="font-weight-semi-bold mb-4">$<span id="itemModalPrice"></span></h3>
                                    <p class="mb-4" id="itemModalSubtitle"></p>

                                    <div id="itemModalSizeForm" class="mb-3">
                                        <label>Size:</label>
                                        <div id="size-options"></div>
                                    </div>

                                    <div id="itemModalColorForm" class="mb-3">
                                        <label>Color:</label>
                                        <div id="color-options"></div>
                                    </div>

                                    <div class="d-flex align-items-center mb-4 pt-2">
                                        <div class="input-group quantity mr-3" style="width: 130px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" id="itemModalQuantity" class="form-control bg-secondary border-0 text-center" value="1">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary add-to-cart-from-modal-btn"><i class="fa fa-shopping-cart mr-1"></i>Add to Cart</button>
                                    </div>
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
                            <div class="col">
                                <div class="bg-light p-30">
                                    <div class="nav nav-tabs mb-4">
                                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tab-pane-1">
                                            <h4 class="mb-3">Product Description</h4>
                                            <p id="itemModalDescription"></p>
                                        </div>
                                        <div class="tab-pane fade" id="tab-pane-2">
                                            <h4 class="mb-3">Additional Information</h4>
                                            <p id="itemModalInformation"></p>
                                        </div>
                                        <div class="tab-pane fade" id="tab-pane-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                                    <div class="media mb-4">
                                                        <img src="{{ asset('frontend/img/user.jpg') }}" alt="Image" class="img-fluid mr-3" style="width: 45px; height: 45px;">
                                                        <div class="media-body">
                                                            <h6>John Doe</h6>
                                                            <div class="text-primary mb-2">
                                                                <small class="fa fa-star"></small>
                                                                <small class="fa fa-star"></small>
                                                                <small class="fa fa-star"></small>
                                                                <small class="fa fa-star"></small>
                                                                <small class="fa fa-star"></small>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius tempor elit eu ultrices.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="mb-4">Leave a review</h4>
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="reviewName">Name</label>
                                                            <input type="text" class="form-control" id="reviewName" placeholder="Your Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reviewEmail">Email</label>
                                                            <input type="email" class="form-control" id="reviewEmail" placeholder="Your Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reviewText">Your Review</label>
                                                            <textarea class="form-control" id="reviewText" rows="3" placeholder="Your Review"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product view modal end -->


        <!-- Cart modal start -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-card">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Your Cart</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-pd">
                        <table class="show-cart table">
                            <thead class="card-th">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Cart items will be dynamically added here -->
                            </tbody>
                        </table>
                        <div class="grand-total">
                            Total quantity: <span class="total-count"></span> &nbsp;&nbsp; Total price: $<span class="total-cart"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="" class="btn btn-success">Cart View</a>
                        <a href="" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart modal end -->



        <!-- Wishlist Modal start-->
        <div class="modal fade" id="wishlistModal" tabindex="-1" role="dialog" aria-labelledby="wishlistModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="wishlistModalLabel">Wishlist</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="wishlist-items">
                            <!-- Wishlist items will be added here by JavaScript -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist Modal end-->
    </section>
    <!-- Modal End -->



    <!-- Footer Start -->
    @include("frontend.partials.footer")
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('frontend/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('frontend/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/add-to-card.js') }}"></script>
    <script src="{{ asset('frontend/js/wishlist.js') }}"></script>
</body>

</html>
