<?php 

class Order{
  private $id;
  private $userID;
  private $city;
  private $address;
  private $postalCode;
  private $total;
  private $state;
  private $date;
  private $time;

  public function __construct(){
    $this->connectDatabase = Database::connectDB();
  }
  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function getUserID(){
    return $this->userID;
  }
  public function setUserID($userID){
    $this->userID = $userID;
  }
  public function getCity(){
    return $this->city;
  }
  public function setCity($city){
    $this->city = $city;
  }
  public function getAddress(){
    return $this->address;
  }
  public function setAddress($address){
    $this->address = $address;
  }
  public function getPostalCode(){
    return $this->postalCode;
  }
  public function setPostalCode($postalCode){
    $this->postalCode = $postalCode;
  }
  public function getTotal(){
    return $this->total;
  }
  public function setTotal($total){
    $this->total = $total;
  }
  public function getState(){
    return $this->state;
  }
  public function setState($state){
    $this->state = $state;
  }
  public function getDate(){
    return $this->date;
  }
  public function setDate($date){
    $this->date = $date;
  }
  public function getTime(){
    return $this->time;
  }
  public function setTime($time){
    $this->time = $time;
  }
  public function getAll(){
    $sql = "SELECT * FROM orders";
    $getAll = $this->connectDatabase->query($sql);
    if($getAll){
      return $getAll;
    }else{
      return Utils::errorMsg('Error, to try get data from orders');
    }
  }
  public function getOne($id){
    $sql = "SELECT * FROM orders WHERE id = '{$id}'";
    $getOne = $this->connectDatabase->query($sql);
    if($getOne){
      return $getOne;
    }else{
      return Utils::errorMsg('Error, to try get data from orders');
    }
  }
  public function add($userID,$city,$address,$postalCode,$total){
    $sql = "INSERT INTO orders 
            VALUES(
                   null,
                  '{$userID}',
                  '{$city}',
                  '{$address}',
                  '{$postalCode}',
                  '{$total}',
                  'proccess',
                  CURDATE(),
                  CURTIME()
                  )";
    $add = $this->connectDatabase->query($sql);
    if($add){
      return true;
      
    }else{
      return Utils::errorMsg('Error, the order could not be created');
    }
  }
  public function remove($id){
    $sql = "DELETE FROM orders WHERE id = $id";
    $remove = $this->connectDatabase->query($sql);
    if($remove){
      return Utils::succesMsg('Success, the order has been removed');
    }else{
      return Utils::errorMsg('Error, the order could not be removed');
    }
  }
  public function getLast($userID){
    $sql = "SELECT id FROM orders 
            WHERE userID = '{$userID}' 
            ORDER BY date,time DESC LIMIT 1";
    $getLast = $this->connectDatabase->query($sql);
    if($getLast){
      return $getLast;
    }else{
      return false;
    }
  }
  public function edit($id,$address,$postalCode,$state){
    $sql = "UPDATE orders
            SET address    = '$address',
                postalCode = '$postalCode',
                state      = '$state'
            WHERE id = $id";
    $edit = $this->connectDatabase->query($sql);
    if($edit){
      return Utils::succesMsg('Complete, order has been edited');
    }else{
      return Utils::errorMsg('Error, could not edit the order');
    }
  }
  public function getByUser($userID){
    $sql = "SELECT * FROM orders WHERE userID = $userID";
    $getByUser = $this->connectDatabase->query($sql);
    if($getByUser){
      return $getByUser;
    }else{
      return Utils::errorMsg('Error, nothing to show you');
    }
  }
 
}