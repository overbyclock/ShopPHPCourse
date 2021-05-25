<h1>Edit order</h1>
  <form class="container-block" action="<?=basic_url?>Order/edit&id=<?=$getOne->id?>" method="post">
    <label for="address">Address</label>
    <input type="text" name="address" id="" value="<?=$getOne->address?>">
    <label for="postalCode">Postal Code</label>
    <input type="number" name="postalCode" id="" value="<?=$getOne->postalCode?>">
    <label for="state">State</label>
    <input type="text" name="state" id="" value="<?=$getOne->state?>">
    <input type="submit" name="submit" value="submit">
  </form>
