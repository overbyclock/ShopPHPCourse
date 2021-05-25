<?php $product = $showProduct->fetch_object()?>
<div class="container">
  <h1 class="title-form">Form to EDIT a Product</h1>
  <form action="<?=basic_url?>Product/editProduct&id=<?=$product->id?>" method="post" class="form form-product" enctype="multipart/form-data">
  
    <div class="container-block">
      <label for="name">Name</label>
      <input type="text" name="name" id="" value="<?=$product->name?>">
    
      <label for="description">Description</label>
      <textarea name="description" id="" cols="30" rows="10"><?=$product->description?></textarea>

      <label for="price">Price</label>
      <input type="number" name="price" id="" value="<?=$product->price?>">

      <label for="stock">Stock</label>
      <input type="number" name="stock" id="" value="<?=$product->stock?>">
    </div>
    
    <div class="container-inline">
      <div class="container-radio">
       <label>Sale:</label>
       <label for="sale">YES</label>
       <input type="radio" name="sale" value="yes" <?php if($product->sale == 'yes'){echo "checked";}?>>
       <label for="sale">NO</label>
       <input type="radio" name="sale" value="no" <?php if($product->sale == 'no'){echo "checked";}?>>
      </div>
     
      <div class="container-img">
        <label for="img">Image</label>
        <input type="file" name="img" id="" value="<?=$product->img?>"><?=$product->img?>
      </div>
      
      <div class="container-select">
        <select name="category" id="">
          <option value="0">Select an option</option>
          <?php while ($category = $listCategories->fetch_object()):?>
          <option value="<?=$category->id?>" <?php if($category->id == $product->id){ echo "selected";}?> >
            <?=$category->name?>
          </option>
         <?php endwhile;?>
       </select> 
      </div>
    </div>
    <div class="submitButton">
      <input type="submit" class="submit" name="submit" value="submit">
    </div>
    
  </form>

</div>