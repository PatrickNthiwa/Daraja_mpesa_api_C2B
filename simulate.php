<?php
$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ZTEacRUK6NG1uEJd1L0y5vA8iHbL',
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, {
    "ShortCode": 600996,
    "CommandID": "CustomerPayBillOnline",
    "amount": "1",
    "MSISDN": "254705912645",
    "BillRefNumber": "wambua",
  });
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response     = curl_exec($ch);
curl_close($ch);
echo $response;
?>