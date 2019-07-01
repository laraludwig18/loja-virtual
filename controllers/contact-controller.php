<?php
    include '../services/contact-service.php';   

    $contactService = new ContactService();
    $contactService->sendMessage();
?>