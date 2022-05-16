<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('./View/includes/head.php'); ?>
    <link href="./public/css/tracks.css" rel="stylesheet" />
</head>
<body>
<div id="header">
    <?php include('./View/includes/navbar.php'); ?>
</div>

<div class="body-tracks">
<div class="container">
    <h1 class="font-weight-lighter"></h1>
    <table class="table table-striped table-dark table-bordered table-hover">
        <thead class="thead-light">
        <tr class="h5">
        </tr>
        </thead>
        <tbody>
        <?php $files = scandir('./public/music/');
        $playlist = [];
        unset($files[0]);
        unset($files[1]);
        $i=-1;
        foreach($files as $file) {
            $i++;
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
            $image=preg_replace($patterns[2], $replacements[2], $string);
            if (isset($_SESSION['login'])){
                $path='music';
            } else {
                $path='previews';
            }
            echo '<tr class="line" id="line'.$i.'" onclick="playByLine('.$i.')">
            <td><img src="./public/images/'.$image.'.jpg" alt="music-cover" class="cover-mini"/></td>
            <td>';
            echo preg_replace($patterns, $replacements, $string);
            echo '</td><audio src="./public/music/' . $file . '">  Your browser does not support the <code>audio</code> element.</audio>';
            echo '<td><figure>';
            if (isset($_SESSION['login'])) {
                echo '<span class="download"><a href="./public/music/' . $file . '" class="bouton" download="'.$file.'">DOWNLOAD</a></span>';
            } else {
                echo '<span class="download"><span class="bouton-off">DOWNLOAD</span></span></figure></td></tr>';
            }
        }

        ?>
        <tr><td class="endline"></td><td class="endline"></td><td class="endline"></td></tr>
        </tbody>
    </table>
</div>
    <div class="container">
    <table class="table table-striped table-dark table-bordered table-hover">
        <thead class="thead-light">
        <tr class="h5">
        </tr>
        </thead>
        <tbody>
        <!--<div class="img-banner">
            <img src="./public/images/Da_Funk_Rocker.jpg" alt="music-cover" id="cover" />
        </div>-->
        <div class="music-container" id="music-container">
            <div class="music-info">
                <h4 id="title"></h4>
                <div class="progress-container" id="progress-container">
                    <div class="progress" id="progress"></div>
                </div>
            </div>

            <audio src="./public/music/Da_Funk_Rocker" id="audio"></audio>

            <div class="img-container">
                <img src="./public/images/Da_Funk_Rocker.jpg" alt="music-cover" id="cover" class="reduceDiameter"/>
                <img src="./public/images/vynil1.png" alt="music-cover" id="cover" />
            </div>
            <div class="navigation">
                <button id="prev" class="action-btn">
                    <i class="fas fa-backward"></i>
                </button>
                <button id="play" class="action-btn action-btn-big">
                    <i class="fas fa-play"></i>
                </button>
                <button id="next" class="action-btn">
                    <i class="fas fa-forward"></i>
                </button>
                <div class="volume-container" id="volume-container">
                    <div class="volume" id="volume"></div>
                </div>
            </div>
        </div>
        </tbody>
    </table>
</div>

</div>
<?php include('./View/includes/footer.php'); ?>
<?php include('./public/js/scripts.php'); ?>
<script> var path = <?php echo json_encode($path); ?>;</script>
<script src="./public/js/tracks.js"></script>

</body>
</html>