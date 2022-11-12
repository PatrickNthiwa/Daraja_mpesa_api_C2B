<?php
    header('Content-type: application/json');
    $responce =   '{
        "ResultCode" : 0,
        "ResultDesc"  : "Confirmation received succesfully"
    }';

    //data
    //It takes raw data from the request and converts it into a string
    $mpesaResponce = file_get_contents("php://input");

    //log the responce
    // then the string above is converted  again into a php variable
    $logfile= "ValidationResponceContent.txt";
    $jsonMpesaresponce = json_decode($mpesaResponce,true);

    //write to file
    $log =  fopen($logfile,"a+");
    fwrite($log,$mpesaResponce);
    fclose($log);


    echo $responce;
 ?>