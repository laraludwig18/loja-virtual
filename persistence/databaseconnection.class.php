<?php
class DatabaseConnection extends PDO{
	
   private static $instance=null;
	
   public function DatabaseConnection($dsn,$user,$password){
		parent::__construct($dsn,$user,$password);
   }
	
   public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
  		        self::$instance = new DatabaseConnection("mysql:dbname=bookstore;host=localhost", "root", "");
                //self::$instancia->exec("set names utf8");
            }catch(Exception $e){
                echo 'Erro ao conectar! '.$e;
                exit();				
		    }
	    }
	    return self::$instance;
   }
}