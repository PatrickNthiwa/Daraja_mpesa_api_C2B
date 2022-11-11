<?
$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer vfdRzEU1ufAEP7YgoS9nBGgDnSC6',
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    "ShortCode"=> 600992,
    "CommandID"=> "CustomerPayBillOnline",
    "amount"=> "10",
    "MSISDN"=> "254705912645",
    "BillRefNumber"=> "Michael",
  ]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response     = curl_exec($ch);
curl_close($ch);
echo $response;