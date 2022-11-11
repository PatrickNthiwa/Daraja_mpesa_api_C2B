<?php
$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

$curl = curl_init();

curl_setopt($curl,CURLOPT_URL,$url);

curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer vfdRzEU1ufAEP7YgoS9nBGgDnSC6',
    'Content-Type: application/json'
]);
$curl_post_data = array(
    "ShortCode"=> "600998",
    "CommandID"=> "CustomerPayBillOnline",
    "amount"=> "527",
    "MSISDN"=> "254708374149",
    "BillRefNumber"=> "MichaelPatrick"
);

$data_string = json_encode ($curl_post_data);

curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data_string);

$curl_responce = curl_exec($curl);
print_r($curl_responce);
echo $curl_responce;
?>