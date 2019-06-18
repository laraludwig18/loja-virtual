<?php
require '../persistence/databaseconnection.class.php';
class ShoppingCartDAO {
    private $connection = null;

	public function __construct(){
		$this->connection = databaseconnection::getInstance();
	}
    public function __destruct(){}

    public function add($cart){
        try {
            $stat = $this->connection->prepare(
                "insert into shoppingCart(clientId, productId, quantity) values(?,?,?);");
                
            $stat->bindValue(1,$cart->clientId);
            $stat->bindValue(2,$cart->productId);
            $stat->bindValue(3,$cart->quantity);
            $stat->execute();
            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Erro ao adicionar no carrinho!".$exc;
        }
    }

    public function get($clientId){
        try{
            $stat = $this->connection->query("select shoppingCart.quantity, product.name, product.imageUrl, product.price from product inner join shoppingCart on shoppingCart.productId = product.productId where shoppingCart.clientId = {$clientId};");
            return $stat->fetchAll(PDO::FETCH_ASSOC); 
        } catch (Exception $ex) {
            echo "Erro ao buscar produto!".$ex;
        }
    }
}