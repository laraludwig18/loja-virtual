<?php
    session_start();
    include '../services/product-service.class.php';
    include '../services/image-service.class.php';
    include '../models/product.class.php';
    
    $productService = new ProductService();
    
    switch($_GET["op"]){
        case "get": 
            if(isset($_GET["category"]) && isset($_GET["filtertype"]) && isset($_GET["filter"])) {
                $products = $productService->filter($_GET["filtertype"], $_GET["filter"], $_GET["category"]);
            } else if (isset($_GET["filtertype"]) && isset($_GET["filter"])) {
                $products = $productService->filter($_GET["filtertype"], $_GET["filter"]);
            } else {
                $products = $productService->getProducts();
            }

            if(empty($_SESSION["client"])) {
                echo json_encode(array('products' => $products));
            } else {
                echo json_encode(array('products' => $products, 'clientId' => $_SESSION["client"])); 
            }
            
            break;
        case "delete": 
            $productService->removeProduct($_GET["productid"]);
            break;
        case "post":
            $image = $_FILES["file"]["tmp_name"];
            $handle = fopen($image, "r");
            $data = fread($handle, filesize($image));

            $imageService = new ImageService();
            $result = $imageService->saveImage($data);

            if(!$result->success) exit();
        
            $p = new Product();
            $p->name = $_POST['name'];
            $p->author = $_POST['author'];
            $p->description = $_POST['description'];
            $p->category = $_POST['category'];
            $p->quantity = $_POST['quantity'];
            $p->price = $_POST['price'];
            $p->imageUrl = $result->data->link;    
        
            $productService->createProduct($p);
            
            echo json_encode(array('code' => 200)); 
            break;
        case "put":
            $changeFile = isset($_FILES["file"]["tmp_name"]);
            if($changeFile){
                $image = $_FILES["file"]["tmp_name"];
                $handle = fopen($image, "r");
                $data = fread($handle, filesize($image));

                $imageService = new ImageService();
                $result = $imageService->saveImage($data);

                if(!$result->success) exit();
            }   
            
            $p = new Product();
            $p->productId = $_POST['productId'];
            $p->name = $_POST['name'];
            $p->author = $_POST['author'];
            $p->description = $_POST['description'];
            $p->category = $_POST['category'];
            $p->quantity = $_POST['quantity'];
            $p->price = $_POST['price'];

            if($changeFile) {
                $p->imageUrl = $result->data->link;    
            }
        
            $productService->changeProduct($p, $changeFile);
            
            echo json_encode(array('code' => 200)); 
            break;
    }
    
    

    

    