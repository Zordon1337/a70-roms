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
<style>
	.button {
    size: 20px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    transition-duration: 0.4s;
    font-size: 12px;
    color:white;
    border: 0px solid;
    background-color: blueviolet;
    padding: 15px 32px;
    
    }

    .button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    cursor: pointer;
    color: white;
    }
	.button2 {
    size: 20px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    transition-duration: 0.4s;
    font-size: 12px;
    color:white;
    border: 0px solid;
    background-color: #4CAF50;
    padding: 15px 32px;
    
    }

    .button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    cursor: pointer;
    color: white;
    }
</style>
</head>
<body class="body">
  <form action="login.php" method="post">
        Username:<br /> <input type="text" name="user" /> <br />
        Password: <br /> <input type="Password" name="Password" /> <br /><br />
        <input class="button2" type="submit" value="Login in" /> 
	</form>
	<form action="register.php"> 
	    <p> <p>
		<input class="button" type="submit" value="Register" /> 
	</form>

	
</body>






</html>
