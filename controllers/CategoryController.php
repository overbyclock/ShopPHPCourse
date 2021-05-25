<?php
require_once('models/Category.php');
class CategoryController{
  public function index(){

    Utils::isAdmin();
    
    $category = new Category;
    $categories = $category->getCategories();

    require_once('views/category/index.php');

  }
  public function addCategory(){

    Utils::isAdmin();

    $category = new Category;

    if(!empty($_POST)){
   
      if($_POST['name'] != ''){
        $addCategory = $category->addCategory($_POST['name']);

      }else{
        $addCategory = Utils::errorMsg('Name category wrong!!');
      }
    }
    require_once('views/category/addCategory.php');
  }
}