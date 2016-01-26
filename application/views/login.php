
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<div id="body"  >
    <div class="container">
        <form class="form-signin" action="<?php echo base_url("login/doLogin"); ?>" method="POST">
            <h2 class="form-signin-heading">Login:</h2><br/>

           <input type="text" class="form-control" placeholder="Usuario" name="user">
           <br/>
           <input type="password" placeholder="Contraseña" class="form-control" name="password">

           <span class="login_error">
            <?if(isset($errorMsg)) :?>
             <?=($errorMsg == "BAD_USER") ? "(- Usuario incorrecto)" : (($errorMsg == "BAD_PASS") ? "(- Contraseña incorrecta)" : "") ;?>
          <?endif;?>

           </span>

          <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
        </form>
    </div>

</div>
