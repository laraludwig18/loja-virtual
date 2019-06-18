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
        <div class="row d-flex flex-column justify-content-center">
            <input class="form-control search col-lg-8 col-md-8" type="text" placeholder="Pesquisar"
                aria-label="Search">
            <div class="inner-container" id="container-cards">
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="js/home.js"></script>

</html>