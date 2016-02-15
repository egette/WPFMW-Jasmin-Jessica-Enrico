<?php 
session_start();
include('header.php');

$mysqli = new mysqli("localhost", "root", "", "users");
if ($mysqli->connect_errno) {
	echo "Failes to connnect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}
echo $mysqli->host_info . "\n";
 
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
		die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
	} else {
		$errorMessage = "E-Mail oder Passwort war ung&uuml;ltig<br>";
	}
	
}
?>
 
<?php 
if(isset($errorMessage)) {
	echo $errorMessage;
}
?>
 
<form action="?login=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
<input type="submit" value="Abschicken">
</form> 
</body>
</html>