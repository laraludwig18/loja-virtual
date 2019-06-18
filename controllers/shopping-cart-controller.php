<?php
    session_start();
    include '../models/shoppingcart.class.php';
    include '../services/shopping-cart-service.class.php';
    $content = trim(file_get_contents("php://input"));
    $shoppingCart = json_decode($content, true);

    $shoppingCartService = new ShoppingCartService();
    $clientId = $_SESSION["client"];

    switch($_GET["op"]){
        case "post":
            $sc = new ShoppingCart();
            $sc->productId = $shoppingCart["productId"];
            $sc->clientId = $clientId;
            $sc->quantity = 1;

            $shoppingCartService->add($sc);
            echo json_encode(array('code' => 200));    
            break;
        case "get":
            $shoppingCart = $shoppingCartService->get($clientId);
            echo json_encode(array('shoppingCart' => $shoppingCart));    
            break;
    }

   