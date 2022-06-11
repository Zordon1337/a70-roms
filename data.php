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
<link rel="stylesheet" href=/style.css">
<title></title>
</head>
<body class="body">
<?php

   echo "<p>Hello ".$_SESSION['user']."!<p>";
   echo "<p><b>Email</b>: ".$_SESSION['email']."<p>";
   

?>
<form action="logout.php">
<input type="submit" Value="log out" />
</form>
</body>






</html>
