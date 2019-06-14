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
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div id="pesquisa">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </div>
                <div class="row" id="row">
                </div>
            </div>
        </div>
    </div>
    <footer class="py-4 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; by: Lara Ludwig e Thiago Goulart</p>
        </div>
    </footer>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="js/getProducts.js"></script>

</html>