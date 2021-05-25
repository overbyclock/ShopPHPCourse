<h1>FORM TO COMPLETE ORDER</h1>

<?php if(isset($_SESSION['user'])):?>
<form action="<?=basic_url?>Order/add" class="order" method="post">
  <div class="container">
    <div class="order"> 
      <label for="city">City</label>
      <input type="text" name="city" id="" value="Zaragoza">
    </div>
    <div class="order">
      <label for="address">Address</label>
      <input type="text" name="address" id="" value="Meridiano 26">
    </div>
    <div class="order">
      <label for="postalCode">Postal Code</label>
      <input type="number" name="postalCode" id="" value="50016">
    </div>
    <div class="order">
      <input type="submit" value="submit" name="submit">
    </div>
    <div>TOTAL: <?=$_SESSION['total']?>€</div>
  </div>
</form>  
 <?php endif; ?>

 <?php if(!isset($_SESSION['user'])):?>
  <h3>Please Login to continue</h3>
 <?php endif;?>

