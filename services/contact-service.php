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
    public function sendMessage() {
        echo "teste";
        $message = "<h3>Mensagem</h3>";
        $message .= "Por: " $nome "\n <br />"
        "E-mail: " $email "\n <br />"
        "Mensagem: " $mensagem "\n <br />";       
 
       $hasSend = $this->emailService->sendEmail("thiaggoulart@gmail.com",$message);
       return $hasSend;
    }
 }
 ?>