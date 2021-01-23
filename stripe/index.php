<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
</head>
<body>
    <form action="./charge.php" method="post" id="payment-form">
    <div class="form-row">
        <input type="text" placeholder="First Name" name="first_name">
        <input type="text" placeholder="Last Name" name="last_name">
        <input type="text" placeholder="Email Address" name="email">
        <input type="number" name="price" value="0" placeholder="price">
        <label for="card-element">

        </label>
        <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>

    <button>Submit Payment</button>
    </form>
    
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./js/script.js"></script>
</body>
</html>