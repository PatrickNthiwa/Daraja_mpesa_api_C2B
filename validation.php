<?php
    header('Content-type: application/json');
    $responce =   '{
        "ResultCode" : 0,
        "ResultDesc"  : "Confirmation received succesfully"
    }';

    //DATA
    $mpesaResponce = file_get_contents("php://input");

    //log the responce
    // then the string above is converted  again into a php variable
    $logfile= "ValidationResponceContent.txt";
    $jsonMpesaresponce = json_decode($mpesaResponce,true);

    //write to file
    $log =  fopen($logfile,'a');
    fwrite($log,$mpesaResponce);
    fclose($log);


    echo $responce;
 ?>