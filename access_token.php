<?php
$url='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);

$credentials = base64_encode($consumer_key . ':' . $consumer_secret);
curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));

curl_setopt($curl, CURLOPT_HEADER, true);
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$curl_response = curl_exec($curl);

$result= json_decode($curl_response);
echo $result;
?>