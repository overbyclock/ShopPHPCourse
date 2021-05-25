<?php 

class OrderProduct{
  private $id;
  private $orderID;
  private $productID;
  private $units;

  public function __construct(){
    $this->connectDatabase = Database::connectDB();
  }
  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function getOrderID(){
    return $this->orderID;
  }
  public function setOrderID($orderID){
    $this->orderID = $orderID;
  }
  public function getProductID(){
    return $this->productID;
  }
  public function setProductID($productID){
    $this->productID = $productID;
  }
  public function getUnits(){
    return $this->units;
  }
  public function setUnits($units){
    $this->units = $units;
  }
  public function add($orderID,$productID,$units){
    $sql = "INSERT INTO order_product 
            VALUES(
              null,
              $orderID,
              $productID,
              $units
            )";
    $add = $this->connectDatabase->query($sql);
    if($add){
      return Utils::succesMsg('Order complete');
    }else{
      return Utils::errorMsg('Error, the order have a problem');
    }
  }
}

