<?php

/**
 * 
 */
class Guards
{
	
	function authCheck(){
		if($this->checkSession() && $this->checkSession()) {
			return true;
		}else{
			return false;
		}
	}

	private function checkSession()
	{
		// session_start();

		if (isset($_SESSION['key']))
		{
			return true;
		}else{
			return false;
		}

	}

	private function checkCookie()
	{
		return true;
	}


}


?>