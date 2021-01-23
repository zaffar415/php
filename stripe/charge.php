<?php 
require_once('vendor/autoload.php');

$stripe = new \Stripe\StripeClient('sk_test_51Hn0fRG7TRiTDNchJfzY9qmVCqRJPOcfDOnH8Q3HJnpoMNPHpULfnrJlHDcxAY17EpuJ8qnIGuDsNHjlqaf7Aweq0096EzwL2L');

$customer = $stripe->customers->create([
    'description' => $_REQUEST['first_name'],
    'email' => $_REQUEST['email'],
    'payment_method' => 'pm_card_visa',
]);
echo "Customer : ".$customer;

print_r($_REQUEST);


$charge = $stripe->charges->create([
    'amount' => (int)$_REQUEST['price']*100,
    'currency'=> 'inr',
    "source" => "tok_mastercard",
    'description'=>'Hello Description',
]);

echo "Charge : \n";
print_r($charge);

