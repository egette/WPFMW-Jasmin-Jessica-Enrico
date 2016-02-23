<?php
session_start();
session_destroy();
include('header.php');
include('navi.php');
include('search.php');

 
echo "Logout erfolgreich";
?>
<a href="index.php"> Zurück zur Startseite </a>
<?php

include('content.php');
include('footer.php');
?>
