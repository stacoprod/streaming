<?php
session_start();
function connexionBase(){
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
function verifMotPasse($string)
{
$hasUpper = false;
$hasLower = false;
$hasSpecial = false;
$hasCount = false;
$hasNumeric = false;

if (strlen($string) >= 8) {
$hasCount = true;
}
for ($i = 0; $i < strlen($string); $i++) {
    if (preg_match('/[^a-zA-Z\d]/', $string[$i])){
        $hasSpecial = true;
    }
    if (ctype_upper($string[$i])) {
        $hasUpper = true;
    }
    if (ctype_lower($string[$i])) {
        $hasLower = true;
    }
    if (is_numeric($string[$i])) {
        $hasNumeric = true;
    }
}
return ($hasUpper && $hasLower && $hasSpecial && $hasCount && $hasNumeric);
}
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Inscription</title>
            <?php include('../includes/head-login.php'); ?>
        </head>
        <body>
        <!--Logo pour revenir au site-->
        <div class="retour-accueil">
            <a href="../../index.php"><img src="../../public/images/STACOPRODMUSIC.png" alt="Logo Staco"></a>
        </div>
            <?php
                #vérification que le formulaire contient des données dans les champs
                if (!empty ($_POST) && !empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["passwordConfirm"]) && !empty($_POST["firstname"]) && !empty($_POST["mail"]) && !empty($_POST["birthday"])) {
                    #récupération heure actuelle:
                    $date = date('Y-m-d');
                    #on réassigne des variables sans PHP, plus maniables pour MYSQL
                    $login = $_POST["login"];
                    $password = $_POST["password"];
                    $firstname = $_POST["firstname"];
                    $lastname = $_POST["lastname"];
                    $mail = $_POST["mail"];
                    $phone = $_POST["phone"];
                    $registerdate = $date;
                    $birthday = $_POST["birthday"];
                    $erreurs=[];
                    if (verifMotPasse($password)) {
                        #on vérifie si les 2 mots de passe matchent:
                        if ($password == $_POST["passwordConfirm"]) {
                            $db = connexionBase();
                            #on parcours la table users pour vérifier si doublon de login et on récupère les données:
                            $select_login = $db->prepare("SELECT pseudo FROM users WHERE pseudo LIKE :pseudo ");
                            $select_login->bindValue('pseudo', $login);
                            $select_login->execute();
                            $resultat1 = $select_login->fetch();
                            #pareil pour users_infos et le mail:
                            $select_mail = $db->prepare("SELECT mail FROM users_infos WHERE mail LIKE :mail");
                            $select_mail->bindValue('mail', $mail);
                            $select_mail->execute();
                            $resultat2 = $select_mail->fetch();
                            #Ensuite, soit on ajoute à la BDD si c'est ok
                            if (!$resultat1 && !$resultat2) {
                                #hashage du mot de passe
                                $passwordHash= hash('sha512', $password);
                                $sql = "INSERT INTO users (pseudo, password) VALUES ('$login', '$passwordHash')";
                                $db->exec($sql);
                                $id = $db->lastInsertId();
                                $sql = "INSERT INTO users_infos (id, first_name, last_name, mail, phone, register_date, birthday,is_donator) VALUES ('$id','$firstname','$lastname','$mail','$phone','$registerdate','$birthday',0)";
                                $db->exec($sql);
                                #garder le login dans la session et rediriger vers une page de confirmation (étape finale)
                                $_SESSION["id"] = $id;
                                $_SESSION["login"] = $login;
                                $_SESSION["firstname"] = $firstname;
                                $_SESSION["mail"] = $mail;
                                $_SESSION["phone"] = $phone;
                            }
                            #soit on affiche un message d\'erreur
                            #login et mail déjà présent
                            #login déjà présent
                            elseif ($resultat1) {
                                $erreurs ['login'] = 'The login ' . $resultat1['pseudo'] . ' already exists';
                            } #mail déjà présent
                            elseif ($resultat2) {
                                $erreurs ['mail'] = 'The mail ' . $resultat2['mail'] . ' is already used';
                            }
                            else {
                                $erreurs ['loginmail'] = 'The login and the mail already exist';
                            }
                        } #et si les MDP ne matchent pas:
                        else {
                            $erreurs ['differentPasswords'] = 'You entered 2 different passwords';
                        }
                    }
                    else {
                        $erreurs ['format'] = 'Your password must contain at least 8 characters with at least one uppercase, one lowercase, one digit and one special character';
                    }
                }?>

        <?php if (!isset($_SESSION['login'])):?>
        <h5>Please register by filling the following form:</h5>
            <form method="post" action="inscription.php">
                <div class = container>
                    <fieldset class="double-fieldset">
                        <div class="section1">
                            <label for="login">Login *</label>
                            <input type="text" name="login" id="login" placeholder="" required></br></br>
                            
                            <label for="password">Password *</label>
                            <input type="password" name="password" id="password" placeholder="" required></br></br>

                            <label for="motdepasseConfirm">Confirm password*</label>
                            <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="" required></br></br>

                            <label for="firstname">First name *</label>
                            <input type="text" name="firstname" id="firstname" placeholder="" required></br></br>
                        </div>
                        <div class="section2">
                            <label for="lastname">Last name</label>
                            <input type="text" name="lastname" id="lastname" placeholder=""></br></br>
                            
                            <label for="mail">Mail *</label>
                            <input type="email" name="mail" id="mail" placeholder="" required></br></br>

                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" placeholder=""></br></br>

                            <label for="birthday">Birthday</label>
                            <input type="date" name="birthday" id="birthday" placeholder="" required></br></br>
                            </br>
                            <input type="submit" class="boutonfin" value="Send">
                        </div>
                    </fieldset>
                    <p>Please fill all the required (*) fields</p>
                </div>
            </form>
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