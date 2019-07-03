<?php
    include '../services/payment-receipt-service.class.php';
    
    $content = trim(file_get_contents("php://input"));
    $paymentReceipt = json_decode($content, true);

    $paymentReceiptService = new PaymentReceiptService();
    
    $paymentReceiptService->decreaseQuantity($paymentReceipt["shoppingCartList"]);
    $hasSend = $paymentReceiptService->sendPaymentReceipt($paymentReceipt["shoppingCartList"], $paymentReceipt["total"]);

    if($hasSend) {
        echo json_encode(array('code' => 200)); 
    } else {
        echo json_encode(array('code' => 400)); 
    }

   