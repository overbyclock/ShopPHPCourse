<h1>Manage Categories</h1>

<div class="buttonContainer">
  <a class="button" href="<?=basic_url?>Category/addCategory">ADD CATEGORY</a>
</div>
<table class="table">
  <tr>
    <th>ID</th>
    <th>NAME</th>
  </tr> 
 
<?php while($category = $categories->fetch_object()):?>
  <tr>
    <td><?=$category->id?></td>
    <td><?=$category->name?></td>
  </tr>
   
<?php endwhile;?>

</table>