
<html>
    <head>
    </head>
    <body>
        <main>
        <?php 
        session_start();
        include('header.php');
        include('navi.php');
        include('search.php'); 

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

        include('content.php');
        include('footer.php');
        ?>
            </main>
>>>>>>> origin/master
