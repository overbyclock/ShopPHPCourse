<?php 

class Product{
  private $id;
  private $categoryID;
  private $name;
  private $description;
  private $price;
  private $stock;
  private $sale;
  private $date;
  private $img;

  public function __construct(){
    $this->connectDatabase = Database::connectDB();
  }
  public function getId(){
    return $this->id;
  }
 
  public function setId($id){
    $this->id = $id;
  }

  public function getCategoryID(){
    return $this->categoryID;
  }

  public function setCategoryID($categoryID){
    $this->categoryID = $categoryID;  
  }
  
  public function getName(){
    return $this->name;
  }
  
  public function setName($name){
    $this->name = $name;
  }
  
  public function getDescription(){
    return $this->description;
  }

  public function setDescription($description){
    $this->description = $description;

  }

  public function getPrice(){
    return $this->price;
  }

  public function setPrice($price){
    $this->price = $price;
  }

  public function getStock(){
    return $this->stock;
  }

  public function setStock($stock){
    $this->stock = $stock;
  }

  public function getSale(){
    return $this->sale;
  }

  public function setSale($sale){
    $this->sale = $sale;

  }

  public function getDate(){
    return $this->date;
  }

  public function setDate($date){
    $this->date = $date;
  }

  public function getImg(){
    return $this->img;
  }

  public function setImg($img){
    $this->img = $img;
  }

  public function getAll(){
    $sql = "SELECT * FROM products";
    $products = $this->connectDatabase->query($sql);
    if($products){
      return $products;
    }else{
      return "Error try to get data products";
    }
  }

  public function addProduct(
                            $categoryID ,
                            $name       ,
                            $description,
                            $price      ,
                            $stock      ,  
                            $sale       ,
                            $img){
    $sql = "INSERT INTO products 
            VALUES(null,
                   '$categoryID' ,
                   '$name'       ,
                   '$description',
                   '$price'      ,
                   '$stock'      ,
                   '$sale'       ,
                   CURDATE()     ,
                   '$img')";
    $addProduct = $this->connectDatabase->query($sql);

    if($addProduct){
      return Utils::succesMsg('Complete, add product');
    }else{
      return Utils::errorMsg('Error, the product was not added');
    }
  }
  public function editProduct( 
  $id,  
  $categoryID ,
  $name       ,
  $description,
  $price      ,
  $stock      ,  
  $sale       ,
  $img){
    $sql = "UPDATE products
            SET categoryID  = '$categoryID',
                name        = '$name',
                description = '$description',
                price       = '$price',
                stock       = '$stock',
                sale        = '$sale',
                date        = CURDATE(),
                img         = '$img'
            WHERE id = $id    ";
    
    $editProduct = $this->connectDatabase->query($sql);
    if($editProduct){
      return Utils::succesMsg('Complete, product has been edited');
      header("Refresh: 3; url=".basic_url."/Product/manageProducts");
    }else{
      return Utils::errorMsg('Error, I can not edit a product');
      header('Refresh: 3; url='.basic_url.'/Product/manageProducts');
    }
  }

  public function delProduct($id){
    
    $sql = "DELETE FROM products WHERE id='$id'";
    $delProduct = $this->connectDatabase->query($sql);
    if($delProduct){
      return Utils::succesMsg('Product delete');
    }else{
      return Utils::errorMsg('Error, product was not delete');

    }
  }
  public function showProduct($id){

    $sql = "SELECT * FROM products WHERE id={$id}";
    $showProduct = $this->connectDatabase->query($sql);
   
    if($showProduct){
      return $showProduct;
     
    }else{
      return Utils::errorMsg('Error, I try to find the product');
    
    }
  }
  public function byCategory($id){
    $sql = "SELECT * FROM  products WHERE categoryID = $id";
    $showProducts = $this->connectDatabase->query($sql);
    if($showProducts){
      return $showProducts;
    }else{
      return Utils::errorMsg('Error no products');
    }
  }

}