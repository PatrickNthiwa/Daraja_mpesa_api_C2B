<?
$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer CEEqZpf2Qf4QamRieaIGv1BjI1eh',
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    "ShortCode" => "600996",
    "CommandID"=> "CustomerPayBillOnline",
    "amount"=> "1",
    "MSISDN"=> "254705912645",
    "BillRefNumber"=> "wambua",
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response     = curl_exec($ch);
curl_close($ch);

echo $response;
