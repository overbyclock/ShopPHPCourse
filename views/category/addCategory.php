<h1>Add category</h1>
<?php if(isset($addCategory)):?>
<?=$addCategory?>
<?php endif; ?>
<form action="<?=basic_url?>Category/addCategory" method="post">
  <label for="name">Category name</label>
  <input type="text" name="name" id="">
  <input type="submit" value="submit">
</form>