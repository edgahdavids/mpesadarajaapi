<?php

$consumerKey = 'zMHg3wGDC2Lmqt9sTWCiOU6WCnDc6AUf';
$consumerSecret = 'KGgkjG7AdqpvN3oH';

// Step 2: Generate Base64-encoded String
$credentials = base64_encode($consumerKey . ':' . $consumerSecret);

// Step 3: Get OAuth Access Token
$tokenEndpoint = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$ch = curl_init($tokenEndpoint);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
curl_close($ch);

$response = json_decode($result, true);

// Access Token
$accessToken = $response['access_token'];

echo "Access Token: " . $accessToken;

?>

