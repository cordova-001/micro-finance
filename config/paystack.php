<?php 
return [
    'publicKey' => env('PAYSTACK_TEST_PUBLIC_KEY'),
    'secretKey' => env('PAYSTACK_TEST_SECRET_KEY'),
    'paymentUrl' => env('PAYSTACK_PAYMENT_URL', 'https://api.paystack.co'),
    'merchantEmail' => env('PAYSTACK_MERCHANT_EMAIL'),
];

?>