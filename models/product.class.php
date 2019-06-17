<?php
class Product {
    private $productId;
    private $name;
    private $author;
    private $description;
    private $category;
    private $quantity;
    private $price;
    private $imageUrl;
    private $creationDate;

    public function __construct() {}
    public function __destruct() {}
    
    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = $value;
    }  
}