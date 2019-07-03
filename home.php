<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php include "head.php"; ?>
  <link href="css/navbar.css" rel="stylesheet">
  <link href="css/home.css" rel="stylesheet">
</head>

<body>
  <?php 
        session_start();
        if(!$_SESSION["client"]) return header("Location: login.php");
        include "navbar.php"; 
    ?>
  <div class="container-fluid">
    <div class="row my-4">

      <div class="col-lg-3">
        <div id="category-group" class="list-group">
          <a href="home.php" class="list-group-item category-item selected">Todas</a>
          <a id="hqs" href="home.php?category=hqs" class="list-group-item category-item">HQs</a>
          <a id="brasileira" href="home.php?category=brasileira" class="list-group-item category-item">Literatura
            Brasileira</a>
          <a id="estrangeira" href="home.php?category=estrangeira" class="list-group-item category-item">Literatura
            Estrangeira</a>
          <a id="politica" href="home.php?category=politica" class="list-group-item category-item">Política</a>
          <a id="romance" href="home.php?category=romance" class="list-group-item category-item">Romance</a>
          <a id="suspense" href="home.php?category=suspense" class="list-group-item category-item">Suspense</a>
          <a id="terror" href="home.php?category=terror" class="list-group-item category-item">Terror</a>
        </div>
      </div>

      <div class="col-lg-9 d-flex flex-column">
        <input id="input-search" class="form-control search" type="text" placeholder="Pesquisar" aria-label="Search">
        <div class="container-cards" id="container-cards">
        </div>
      </div>

    </div>
  </div>

  <?php include "footer.php"; ?>
</body>
<?php include "scripts.php"; ?>

<script type="text/javascript" src="js/home.js"></script>

</html>