<h1>Manage Products</h1>

<div class="buttonContainer">
  <a class="button" href="<?=basic_url?>Product/addProduct">ADD Product</a>
</div>
<table class="table tableProduct">
  <tr>
    
    <th>NAME</th>
    <th>DESCRIPTION</th>
    <th>PRICE</th>
    <th>STOCK</th>
    <th>DATE</th>
    <th>IMG</th>
    <th>ACTIONS</th>
  </tr> 
 
<?php while($product = $products->fetch_object()):?>
  <tr>
    <td><?=$product->name?></td>
    <td><?=$product->description?></td>
    <td><?=$product->price?></td>
    <td><?=$product->stock?></td>
    <td><?=$product->date?></td>
    <td><img class="imgTable" src="../uploads/<?=$product->img?>" alt=""></td>
    <td class="containerTable">
     <p><a class="tableButton delete button" 
           href="<?=basic_url?>Product/delProduct&id=<?=$product->id?>">Delete</a></p>
     
    <p><a class="tableButton edit button"   
          href="<?=basic_url?>Product/editProduct&id=<?=$product->id?>">Edit</a></p>
    </td>
  </tr>
   
<?php endwhile;?>

</table>