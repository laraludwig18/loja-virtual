<?php 
   include '../dao/shoppingcartdao.class.php';
class ShoppingCartService {
   private $scDAO = null;

   public function __construct(){
		$this->scDAO = new ShoppingCartDAO();
	}
   
   public function get($clientId) {
      return $this->scDAO->get($clientId);
   }

//    public function removeProduct($productId) {
//       return $this->pDAO->removeProduct($productId);
//    }

   public function add($shoppingCart) {
      return $this->scDAO->add($shoppingCart);
   }

//    public function changeProduct($p, $changeFile) {
//       if($changeFile){
//          $this->pDAO->changeFile($p);
//       }
//       return $this->pDAO->changeProduct($p);
//    }
}