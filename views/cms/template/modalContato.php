<?php
     require_once('../../../functions/conexao.php');
     $conexao = conexaoMysql();

     $id = (int) 0;
     $nome = (String)"";
     $contato = (String)"";
     $email = (String)"";
     $obs = (String)"";
     $status = (int) 0;
     $visualizado = (String) "";

     if(isset($_POST['modo'])){
          if(strtoupper($_POST['modo']) == "VER"){
               
               $id = $_POST['id'];

               $SQL = "SELECT * FROM contato WHERE id = ".$id;
               $SELECT = mysqli_query($conexao, $SQL);

               if($rsConsulta = mysqli_fetch_array($SELECT)){

                    $nome = $rsConsulta['nome'];
                    $contato = $rsConsulta['contato'];
                    $email = $rsConsulta['email'];
                    $obs = $rsConsulta['obs'];
                    $status = $rsConsulta['status'];

                    if($status == 1)
                         $visualizado = "sended.png";
                    else
                         $visualizado = "visualized.png";

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
          <h6 class="mb-4">Mensagem de <?=$nome?> <img class="visualizado-icone" src="../../assets/img/<?=$visualizado?>" /></h6>
          <form action="actions/cms-visualizar-contato.php?modo=sigle&contato=<?=$id?>" method="POST">

            <div class="form-group row">
                <label for="inputContato" class="col-sm-2 col-form-label">Contato</label>
                <div class="col-sm-10">
                        <input type="text" name="contato" value="<?=$contato?>" class="form-control" readonly id="inputContato">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                        <input type="email" name="email" value="<?=$email?>" class="form-control" readonly id="inputEmail" >
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensagem</label>
                <textarea class="form-control resize-none" id="exampleFormControlTextarea1" readonly><?=$obs?></textarea>
            </div>

            <div class="form-group row ">
                <div class="form-inline">
                        <button type="button" class="btn btn-danger  fechar mr-2">Fechar</button>
                        <button type="submit" name="btn-visualizar-contato" class="btn btn-success  mr-2">Marcar como visualizado</button>
                        <button type="submit" name="btn-desvizualizar-contato" class="btn btn-warning ">Desmarcar como visualizado</button>
                </div>
            </div>
        </form>
               
     </body>
</html>

