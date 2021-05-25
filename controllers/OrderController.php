<?php 
require_once('models/Order.php');
require_once('models/OrderProduct.php');
class OrderController{
  public function index(){
    echo "Order controller index OK";
  }
  public function complete(){
    
    require_once('views/orders/complete.php');
  }
  public function add(){
    if(isset($_POST['submit'])){
      $userID     = $_SESSION['user']->id;
      $city       = $_POST['city'];
      $address    = $_POST['address'];
      $postalCode = $_POST['postalCode'];
      $total      = $_SESSION['total'];
      
      $order = new Order;
      $res = $order->add($userID,$city,$address,$postalCode,$total);
      if($res){
        $orderID = $order->getLast($userID)->fetch_object();

        if($orderID){
          $orderProduct = new OrderProduct;
          foreach ($_SESSION['car'] as $key => $value) {
            $orderProduct->add(
              $orderID->id,
              $_SESSION['car'][$key]['id'],
              $_SESSION['car'][$key]['units']);
          }
          if($orderProduct){
            echo Utils::succesMsg('Order complete');
            Utils::deleteSession('car');
            header('Refresh:3 ; url='.basic_url);
          }else{
            echo Utils::errorMsg('Error, repeat the order');
          }
        }
      }else{
        return $res;
      }
    }
  }
  public function getAll(){
    $order = new Order;
    $orders = $order->getAll();
    
    require_once('views/orders/listOrders.php');
  }
  public function edit(){
    $order = new Order;
    if(isset($_GET['id'])){
      $getOne = $order->getOne($_GET['id'])->fetch_object();
    }
    if(isset($_POST['submit'])){
      $id = $_GET['id'];
      $address = $_POST['address'];
      $postalCode = $_POST['postalCode'];
      $state = $_POST['state'];
      $edit = $order->edit($id,$address,$postalCode,$state);
      echo $edit;
    }
   
    require_once('views/orders/edit.php');
  }
  public function remove(){
    $order = new Order;
    if(isset($_GET['id'])){
      $remove = $order->remove($_GET['id']);
      echo $remove;
    }
  }
  public function getByUser(){
    $order = new Order;
    
    if(isset($_GET['userID'])){
      $getByUser = $order->getByUser($_GET['userID']);
    }
    require_once('views/orders/getByUser.php');
  }
}