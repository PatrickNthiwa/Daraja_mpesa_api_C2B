<?php
    include_once ('access_token.php');
	$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
	$confirmationUrl = 'https://theprimehouse.co.ke/darajaC2B/confirmationUrl.php'; 
	$validationUrl = 'https://theprimehouse.co.ke/darajaC2B/validationUrl.php'; 
	$shortCode = '60502'; 

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); 

	$curl_post_data = array(
	  'ShortCode' => $shortCode,
	  'ResponseType' => 'Completed',
	  'ConfirmationURL' => $confirmationUrl,
	  'ValidationURL' => $validationUrl
	);

	$data_string = json_encode($curl_post_data);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

	$curl_response = curl_exec($curl);
	print_r($curl_response);

	echo $curl_response;
