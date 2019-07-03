<?php 
include "email-service.class.php";
include "../contato.php";
include "../controllers/contact-controller";

class ContactService {
    private $emailService = null;
 
    public function __construct(){
         $this->emailService = new EmailService();
    }
    public function sendMessage($contact) {
        $nome = $contact["name"];
        $email = $contact["email"];
        $mensagem = $contact["mensagem"];
       
        $message = "Por: {$nome}<br>E-mail: {$email}<br>Mensagem: {$mensagem}";       
 
        $hasSend = $this->emailService->sendEmail("thiaggoulart@gmail.com", $message);
        return $hasSend;
    }
 }
 ?>