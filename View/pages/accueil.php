<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('./View/includes/head.php'); ?>
    </head>
    <div id="header">
        <?php include('./View/includes/navbar.php'); ?>
    </div>
    <?php include('./View/includes/carousel.php'); ?>
<div class="pageBody">

     <div class="introduction">
         <h1>Welcome to my new website</h1>
         <p>I'm passionated about music, no matter the style: electronic, house, techno, rock... I pratice DJ and music composition on synths, grooveboxes and DAWs since about 15 years. I even practice singing, guitar , piano, and drums sometimes, when I get some available time.</p>
         <p>I went back to school 2 years ago, in order to learn development and informatics, and it can help to promote my songs. I manage to gather here all my mixes , compositions, and discoveries.</p>
         <p>Don't forget to create your account , on login page. Once connected, I will offer you the ability to listen the full version of my on-project and exclusive homemade tracks. Once registed, you'll be able to download the tracks in very good quality (wav) and to have a special offer on my special album.</p>
         <p>Thank you for your interest and good visit!
        </p>
    </div>

    <div class="container">
        <div class="jumbotron">
            <h1></h1>
        </div>
        <div class="row">
            <div class="col12 col-md-4">
                <a href="./mixes.php">
                <div class="article card">
                    <img class="card-img-top" src="public/images/accueil/breakfeast4.jpg" alt="image1">
                    <div class="card-body">
                        <h5 class="card-title">Breakfeast In Paris Vol.4 Mixed By Staco</h5>
                        <p class="card-text">All the best Chicago & UK House tracks gathered in a powerful mix, made especially for warm ups and parties</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col12 col-md-4"">
                <a href="./tracks.php">
                <div class="article card">
                    <img class="card-img-top" src="./public/images/accueil/stacogrooves.jpg" alt="image2">
                    <div class="card-body">
                        <h5 class="card-title">Staco Grooves</h5>
                        <p class="card-text">All the releases from Staco, a growing up database of rare songs. Get 30 extended songs for the special price of 9.90$ and become the DJ who makes the difference</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col12 col-md-4"">
                <a href="./mixes.php">
                <div class="article card">
                    <img class="card-img-top" src="./public/images/accueil/chillout.png" alt="image3">
                    <div class="card-body">
                        <h5 class="card-title">Chill Out Energy</h5>
                        <p class="card-text">More than 30 chapters and more than 40 hours of progressive house and Trance mixes, for workout, studies or travel, available for download</p>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    </div>
    <?php include('./View/includes/footer.php'); ?>
    <?php include('./public/js/scripts.php'); ?>
    </body>
</html>