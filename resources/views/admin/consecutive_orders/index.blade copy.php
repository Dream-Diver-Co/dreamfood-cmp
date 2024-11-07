{{-- @extends('admin.layouts.master')

@section('title', 'Consecutive Orders List')
@section('content')

<div class="container">
    <h2>Consecutive Orders List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Last Order Date</th>
                <th>Total Order Days</th>
                <th>Gift Awarded</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consecutiveOrders as $order)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                    <td>{{ $order->total_order_days }}</td>
                    <td>{{ $order->gift_awarded ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.consecutive_orders.view', $order->id) }}" class="btn btn-info btn-sm">View</a>

                        <form action="{{ route('admin.consecutive_orders.delete', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
 --}}

 @extends('admin.layouts.master')

@section('title', 'Consecutive Orders List')
@section('content')

<div class="container">
    <h2>Consecutive Orders List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Last Order Date</th>
                <th>Total Order Days</th>
                <th>Gift Awarded</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consecutiveOrders as $order)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                    <td>{{ $order->total_order_days }}</td>
                    {{-- <td>{{ $order->gift_awarded ? 'Yes' : 'No' }}</td> --}}
                    {{-- <td>{{ $order->total_order_days >= 7 ? 'Yes' : 'No' }}</td> --}}
                    <td>
                        @if ($order->total_order_days >= 7)
                            <span>Yes</span>
                            <form action="{{ route('admin.consecutive_orders.sendMail', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Send Mail</button>
                            </form>
                        @else
                            <span>No</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.consecutive_orders.view', $order->id) }}" class="btn btn-info btn-sm">View</a>

                        <form action="{{ route('admin.consecutive_orders.delete', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



