<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>OverbyWear</title>
  <link rel="stylesheet" href="<?=basic_url?>assets/css/styles.css">
</head>
<body>
<div class="grid-container">
   <!--           HEADER           -->
  <header id=header>
    <div id="logo">
      <img src="<?=basic_url?>assets/img/camiseta.png" alt="logo t-shirt">
      <a id="brand" href="index.php">OverbyWEAR Evolution Style</a>
    </div>
  </header>
  <!--           NAV              -->
  <nav id="nav">
    <ul>
     
      <li><a href="<?=basic_url?>">HOME</a></li>
      <?php $listCategories = Utils::showCategories()?>
      <?php while($category = $listCategories->fetch_object()):?>
      <li><a href="<?=basic_url?>Product/byCategory&id=<?=$category->id?>"><?=$category->name?></a></li>
      <?php endwhile;?>
      <?php $units = 0?>
      <?php if(isset($_SESSION['car'])):?>
        <?php foreach ($_SESSION['car'] as $key => $value) {
         
           $units += $_SESSION['car'][$key]['units'];
         
        }?>
         <li><a href="<?=basic_url?>/Car/index">CART( <?=$units?> )</a></li>
      <?php endif;?>

      <?php if(!isset($_SESSION['car'])):?>
        <li><a href="index.php">SHOPPING CART</a></li>
      <?php endif;?>
     
    </ul>
  </nav>