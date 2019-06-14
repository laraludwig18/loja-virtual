<?php
    include '../model/product.class.php';
    include '../dao/productdao.class.php';

    if($_GET["op"] == "get"){
        $pDAO = new ProductDAO();
        $products = $pDAO->getProducts();
        echo json_encode(array('products' => $products)); 
        exit();
    }
    
    $CLIENT_ID = "9744a1494c6651d";
    $image = $_FILES["file"]["tmp_name"];
    $handle = fopen($image, "r");
    $data = fread($handle, filesize($image));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $CLIENT_ID));
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($data)));

    $reply = curl_exec($ch);
    curl_close($ch);

    $apiResponse = json_decode($reply);

    if(!$apiResponse->success) exit();

    $c = new Product();
    $c->name = $_POST['name'];
    $c->description = $_POST['description'];
    $c->category = $_POST['category'];
    $c->quantity = $_POST['quantity'];
    $c->price = $_POST['price'];
    $c->imageUrl = $apiResponse->data->link;    

    $pDAO = new ProductDAO();
    $pDAO->createProduct($c);
    
    echo json_encode(array('product' => $c->imageUrl)); 

    

    