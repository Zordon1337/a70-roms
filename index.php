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
<link rel="stylesheet" href="http://game.azordon.cf/style.css">
<title>Main.php</title>
</head>
<body class="body">
    <form action="login.php" method="post">
        login:<br /> <input type="text" name="Username" /> <br />
        hasło: <br /> <input type="password" name="Password" /> <br /><br />
        <input type="submit" value="Login in" />
    </form>
</body>






</html>
