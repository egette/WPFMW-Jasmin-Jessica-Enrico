<?php 
session_start();
include('header.php');

$mysqli = new mysqli("localhost", "root", "", "users");
if ($mysqli->connect_errno) {
	echo "Failes to connnect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}
echo $mysqli->host_info . "\n";

$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
	$error = false;
	$vorname = $_POST['vorname'];
	$nachname = $_POST['nachname'];
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	$passwort2 = $_POST['passwort2'];
  
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
		$error = true;
	} 	
	if(strlen($passwort) == 0) {
		echo 'Bitte ein Passwort angeben<br>';
		$error = true;
	}
	if($passwort != $passwort2) {
		echo 'Die Passwörter müssen übereinstimmen<br>';
		$error = true;
	}
	
	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) { 
		$query = "SELECT 'email' FROM 'users' WHERE email=?";
		
		if($statement = $mysqli->prepare($query)){
			$statement->bind_param("s", $email);
			if($statement->execute()){
				$statement->store_result();
				$emailcheck = "";
				$statement->bind_result($emailcheck);
				$statement->fetch();
				
				if($statement->num_rows == 1) {
					echo "diese Email existiert schon!";
					
			    }
			}
		}	
	}
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
		
		$statement = $mysqli->prepare("INSERT INTO users (email, passwort, vorname, nachname) VALUES (?, ?, ?, ?)");
		$statement->bind_param("ssss", $email, $passwort_hash, $vorname, $nachname);
		$result = $statement->execute();
		
		if($result) {		
			echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
	} 
}
 
if($showFormular) {
?>
 
<form action="?register=1" method="post">
Vorname:<br>
<input type="text" size="40" maxlenght="250" name="vorname"><br><br>

Nachname:<br>
<input type="text" size="40" maxlenght="250" name="nachname"><br><br>

E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
Passwort wiederholen:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>
 
<input type="submit" value="Abschicken">
</form>
 
<?php
} //Ende von if($showFormular)
?>
 
</body>
</html>