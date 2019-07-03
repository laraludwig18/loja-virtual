<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php include "head.php"; ?>
  <link href="css/navbar.css" rel="stylesheet">
  <link href="css/shoppingCart.css" rel="stylesheet">
</head>

<body>
  <?php 
        session_start();
        if(!$_SESSION["client"]) return header("Location: login.php");
        include "navbar.php"; 
    ?>
  <div class="container">
    <div class="row main-container">
      <table id="table" class="table table-responsive-sm">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço unitário</th>
            <th scope="col">Total item</th>
            <th scope="col">Remover</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
          <th scope="col" id="total" colspan="6"></th>
        </tfoot>
      </table>
    </div>
  </div>
  <?php include "footer.php"; ?>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="js/shoppingCart.js"></script>

</html>