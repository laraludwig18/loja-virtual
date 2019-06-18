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

   public function filter($filterType, $filter) {
      switch($filterType) {
         case "id":
            $query = "where productId = {$filter}";
            break;
         default: 
            $query = "where {$filterType} like '%{$filter}%'";
      }
      return $this->pDAO->filter($query);
   }
}