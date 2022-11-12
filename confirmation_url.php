<?php
    header('Content-type: application/json');
    $responce =   '{
        "ResultCode" : 0,
        "ResultDesc"  : "Confirmation received succesfully"
    }';

    //DATA
    $mpesaResponcejson = file_get_contents('php://input');
    //Put the resultng json in a php variable
    $Mpesaresponce = json_decode($mpesaResponcejson,true);

    //write to file
    $logfile="MpesaConfirmationResponce.txt";
    $log =  fopen($logfile,'a');
    fwrite($log,$mpesaResponcejson);
    fclose($log);


    echo $responce;
 ?>