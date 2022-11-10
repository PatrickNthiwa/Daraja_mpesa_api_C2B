<?php
$consumerKey = 'x4lgMO695XnAGH9zclFxS6EDbMdSXr8G';
$consumerSecret = 'JEXDLHu5pYeG3LxF';

$headers = ['Content-Type:application/json;charset-utf8'];
$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$curl = curl_init($url);
curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($curl,CURLOPT_HEADER,FALSE);

curl_setopt($curl,CURLOPT_USERPWD,$consumerKey .':'.$consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl,CURLINFO_HTTP_CODE);
$result = json_decode($result);


$access_token = $result->access_token;

echo $access_token;

$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

$curl  = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HTTPHEADER,array("Content-Type:application/json",'Authorization:Bearer '.$access_token));

$curl_post_data = array(
    "ShortCode" => "60502",
    "ResponseType"=> "Confirmed",
    "ConfirmationURL"=> "https://whispering-ridge-40373.herokuapp.com/confirmation_url.php",
    "ValidationURL"=>"https://whispering-ridge-40373.herokuapp.com/validation.php"

);

$data_string =json_encode($curl_post_data);
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data_string);

$curl_responce = curl_exec($curl);
print_r($curl_responce);

echo $curl_responce;
?>