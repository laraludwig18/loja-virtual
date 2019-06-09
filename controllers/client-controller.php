<?php
    include '../model/client.class.php';
    include '../dao/clientdao.class.php';
    $content = trim(file_get_contents("php://input"));
    $client = json_decode($content, true);

    $c = new Client();
    $c->name = $client['name'];
    $c->email = $client['email'];
    $c->phoneNumber = $client['phoneNumber'];
    $c->birthDate = $client['birthDate'];
    $c->cpf = $client['cpf'];    
    $c->address = $client['address']; 
    $c->password = password_hash($client['password'], PASSWORD_DEFAULT);       
                    
    $cDAO = new ClientDAO();
    $result = $cDAO->getUser($c->email);

    if(!empty($result)) {
        echo json_encode(array('code' => 400, 'errorMessage' => "Email já cadastrado em outra conta"));    
        exit();
    }

    $cDAO->createClient($c);
    
    echo json_encode(array('code' => 200));    