<?php
require_once('models/Product.php');
require_once('models/Category.php');

class ProductController{
  public function index(){
    $product = new Product;
    $list = $product->getAll();

    require_once('views/products/featured.php');
  }
  public function manageProducts(){
    $product = new Product;
    $products = $product->getAll();
    
    require_once 'views/products/manageProducts.php';
  }
  public function addProduct(){
    $category = new Category;
    $listCategories = $category->getCategories();
    
    $product = new Product;

    if(isset($_POST['submit'])){
      $categoryID  = $_POST['category'];
      $name        = $_POST['name'];
      $description = $_POST['description'];
      $price       = $_POST['price'];
      $stock       = $_POST['stock'];
      $sale        = $_POST['sale'];
      
      $file     = $_FILES['img'];
      $fileName = $file['name'];
      $fileType = $file['type'];

      if($fileType == 'image/jpg' || $fileType == 'image/jpeg'){

        move_uploaded_file($file['tmp_name'],'uploads/'.$fileName);

        $addProduct = $product->addProduct( $categoryID ,
                                            $name       ,
                                            $description,
                                            $price      ,
                                            $stock      ,  
                                            $sale       ,
                                            $fileName   );

        echo $addProduct;
      }else{
        echo Utils::errorMsg('Only jpg or jpeg file');
      }
    }
    require_once 'views/products/addProduct.php';
  }
  public function delProduct(){

    $id = $_GET['id'];
    $product = new Product;
    $result = $product->delProduct($id);
    echo $result;
    header("Refresh: 3; url=".basic_url."Product/manageProducts");

  }
  public function editProduct(){
    
     $id = $_GET['id'];
     $product = new Product;
     $showProduct = $product->showProduct($id);
     $category = new Category;
     $listCategories = $category->getCategories();
   

    if(isset($_POST['submit'])){
      $categoryID  = $_POST['category'];
      $name        = $_POST['name'];
      $description = $_POST['description'];
      $price       = $_POST['price'];
      $stock       = $_POST['stock'];
      $sale        = $_POST['sale'];
      
      $file     = $_FILES['img'];
      $fileName = $file['name'];
      $fileType = $file['type'];

      if($fileType == 'image/jpg' || $fileType == 'image/jpeg'){

        move_uploaded_file($file['tmp_name'],'uploads/'.$fileName);

        $editProduct = $product->editProduct(
                                            $id,         
                                            $categoryID ,
                                            $name       ,
                                            $description,
                                            $price      ,
                                            $stock      ,  
                                            $sale       ,
                                            $fileName   );

        echo $editProduct;
      }else{
        echo Utils::errorMsg('Only jpg or jpeg file');
      }
    }
    require_once 'views/products/editProduct.php';
  }
  public function byCategory(){
    if(isset($_GET['id'])){
      $product = new Product();
      $list = $product->byCategory($_GET['id']);
    }
    require_once 'views/products/byCategory.php';
  }

  public function fullProduct(){

    if(isset($_GET['id'])){
     $product = new Product;
     $id = $_GET['id'];
     $res = $product->showProduct($id);
     $resProduct = $res->fetch_object();
     
    }else{
      Utils::errorMsg("FUCK YOU");
    }
    
    require_once('views/products/fullProduct.php');
  }



}