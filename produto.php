<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include "head.php"; ?>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/produto.css" rel="stylesheet">
</head>

<body class="d-flex flex-column justify-content-between">
    <?php 
        session_start();
        if(!$_SESSION["client"]) return header("Location: login.php");
        include "navbar.php"; 
    ?>
    <div class="container">
        <div id="row" class="row d-flex flex-column align-items-center">

        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="js/detailProduct.js"></script>

</html>