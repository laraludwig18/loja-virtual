<?php
    include '../services/contact-service.php';   
    $content = trim(file_get_contents("php://input"));
    $contact = json_decode($content, true);
    
    $contactService = new ContactService();
    $hasSend = $contactService->sendMessage($contact);
?>