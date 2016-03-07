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
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="icon" href="../img/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="stylesheet" href="css/style.css">
	<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="/js/api2.js"></script>
</head>
<body>
	<header>
		<a href="."><img src="img/logo.PNG" alt="Logo von Zocker-Wonderland" id="logo" /></a>
        <?php
            include('search.php');


            //Wenn nicht eingeloggt, dann login formular und registrierungslinks anzeigen
            if(!isset($_SESSION['userid'])) {
                ?>
                <div class="headlogin">
                <a href="registrieren.php" id="regi"> Noch nicht registriert? </a><br>
                <?php	
                    include('login.php');
            }
            //wenn eingeloggt, dann link zum ausloggen anzeigen
            if(isset($_SESSION['userid'])) {
                ?>
                <br><a href="logout.php" id="logout"> Ausloggen ? </a><br>

                <?php	
            }
        ?>
                </div>
        <div class="clearer"></div>
	</header>