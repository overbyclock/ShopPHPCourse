<?php

class Category{
  private $id;
  private $name;

  public function __construct(){
    $this->connectDatabase = Database::connectDB();
  }
  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function getName(){
    return $this->name;
  }
  public function setName($name){
    $this->name = $name;
  }
  public function getCategories(){
    $sql = 'SELECT * FROM categories';
    $categories = $this->connectDatabase->query($sql);
    if($categories){
      return $categories;
    }else{
      return false;
    }
  }
  public function addCategory($name){
    $sql = "INSERT INTO categories VALUES(null,'{$name}')";
    $addCategory = $this->connectDatabase->query($sql);
    if($addCategory){
      return Utils::succesMsg('Complete add category');
    }else{
      return Utils::errorMsg('Error, category did not add');
    }
  }
}