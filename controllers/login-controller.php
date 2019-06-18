<?php
    session_start();
    include '../dao/clientdao.class.php';
     
    $cDAO = new ClientDAO();
    $result = $cDAO->getUser($_POST["email"]);
    $client = empty($result) ? [] : $result[0];

    if(empty($client) || !password_verify($_POST["password"], $client["password"])){
        return header("Location:../login.php?error=true");
    } 
    
    if ($client["type"] === "admin") {
        $_SESSION["admin"] = true;  
        return header("Location:../admin.php");
    } else {
        $_SESSION["client"] = $client["clientId"];  
        return header("Location:../home.php");
    }