<?php
    require '../wp-config.php';
    $mpesaResponse = file_get_contents('php://input');
    $callback_confirmation_message=array("ResCode"=>0, "ResDescription"=>"Mpesa data received successfully");
    
    print_r(json_encode($callback_confirmation_message)); 
    
    file_put_contents('M_PESAConfirmationResponse.txt',$mpesaResponse,FILE_APPEND);
   $jsonMpesaResponse = json_decode($mpesaResponse, true); 
    $transaction = array(
            'TransactionType'      => $jsonMpesaResponse['TransactionType'],
            'TransID'              => $jsonMpesaResponse['TransID'],
            'TransTime'            => $jsonMpesaResponse['TransTime'],
            'TransAmount'          => $jsonMpesaResponse['TransAmount'],
            'BusinessShortCode'    => $jsonMpesaResponse['BusinessShortCode'],
            'BillRefNumber'        => $jsonMpesaResponse['BillRefNumber'],
            'InvoiceNumber'        => $jsonMpesaResponse['InvoiceNumber'],
            'OrgAccountBalance'    => $jsonMpesaResponse['OrgAccountBalance'],
            'ThirdPartyTransID'    => $jsonMpesaResponse['ThirdPartyTransID'],
            'MSISDN'               => $jsonMpesaResponse['MSISDN'],
            'FirstName'            => $jsonMpesaResponse['FirstName'],
            'MiddleName'           => $jsonMpesaResponse['MiddleName'],
            'LastName'             => $jsonMpesaResponse['LastName']
    );
    
    // insert data to db.

    //  global $wpdb; 
    //  $table_name = $wpdb->$table_prefix . 'mobile_payments';
    //  $wpdb->insert_response($table_name,$transaction); 
    insert_response($transaction);
     
?>