<!DOCTYPE html>
<html>
<head>
    <title>New Connection Request</title>
</head>
<body>
    <h2>New Connection Request</h2>
    <p><strong>Name:</strong> {{ $userDetails['name'] }}</p>
    <p><strong>Phone Number:</strong> {{ $userDetails['phone_number'] }}</p>
    <p><strong>Plastic Type:</strong> {{ $userDetails['plastic_type'] }}</p>
    <p><strong>Quantity:</strong> {{ $userDetails['quantity'] }}</p>
    <p><strong>Condition:</strong> {{ $userDetails['condition'] }}</p>
    <p><strong>Collection Date:</strong> {{ $userDetails['collection_date'] }}</p>
    <p><strong>Collection Time:</strong> {{ $userDetails['collection_time'] }}</p>
    <p><strong>Instructions:</strong> {{ $userDetails['instructions'] }}</p>
    <p><strong>Payment Method:</strong> {{ $userDetails['payment_method'] }}</p>
    <p><strong>Bank Details:</strong> {{ $userDetails['bank_details'] }}</p>
    <p><strong>Comments:</strong> {{ $userDetails['comments'] }}</p>
</body>
</html>
