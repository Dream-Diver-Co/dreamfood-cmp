@component('mail::message')
# Order Confirmation

Dear {{ $order->first_name }},

Thank you for your order! Your order ID is {{ $order->id }}.

**Order Details:**
- **Total Amount:** {{ $order->total_amount }}
- **Payment Method:** {{ $order->payment_method }}
- **Shipping Address:** {{ $order->shipping_address }}

Thanks for shopping with us!

@endcomponent
