<?php
/**
 * 
 */
class Taxpayer
{
	
	function __construct()
	{
		// code...
	}



	public function addTaxpayer($TPIN,$BusinessCertificateNumber,$TradingName,$BusinessRegistrationDate,$MobileNumber,$Email,$PhysicalLocation,$Username)
	{
		session_start();
		$apikey = $_SESSION['key'];
		$candidateid =$_COOKIE['email'];

		$curl = curl_init();


		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://www.mra.mw/sandbox/programming/challenge/webservice/Taxpayers/add',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		    "TPIN": "'.$TPIN.'",
		    "BusinessCertificateNumber": "'.$BusinessCertificateNumber.'",
		    "TradingName": "'.$TradingName.'",
		    "BusinessRegistrationDate": "'.$BusinessRegistrationDate.'",
		    "MobileNumber": "'.$MobileNumber.'",
		    "Email": "'.$Email.'",
		    "PhysicalLocation": "'.$PhysicalLocation.'",
		    "Username": "'.$candidateid.'"
		}',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json',
		    'candidateid: '.$candidateid.'',
		    'apikey: '.$apikey.''
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);



	}


}

