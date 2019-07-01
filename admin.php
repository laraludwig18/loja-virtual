<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php include "head.php"; ?>
  <link href="css/navbar.css" rel="stylesheet">
  <link href="css/admin.css" rel="stylesheet">
</head>

<body>
  <?php 
        session_start();
        if(!$_SESSION["admin"]) return header("Location: login.php");
        include "navbar.php"; 
    ?>
  <div class="container">
    <div class="row main-container">
      <div class="header-search">
        <input class="form-control search" id="input-search" type="text" placeholder="Pesquisar por nome"
          aria-label="Search">
        <button id="add-product" class="btn rounded-circle btn-primary btn-lg">+</button>
      </div>
      <table id="table" class="table table-hover table-responsive-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Autor</th>
            <th scope="col">Quantidade estoque</th>
            <th scope="col">Preço</th>
            <th scope="col">Alterar</th>
            <th scope="col">Remover</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
  </div>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="js/admin.js"></script>

</html>