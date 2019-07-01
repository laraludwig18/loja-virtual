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
        <div class="list-group">
          <a href="home.php" class="list-group-item active">Todas</a>
          <a href="home.php?category=hqs" class="list-group-item">HQs</a>
          <a href="home.php?category=brasileira" class="list-group-item">Literatura Brasileira</a>
          <a href="home.php?category=estrangeira" class="list-group-item">Literatura Estrangeira</a>
          <a href="home.php?category=politica" class="list-group-item">Política</a>
          <a href="home.php?category=romance" class="list-group-item">Romance</a>
          <a href="home.php?category=suspense" class="list-group-item">Suspense</a>
          <a href="home.php?category=terror" class="list-group-item">Terror</a>
        </div>

      </div>
      <div class="col-lg-9 d-flex flex-column">
        <input id="input-search" class="form-control search" type="text" placeholder="Pesquisar" aria-label="Search">
        <div class="container-cards" id="container-cards">
        </div>
      </div>
    </div>
    <div>
      <?php include "footer.php"; ?>
    </div>
</body>
<?php include "scripts.php"; ?>

<script type="text/javascript" src="js/home.js"></script>

</html>