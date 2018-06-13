<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("357483147160-5fmfh4fb9eq80cf218a9niubes9l1618.apps.googleusercontent.com");
	$gClient->setClientSecret("88HOXQlkBfR9e15tIFGXrbnp");
	$gClient->setApplicationName("Click to Call");
	$gClient->setRedirectUri("https://secure-taiga-33284.herokuapp.com/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
