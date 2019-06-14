<?php
require '../persistence/databaseconnection.class.php';
class ProductDAO {
    private $connection = null;

	public function __construct(){
		$this->connection = databaseconnection::getInstance();
	}
    public function __destruct(){}

    public function createProduct($p){
        try {
            $stat = $this->connection->prepare(
                "insert into product(productId, name, description, category, quantity, price, imageUrl, creationDate) values(null,?,?,?,?,?,?,null);");
                
            $stat->bindValue(1,$p->name);
            $stat->bindValue(2,$p->description);
            $stat->bindValue(3,$p->category);
            $stat->bindValue(4,$p->quantity);
            $stat->bindValue(5,$p->price);
            $stat->bindValue(6,$p->imageUrl);
            $stat->execute();
            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Erro ao cadastrar!".$exc;
        }
    }

    public function getProducts(){
        try{
            $stat = $this->connection->query("select * from product");
            return $stat->fetchAll(PDO::FETCH_ASSOC); 
        } catch (Exception $ex) {
            echo "Erro ao buscar produto!".$ex;
        }
    }
}