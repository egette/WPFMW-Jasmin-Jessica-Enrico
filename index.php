<?php 
include('header.php');
include('navi.php');
include('search.php'); 
if(!isset($_SESSION['userid'])) {
?>
<br><a href="registrieren.php" id="regi"> Noch nicht registiert? </a><br>
<?php	
	include('login.php');
}
include('content.php');
include('footer.php');
?>