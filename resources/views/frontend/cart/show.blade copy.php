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

<!-- Cart Start -->
<div class="container">
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
        {{-- <div class="bg-wheat p-4 mb-3">
            <div class="border-bottom bg-light p-30 pt-3 pb-2">
                <div class="d-flex justify-content-between">
                    <form class="mb-30" action="">
                        <div class="input-group">
                            <input type="text" class="form-control " placeholder="Coupon Code">
                            <div class="input-group-append">
                                    <button class="btn btn-primary">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        <form id="coupon-form" class="mb-30">
            <div class="input-group">
                <input type="text" id="coupon-code" class="form-control" placeholder="Coupon Code">
                <div class="input-group-append">
                    <button type="button" id="apply-coupon-btn" class="btn btn-primary">Apply Coupon</button>
                </div>
            </div>
        </form>
        <p id="coupon-message" class="text-success"></p>
        <h3 class="text-right font-weight-bold">Discount: <span id="discount-amount">$0.00</span></h3>
        <h3 class="text-right font-weight-bold">New Total: <span id="new-total">${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</span></h3>

        <div class="row mt-5">
            <div class="col-lg-4 offset-lg-8 col-md-6 offset-md-6 col-sm-8 offset-sm-2">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="text-right font-weight-bold">Total Items: <span id="overall-quantity">{{ $cartItems->sum('quantity') }}</span></h4>
                        {{-- <h3 class="text-right font-weight-bold">Total: <span id="overall-total">${{ number_format($cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</span></h3> --}}
                        <h3 class="text-right font-weight-bold">New Total: <span id="new-total">${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</span></h3>
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
<!-- Cart End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.quantity-input').on('change', function() {
            var quantity = $(this).val();
            var productId = $(this).data('id');
            var row = $(this).closest('tr');

            $.ajax({
                url: '{{ route("cart.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        row.find('.product-total').text('$' + response.itemTotal.toFixed(2));
                        $('#overall-total').text('$' + response.overallTotal.toFixed(2));
                        $('#overall-quantity').text(response.overallQuantity);
                    } else {
                        console.error("Failed to update quantity");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Failed to update item: " + error);
                }
            });
        });

        $('.remove-from-cart').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route("cart.remove") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: id
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Failed to remove item: " + error);
                }
            });
        });
    });
</script>

<script>
   $(document).ready(function() {
    $('#apply-coupon-btn').on('click', function() {
        var couponCode = $('#coupon-code').val();

        $.ajax({
            url: '{{ route("cart.applyCoupon") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                coupon_code: couponCode
            },
            success: function(response) {
                if (response.success) {
                    // Display the discount amount and new total
                    $('#coupon-message').text('Coupon applied successfully!').addClass('text-success').removeClass('text-danger');
                    $('#discount-amount').text('$' + response.discount.toFixed(2));
                    $('#new-total').text('$' + response.discountedTotal.toFixed(2));
                } else {
                    // Display error message
                    $('#coupon-message').text(response.message).addClass('text-danger').removeClass('text-success');
                }
            },
            error: function(xhr, status, error) {
                $('#coupon-message').text('Failed to apply coupon: ' + error).addClass('text-danger').removeClass('text-success');
            }
        });
    });
});

</script>

@endsection
