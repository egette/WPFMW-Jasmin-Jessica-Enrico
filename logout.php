<main>
<?php
session_start();
session_destroy();
include('header.php');
include('navi.php');
include('content.php');
 echo "Logout erfolgreich";
?>
<a href="index.php"> Zurück zur Startseite </a>
</main>
<?php
include('footer.php');
?>
