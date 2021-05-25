<div class="title-main">
  <h2>Produts by category</h2> <hr>
</div>

<div class="container-product">
<?php while ($prod = $list->fetch_object()):?>
  <div class="article-product">
    <img src="../uploads/<?=$prod->img?>" alt="product image" srcset="">
    <p>
      <span><?=$prod->name?></span>
       <p><?=$prod->price?>€</p>
       <a href="#">BUY</a>
    </p>
  </div>
<?php endwhile;?>
  
</div><!--CLOSE CONTAINER PRODUCT-->