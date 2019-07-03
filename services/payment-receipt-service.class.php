<?php 
   session_start();
   include "email-service.class.php";
   include "client-service.class.php";
   include "../dao/productdao.class.php";

   class PaymentReceiptService {
      private $emailService = null;
      private $clientService = null;
      private $pDAO = null;
      
      public function __construct(){
         $this->emailService = new EmailService();
         $this->clientService = new ClientService();
         $this->pDAO = new ProductDAO();
      }
      
      public function sendPaymentReceipt($products, $total) {
         $result = $this->clientService->filter("id", $_SESSION["client"]);
         $to = $result[0]["email"];
         $message = "<html><div><h3>Recibo produtos: </h3>";
         foreach ($products as $key => $product) {
            $value = $product["price"] * $product["quantity"];
            $message .= "<div><p>Nome: {$product["name"]}</p> <p>Quantidade: {$product["quantity"]}</p> <p>Valor: R$ {$value}</p> </div><br/>";
         };
         $message .= "<h4>Valor total: R$ {$total}</h4></div></html>";

         $hasSend = $this->emailService->sendEmail($to, $message);
         return $hasSend;
      }

      public function decreaseQuantity($products) {
         foreach ($products as $product) {
            $this->pDAO->changeQuantity($product["productId"], $product["quantity"]);
         }
      }
   }