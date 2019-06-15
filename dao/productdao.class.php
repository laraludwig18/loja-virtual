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
                "insert into product(productId, name, author, description, category, quantity, price, imageUrl, creationDate) values(null,?,?,?,?,?,?,?,null);");
                
            $stat->bindValue(1,$p->name);
            $stat->bindValue(2,$p->author);
            $stat->bindValue(3,$p->description);
            $stat->bindValue(4,$p->category);
            $stat->bindValue(5,$p->quantity);
            $stat->bindValue(6,$p->price);
            $stat->bindValue(7,$p->imageUrl);
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

    public function removeProduct($productId){
        try{
            $stat = $this->connection->prepare("delete from product where productId = ?");
            $stat->bindValue(1, $productId);
            $stat->execute();
        }catch (PDOException $exc){
            echo "Erro ao excluir produto".$exc;
        }//fecha catch
    } 
}