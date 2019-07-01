<?php 
   include '../dao/productdao.class.php';
   class ProductService {
      private $pDAO = null;

      public function __construct(){
         $this->pDAO = new ProductDAO();
      }
      
      public function getProducts() {
         return $this->pDAO->getProducts();
      }

      public function removeProduct($productId) {
         return $this->pDAO->removeProduct($productId);
      }

      public function createProduct($p) {
         return $this->pDAO->createProduct($p);
      }

      public function changeProduct($p, $changeFile) {
         if($changeFile){
            $this->pDAO->changeFile($p);
         }
         return $this->pDAO->changeProduct($p);
      }

      public function filter($filterType, $filter, $category="") {
         switch($filterType) {
            case "ids":
               $arrayIds = json_decode($filter);
               $query = "WHERE productId IN (".implode(',',$arrayIds).")"; 
               break;
            case "id":
               $query = "WHERE productId = {$filter}";
               break;
            default: 
               $query = isset($category)
               ? "WHERE category LIKE '%{$category}%' and {$filterType} LIKE '%{$filter}%'"
               : "WHERE {$filterType} LIKE '%{$filter}%'";
         }
         return $this->pDAO->filter($query);
      }
   }