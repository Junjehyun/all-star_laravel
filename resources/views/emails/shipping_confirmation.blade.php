<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shipping Confirmation</title>
</head>
<body>
    <h2>Shipping Confirmation for Your Order</h2>
    <p>Dear {{ $order->customer_name }},</p>
    <p>Your order (ID: {{ $order->id }}) has been shipped.</p>
    <p>Your tracking number is: <strong>{{ $order->tracking_number }}</strong></p>
    <p>You can use this tracking number to check your shipment status.</p>
    <p>Thank you for shopping with us!</p>
</body>
</html>
