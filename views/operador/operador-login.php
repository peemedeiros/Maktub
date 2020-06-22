<?php
    $error = 'd-none';

    if(isset($_GET['invalid']))
        $error = 'd-block';
?>

<!DOCTYPE html>
<html lang="en">
     <?php require_once('operador-headers.php')?>
     <body>
          <div id="main-operadores">
               <div id="wallpaper">

               </div>

               <div id="section-login">
                    <div class="login-box">
                         <form class="formulario" action="actions/operador-logar.php" method="POST">
                              <h4> Entrar no Painel do operador</h4>

                              <div class="alert alert-danger <?=$error?>" role="alert">
                              Operador não encontrado!
                              </div>
                              <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" name="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                              <small id="emailHelp" class="form-text text-muted">Entre com o email do operador.</small>
                              </div>
                              <div class="form-group">
                              <label for="exampleInputPassword1">Senha</label>
                              <input type="password" name="senha" class="form-control" required id="exampleInputPassword1">
                              </div>
                              
                              <button type="submit" name="btn-login" class="btn btn-primary">Entrar</button>
                              <a href="../../index.php" class="btn btn-warning">Voltar</a>
                         </form>
                    </div>
               </div>
          </div>
               
     </body>
</html>