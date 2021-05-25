<?php
class User{
  private $id;
  private $name;
  private $lastName;
  private $email;
  private $pass;
  private $rol;
  private $img;
  private $connectDatabase;

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
    $this->name = $this->connectDatabase->real_escape_string($name);
   
  }
  public function getLastName(){
    return $this->lastName;
  }

  public function setLastName($lastName){
    $this->lastName = $this->connectDatabase->real_escape_string($lastName);

  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $this->connectDatabase->real_escape_string($email);
  }

  public function getpass(){
    return password_hash(
      $this->connectDatabase->
      real_escape_string($this->pass),
      PASSWORD_BCRYPT,['cost' => 4]
     );
  }
  
  public function setpass($pass){
    $this->pass = $pass;
  }
  
  public function getRol(){
    return $this->rol;
  }

  public function setRol($rol){
    $this->rol = $rol;
  }

  public function getImg(){
    return $this->img;
  }

  public function setImg($img){
    $this->img = $img;
  }

  public function addUser(){
    $sql = "INSERT INTO users VALUES( null,
                                     '{$this->getName()}',
                                     '{$this->getLastname()}',
                                     '{$this->getEmail()}',
                                     '{$this->getPass()}',
                                     'user',
                                      null
                                                      );";
    $addUser = $this->connectDatabase->query($sql);
    $result = false;
    if($addUser){
      $result = true;
    }
    return $result;  
  }

  public function loginUser($email,$pass){
    $sql = "SELECT * FROM users 
            WHERE email = '$email'";
    $login = $this->connectDatabase->query($sql);
    
    if($login->num_rows == 1){
      $user = $login->fetch_object();
      if($verify = password_verify($pass,$user->pass)){
        $result = $user;
      }else{
        $result = false;
      }

    }else{
      $result = false;
    }

    return $result;
  }
 
}