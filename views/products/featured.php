<div class="title-main">
  <h2>Featured Products</h2> <hr>
</div>

<div class="container-product">
<?php while ($prod = $list->fetch_object()):?>
  <div class="article-product">
    <a href="<?=basic_url?>Product/fullProduct&id=<?=$prod->id?>">
      <img src="uploads/<?=$prod->img?>" alt="product image" srcset="">
    </a>
    <p>
      <span><?=$prod->name?></span>
       <p><?=$prod->price?>€</p>
       <a href="<?=basic_url?>Car/add&id=<?=$prod->id?>">BUY</a>
    </p>
  </div>
<?php endwhile;?>
  
</div><!--CLOSE CONTAINER PRODUCT-->
   
  


