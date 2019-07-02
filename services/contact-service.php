<?php 
include "email-service.class.php";
include "../contato.php";
$nome = $_POST['tfNome'];
$email = $_POST['tfEmail'];
$mensagem = $_POST['tfMensagem'];

class ContactService {
    private $emailService = null;
 
    public function __construct(){
         $this->emailService = new EmailService();
    }
    public function sendMessage($msg) {
        $message = "<h3>Mensagem</h3>";
        $message .= "Por: {$nome}<br>E-mail: {$email}<br>Mensagem: {$mensagem}";       
 
       $hasSend = $this->emailService->sendEmail("thiaggoulart@gmail.com",$message);
       return $hasSend;
    }
 }
 ?>