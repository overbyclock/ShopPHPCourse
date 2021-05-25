<h1>List of the Orders</h1>
<table class="table tableProduct">
<tr>
  <th>ID</th>
  <th>USER</th>
  <th>CITY</th>
  <th>ADDRESS</th>
  <th>C.P.</th>
  <th>TOTAL</th>
  <th>STATE</th>
  <th>DATE</th>
  <th>TIME</th>
  <th>MANAGE</th>
</tr>
<?php while ($order = $orders->fetch_object()):?>
  <tr>
    <td><?=$order->userID?></td>
    <td><?=$order->city?></td>
    <td><?=$order->address?></td>
    <td><?=$order->postalCode?></td>
    <td><?=$order->total?></td>
    <td><?=$order->state?></td>  
    <td><?=$order->date?></td>
    <td><?=$order->time?></td>
    <td>
      <a href="<?=basic_url?>Order/remove&id=<?=$order->id?>">REMOVE</a>
      <a href="<?=basic_url?>Order/edit&id=<?=$order->id?>">EDIT</a>
      <a href="<?=basic_url?>Order/view&id=<?=$order->id?>">VIEW</a>
    </td>
  </tr>
<?php endwhile;?>

</table>