<?php

	session_start();
	
	if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
	{
		header('Location: data.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<HTML>
<head>
<link rel="stylesheet" href="/style.css">
<title>Main.php</title>
</head>
<body class="body">
    <form action="login.php" method="post">
        Username:<br /> <input type="text" name="Username" /> <br />
        Password: <br /> <input type="Password" name="Password" /> <br /><br />
        <input type="submit" value="Login in" />
    </form>
	
	<form action="register.php">
	<input type="submit" href="register.php" value="Register [BETA]" />
	</form>
</body>






</html>
