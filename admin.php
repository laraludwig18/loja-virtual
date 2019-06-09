<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include "head.php"; ?>
</head>

<body>
    <?php 
        session_start();
        if(!$_SESSION["admin"]) return header("Location: login.php");
    ?>
    <h1>Admin</h1>
</body>
<?php include "scripts.php"; ?>

</html>