<!-- resources/views/emails/order_confirmation.blade.php -->
<html>
<head>
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #4CAF50;
            font-size: 36px;
            margin: 0;
        }
        .order-details ul {
            list-style-type: none;
            padding: 0;
        }
        .order-details li {
            font-size: 16px;
            padding: 8px 0;
            color: #333;
        }
        .order-details li strong {
            color: #4CAF50;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 30px;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Confirmation</h1>
        </div>

        <div class="content">
            <p>Dear {{ $user->first_name }} {{ $user->last_name }},</p>
            <p>Thank you for your order! We're excited to process it and send it your way. Below are the details of your purchase:</p>
        </div>

        <div class="order-details">
            <ul>
                <li><strong>Order ID:</strong> #{{ $order->id }}</li>
                <li><strong>Product:</strong> {{ $order->product->name }}</li>
                <li><strong>Quantity:</strong> {{ $order->quantity }}</li>
                <li><strong>Total:</strong> ${{ number_format($order->total, 2) }}</li>
                <li><strong>Shipping Address:</strong> {{ $order->address_line1 }} {{ $order->address_line2 }}</li>
                <li><strong>Payment Method:</strong> {{ $order->payment_method }}</li>
            </ul>
        </div>

        <div class="content">
            <p>We will process your order shortly and notify you once it ships, along with any tracking details.</p>
            <p>If you have any questions or need further assistance, feel free to <a href="mailto:shayanhaider873@gmail.com">contact us</a>.</p>
        </div>

        <div class="footer">
            <p>Thank you for shopping with us! We appreciate your business.</p>
            <p>&copy; {{ date('Y') }} Your Store. All rights reserved.</p>
        </div>
    </div>
</body>
</html>


{{-- <!-- resources/views/emails/order_confirmation.blade.php -->
<html>
<body>
    <h1>Order Confirmation</h1>
    <p>Dear {{ $user->first_name }} {{ $user->last_name }},</p>

    <p>Thank you for your order! Here are the details:</p>

    <ul>
        <li><strong>Order ID:</strong> {{ $order->id }}</li>
        <li><strong>Product:</strong> {{ $order->product->name }}</li>
        <li><strong>Quantity:</strong> {{ $order->quantity }}</li>
        <li><strong>Total:</strong> ${{ $order->total }}</li>
        <li><strong>Shipping Address:</strong> {{ $order->address_line1 }} {{ $order->address_line2 }}</li>
        <li><strong>Payment Method:</strong> {{ $order->payment_method }}</li>
    </ul>

    <p>We will process your order shortly and send you tracking details once it ships.</p>

    <p>Thank you for shopping with us!</p>
</body>
</html> --}}
