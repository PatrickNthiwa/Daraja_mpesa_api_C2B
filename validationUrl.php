<?php
    header("Content-Type: application/json");
    $response = '{ "ResultCode": 0, "ResultDesc": "Confirmation Received Successfully" }';

    // Getting the raw data using input stream
    $mpesaResponse = file_get_contents('php://input');
    //file_put_contents('ValidationResponse.txt',$mpesaResponse,FILE_APPEND);

    // log the response
    $logFile = "validationResponse.txt";
    $jsonMpesaResponse = json_decode($mpesaResponse, true); 

    // write the M-PESA Response to file
    $log = fopen($logFile, "a");
    fwrite($log, $mpesaResponse);
    fclose($log);

    echo $response;