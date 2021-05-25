<div class="container-form-user">

<h1 class="title-form">Register form</h1>

<?php if(isset($_SESSION['register'])):?>
<?=$_SESSION['register'];?>
<?php endif; ?>



<form class="form-register-user" method="post" 
       action="<?=basic_url?>User/addUser">
 
  <label class="label-form-user field-form-user" for="name">Name</label>
  <input class="input-form-user" type="text" name="name" id="" required/>
  <?php if(!empty($_SESSION['error']['name'])):?>
    <?=Utils::errorMsg($_SESSION['error']['name'])?>
  <?php endif; ?>  
  
  <label class="label-form-user field-form-user" for="lastName">Last name</label>
  <input class="input-form-user field-form-user" type="text" name="lastName" id="" required/>
  <?php if(!empty($_SESSION['error']['lastName'])):?>
    <?=Utils::errorMsg($_SESSION['error']['lastName'])?>
  <?php endif; ?>

  <label fclass="label-form-user field-form-user" for="email">Email</label>
  <input class="input-form-user field-form-user" type="email" name="email" id="" required/>
  <?php if(!empty($_SESSION['error']['email'])):?>
    <?=Utils::errorMsg($_SESSION['error']['email'])?>
  <?php endif; ?>

  <label class="label-form-user field-form-user" for="pass">Password</label>
  <input class="input-form-user field-form-user" type="password" name="pass" id="" required/>
  <?php if(!empty($_SESSION['error']['pass'])):?>
    <?=Utils::errorMsg($_SESSION['error']['pass'])?>
  <?php endif; ?>  

  <input class="submit-form-user field-form-user" type="submit" value="SUBMIT">

</form>
</div>

<?php Utils::deleteSession('error')?>
<?php Utils::deleteSession('register')?>