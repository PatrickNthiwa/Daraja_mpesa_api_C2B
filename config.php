<?php

function insert_response($jsonMpesaResponse){

		$dbName = 'tezripol_jugoma_prime_house';
		$dbHost = 'localhost';
		$dbUser = 'tezripol_jugoma';
		$dbPass = 'hIs4UoY7m{le';

	try{
		$con = new PDO("mysql:dbhost=$dbHost;dbname=$dbName", $dbUser, $dbPass);
		//echo "Connection was successful";
	}
	catch(PDOException $e){
		die("Error Connecting ".$e->getMessage());
	}

	try{
		$insert = $con->prepare("INSERT INTO `wp_mobile_payments`(`TransactionType`, `TransID`, `TransTime`, `TransAmount`, `BusinessShortCode`, `BillRefNumber`, `InvoiceNumber`, `OrgAccountBalance`, `ThirdPartyTransID`, `MSISDN`, `FirstName`, `MiddleName`, `LastName`) VALUES (:TransactionType, :TransID, :TransTime, :TransAmount, :BusinessShortCode, :BillRefNumber, :InvoiceNumber, :OrgAccountBalance, :ThirdPartyTransID, :MSISDN, :FirstName, :MiddleName, :LastName)");
		$insert->execute((array)($jsonMpesaResponse));
		
		$Transaction = fopen('Transaction.txt', 'a');
		fwrite($Transaction, json_encode($jsonMpesaResponse));
		fclose($Transaction);
	}
	catch(PDOException $e){

		$errLog = fopen('error.txt', 'a');
		fwrite($errLog, $e->getMessage());
		fclose($errLog);


		$logFailedTransaction = fopen('failedTransaction.txt', 'a');
		fwrite($logFailedTransaction, json_encode($jsonMpesaResponse));
		fclose($logFailedTransaction);
	}
}
?>