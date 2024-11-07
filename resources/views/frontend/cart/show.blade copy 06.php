
@extends("frontend.layouts.master")

@section("content")

        <!-- Hero Start -->
        <div class="container-fluid bg-light mt-0">
            <div class="container text-center animated bounceInDown">
                <h1 class="display-1 mb-4">Shopping Cart</h1>
                <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Shopping Cart</li>
                </ol>
            </div>
        </div>
        <!-- Hero End -->

<!-- deal of day Cart Start -->
<div class="container" id="deal-cart" @if($isDealCart) style="display:block;" @else style="display:none;" @endif>
    @if($cartItems->isEmpty())
    <div class="alert alert-info text-center">Your cart is empty.</div>
    @else
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover text-center align-middle mb-5">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Old Price</th>
                    {{-- <th>Discount</th> --}}
                    <th>Discount Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="cart-body">
                @foreach($cartItems as $item)
                    <tr data-id="{{ $item->id }}">
                        <td class="align-middle">
                            @if($item->product && $item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid rounded shadow-sm" style="width: 80px;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if($item->product)
                                <strong>{{ $item->product->name }}</strong>
                            @else
                                <em>Product Not Available</em>
                            @endif
                        </td>
                        {{-- <td class="align-middle">{{ $item->size ?? 'N/A' }}</td>
                        <td class="align-middle">{{ $item->color ?? 'N/A' }}</td> --}}
                        <td class="align-middle text-success">
                            @if($item->product)
                                ${{ number_format($item->product->price, 2) }}
                            @else
                                N/A
                            @endif
                        </td>

                        {{-- <td class="align-middle text-success">
                            @if($item->product)
                                {{ number_format($item->product->discount) }}%
                            @else
                                N/A
                            @endif
                        </td> --}}

                        <td class="align-middle product-total text-success">
                            @if($item->product)
                                ${{ number_format($item->total_price, 2) }}
                            @else
                                N/A
                            @endif
                        </td>


                        <td class="align-middle">
                            <button class="btn btn-sm btn-danger remove-from-cart" data-id="{{ $item->product_id }}">
                                <i class="fa fa-trash"></i> Remove
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row mt-5">
        <div class="col-lg-4 offset-lg-8 col-md-6 offset-md-6 col-sm-8 offset-sm-2">
            <div class="card shadow-sm border-0">


                <div class="card-body">
                    <h3 class="text-right font-weight-bold">Total Items: <span id="overall-quantity">{{ $cartItems->sum('quantity') }}</span></h3>
                    <h3 class="text-right font-weight-bold">Subtotal: <span id="subtotal">${{ number_format($cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</span></h3>
                    {{-- <h3 class="text-right font-weight-bold">Discount: <span id="coupon-discount">$0.00</span></h3> --}}
                    {{-- <h3 class="text-right font-weight-bold">Total Cashback Earned: <span id="total-cashback">${{ number_format($totalCashback, 2) }}</span></h3> --}}
                    <h3 class="text-right font-weight-bold">Total: <span id="overall-total">${{ number_format($item->total_price, 2) }}</span></h3>

                    <a href="{{url('stripe')}}" class="btn btn-primary btn-block mt-3">Proceed to Checkout</a>
                    <a href="{{ route('shop')}}" class="btn btn-outline-primary btn-block mt-2">
                        <i class="fas fa-shopping-cart"></i> Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<!-- deal Cart End -->

<!-- normal All product Cart Start -->
<div class="container" id="normal-cart" @if(!$isDealCart) style="display:block;" @else style="display:none;" @endif>
    @if($cartItems->isEmpty())
    <div class="alert alert-info text-center">Your cart is empty.</div>
    @else
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover text-center align-middle mb-5">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    {{-- <th>Size</th>
                    <th>Color</th> --}}
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="cart-body">
                @foreach($cartItems as $item)
                    <tr data-id="{{ $item->id }}">
                        <td class="align-middle">
                            @if($item->product && $item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid rounded shadow-sm" style="width: 80px;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if($item->product)
                                <strong>{{ $item->product->name }}</strong>
                            @else
                                <em>Product Not Available</em>
                            @endif
                        </td>
                        {{-- <td class="align-middle">{{ $item->size ?? 'N/A' }}</td>
                        <td class="align-middle">{{ $item->color ?? 'N/A' }}</td> --}}
                        <td class="align-middle text-success">
                            @if($item->product)
                                ${{ number_format($item->product->price, 2) }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="align-middle">
                            <div class="input-group input-group-sm">
                                <input type="number" value="{{ $item->quantity }}" min="1" class="form-control text-center quantity-input" data-id="{{ $item->product_id }}" style="width: 50px">
                            </div>
                        </td>
                        <td class="align-middle product-total text-success">
                            @if($item->product)
                                ${{ number_format($item->product->price * $item->quantity, 2) }}
                            @else
                                N/A
                            @endif
                        </td>

                        {{-- <td class="align-middle product-total text-success">
                            ${{ number_format($item->total_price, 2) }}
                        </td> --}}

                        <td class="align-middle">
                            <button class="btn btn-sm btn-danger remove-from-cart" data-id="{{ $item->product_id }}">
                                <i class="fa fa-trash"></i> Remove
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row mt-5">
        <div class="col-lg-4 offset-lg-8 col-md-6 offset-md-6 col-sm-8 offset-sm-2">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <form id="coupon-form">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Enter coupon code">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div>
                    </form>
                    <div id="coupon-response" class="mt-2"></div>





                    <div class="cart-total">
                            <h3><strong>Total Cashback:</strong> $<span id="total-cashback">{{ number_format($totalCashback, 2) }}</span></h3>

                            @if (!$cashbackApplied)
                                <h3 id="applicable-cashback-discount">
                                    <strong>Applicable Cashback Discount:</strong> ${{ number_format($applicableCashbackDiscount, 2) }}
                                </h3>

                                <form id="cashback-form" method="POST">
                                    @csrf
                                    <input type="hidden" name="cashback_discount" value="{{ $applicableCashbackDiscount }}">
                                    <button type="submit" class="btn btn-primary" id="apply-cashback">Apply Cashback Discount</button>
                                </form>
                            @else
                                <p class="text-muted">Cashback discount has already been applied to this order.</p>
                            @endif

                            <div id="cashback-response" class="mt-2"></div>
                    </div>
                </div>

                <div class="card-body">
                    <h3 class="text-right font-weight-bold">Total Items: <span id="overall-quantity">{{ $cartItems->sum('quantity') }}</span></h3>
                    <h3 class="text-right font-weight-bold">Subtotal: <span id="subtotal">${{ number_format($cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</span></h3>
                    <h3 class="text-right font-weight-bold">Coupon Discount: <span id="coupon-discount">$0.00</span></h3>
                    {{-- <h3 class="text-right font-weight-bold">Total Cashback Earned: <span id="total-cashback">${{ number_format($totalCashback, 2) }}</span></h3> --}}
                    <h3 class="text-right font-weight-bold">Total: <span id="overall-total">${{ number_format($item->total_price, 2) }}</span></h3>

                    <a href="{{url('stripe')}}" class="btn btn-primary btn-block mt-3">Proceed to Checkout</a>
                    <a href="{{ route('shop')}}" class="btn btn-outline-primary btn-block mt-2">
                        <i class="fas fa-shopping-cart"></i> Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<!-- normal Cart End -->





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Update quantity
        $('.quantity-input').on('change', function() {
            var quantity = $(this).val();
            var productId = $(this).data('id');
            var row = $(this).closest('tr');

            $.ajax({
                url: "{{ route('cart.update') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        // Update the total price for this product
                        row.find('.product-total').text('$' + response.itemTotal.toFixed(2));

                        // Update the overall totals
                        $('#overall-total').text('$' + response.overallTotal.toFixed(2));
                        $('#overall-quantity').text(response.overallQuantity);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });

        // Remove from cart
        $('.remove-from-cart').on('click', function() {
            var productId = $(this).data('id');
            var row = $(this).closest('tr');

            $.ajax({
                url: "{{ route('cart.remove') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    if (response.message) {
                        row.remove();
                        $('#overall-total').text('$' + response.overallTotal.toFixed(2));
                        $('#overall-quantity').text(response.overallQuantity);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });

        // Apply coupon
        $('#coupon-form').on('submit', function(e) {
            e.preventDefault();
            var couponCode = $('#coupon_code').val();

            $.ajax({
                url: "{{ route('cart.applyCoupon') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    coupon_code: couponCode
                },
                success: function(response) {
                    if (response.success) {
                        // Correctly display the discount and updated total
                        $('#coupon-response').html('<div class="alert alert-success">Coupon applied. You saved $' + response.discount + '!</div>');
                        $('#coupon-discount').text('$' + response.discount);
                        $('#overall-total').text('$' + response.discountedTotal); // Update total with discounted value
                    } else {
                        $('#coupon-response').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                     // Clear the coupon code input field
                    document.getElementById('coupon_code').value = '';
                }
                ,
                error: function(xhr) {
                    $('#coupon-response').html('<div class="alert alert-danger">An error occurred while applying the coupon. Please try again.</div>');
                }
            });
        });


        // Apply cashback discount
        $('#cashback-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('cart.applyCashback') }}",
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        // Update the overall total with the new final cart total
                        $('#overall-total').text('$' + response.finalCartTotal.toFixed(2));
                        $('#cashback-response').html('<div class="alert alert-success">Cashback discount applied: $' + response.applicableCashbackDiscount.toFixed(2) + '</div>');

                        // Update the total cashback display with the new remaining cashback
                        $('#total-cashback').text('$' + response.remainingCashback.toFixed(2));

                        // Disable the cashback discount button and hide applicable discount
                        $('#apply-cashback').prop('disabled', true).text('Cashback Applied');
                        $('#applicable-cashback-discount').remove(); // Remove the applicable cashback discount line
                    } else {
                        $('#cashback-response').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function(xhr) {
                    $('#cashback-response').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                }
            });
        });




    });
</script>

<script>
    window.addEventListener('load', function() {
        var isDealCart = {{ $isDealCart ? 'true' : 'false' }};

        // Show or hide based on isDealCart value
        document.getElementById('deal-cart').style.display = isDealCart ? 'block' : 'none';
        document.getElementById('normal-cart').style.display = isDealCart ? 'none' : 'block';
    });
</script>



@endsection
