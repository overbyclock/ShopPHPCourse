<?php

class Utils{
 public static function deleteSession($name){
    if(isset($_SESSION[$name])){
      unset($_SESSION[$name]);
      $msg = "Session ".$name." closed";
      return Utils::succesMsg($msg);
    }else{
      $msg = "Session ".$name." does not exists";
      return Utils::errorMsg($msg);
    }
  }
  public static function succesMsg($msg){
    $res = '<h3 class="succes-msg">'.$msg.'</h3>';
    return $res;
  }
  
  public static function errorMsg($msg){
    $res = '<h3 class="error-msg">'.$msg.'</h3>';
    return $res;
  }
  public static function validateFormRegisterUser($name,$lastName,$email,$pass){
    $rexName = "/^[a-zA-Záéíóúñ]{3,25}$/";
    $rexPass = "/[a-zA-Z0-9]{5,10}/";
    $validationControl = array('error' =>array(),'sucess'=>array());
    
    if(!preg_match($rexName,$name)){
      $msgError = 'Only letters and min 3 max 25';
      $validationControl['error']['name']= $msgError;
    }

    if(!preg_match($rexName,$lastName)){
      $msgError = 'Only letters and min 3 max 25';
      $validationControl['error']['lastName'] = $msgError;
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $msgError = 'The email is not valid';
      $validationControl['error']['email'] = $msgError;
    }

    if(!preg_match($rexPass,$pass)){
      $msgError = 'Only letters and numbers min 5 max 10';
      $validationControl['error']['pass'] = $msgError;
    }
    
    return $validationControl;
  }
  public static function isAdmin(){
    if(!isset($_SESSION['admin'])){
      header('Location:'.basic_url);
    }
  }
  public static function showCategories(){
    require_once 'models/Category.php';
    $category = new Category;
    $listCategories = $category->getCategories();
    return $listCategories;
  }  
}  
   
  