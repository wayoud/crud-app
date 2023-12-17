<!-- resources/views/payment/success.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
</head>
<body>
    <h1>Payment Success!</h1>

    <h2>Stripe Payment Details:</h2>
    <pre>{{ json_encode($stripeDetails, JSON_PRETTY_PRINT) }}</pre>

    <h2>PayPal Payment Details:</h2>
    <pre>{{ json_encode($paypalDetails, JSON_PRETTY_PRINT) }}</pre>
</body>
</html>
