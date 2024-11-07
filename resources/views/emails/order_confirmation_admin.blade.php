@component('mail::message')
# New Order Received

A new order has been placed by {{ $order->first_name }} {{ $order->last_name }}.

**Order Details:**
- **Order ID:** {{ $order->id }}
- **Total Amount:** {{ $order->total_amount }}
- **Payment Method:** {{ $order->payment_method }}
- **Shipping Address:** {{ $order->shipping_address }}

Please process this order as soon as possible.

@endcomponent

