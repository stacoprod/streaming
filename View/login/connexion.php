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
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <?php include('../includes/head-login.php'); ?>
    </head>
    <body>
    <!--Logo pour revenir au site-->
        <div class="retour-accueil">
            <a href="../../index.php"><img src="../../public/images/STACOPRODMUSIC.png" alt="Logo Staco"></a>
        </div>
            <?php
                #si tous les champs sont remplis
                if(isset ($_POST) && isset ($_POST['login']) && isset ($_POST['motdepasse'])){
                    #on parcours la table pour voir si le login existe:
                    $db = connexionBase();
                    $erreurs=[];
                    $comparaisonLogin = $db->prepare('SELECT count(*) FROM users WHERE pseudo LIKE :pseudo');
                    $comparaisonLogin->bindValue('pseudo', $_POST['login']);
                    $comparaisonLogin->execute();
                    $comparaisonLogin = $comparaisonLogin->fetch(PDO::FETCH_NUM);
                    if ($comparaisonLogin[0] == 1){
                        #on compare le mot de passe:
                        $donneesUser = $db->prepare('SELECT * FROM users_infos ui LEFT JOIN users u ON ui.id = u.id
                                                            WHERE pseudo LIKE :pseudo');
                        $donneesUser->bindValue('pseudo', $_POST['login']);
                        $donneesUser->execute();
                        $donneesUser = $donneesUser->fetch(PDO::FETCH_ASSOC);
                        $passwordHash=hash('sha512',$_POST['motdepasse']);
                        if ($donneesUser['password'] == $passwordHash) {
                            $_SESSION['id'] = $donneesUser['id'];
                            $_SESSION['login'] = $donneesUser['pseudo'];
                            $_SESSION['firstname'] = $donneesUser['first_name'];
                            $_SESSION['lastname'] = $donneesUser['last_name'];
                            $_SESSION['mail'] = $donneesUser['mail'];
                            $_SESSION['phone'] = $donneesUser['phone'];
                            $_SESSION['registerdate'] = $donneesUser['register_date'];
                            $_SESSION['birthday'] = $donneesUser['birthday'];

                        } else {
                            $erreurs['motdepasse'] = 'Error of login, try again';
                        }
                    }
                    else {
                        $erreurs['login'] = 'Error of login, try again';
                    }
                }
            ?>
    <?php if (!isset($_SESSION['login'])):?>
        <h5>Please enter your login and password:</h5>
            <form method="post" action="connexion.php">
                <div class = container>
                    <fieldset>
                            <label for="login">Login</label>
                            <input type="text" name="login" id="login" placeholder="" required><br><br>
                            
                            <label for="motdepasse">Mot de passe</label>
                            <input type="password" name="motdepasse" id="motdepasse" placeholder="" required><br><br>
                            
                            <input type="submit" class="boutonfin" value="Send">
                    </fieldset>
                </div>
            </form>
            <!--Si erreurs, on affiche dans une div-->
    <?php if (isset($erreurs)) {
                    echo'<div class ="error">';
                    foreach ($erreurs as $erreur) {
                        echo ($erreur . "\n");
                    }
                    echo'</div>';
                }
            ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['login'])):?>
    <div class="frame-text-login">
        <?php
        echo'<h5>Welcome, '.$_SESSION['login'].', and thank you for your visit</h5>';
        ?>
        <!--2 boutons intermédiaires-->
        <div class="container-boutons">
            <a class="bouton" href="../../tracks.php">CONTINUE</a>
            <a class="bouton" href="./compte.php">ACCOUNT</a>
        </div>
    </div>
    <br>
    <?php endif; ?>
    <?php include('../includes/footer-login.php'); ?>
    <?php include('../../public/js/scripts.php'); ?>
        </body>
    </html>