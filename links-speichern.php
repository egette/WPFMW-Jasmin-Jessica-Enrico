<main>
<?php
session_start();
include('header.php');
include('navi.php');
if(!isset($_SESSION['userid'])) {
	die('Bitte zuerst <a href="index.php">einloggen</a>');
}
 //Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
 echo "Hallo User: ".$userid;
 
$db = new Datenbank;
$mysqli = $db->verbindung();

$showFormular = true; //Variable ob das Formular angezeigt werden soll

if(isset($_GET['save'])) {
	$error = false;

	$gameid = $_POST['gameid'];
	$youtube = $_POST['youtube'];
	$homepage = $_POST['homepage'];
	$forum = $_POST['forum'];
	$tipps = $_POST['tipps'];
	
		//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
		$statement = $mysqli->prepare("INSERT INTO games (gameid, youtube, homepage, forum, tipps) VALUES (?, ?, ?, ?, ?)");
		$statement->bind_param("issss", $gameid, $youtube, $homepage, $forum, $tipps);
		$result = $statement->execute();
		
		if($result) {		
			echo "Das Spiel wurde erfolgreich eingetragen. <a href='game.php?idgame=$gameid'>Zum Spiel</a>";
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
	} 
}
if($showFormular) {
?>
<form action="?save=1" method="post">

<input type="hidden" name="gameid" value="<?php echo $_GET['idgame'];?>" />

<br>Youtube ID :<br>
 https://www.youtube.com/watch?v=<strong>ZjCUVspoVew</strong><br>
<input type="text" size="40" maxlenght="250" name="youtube"><br><br>

Homepage:<br>
<input type="text" size="40" maxlength="250" name="homepage"><br><br>
 
Forum:<br>
<input type="text" size="40"  maxlength="250" name="forum"><br>
 
Tipps:<br>
<input type="text" size="40" maxlength="250" name="tipps"><br><br>
 
<input type="submit" value="Abschicken">
</form>

<?php
}
include('content.php');
include('footer.php');
?>