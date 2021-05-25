<h1>Shopping Cart</h1>
<table class="table">
  <tr>
    <th>IMG</th> 
    <th>Name</th>
    <th>Price</th>
    <th>Units</th>
    <th>Actions</th>
  </tr>
  <?php $total = 0?>
  <?php foreach($_SESSION['car'] as $key => $value):?>
    <tr>
      <td><img class="imgTable" src="../uploads/<?=$_SESSION['car'][$key]['img']?>"></td>
      <td><?=$_SESSION['car'][$key]['name']?></td>
      <td><?=$_SESSION['car'][$key]['price']?>€</td>
      <td><?=$_SESSION['car'][$key]['units']?></td>
      <td><a href="<?=basic_url?>Car/remove&id=<?=$_SESSION['car'][$key]['id']?>">Remove</a></td>
    </tr>
    <?php $total += $_SESSION['car'][$key]['units'] * $_SESSION['car'][$key]['price'];  ?>
  <?php endforeach;?>
  <?php $_SESSION['total'] = $total;?>
  <tr>
    <td>TOTAL</td>
    <td><?=$total?>€</td>
    <td><a href="<?=basic_url?>Order/complete">Complete order</a></td>
    <td><a href="<?=basic_url?>Car/delete">Delete Cart</a></td>
  </tr>

</table>