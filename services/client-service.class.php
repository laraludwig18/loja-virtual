<?php 
   include '../dao/clientdao.class.php';
   
   class ClientService {
      private $cDAO = null;

      public function __construct(){
         $this->cDAO = new ClientDAO();
      }

      public function createClient($c) {
         return $this->cDAO->createClient($c);
      }
      
      public function filter($filterType, $filter) {
         switch($filterType) {
            case "id":
               $query = "WHERE clientId = {$filter}";
               break;
            default: 
               $query = "WHERE {$filterType} = '{$filter}'";
         }
         return $this->cDAO->filter($query);
      }
   }