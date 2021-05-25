<div class="container">
  <h1 class="title-form">Form to add Product</h1>
  <form action="<?=basic_url?>Product/addProduct" method="post" class="form form-product" enctype="multipart/form-data">

    <div class="container-block">
      <label for="name">Name</label>
      <input type="text" name="name" id="">
    
      <label for="description">Description</label>
      <textarea name="description" id="" cols="30" rows="10"></textarea>

      <label for="price">Price</label>
      <input type="number" name="price" id="">

      <label for="stock">Stock</label>
      <input type="number" name="stock" id="">
    </div>
    
    <div class="container-inline">
      <div class="container-radio">
       <label>Sale:</label>
       <label for="sale">YES</label>
       <input type="radio" name="sale" value="yes">
       <label for="sale">NO</label>
       <input type="radio" name="sale" value="no">
      </div>
     
      <div class="container-img">
        <label for="img">Image</label>
        <input type="file" name="img" id="">
      </div>
      
      <div class="container-select">
        <select name="category" id="">
          <option value="0">Select an option</option>
          <?php while ($category = $listCategories->fetch_object()):?>
          <option value="<?=$category->id?>"><?=$category->name?></option>
         <?php endwhile;?>
       </select> 
      </div>
    </div>
    <div class="submitButton">
      <input type="submit" class="submit" name="submit" value="submit">
    </div>
    
  </form>

</div>

