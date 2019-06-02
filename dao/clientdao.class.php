<?php
require '../persistence/databaseconnection.class.php';
class ClientDAO {
    private $connection = null;

	public function __construct(){
		$this->connection = databaseconnection::getInstance();
	}
    public function __destruct(){}

    public function createClient($c){
        try {
            $stat = $this->connection->prepare(
                "insert into client(clientId, name, email, phoneNumber, birthDate, cpf, address, password) values(null,?,?,?,?,?,?,?);");
                
            $stat->bindValue(1,$c->name);
            $stat->bindValue(2,$c->email);
            $stat->bindValue(3,$c->phoneNumber);
            $stat->bindValue(4,$c->birthDate);
            $stat->bindValue(5,$c->cpf);
            $stat->bindValue(6,$c->address);
            $stat->bindValue(7,$c->password);
            $stat->execute();
            $this->connection = null;
        } catch (PDOException $exc) {
            echo "Erro ao cadastrar!".$exc;
        }
    }
}