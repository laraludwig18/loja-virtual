<?php
class ShoppingCart {
    private $clientId;
    private $productId;
    private $quantity;

    public function __construct() {}
    public function __destruct() {}
    
    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = $value;
    }  
}