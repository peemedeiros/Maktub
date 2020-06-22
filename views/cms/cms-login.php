<?php
    $error = 'd-none';

    if(isset($_GET['invalid']))
        $error = 'd-block';
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once('cms-headers.php') ?>
    <body>
        <div class="section-login">
            <div class="login-box">
                <form class="formulario" action="actions/cms-logar.php" method="POST">
                    <h4> Entrar no CMS</h4>

                    <div class="alert alert-danger <?=$error?>" role="alert">
                        Usuario não encontrado!
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Entre com seu email de administrador.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" name="btn-login" class="btn btn-primary">Entrar</button>
                    <a href="../../index.php" class="btn btn-warning">Voltar</a>
                </form>
            </div>
        </div>
    </body>
</html>