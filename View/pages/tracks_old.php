<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('./View/includes/head.php'); ?>
    </head>
    <body>
    <div id="header">
        <?php include('./View/includes/navbar.php'); ?>
    </div>
    <div class="container">
      <h1 class="font-weight-lighter"></h1>
      <table class="table table-striped table-dark table-bordered table-hover">
        <thead class="thead-light">
          <tr class="h5">
              <th></th>
              <th></th>
              <th></th>
          </tr>
        </thead>
        <tbody>
            <?php $files = scandir('./public/music/songs/');
            unset($files[0]);
            unset($files[1]);
            foreach($files as $file) {

                    Source: https://prograide.com/pregunta/71975/comment-demarrer-une-boucle-foreach--un-index-specifique-en-php
                    $string = $file;
                    $patterns = array();
                    $patterns[0] = '/_/';
                    $patterns[1] = '/.mp3/';
                    $patterns[2] = '/.wav/';
                    $patterns[3] = '/.ogg/';
                    $patterns[4] = '/.wma/';
                    $replacements = array();
                    $replacements[0] = ' ';
                    $replacements[1] = '';
                    $replacements[2] = '';
                    $replacements[3] = '';
                    $replacements[4] = '';
                    echo '<tr><td>';
                    echo preg_replace($patterns, $replacements, $string);
                    echo '</td><td><figure><audio controls src="./public/music/songs/' . $file . '">  Your browser does not support the <code>audio</code> element.</audio></figure></td>';
                    echo '<td><figure>';
                    if (isset($_SESSION['login'])) {
                        echo '<span class="download"><a href="./public/music/songs/' . $file . '" class="bouton" download="'.$file.'">DOWNLOAD</a></span>';
                    } else {
                        echo '<span class="download"><span class="bouton-off">DOWNLOAD</span></span></figure></td></tr>';
                    }
                }
            ?>
        </tbody>
      </table>
    </div>
    <?php include('./View/includes/footer.php'); ?>
    <?php include('./public/js/scripts.php'); ?>
    </body>
</html>