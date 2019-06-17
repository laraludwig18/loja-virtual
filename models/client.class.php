<?php
class Client {
    private $clientId;
    private $name;
    private $email;
    private $phoneNumber;
    private $birthDate;
    private $cpf;
    private $address;
    private $password;

    public function __construct() {}
    public function __destruct() {}
    
    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = $value;
    }  
}