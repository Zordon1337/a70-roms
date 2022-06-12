<?php

	session_start();
	
	if (!isset($_SESSION['logged']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<HTML>
<head>
<title></title>
<link rel="stylesheet" href="/style.css">
</head>
<body class="body">
<?php

   echo "<p>Hello ".$_SESSION['user'].'! [ <a href="logout.php">Log out</a> ]</p>';
   echo "<p><b>E-mail</b>: ".$_SESSION['email'];
   

?>
</body>
</html>