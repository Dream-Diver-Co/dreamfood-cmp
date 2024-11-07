
@extends("frontend.layouts.master")

@section("content")

        <!-- Hero Start -->
        <div class="container-fluid bg-light mt-0">
            <div class="container text-center animated bounceInDown">
                <h1 class="display-1 mb-4">Deal of the Day Cart</h1>
                <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Deal of the Day Cart</li>
                </ol>
            </div>
        </div>
        <!-- Hero End -->

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
                                <th>Price</th>
                                <th>Discount</th> <!-- Added Discount column -->
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
                                    <td class="align-middle text-success">
                                        @if($item->product)
                                            ${{ number_format($item->product->price, 2) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    {{-- <td class="align-middle text-success">
                                        @if($item->product)
                                            <!-- Display the product discount -->
                                            {{ number_format($item->product->discount) }}%
                                        @else
                                            N/A
                                        @endif
                                    </td> --}}

                                    <td class="align-middle text-success">
                                        @if($item->product)
                                            {{ number_format($item->product->discount) }}%
                                        @else
                                            N/A
                                        @endif
                                    </td>




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
                                <h3 class="text-right font-weight-bold">Discount: <span id="coupon-discount">$0.00</span></h3>
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

    });
</script>


@endsection

