<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('./View/includes/head.php'); ?>
    </head>
    <body>
    <div id="header">
        <?php include('./View/includes/navbar.php'); ?>
    </div>

    <div class="logobanner">
        <img class="shoplogo" src="./public/images/shop/shoplogo.png" alt="image1">
    </div>

    <div class="container">
        <div class="jumbotron">
            <h1></h1>
        </div>
        <div class="row">
            <div class="col12 col-md-4">
                <a href="./View/pages/mixes.php">
                    <div class="article card">
                        <img class="card-img-top" src="./public/images/shop/tshirtmen.png" alt="image1">
                        <div class="card-body">
                            <h5 class="card-title">Chill Out Energy T-shirt for Man - Royal Blue</h5>
                            <p class="card-text">Order now / Size S,M,L,XL</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col12 col-md-4"">
            <a href="./View/pages/tracks.php">
                <div class="card">
                    <img class="card-img-top" src="./public/images/shop/tshirtwomen.png" alt="image2">
                    <div class="article card-body">
                        <h5 class="card-title">Staco Prod T-shirt for Woman - Sideral Grey</h5>
                        <p class="card-text">Order now / Size S,M,L</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col12 col-md-4"">
        <a href="./View/pages/mixes.php">
            <div class="card">
                <img class="card-img-top" src="./public/images/shop/cap.png" alt="image3">
                <div class="article card-body">
                    <h5 class="card-title">Staco Prod Cap - White with Blue Logo</h5>
                    <p class="card-text">Order Now</p>
                </div>
            </div>
        </a>
    </div>
    </div>
    </div>
    <?php include('./View/includes/footer.php'); ?>
    <?php include('./public/js/scripts.php'); ?>
    </body>
</html>