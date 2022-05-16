<?php
session_start();
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include('../includes/head-login.php'); ?>
        <title>Login</title>
    </head>
    <body>
        <!--Logo pour revenir au site-->
        <div class="retour-accueil">
            <a href="../../index.php"><img src="../../public/images/STACOPRODMUSIC" alt="Logo Staco"></a>
        </div>
        <div class="frame-text-login">
        <h5>Join the community now, and get exclusive offers:</h5>
        <!--2 boutons intermédiaires-->
        <div class="container-boutons">
            <a class="bouton" href="connexion.php">LOGIN</a>
            <a class="bouton" href="inscription.php">REGISTER</a>
        </div>
        </div>


        <br>

        <?php include('../includes/footer-login.php'); ?>
        <?php include('../../public/js/scripts.php'); ?>
    </body>
    </html>