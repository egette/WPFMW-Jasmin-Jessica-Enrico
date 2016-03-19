<?php 
$db = new Datenbank;
$mysqli = $db->verbindung();

if(isset($_GET['login'])) {
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	
	$query = "SELECT * FROM users WHERE (email = ?)" ;
	$statement = $mysqli->prepare($query);
	$statement->bind_param("s", $email);
	$result = $statement->execute();
	$user = $statement->get_result();
	
	$pw = $user->fetch_object();
	
	//Überprüfung des Passworts
	if ($user !== false && password_verify($passwort, $pw->passwort)) {
		$_SESSION['userid'] = $pw->id;
		include ('navi.php');
		die('Login erfolgreich.');
	} else {
		$errorMessage = "E-Mail oder Passwort war ung&uuml;ltig<br>";
	}
}
 
if(isset($errorMessage)) {
	echo $errorMessage;
}
?>
 <div id="login">
<form action="index.php?login=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
<input type="submit" value="Einloggen" id="submit_but">
</form> 
<a href="registrieren.php" id="regi"> Noch nicht registriert? </a>
</div>