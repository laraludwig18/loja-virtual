<?php
    include '../model/client.class.php';
    include '../dao/clientdao.class.php';

    $c = new Client();
    $c->name = $_POST['name'];
    $c->email = $_POST['email'];
    $c->phoneNumber = $_POST['phoneNumber'];
    $c->birthDate = $_POST['birthDate'];
    $c->cpf = $_POST['cpf'];    
    $c->address = $_POST['address']; 
    $c->password = $_POST['password'];         
                    
    $cDAO = new ClientDAO();
    $cDAO->createClient($c);
    header("location:../login.php");        