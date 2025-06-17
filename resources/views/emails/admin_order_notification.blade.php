<!DOCTYPE html>
<html>
<head>
    <title>New Order Notification</title>
</head>
<body>
    <h1>New Order Received</h1>
    <p>Customer: {{ $orderDetails['first_name'] }} {{ $orderDetails['last_name'] }}</p>
    <p>Email: {{ $orderDetails['email'] }}</p>
    <p>Order ID: {{ $orderDetails['order_id'] }}</p>
    <p>Total: ${{ $orderDetails['total'] }}</p>
</body>
</html>
