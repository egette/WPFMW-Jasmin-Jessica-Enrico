<?php
// Zugriff zur Datenbank
if ($_SERVER['HTTP_HOST'] == 'localhost:8888') {
	define('DBURL', 'localhost');
	define('DBUSER', 'root');
	define('DBPW', 'abcde');
	define('DBDB', 'hops');
} else {
	define('DBURL', 'XXX');
	define('DBUSER', 'XXX');
	define('DBPW', 'XXX');
	define('DBDB', 'XXX');
}
?>