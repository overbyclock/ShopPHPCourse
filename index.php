<?php session_start();                      ?>
<?php require_once('config/parameters.php');?>
<?php require_once('config/Database.php');  ?>
<?php require_once('helpers/Utils.php')     ?>

<!-------------------- HEADER--------------------------->

<?php require_once('views/layout/header.php');?>

<!------------------------------------------------------->
  
<!----------------------ASIDE---------------------------->

<?php require_once('views/layout/aside.php')?>

<!------------------------------------------------------->

<?php
require_once('autoload.php');

if(isset($_GET['controller']) && isset($_GET['method'])){
    
    $nameController = $_GET['controller'].'Controller';

    if(class_exists($nameController)){
      $controller = new $nameController;
      echo '<p>Controller :'.$nameController.' is loaded</p>';
        if(method_exists($controller,$_GET['method'])){
          echo '<p>The method : '.$_GET['method'].' is loaded</p>';
          $method = $_GET['method'];
          $controller->$method();
          
        }else{
            $msg = '<p>Method : '.$_GET['method'].' not exists</p>';
            showError($msg);
        }
    }else{
        $msg ="</p>The class controller : ".$nameController.' not exists</p>';
        showError($msg);
    }
}else{
  
  $nameController = controller_default;
  $nameMethod     = method_default;
  $controller = new $nameController;
  $controller->$nameMethod();
  
}

function showError($msg){

  $error = new ErrorController;
  $error->index($msg);
}

?>

<!-----------------------------FOOTER------------------------------------------>
 
<?php require_once('views/layout/footer.php');?>

<!------------------------------------------------------------------------------>
