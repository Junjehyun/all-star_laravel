<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
</head>
<body>
    <h2>Thank you for your order, {{ $order->customer_name }}!</h2>
    <p>Your order has been successfully processed. Below are the details:</p>

    <table>
        <tr>
            <th>Order ID</th>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Item</th>
            <td>{{ $order->item->name }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $order->quantity }}</td>
        </tr>
        <tr>
            <th>Total Price</th>
            <td>{{ number_format($order->amount) }}円</td>
        </tr>
        <tr>
            <th>Payment Status</th>
            <td>Paid</td>
        </tr>
    </table>

    <p>If you have any questions about your order, feel free to contact us.</p>
</body>
</html>
