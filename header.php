<?php 
include('db.php');
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Cache-Control" content="max-age=3600, public">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Das Zocker-Wonderland</title>
	<meta name="Content-Language" content="de" />
	<meta name="language" content="Deutsch" />
	<meta name="description" content="Die neusten Infos zu alles Games!" />
	<meta name="author" content="Jessica Lee Schulz, Jasmin Schermuly, Enrico Gette">
	<meta name="keywords" content="Games, neue Spiele, Zocken, spielen, PC, Konsolen, Genre">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.png" type="image/png" />
    <link rel="icon" href="img/icon.png" type="image/png" />
    <link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style_min.css">
	<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="/js/api2_min.js"></script>
</head>
<body>
	<header>
		<a href="."><img src="img/logo.PNG" alt="Logo von Zocker-Wonderland" id="logo" /></a>
		<div class="headlogin">
		<form  method="get" class="suche">
			<label>Suche: <input type="text" name="suche" id="suche" /></label>
			<button type="button" id="enter" value="Abschicken">Suche</button>
		</form>
        <?php
            //Wenn nicht eingeloggt, dann login formular und registrierungslinks anzeigen
            if(!isset($_SESSION['userid'])) {
                    include('login.php');
            }
            //wenn eingeloggt, dann link zum ausloggen anzeigen
            if(isset($_SESSION['userid'])) {
        ?>
                <button><a href="logout.php" id="logout">  Ausloggen  </a></button><br>
        <?php	
            }
        ?>
        </div>
        <div class="clearer"></div>
	</header>