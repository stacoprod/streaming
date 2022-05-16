<?php if (isset($_SESSION['login'])) {
    echo('<span class="hello-connected">Hello, ' . $_SESSION['login'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="./View/login/session_destroy.php">Close session</a></span>');
} ?>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php"><img src="./public/images/STACOPRODMUSIC" alt="Logo Staco"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="menuPrincipal mx-auto navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="./index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./tracks.php">TRACKS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./mixes.php">MIXES</a>
        </li>
          <?php
          if (isset($_SESSION['login'])){
              echo('<li class="nav-item">
                        <a class="nav-link active" href="./View/login/compte.php">ACCOUNT</a>
                     </li>');
          }
          else {
              echo('<li class="nav-item">
                          <a class="nav-link active" href="./View/login/connexion-inscription">LOGIN</a>
                    </li><br>');
          }

          ?>
      </ul>
    </div>
  </div>
</nav>