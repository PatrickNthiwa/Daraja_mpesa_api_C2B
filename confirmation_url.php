<?php
    header('Content-type: application/json');

    $responce =   '{
        "ResultCode" : 0,
        "ResultDesc"  : "Confirmation received succesfully"
    }';

    //DATA
    $mpesaResponce = file_get_contents('php://input');

    //log the responce
    $logfile= "M-PESAConfirmationResponceContent.txt";
    $jsonMpesaresponce = json_decode($mpesaResponce,TRUE);

    //write to file
    $log =  fopen($logfile,'a+');
    fwrite($log,$mpesaResponce);
    fclose($log);


    echo $responce;
 

 