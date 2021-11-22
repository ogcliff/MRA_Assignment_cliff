<?php

/**
 * 
 */
class User
{

	// object properties
    public $id;
    public $email;
    public $password;
    public $token;
	
	function __construct(argument)
	{
		// code...
	}

    function login(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://www.mra.mw/sandbox/programming/challenge/webservice/auth/login',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		  "Email": "cliffmnduwira1@gmail.com",
		  "Password": "password000122"
		}',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);

		
		echo $response;
    }

}






$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.mra.mw/sandbox/programming/challenge/webservice/auth/login',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "Email": "cliffmnduwira1@gmail.com",
  "Password": "password000122"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


?>