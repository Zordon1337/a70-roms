<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		$everything_OK=true;
		
		$username = $_POST['username'];
		
		if ((strlen($username)<3) || (strlen($username)>20))
		{
			$everything_OK=false;
			$_SESSION['e_username']="Username must have 3-30 characters";
		}
		
		if (ctype_alnum($username)==false)
		{
			$everything_OK=false;
			$_SESSION['e_username']="Username can only have letters and numbers";
		}
		
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$everything_OK=false;
			$_SESSION['e_email']="Enter correct email!";
		}
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		
		if ((strlen($pass1)<8) || (strlen($pass1)>20))
		{
			$everything_OK=false;
			$_SESSION['e_pass']="Password must have 8-30 characters";
		}
		
		if ($pass1!=$pass2)
		{
			$everything_OK=false;
			$_SESSION['e_pass']="Entered passwords differs";
		}	

				
				
		
		$_SESSION['fr_username'] = $username;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_pass1'] = $pass1;
		$_SESSION['fr_pass2'] = $pass2;
		
		require_once "authconfig.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				
				$rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$everything_OK=false;
					$_SESSION['e_email']="there is already account with that mail";
				}		

				
				$rezultat = $polaczenie->query("SELECT id FROM users WHERE user='$username'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$everything_OK=false;
					$_SESSION['e_username']="Your username is already used.";
				}
				
				if ($everything_OK==true)
				{
					
					
					if ($polaczenie->query("INSERT INTO users VALUES (NULL, '$username', '$pass1', '$email')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: data.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Server ERROR</span>';
			echo '<br />info for dev: '.$e;
		}
		
	}
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Galaxy a70 roms</title>
    <link rel="stylesheet" href="/style.css">
	
	<style>
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		.button {
    	size: 20px;
    	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    	transition-duration: 0.4s;
    	font-size: 12px;
    	color:white;
    	border: 0px solid;
    	background-color: #4CAF50;
    	padding: 15px 32px;
    	}
    	.button:hover {
    	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    	cursor: pointer;
    	color: white;
    	}
	</style>
</head>

<body class="body">
	
	<form method="post">
	
		Username: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_username']))
			{
				echo $_SESSION['fr_username'];
				unset($_SESSION['fr_username']);
			}
		?>" name="username" /><br />
		
		<?php
			if (isset($_SESSION['e_username']))
			{
				echo '<div class="error">'.$_SESSION['e_username'].'</div>';
				unset($_SESSION['e_username']);
			}
		?>
		
		E-mail: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>" name="email" /><br />
		
		<?php
			if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
		?>
		
		Your password: <br /> <input type="password"  value="<?php
			if (isset($_SESSION['fr_pass1']))
			{
				echo $_SESSION['fr_pass1'];
				unset($_SESSION['fr_pass1']);
			}
		?>" name="pass1" /><br />
		
		<?php
			if (isset($_SESSION['e_pass']))
			{
				echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
				unset($_SESSION['e_pass']);
			}
		?>		
		
		Retype the password: <br /> <input type="password" value="<?php
			if (isset($_SESSION['fr_pass2']))
			{
				echo $_SESSION['fr_pass2'];
				unset($_SESSION['fr_pass2']);
			}
		?>" name="pass2" /><br />
		
		
		
		
		<br />
		
		<input class="button" type="submit" value="Zarejestruj się" />
		
	</form>

</body>
</html>