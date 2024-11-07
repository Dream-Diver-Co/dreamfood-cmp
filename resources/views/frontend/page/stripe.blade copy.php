@extends("frontend.layouts.master")

@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-6">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Stripe Payment Gateway Integration</h3>
                    <h3>Please pay now: ${{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}</h3>
                </div>
                <div class="card-body p-4">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form id="payment-form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                        @csrf

                        <!-- Billing Address Start -->
                <div class="col-lg-8 p-3">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                    <div class="bg-wheat p-4 mb-5">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="first_name" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="last_name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="email" name="email" placeholder="example@email.com" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="tel" name="mobile_no" placeholder="+123 456 789" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 1</label>
                                    <input class="form-control" type="text" name="address_line1" placeholder="123 Street" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 2</label>
                                    <input class="form-control" type="text" name="address_line2" placeholder="Apt 456">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <select class="form-control custom-select" name="country" required>
                                        <option value="Netherland" selected>Netherland</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" name="city" placeholder="New York" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" name="state" placeholder="New York" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" name="zip_code" placeholder="12345" required>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- Order Summary Start -->
                <div class="col-lg-4 p-3">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    <div class="bg-wheat p-4 mb-3">
                        <div class="border-bottom bg-light p-30 pt-3 pb-2">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Total Items</h6>
                                <h6 class="font-weight-medium"><span id="overall-quantity">{{ $cartItems->sum('quantity') }}</span>ps</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6>Subtotal</h6>
                                <h6>${{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Home Delivery</h6>
                                <h6 class="font-weight-medium">Free</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>${{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-wheat p-4">
                            <div class="form-group">
                               <!-- Hidden input for total amount -->
                        <input type="hidden" name="total_amount" value="{{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}" />

                        <!-- Payment Method Selection -->
                        <div class="form-group mb-4">
                            <label class="form-label">Choose Payment Method</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="payment_method" value="card" class="form-check-input" id="card-method" checked>
                                <label class="form-check-label" for="card-method">Pay with Card</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="payment_method" value="ideal" class="form-check-input" id="ideal-method">
                                <label class="form-check-label" for="ideal-method">Pay with iDEAL</label>
                            </div>
                        </div>

                        <!-- Card Payment Details -->
                        <div id="card-payment-section">
                            <div class="mb-4">
                                <label for="card-element" class="form-label">Credit or Debit Card</label>
                                <div id="card-element" class="form-control" style="padding-top: 12px;"><!-- Stripe Card Element --></div>
                                <small id="card-errors" class="form-text text-danger" role="alert"></small>
                            </div>
                        </div>

                        <!-- iDEAL Payment Details -->
                        <div id="ideal-payment-section" style="display: none;">
                            <div class="mb-4">
                                <label for="ideal-bank-element" class="form-label">iDEAL Bank</label>
                                <div id="ideal-bank-element" class="form-control" style="padding-top: 12px;"><!-- Stripe iDEAL Bank Element --></div>
                                <small id="ideal-errors" class="form-text text-danger" role="alert"></small>
                            </div>
                        </div>
                            </div>

                        </div>

                        <div class="pt-2">
                            {{-- <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>${{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}</h5>
                            </div> --}}
                            <input type="hidden" name="total_amount" value="{{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit Payment</button>
                    </div>
                </div>
                <!-- Order Summary End -->


                        <!-- Submit Button -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();

    // Create instances for card and iDEAL Elements
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    var idealBankElement = elements.create('idealBank');
    idealBankElement.mount('#ideal-bank-element');

    // Toggle payment sections based on selected payment method
    document.querySelectorAll('input[name="payment_method"]').forEach(function(input) {
        input.addEventListener('change', function(event) {
            if (event.target.value === 'card') {
                document.getElementById('card-payment-section').style.display = 'block';
                document.getElementById('ideal-payment-section').style.display = 'none';
            } else {
                document.getElementById('card-payment-section').style.display = 'none';
                document.getElementById('ideal-payment-section').style.display = 'block';
            }
        });
    });

    document.getElementById('payment-form').addEventListener('submit', function(event) {
        event.preventDefault();

        var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
        var totalAmount = document.querySelector('input[name="total_amount"]').value;

        if (paymentMethod === 'ideal') {
            // Handle iDEAL payment
            fetch('{{ route('checkout.createIntent') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    payment_method: 'ideal',
                    amount: totalAmount * 100 // Convert to cents
                })
            }).then(function(response) {
                return response.json();
            }).then(function(data) {
                var client_secret = data.client_secret;

                // Confirm the iDEAL payment
                stripe.confirmIdealPayment(client_secret, {
                    payment_method: {
                        ideal: idealBankElement,
                        billing_details: { name: 'Customer Name' },
                    },
                    return_url: '{{ route('checkout.success') }}'
                }).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('ideal-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        window.location.href = result.paymentIntent.next_action.redirect_to_url.url;
                    }
                });
            });
        } else {
            // Handle card payment
            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        }
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>

@endsection
