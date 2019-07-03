<?php
    include_once '../persistence/databaseconnection.class.php';
    class ClientDAO {
        private $connection = null;

        public function __construct(){
            $this->connection = databaseconnection::getInstance();
        }
        public function __destruct(){}

        public function createClient($c){
            try {
                $stat = $this->connection->prepare(
                    "insert into client(clientId, name, email, phoneNumber, birthDate, cpf, address, password, type) values(null,?,?,?,?,?,?,?,?);");
                    
                $stat->bindValue(1,$c->name);
                $stat->bindValue(2,$c->email);
                $stat->bindValue(3,$c->phoneNumber);
                $stat->bindValue(4,$c->birthDate);
                $stat->bindValue(5,$c->cpf);
                $stat->bindValue(6,$c->address);
                $stat->bindValue(7,$c->password);
                $stat->bindValue(8,"normal");
                $stat->execute();
                $this->connection = null;
            } catch (PDOException $exc) {
                echo "Erro ao cadastrar!".$exc;
            }
        }

        public function filter($query){
            try{
                $stat = $this->connection->query("select * from client {$query}");
                $array = $stat->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }catch (Exception $exc){
                echo "Erro ao filtrar cliente".$exc;
            }
        }
    }