<?php 
require_once('models/Product.php');
class CarController{
  public function index(){
    echo "Order controller index OK";
    require_once('views/orders/index.php');
    
  }
  public function add(){
  
    if($_GET['id']){
      $id = $_GET['id'];
      $productObject = new Product;
      $car = new CarController;
      $prod = $productObject->showProduct($id)->fetch_object();
      $price     = $prod->price;
      $productID = $prod->id;
      $img       = $prod->img;
      $name      = $prod->name;
      $control = true;
 
      if(isset($_SESSION['car'])){
       foreach ($_SESSION['car'] as $key => $value) {
         if($value['id'] == $productID){
           $_SESSION['car'][$key]['units'] ++;
           $control = false;
         }
       }
       if($control){
        $car->addCar($productID,$img,$name,$price);
       }
     }else{
       $car->addCar($productID,$img,$name,$price);
     }
   }

   header('Location:'.basic_url);
  
  }  
  public function remove(){

  if(isset($_GET['id'])){
    if(isset($_SESSION['car'])){
      foreach ($_SESSION['car'] as $key => $value) {
        if($_SESSION['car'][$key]['id'] == $_GET['id']){
          unset($_SESSION['car'][$key]);
        }
      }
    }
  }
  header('Location:'.basic_url.'Car/index');
}
  public function delete(){
    Utils::deleteSession('car');
    header('Location:'.basic_url);
  }
  public function addCar($productID,$img,$name,$price){
    $_SESSION['car'][] = array(
      "id"   =>$productID,
      "img"  =>$img,
      "name" =>$name,
      "price"=>$price,
      "units" =>1
    );
   
  }
  
}