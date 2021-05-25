<h1>Orders by user</h1>
<table class="table tableProduct">
  <tr>
    <th>ID</th>
    <th>CITY</th>
    <th>ADDRESS</th>
    <th>P.C.</th>
    <th>TOTAL</th>
    <th>STATE</th>
    <th>DATE</th>
    <th>TIME</th>
  </tr>
  <?php while ($userOrder = $getByUser->fetch_object()):?>
  <tr>
    <td><?=$userOrder->id?></td>
    <td><?=$userOrder->city?></td>
    <td><?=$userOrder->address?></td>
    <td><?=$userOrder->postalCode?></td>
    <td><?=$userOrder->total?></td>
    <td><?=$userOrder->state?></td>  
    <td><?=$userOrder->date?></td>
    <td><?=$userOrder->time?></td>
  </tr>
  <?php endwhile;?>  
</table>