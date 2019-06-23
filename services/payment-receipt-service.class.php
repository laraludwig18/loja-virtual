<?php 
include "email-service.class.php";
class PaymentReceiptService {
   private $emailService = null;

   public function __construct(){
		$this->emailService = new EmailService();
	}
   public function sendPaymentReceipt($products, $total) {
      $message = "<html><div><h3>Recibo produtos: </h3>";
      foreach ($products as $key => $product) {
         $value = $product["price"] * $product["quantity"];
         $message .= "<div><p>Nome: {$product["name"]}</p> <p>Quantidade: {$product["quantity"]}</p> <p>Valor: R$ {$value}</p> </div><br/>";
      };
      $message .= "<h4>Valor total: R$ {$total}</h4></div></html>";

      $hasSend = $this->emailService->sendEmail("laraludwig18@gmail.com", $message);
      return $hasSend;
   }
}