<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Invoice #{{ $order->id }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        .invoice-area {
            max-width: 1500px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .invoice-header img {
            max-width: 120px;
            margin-bottom: 10px;
        }

        .invoice-title {
            color: #007BFF;
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .invoice-single-details {
            flex: 1;
            min-width: 300px;
            margin-right: 20px;
        }

        .invoice-single-details h2,
        .invoice-single-details h4 {
            color: #007BFF;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .details-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .details-list .list {
            margin-bottom: 8px;
        }

        .item-description {
            margin-bottom: 30px;
        }

        .table-title {
            margin-bottom: 15px;
            font-weight: bold;
            color: #007BFF;
            font-size: 18px;
            border-bottom: 2px solid #007BFF;
            display: inline-block;
            padding-bottom: 10px;
        }

        .custom--table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .custom--table th,
        .custom--table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .custom--table th {
            background-color: #007BFF;
            color: #fff;
        }

        .custom--table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .custom--table img {
            max-width: 80px;
            border-radius: 5px;
        }

        .table_footer_row {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        .data-span {
            font-weight: bold;
            color: #007BFF;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #999;
            font-size: 12px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        @media (max-width: 768px) {
            .invoice-details {
                flex-direction: column;
                margin-bottom: 20px;
            }

            .invoice-single-details {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Invoice area Starts -->
    <div class="invoice-area">
        <div class="invoice-header">
            <img src="{{ public_path('admin/assets/images/logo1.jpg') }}" alt="logo">
            <h1 class="invoice-title">Invoice {{ $order->first_name }}</h1>
        </div>
        <div class="invoice-details">
            <div class="invoice-single-details">
                <h2>Bill To:</h2>
                <ul class="details-list">
                    <li class="list">{{ $order->user->name }}</li>
                    <li class="list"><a href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a></li>
                    <li class="list"><a href="tel:{{ $order->user->phone }}">{{ $order->user->phone }}</a></li>
                </ul>
            </div>
            <div class="invoice-single-details">
                <h4>Ship To:</h4>
                <ul class="details-list">
                    <li class="list"><strong>City:</strong> {{ $order->city }}</li>
                    <li class="list"><strong>Address:</strong> {{ $order->address_line1 }}</li>
                    <li class="list"><strong>State:</strong> {{ $order->state }}</li>
                    <li class="list"><strong>Zip Code:</strong> {{ $order->zip_code }}</li>
                </ul>
            </div>
        </div>

        <div class="item-description">
            <h5 class="table-title">Order Details</h5>
            <table class="custom--table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        {{-- <th>Size</th>
                        <th>Color</th> --}}
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>
                            @if($item->product && $item->product->image)
                            <img src="{{ public_path('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
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
                    <tr class="table_footer_row">
                        <td colspan="4"><strong>Total Amount</strong></td>
                        <td><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="item-description">
            <h5 class="table-title">Buyer Details</h5>
            <table class="custom--table">
                <thead>
                    <tr>
                        <th>Buyer Details</th>
                        <th>Date & Schedule</th>
                        <th>Amount Details</th>
                        <th>Billing Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <span class="data-span">Name:</span> {{ $order->user->name }}<br>
                            <span class="data-span">Email:</span> {{ $order->user->email }}<br>
                        </td>
                        <td>
                            {{ $order->created_at->format('d/m/Y') }}<br>
                            {{ $order->created_at->format('h:i A') }}
                        </td>
                        <td>
                            <span class="data-span">Package Fee:</span> ${{ number_format($order->total_amount, 2) }}<br>
                            <span class="data-span">Sub Total:</span> ${{ number_format($order->total_amount, 2) }}<br>
                            <span class="data-span">Tax:</span> ${{ number_format($order->tax_amount, 2) }}<br>
                            <span class="data-span">Total:</span> ${{ number_format($order->total_amount + $order->tax_amount, 2) }}<br>
                            <span class="data-span">Payment Status:</span> {{ ucfirst($order->payment_method) }}
                        </td>
                        <td>
                            <span class="data-span">Name:</span> {{ $order->first_name }}<br>
                            <span class="data-span">Phone Number:</span> {{ $order->mobile_no }}<br>
                            <span class="data-span">Email:</span> {{ $order->email }}<br>
                            <span class="data-span">Address:</span> {{ $order->address_line1 }}<br>
                            <span class="data-span">Country:</span> {{ $order->country }}<br>
                            <span class="data-span">City:</span> {{ $order->city }}<br>
                            <span class="data-span">Zip Code:</span> {{ $order->zip_code }}<br>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <footer>
            <p>&copy; {{ date('Y') }} DREAM FOODS. All rights reserved.</p>
        </footer>
    </div>
    <!-- Invoice area End -->

</body>

</html>
