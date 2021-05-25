
<div> <h1><?=$resProduct->name?></h1></div>

<div><img class="fullImg" src="../uploads/<?=$resProduct->img?>" alt=""></div>

<div><p><?=$resProduct->description?></p></div>

<div><p><?=$resProduct->price?>€</p></div>

<a href="<?=basic_url?>Car/add&id=<?=$resProduct->id?>">BUY</a>


