<?php
	$callBackResponse = file_get_contents('php://input');

    $logFile = "CallBackResponse.txt";
    	// write to file
		$log = fopen($logFile, "a");
		fwrite($log, $callBackResponse);
		fclose($log);
		echo $response;