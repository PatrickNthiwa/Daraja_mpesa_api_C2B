<?php
    header("Content-Type: application/json");

    $response = '{ "ResultCode": 0, "ResultDesc": "Confirmation Received Successfully" }';

    // Saving the M-PESA input stream. 
    $mpesaResponse = file_get_contents('php://input');

    // logging the response
    $logFile = "validationResponse.txt";

 
    $jsonMpesaResponse = json_decode($mpesaResponse, true); 

    // writing the M-PESA Response to file
    $log = fopen($logFile, "a");
    fwrite($log, $mpesaResponse);
    fclose($log);

    echo $response;

?>