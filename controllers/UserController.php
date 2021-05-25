<?php
require_once('models/User.php');
class Usercontroller{
  public function index(){
    echo "User controller index OK";
  }
  public function registerUser(){
    require_once('views/users/register.php');
  }
  public function addUser(){
    if(isset($_POST)){

      $validationControl = 
      Utils::validateFormRegisterUser($_POST['name'],
                                      $_POST['lastName'],
                                      $_POST['email'],
                                      $_POST['pass']);
      if(count($validationControl['error']) == 0){
        $user = new User();
        $user->setName($_POST['name']);
        $user->setLastName($_POST['lastName']);
        $user->setEmail($_POST['email']);
        $user->setPass($_POST['pass']);
        $adduser = $user->addUser();

        if($adduser){
          $_SESSION['register'] = Utils::succesMsg('Complete add user :)');
          header('Location:'.basic_url.'User/registerUser');
        }else{
          $_SESSION['register'] = Utils::errorMsg('Error, I can not register the user :(');
          header('Location:'.basic_url.'User/registerUser');
        }
      }else{
          $_SESSION['error'] = $validationControl['error'];
          header('Location:'.basic_url.'User/registerUser');
        }
     
    }else{
      $_SESSION['register'] = Utils::errorMsg('Error, I can not found form data :(');
      header('Location:'.basic_url.'User/registerUser');
    }
  }
  public function login(){
    if(isset($_POST)){
      $email = trim($_POST['email']);
      $pass  = trim($_POST['pass']);
      $user = new User;
      $result = $user->loginUser($email,$pass);

      if($result){
        $_SESSION['user'] = $result;
        if($_SESSION['user']->rol == 'admin'){
          $_SESSION['admin'] = true;
        }
        Utils::deleteSession('loginError');

      }else{
        $msg = 'Login Error';
        $_SESSION['loginError'] = Utils::errorMsg($msg);
      }

    }else{
      echo "no data";
    }
    header('Location:'.basic_url);
  }
  public function logoutUser(){
    Utils::deleteSession('user');
    Utils::deleteSession('admin');
    header('Location:'.basic_url);
  }
}