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
if (isset($_POST['taxPayerRegister'])&&isset($_POST['tpin'])&&isset($_POST['cbn'])&&isset($_POST['trn'])&&isset($_POST['brd'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['location'])&&isset($_POST['username'])) 
{
	require 'classes/taxpayer.php'; 
	$TPIN 	  =  htmlspecialchars(strip_tags($_POST['tpin']));
	$BusinessCertificateNumber 	  =  htmlspecialchars(strip_tags($_POST['cbn']));
	$TradingName 	  =  htmlspecialchars(strip_tags($_POST['trn']));
	$BusinessRegistrationDate = htmlspecialchars(strip_tags($_POST['brd']));
	$MobileNumber = htmlspecialchars(strip_tags($_POST['phone']));
	$Email 	  =  htmlspecialchars(strip_tags($_POST['email']));
	$PhysicalLocation =  htmlspecialchars(strip_tags($_POST['location']));
	$Username =  htmlspecialchars(strip_tags($_POST['username']));
	$taxpayer = new Taxpayer();
	$taxpayer->addTaxpayer($TPIN,$BusinessCertificateNumber,$TradingName,$BusinessRegistrationDate,$MobileNumber,$Email,$PhysicalLocation);
}


if (isset($_GET['getAll'])) {
	// echo "blisters";
	require 'classes/taxpayer.php'; 
	$taxpayer = new Taxpayer();
	$taxpayer->getAll();
}

if (isset($_POST['deleteTP'])) {
	require 'classes/taxpayer.php';
	$TPIN = htmlspecialchars(strip_tags($_POST['TPIN']));
	$taxpayer = new Taxpayer();
	$taxpayer->deleteTaxPayer($TPIN);
}



?>

