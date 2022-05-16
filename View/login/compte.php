<?php
session_start();
function connexionBase()
{
$servername = "localhost";
$username = "root";
$password = "";
$nomBase = 'stacoprod';
try {
$db = new PDO("mysql:host=$servername;dbname=$nomBase;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo "Error of connection: " . $e->getMessage();
die();
}
return $db;
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Compte</title>
            <?php include('../includes/head-login.php'); ?>
            <link href="style.css" rel="stylesheet" media="all" type="text/css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=EB+Garamond&family=Teko:wght@300&display=swap" rel="stylesheet">
        </head>
        <!--Logo pour revenir au site-->
        <div class="retour-accueil">
            <a href="../../index.php"><img src="../../public/images/STACOPRODMUSIC.png" alt="Logo Staco"></a>
        </div>
        <body>
                <?php
                    #vérification que le formulaire contient des données dans les champs
                    $erreurs=[];
                    $ok =[];
                    $db = connexionBase();
                    #vérifier si tous les champs contiennent une donnée
                    if(isset ($_POST) && isset($_POST['new-mail']) && isset($_POST['new-phone'])) {
                        #on réassigne des variables sans PHP, plus maniables pour MYSQL
                        $id = $_SESSION['id'];
                        $mail = $_POST['new-mail'];
                        $phone = $_POST['new-phone'];
                        $insertionInfos= $db->prepare("UPDATE users_infos SET mail = :mail, phone = :phone WHERE id = '$id'");
                        $insertionInfos->bindValue('mail', $mail);
                        $insertionInfos->bindValue('phone', $phone);
                        $insertionInfos->execute();
                        #garder le login dans la session et confirmer la mise à jour avec un message
                        $_SESSION['id'] = $id;
                        $_SESSION['mail'] = $mail;
                        $_SESSION['phone'] = $phone;
                        $ok['update'] = "Your contact informations have been updated";
                    }
                ?>
            <!--le formulaire qui contient les données affichées en front grâce à VALUE-->
                <h5>Your contact informations:<br>
                    <?php $donator = $db->prepare("SELECT is_donator FROM users_infos WHERE id LIKE :id");
                        $donator->bindValue('id', $_SESSION['id']);
                        $donator->execute();
                        $donator = $donator->fetch(PDO::FETCH_NUM);
                        if ($donator[0] == 1) {
                        echo 'You\'re a donator, thank you';
                        }?></h5>
                <form method="post" action="compte.php">
                    <div class = "container2">
                        <fieldset>
                                <label for="mail">Mail</label>
                                <input type="email" value="<?= $_SESSION['mail']?>" name="new-mail" id="mail" placeholder=""></br></br>

                                <label for="phone">Phone</label>
                                <input type="text" value ="<?= $_SESSION['phone']?>" name="new-phone" name="phone" id="phone" placeholder=""></br></br>
                                </br>
                                <input type="submit" class="boutonfin" value="Update data">
                        </fieldset>
                    </div>
            </form>
            <?php foreach ($ok as $message) {
                    echo "<div class='ok'>".($message . "\n")."</div>";
                }
            ?>
                <?php include('../includes/footer-login.php'); ?>
                <?php include('../../public/js/scripts.php'); ?>
        </body>
    </html>