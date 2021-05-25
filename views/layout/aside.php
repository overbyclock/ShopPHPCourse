    
<aside id="aside">
    <?php if(isset($_SESSION['loginError'])):?>
    <?=$_SESSION['loginError']?>
    <?php endif; ?>
    <?php if(isset($_SESSION['user'])):?>
      <div id="login">
      <?='Welcome '.$_SESSION['user']->name
                              .' '.$_SESSION['user']->lastName?>
      </div>
      
    <?php endif; ?>

    <?php if(!isset($_SESSION['user'])):?>
    <div id="login">WEB LOGIN</div>
    <form action="<?=basic_url.'User/login'?>" method="post">
      <label for="email" class="form-field" >Email:</label>
      <input type="email" class="form-field"  name="email" id="">
      <label for="pass" class="form-field" >Password:</label>
      <input type="password" class="form-field"  name="pass" id="">
      <input type="submit" class="form-field" name="submit" value="Submit">
    </form>
    <?php endif;?>
    <div class="options">
      <ul>
        <?php if(isset($_SESSION['admin']) && isset($_SESSION['user'])):?>
       <li><a href="<?=basic_url.'Category/index'?>">Manage categories</a></li>
       <li><a href="<?=basic_url.'Product/manageProducts'?>">Manage products</a></li>
       <li><a href="<?=basic_url.'Order/getAll'?>">Manage Orders</a></li>
       <?php endif;?>
       <?php if(isset($_SESSION['user']) && empty($_SESSION['admin'])):?>
        <li><a href="<?=basic_url.'Order/getByUser&userID='.$_SESSION['user']->id?>">My Orders</a></li>
       <?php endif; ?>
       <?php if(!isset($_SESSION['user'])):?>
       <li><a href="<?=basic_url.'User/registerUser'?>">Sign up</a></li>
       <?php endif; ?>
       <li><a href="<?=basic_url.'User/logoutUser'?>">Log out</a></li>
      </ul>
    </div>
  </aside>
  <div class="main">

  <?php if(isset($_SESSION['loginError'])){Utils::deleteSession('loginError');}?>


  