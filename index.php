<?php
    session_start();
    if(isset($_SESSION["client"])) {
        return header("Location: home.php");
    } else if(isset($_SESSION["admin"])) {
        return header("Location: admin.php");
    }
    include "login.php";
?>