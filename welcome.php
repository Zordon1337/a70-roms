<?php

	session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}
	
	//Usuwanie zmiennych pamiętających wartości wpisane do formularza
	if (isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
	if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if (isset($_SESSION['fr_pass1'])) unset($_SESSION['fr_pass1']);
	if (isset($_SESSION['fr_pass2'])) unset($_SESSION['fr_pass2']);
	
	//Usuwanie błędów rejestracji
	if (isset($_SESSION['e_username'])) unset($_SESSION['e_username']);
	if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if (isset($_SESSION['e_pass'])) unset($_SESSION['e_pass']);	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Galaxy a70 roms</title>
	<link rel="stylesheet" href="/style.css">
</head>

<body class="body">
	
	Thank you for registering here :)<br /><br />
	
	<a href="index.php">Login to your account!</a>
	<br /><br />

</body>
</html>
