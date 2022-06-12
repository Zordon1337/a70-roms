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
   echo "<p>---<b>ROMS</b>---<p>";
   echo "<a href='https://forum.xda-developers.com/t/rom-12-1-unofficial-a705fn-lineageos-19-1.4452935/'>[ROM][12.1][UNOFFICIAL][A705FN] LineageOS 19.1<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/rom-stable-crdroidandroid-unofficial-6-13-10-0-2021-01-01.4209323/'>[ROM]-[STABLE]-crDroidAndroid-[UNOFFICIAL]-[6.13]-[10.0]-[2021.01.01]<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/rom-unofficial-11-0-a70q-blissrom.4397751/'>[ROM][UNOFFICIAL][11.0][A70q]BlissROM<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/discontinued-rom-one-ui-2-5-a70-akimios-v2.4190361/'>[DISCONTINUED] [ROM][ONE UI 2.5][A70] - AkimiOS銀河 V2<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/deprecated-a11-stockless-rom-2-3-1-sm-a70fn-mn.4347859/'>(DEPRECATED) (A11) Stockless Rom 2.3.1 SM-A70FN/MN<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/android-12-pixel-expereience-for-a70-all-models-fod-working-gsi.4395073/';>Android 12 Pixel expereience for A70 (All models) (FOD Working) (gsi)<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/rom-treble-10-x-lineageos-17-1-for-samsung-galaxy-a70.4192919/'>[ROM][TREBLE][10.x]LineageOS 17.1 for Samsung Galaxy A70<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/rom-universal-rom-one-ui-for-any-galaxy-a.4306763/'>[ROM] - Universal ROM One UI for any Galaxy A<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/rom-alpha-ubports-ubuntu-touch-for-galaxy-a70.4397397/'>[ROM][ALPHA][UBports] Ubuntu Touch for Galaxy A70<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/rom-one-ui-3-1-a70-swx-rom.4260781/'>[ROM][ONE UI 3.1][A70] - Swx ROM<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/rom-unofficial-11-carbonrom-for-samsung-galaxy-a70.4335475/'>[ROM][UNOFFICIAL][11] CarbonROM for Samsung Galaxy A70<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/rom-beta-unofficial-11-lineageos-18-1-for-galaxy-a70.4215679/'>[ROM][BETA][UNOFFICIAL][11] LineageOS 18.1 for Galaxy A70<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/stable-11-dotos-5-2-with-material-you-a70-gsi.4394153/'>[STABLE] [11] dotOS 5.2 with Material You (a70) (gsi)<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/closed-stable-android-12-pixel-experience-rom-for-galaxy-a70.4386279/'>[CLOSED][STABLE] [ANDROID 12] Pixel Experience ROM for Galaxy A70<a>";
   echo "<p><p>";
   echo "<a href='https://forum.xda-developers.com/t/closed-discontinued-stable-gsi-11-dotos-5-2-1-based-on-official-gsi-with-hybrid-material-you-design-for-galaxy-a70.4394245/' >[CLOSED][DISCONTINUED] [STABLE] [GSI] [11] DotOS 5.2.1 based on Official GSI with Hybrid Material You design for Galaxy A70<a>";
   

?>
</body>
</html>