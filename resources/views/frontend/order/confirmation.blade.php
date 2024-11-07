@extends('frontend.layouts.master')

@section('content')

    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="display-4 text-success">Order Confirmed!</h1>
            <p class="lead">Thank you for your order. Your items will be shipped soon.</p>
        </div>

        <div class="text-center mt-5">
            <h4 class="font-weight-bold">Total Amount: ${{ number_format($order->total_amount, 2) }}</h4>
            <p>You have earned a cashback of <strong>{{ number_format($cashbackAmount, 2) }}</strong>.</p>

            <a href="{{ route('product')}}" class="btn btn-primary btn-lg">
                <i class="fas fa-shopping-cart"></i> Continue Shopping
            </a>

            <a href="{{ route('order.invoice', $order->id) }}" class="btn btn-success btn-lg ml-3">
                <i class="fas fa-file-pdf"></i> Download Invoice (PDF)
            </a>
        </div>

        <div class="row px-xl-5">
            <div class="col-lg-12">
                <h5 class="section-title position-relative text-uppercase mb-4">
                    <span class="bg-secondary text-white px-3 py-1">Order Details</span>
                </h5>
                <div class="table-responsive shadow-lg">
                    <table class="table table-bordered text-center bg-white">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                {{-- <th scope="col">Size</th>
                                <th scope="col">Color</th> --}}
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        @if($item->product && $item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" width="60" class="img-thumbnail">
                                        @else
                                            <span>No Image Available</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->product->name }}</td>
                                    {{-- <td>{{ $item->size }}</td>
                                    <td>{{ $item->color }}</td> --}}
                                    <td>${{ number_format($item->product->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
