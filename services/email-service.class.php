<?php 
include '../PHPMailer/PHPMailerAutoload.php';
class EmailService {
  private $mail = null;

  public function __construct(){
		$this->mail = new PHPMailer();
	}
   public function sendEmail($to, $message) {
      $this->mail->isSMTP();
      $this->mail->Host = 'smtp.gmail.com';
      $this->mail->Port = 587;
      $this->mail->SMTPSecure = 'tls';
      $this->mail->SMTPAuth = true;
      $this->mail->Username = "lojalivrosweb2@gmail.com";
      $this->mail->Password = "123456*a";

      $this->mail->setFrom("lojalivrosweb2@gmail.com");
      $this->mail->addAddress($to);
      $this->mail->Subject = "Contato via site";
      $this->mail->msgHTML($message);
        
      return json_decode($this->mail->send());
   }
}