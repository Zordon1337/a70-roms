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
   echo "<a href="logout.php">log off<a>
   
   
   
   echo "<p><b>Email</b>: ".$_SESSION['email']."<p>";
   

?>
</body>






</html>
