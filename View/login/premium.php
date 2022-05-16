<?php
session_start();
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Premium</title>
            <link href="style.css" rel="stylesheet" media="all" type="text/css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=EB+Garamond&family=Teko:wght@300&display=swap" rel="stylesheet">
        </head>

        <body>
            <div class="paragraphe">
            <?php  
                if (isset($_SESSION['loginusers'])){
                    echo'<h2>Accès premium</h2>
                    <h5>Version intégrales et téléchargement gratuit</h5>';
                }
                else{
                    echo'<h2>Accès standard</h2>
                    <h5>Inscrivez-vous pour une écoute illimitée ainsi que des téléchargements gratuits</h5>';
                }
            ?>
            </div>
            <!--une boîte qui contient tous les morceaux-->
        <div class="bloc">
            <!--div qui contient un seul morceau + bouton-->
        <div class="lignes">
            <div>
                <figure>
                <figcaption>Staco - Ethereum (Original Mix)</figcaption>
                    <?php  
                        if (isset($_SESSION['loginusers'])){
                            echo'<audio controls src="audio/Ethereum.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                        else{
                            echo '<audio controls src="audio/Ethereum_preview.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                    ?>
                </figure>
            </div>
            <div>
                <?php  
                    if (isset($_SESSION['loginusers'])){
                        echo'<div class="download"><a href="audio/Ethereum.mp3" class="bouton" download="Staco_-_Ethereum_(Original_Mix)">TELECHARGER</a></div>';
                    }
                    else{
                        echo'<div><a href ="inscription.php" class="bouton">INSCRIPTION</a></div>';
                    }
                ?>
            </div>
        </div>
        <!--div qui contient un seul morceau + bouton-->
        <div class="lignes">
            <div>
                <figure>
                <figcaption>Staco - Road Trip (Original Mix)</figcaption>
                    <?php  
                        if (isset($_SESSION['loginusers'])){
                            echo'<audio controls src="audio/Road_Trip.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                        else{
                            echo '<audio controls src="audio/Road_Trip_preview.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                    ?>
                </figure>
            </div>
            <div>
                <?php  
                    if (isset($_SESSION['loginusers'])){
                        echo'<div class="download"><a href="audio/Road_Trip.mp3" class="bouton" download="Staco_-_Road_Trip_(Original_Mix)">TELECHARGER</a></div>';
                    }
                    else{
                        echo'<div><a href ="inscription.php" class="bouton">INSCRIPTION</a></div>';
                    }
                ?>
            </div>
        </div>
        <!--div qui contient un seul morceau + bouton-->
        <div class="lignes">
            <div>
                <figure>
                <figcaption>Staco - Colony (Original Mix)</figcaption>
                    <?php  
                        if (isset($_SESSION['loginusers'])){
                            echo'<audio controls src="audio/Colony.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                        else{
                            echo '<audio controls src="audio/Colony_preview.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                    ?>
                </figure>
            </div>
            <div>
                <?php  
                    if (isset($_SESSION['loginusers'])){
                        echo'<div class="download"><a href="audio/Colony.mp3" class="bouton" download="Staco_-_Colony_(Original_Mix)">TELECHARGER</a></div>';
                    }
                    else{
                        echo'<div><a href ="inscription.php" class="bouton">INSCRIPTION</a></div>';
                    }
                ?>
            </div>
        </div>
        <!--div qui contient un seul morceau + bouton-->
        <div class="lignes">
            <div>
                <figure>
                <figcaption>Staco Feat Aurora - Dance On The Moon (Original Mix)</figcaption>
                    <?php  
                        if (isset($_SESSION['loginusers'])){
                            echo'<audio controls src="audio/Dance_On_The_Moon.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                        else{
                            echo '<audio controls src="audio/Dance_On_The_Moon_preview.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                    ?>
                </figure>
            </div>
            <div>
                <?php  
                    if (isset($_SESSION['loginusers'])){
                        echo'<div class="download"><a href="audio/Dance_On_The_Moon.mp3" class="bouton" download="Staco_Feat_Aurora_-_Dance_On_The_Moon_(Original_Mix)">TELECHARGER</a></div>';
                    }
                    else{
                        echo'<div><a href ="inscription.php" class="bouton">INSCRIPTION</a></div>';
                    }
                ?>
            </div>
        </div>
        <!--div qui contient un seul morceau + bouton-->
        <div class="lignes">
            <div>
                <figure>
                <figcaption>Staco - My Stayle (Original Mix)</figcaption>
                    <?php  
                        if (isset($_SESSION['loginusers'])){
                            echo'<audio controls src="audio/MySTAYLE.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                        else{
                            echo '<audio controls src="audio/MySTAYLE_preview.mp3">  Your browser does not support the
                            <code>audio</code> element.
                            </audio>';
                        }
                    ?>
                </figure>
            </div>
            <div>
                <?php  
                    if (isset($_SESSION['loginusers'])){
                        echo'<div class="download"><a href="audio/MySTAYLE.mp3" class="bouton" download="Staco_-_My_Stayle_(Original_Mix)">TELECHARGER</a></div>';
                    }
                    else{
                        echo'<div class="download"><a href ="inscription.php" class="bouton">INSCRIPTION</a></div>';
                    }
                ?>
            </div>
        </div>
        </div>
        <!--liens vers menu sous les players-->
        <div class="status">
            <?php  
                if (isset($_SESSION['login'])){
                    echo'<div><a href="session_destroy.php" class="lien">Fermer la session</a></div>';
                    echo'&nbsp;&nbsp;|&nbsp;&nbsp;';
                    echo'<div><a href="compte.php" class="lien">Mon compte</a></div>';
                }
                else{
                    echo'<a href="connexion.php" class="lien">Connexion</a>';
                }
            ?>
        <div>
            <br>
        </body>
    </html>