<?php
require_once('../../../functions/conexao.php');
$conexao = conexaoMysql();

$id = (int) 0;
$pergunta = (String)"";
$resposta = (String)"";
$status = (int) 0;


if(isset($_POST['modo'])){
    if(strtoupper($_POST['modo']) == "RESPONDER"){
        
        $id = $_POST['id'];

        $SQL = "SELECT * FROM faq WHERE id = ".$id;
        $SELECT = mysqli_query($conexao, $SQL);

        if($rsConsulta = mysqli_fetch_array($SELECT)){

            $pergunta = $rsConsulta['pergunta'];
            $resposta = $rsConsulta['resposta'];
            $status = $rsConsulta['status'];

            if($status == 0)
                    $visualizado = "error.png";
            else
                    $visualizado = "tick.png";

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
          <h6 class="mb-4"><?=$pergunta?> <img class="visualizado-icone-2" src="../../assets/img/<?=$visualizado?>" /></h6>
          <form action="actions/cms-faq-responder.php?modo=responder&pergunta=<?=$id?>" method="POST">
            <div class="form-group">
                    <label for="exampleFormControlTextarea1">Resposta</label>
                    <textarea class="form-control resize-none" name="resposta" id="exampleFormControlTextarea1"> <?=$resposta?></textarea>
            </div>

          <div class="form-group row ">
               <div class="col-sm-10 ">
                    <button type="button" class="btn btn-danger fechar">Fechar</button>
                    <button type="submit" name="btn-responder" class="btn btn-success">Responder</button>
               </div>
          </div>
          </form>
               
     </body>
</html>