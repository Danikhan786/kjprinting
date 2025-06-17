<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Thank You, {{ $orderDetails['first_name'] }}!</h1>
    <p>Your order has been placed successfully.</p>
    <p>Order ID: {{ $orderDetails['order_id'] }}</p>
    <p>Total: ${{ $orderDetails['total'] }}</p>
</body>
</html>
