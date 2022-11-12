<?php
		header("Content-Type: application/json");

		$response = '{"ResultCode": 0, "ResultDesc": "Confirmation Received Successfully"}';

		// DATA
		$mpesaResponse = file_get_contents('php://input');

		// logging the response
		$logFile = "M_PESAConfirmationResponse.txt";

		// writing the responce to file
		$log = fopen($logFile, "a");
		fwrite($log, $mpesaResponse);
		fclose($log);

		echo $response;
?>