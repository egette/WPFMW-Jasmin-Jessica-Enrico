<?php
// Zugriff zur Datenbank
if ($_SERVER['HTTP_HOST'] == 'localhost:3306') {
	define('DBURL', 'localhost');
	define('DBUSER', 'root');
	define('DBPW', 'abcde');
	define('DBDB', 'users');
} else {
	define('DBURL', 'XXX');
	define('DBUSER', 'XXX');
	define('DBPW', 'XXX');
	define('DBDB', 'XXX');
}

class Datenbank{
	var $mysqli;
	public function verbindung(){
		$mysqli = new mysqli("localhost", "root", "", "users");
		if ($mysqli->connect_errno) {
			echo "Failes to connnect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
		}
		return $mysqli;
	}	
}
?>