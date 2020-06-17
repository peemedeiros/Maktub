<?php
     require_once('../../../functions/conexao.php');
     $conexao = conexaoMysql();

     $id = (int)0;
     $nome = (String)"";
     $email = (String)"";

     if(isset($_POST['modo'])){
          if(strtoupper($_POST['modo']) == "EDITAR"){
               
               $id = $_POST['id'];

               $SQL = "SELECT * FROM operador WHERE id = ".$id;
               $SELECT = mysqli_query($conexao, $SQL);

               if($rsConsulta = mysqli_fetch_array($SELECT)){

                    $nome = $rsConsulta['nome'];
                    $email = $rsConsulta['email'];

               } else {
                    echo("erro ". $SQL);
               }
          }
     }


?>

<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <script src="../../../assets/js/jquery.js"></script>
          <script>
               $('.fechar').click(function(){
                    $('#container-modal2').css({
                        visibility:'hidden',
                        opacity:'0',
                        zIndex:'-1'
                    });
                });
          </script>
     </head>
     <body>
          <h4 class="mb-4">Novo operador</h4>
          <form action="actions/cms-cadastrar-operador.php" method="POST">

          <div class="form-group row">
               <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
               <div class="col-sm-10">
                    <input type="text" name="nome" value="<?=$nome?>" class="form-control" id="inputNome" required>
               </div>
          </div>

          <div class="form-group row">
               <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
               <div class="col-sm-10">
                    <input type="email" name="email" value="<?=$email?>" class="form-control" id="inputEmail" required>
                    <small id="emailHelp" class="form-text text-muted">Este email será utilizado no login</small>
               </div>
          </div>

          <div class="form-group row">
               <label for="inputSenha" class="col-sm-2 col-form-label">Senha</label>
               <div class="col-sm-10">
                    <input type="password" name="senha" class="form-control" id="inputSenha" required>
               </div>
          </div>

          <div class="form-group row ">
               <div class="col-sm-10 ">
                    <button type="button" class="btn btn-danger fechar">Fechar</button>
                    <button type="submit" name="btn-cadastrar-operador" class="btn btn-success">Cadastrar</button>
               </div>
          </div>
          </form>
               
     </body>
</html>

