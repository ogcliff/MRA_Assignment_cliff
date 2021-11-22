<?php

/**
 * 
 */
class Authentication
{

    private $email;
    private $password;
	
	function __construct($email,$password)
	{
		$this->email = htmlspecialchars(strip_tags($email));
		$this->password = htmlspecialchars(strip_tags($password));
	}


	function login()
	{
		// echo $this->password;
		// return;
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
			  "Email": "'.$this->email.'",
			  "Password": "'.$this->password.'"
		}',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);

		// getting data from the jaon response
		$feedback = json_decode($response);
		try{
			$apiAuth = $feedback->Authenticated;
		}catch(Exception $e){
			echo 0;
			return;
		}

		if ($apiAuth) {
			$this->createSessionCookie($feedback->Token->Value,
									   $feedback->Token->Name,
									   $feedback->UserDetails->FirstName,
									   $feedback->UserDetails->LastName);
			echo 1;
			return;
		}else{
			echo 0;
			return;
		}

	}


	private function createSessionCookie($appkey,$email,$firstname,$lastname){

		session_start();
		$_SESSION['key'] = "3fdb48c5-336b-47f9-87e4-ae73b8036a1c";
		
		// set the cookies
		setcookie("email", $email);
		setcookie("firstname", $firstname);
		setcookie("lastname", $lastname);
	}





}

?>