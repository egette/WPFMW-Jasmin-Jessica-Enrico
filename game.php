<main>
<?php
include('header.php');
include('navi.php');
include('search.php');
session_start();

//Wenn nicht eingeloggt, dann login formular und registrierungslinks anzeigen
if(!isset($_SESSION['userid'])) {
	?>
	<br><a href="registrieren.php" id="regi"> Noch nicht registiert? </a><br>
	<?php	
		include('login.php');
}
//wenn eingeloggt, dann link zum ausloggen anzeigen
if(isset($_SESSION['userid'])) {
	?>
	<br><a href="logout.php" id="logout"> Ausloggen ? </a><br>
	<?php	
}

$mysqli = new mysqli("localhost", "root", "", "users");
if ($mysqli->connect_errno) {
	echo "Failes to connnect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}

	$youtube = "";
	$homepage = "";
	$forum = "";
	$tipps = "";
	if(isset($_GET['idgame'])){
	$gameid = $_GET['idgame'];
	}
	
	$query = "SELECT * FROM games WHERE gameid = ?";
	if($statement = $mysqli->prepare($query)){
		$statement -> bind_param("i", $gameid);
		$statement -> execute();
		$result = $statement -> get_result();
		
		if(($row = $result->fetch_assoc()) != null){
			$youtube = $row['youtube'];
			$homepage = $row['homepage'];
			$forum = $row['forum'];
			$tipps = $row['tipps'];
		}
     } else {
		 echo "Keine Links in der Datenbank";
	 }
	if(strlen($youtube) != 0) {
		?><iframe id="youtube" width="350" height="315" src="https://www.youtube.com/embed/<?php echo $youtube;?>" frameborder="0" allowfullscreen></iframe><?php
	}
	if(strlen($homepage) != 0) {
		?><a id="homepage" href="<?php echo $homepage; ?>">Homepage</a><?php
	}
	if(strlen($forum) != 0) {
		?><a id="forum" href="<?php echo $forum; ?>">Forum zum Spiel</a><?php
	}
	if(strlen($tipps) != 0) {
	?><a id="tipps" href="<?php echo $tipps; ?>">Tipps zum Spiel</a><?php
	}
	
	include('content.php');
	include('footer.php');
	
?>
    </main>