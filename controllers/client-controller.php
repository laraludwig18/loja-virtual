<?php
    include '../models/client.class.php';
    include '../services/client-service.class.php';
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
                    
    $clienteService = new ClientService();
    $result = $clienteService->filter("email", $c->email);

    if(!empty($result)) {
        echo json_encode(array('code' => 400, 'errorMessage' => "Email já cadastrado em outra conta"));    
        exit();
    }

    $clienteService->createClient($c);
    
    echo json_encode(array('code' => 200));    