<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<HTML>
<head>
<link rel="stylesheet" href="http://game.azordon.cf/style.css">
<title></title>
</head>
<body class="body">
<?php

   echo "<p>Hello ".$_SESSION['user']."!<p>";
   
   
   
   echo "<p><b>Email</b>: ".$_SESSION['email']."<p>";
   

?>
</body>






</html>
