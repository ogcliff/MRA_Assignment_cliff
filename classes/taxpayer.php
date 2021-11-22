<?php
/**
 * 
 */
class Taxpayer
{
    private $apikey;
    private $candidateid;

	function __construct()
	{
		session_start();
		$this->apikey = $_SESSION['key'];
		$this->candidateid =$_COOKIE['email'];
	}



	public function addTaxpayer($TPIN,$BusinessCertificateNumber,$TradingName,$BusinessRegistrationDate,$MobileNumber,$Email,$PhysicalLocation)
	{
		
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
		    "Username": "'.$this->candidateid.'"
		}',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json',
		    'candidateid: '.$this->candidateid.'',
		    'apikey: '.$this->apikey.''
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		echo 1;
		return;
	}



	public function getAll()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://www.mra.mw/sandbox/programming/challenge/webservice/Taxpayers/getAll',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json',
		    'candidateid: '.$this->candidateid.'',
		    'apikey: '.$this->apikey.''
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		// echo $this->candidateid;

		print_r($response);

	}




}

