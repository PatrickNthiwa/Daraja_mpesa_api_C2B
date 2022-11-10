<?php
$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';


$curl  = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HTTPHEADER,array("Content-Type:application/json",'Authorization:Bearer ACCESS_TOKEN'));

$curl_post_data = array(
    "ShortCode" => "60502",
    "ResponseType"=> "Confirmed",
    "ConfirmationURL"=> "[confirmation URL]",
    "ValidationURL"=>"[validation URL]"

);

$data_string =json_encode($curl_post_data);
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data_string);

$curl_responce = curl_exec($curl);
print_r($curl_responce);

echo $curl_responce;
?>