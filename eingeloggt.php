<main>
<?php
session_start();
if(!isset($_SESSION['userid'])) {
	die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
 
echo "Hallo User: ".$userid;
$mysqli = new mysqli("localhost", "root", "", "games");
if ($mysqli->connect_errno) {
	echo "Failes to connnect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}
echo $mysqli->host_info . "\n";

if(isset($_GET['save'])) {
	$error = false;
	$gameid =;
	$name = $_POST['name'];
	$youtube = $_POST['youtube'];
	$homepage = $_POST['homepage'];
	$forum = $_POST['forum'];
	$tipps = $_POST['tipps'];
  	
	if(strlen($name) == 0) {
		echo 'Bitte einen Namen angeben<br>';
		$error = true;
	}
	
		//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
		$statement = $mysqli->prepare("INSERT INTO games (gameid, name, youtube, homepage, forum, tipps) VALUES (?, ?, ?, ?, ?, ?)");
		$statement->bind_param("ssssss", $gameid, $name, $youtube, $homepage, $forum, $tipps);
		$result = $statement->execute();
		
		if($result) {		
			echo "Das Spiel wurde erfolgreich eingetragen. <a href='index.php?game=$gameid'>Zum Spiel</a>";
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
	} 
}
?>
<form action="?save=1" method="post">
Name:<br>
<input type="text" size="40" maxlenght="250" name="name"><br><br>

Youtube:<br>
<input type="text" size="40" maxlenght="250" name="youtube"><br><br>

Homepage:<br>
<input type="text" size="40" maxlength="250" name="homepage"><br><br>
 
Forum:<br>
<input type="text" size="40"  maxlength="250" name="forum"><br>
 
Tipps:<br>
<input type="text" size="40" maxlength="250" name="tipps"><br><br>
 
<input type="submit" value="Abschicken">
</form>
</main>