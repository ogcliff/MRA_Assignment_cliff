<?php


// handling login request
if (isset($_POST['login'])&&isset($_POST['email'])&&isset($_POST['password'])) 
{
	require 'classes/authentication.php'; 
	$email =  htmlspecialchars(strip_tags($_POST['email']));
	$password =  htmlspecialchars(strip_tags($_POST['password']));

	$auth = new Authentication($email,$password);
	$auth->login();
}


// handling registering request
if (isset($_POST['taxPayerRegister'])&&isset($_POST['tpin'])&&isset($_POST['cbn'])&&isset($_POST['trn'])&&isset($_POST['brd'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['location'])) 
{
	require 'classes/taxpayer.php'; 
	$TPIN 	  =  htmlspecialchars(strip_tags($_POST['tpin']));
	$BusinessCertificateNumber 	  =  htmlspecialchars(strip_tags($_POST['cbn']));
	$TradingName 	  =  htmlspecialchars(strip_tags($_POST['trn']));
	$BusinessRegistrationDate = htmlspecialchars(strip_tags($_POST['brd']));
	$MobileNumber = htmlspecialchars(strip_tags($_POST['phone']));
	$Email 	  =  htmlspecialchars(strip_tags($_POST['email']));
	$PhysicalLocation =  htmlspecialchars(strip_tags($_POST['location']));
	$taxpayer = new Taxpayer();
	$taxpayer->addTaxpayer($TPIN,$BusinessCertificateNumber,$TradingName,$BusinessRegistrationDate,$MobileNumber,$Email,$PhysicalLocation);
}


// handling Tax payer Editing request
if (isset($_POST['editTaxpayer'])&&isset($_POST['tpin'])&&isset($_POST['cbn'])&&isset($_POST['trn'])&&isset($_POST['brd'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['location'])) 
{
	require 'classes/taxpayer.php'; 
	$TPIN 	  =  htmlspecialchars(strip_tags($_POST['tpin']));
	$BusinessCertificateNumber 	  =  htmlspecialchars(strip_tags($_POST['cbn']));
	$TradingName 	  =  htmlspecialchars(strip_tags($_POST['trn']));
	$BusinessRegistrationDate = htmlspecialchars(strip_tags($_POST['brd']));
	$MobileNumber = htmlspecialchars(strip_tags($_POST['phone']));
	$Email 	  =  htmlspecialchars(strip_tags($_POST['email']));
	$PhysicalLocation =  htmlspecialchars(strip_tags($_POST['location']));
	$taxpayer = new Taxpayer();
	$taxpayer->editTaxPayer($TPIN,$BusinessCertificateNumber,$TradingName,$BusinessRegistrationDate,$MobileNumber,$Email,$PhysicalLocation);

}



// handling getting all Taxpayers request
if (isset($_GET['getAll'])) {
	require 'classes/taxpayer.php'; 
	$taxpayer = new Taxpayer();
	$taxpayer->getAll();
}

// Handling tax payer deleting request
if (isset($_POST['deleteTP'])) {
	require 'classes/taxpayer.php';
	$TPIN = htmlspecialchars(strip_tags($_POST['TPIN']));
	$taxpayer = new Taxpayer();
	$taxpayer->deleteTaxPayer($TPIN);
}



?>

