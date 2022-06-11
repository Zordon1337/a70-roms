<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		$everything_OK=true;
		
		$username = $_POST['nick'];
		
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
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$everything_OK=false;
			$_SESSION['e_pass']="Password must have 3-30 characters";
		}
		
		if ($pass1!=$pass2)
		{
			$everything_OK=false;
			$_SESSION['e_pass']="Entered passwords differs";
		}	

		$pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
				
		
		$secret = "";
		
		$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$answer = json_decode($check);
		
		if ($answer->success==false)
		{
			$everything_OK=false;
			$_SESSION['e_bot']="We must verify that you are not a bot!";
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
				
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$everything_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$username'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$everything_OK=false;
					$_SESSION['e_username']="Your username is already used.";
				}
				
				if ($everything_OK==true)
				{
					
					
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$username', '$haslo_hash', '$email', 100, 100, 100, 14)"))
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
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="http://game.azordon.cf/style.css">
	
	<style>
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
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
		
		Twoje hasło: <br /> <input type="password"  value="<?php
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
		
		Powtórz hasło: <br /> <input type="password" value="<?php
			if (isset($_SESSION['fr_pass2']))
			{
				echo $_SESSION['fr_pass2'];
				unset($_SESSION['fr_pass2']);
			}
		?>" name="pass2" /><br />
		
		
        <div style="text-align: center;">
        <div
             class="g-recaptcha" 
             data-sitekey="6LdrVF0gAAAAAOVQrRlu2JlmM9-0lf0ODqFWZf_q" 
             style="display: inline-block;"
        ></div>
        </div>
		
		
		<br />
		
		<input type="submit" value="Zarejestruj się" />
		
	</form>

</body>
</html>