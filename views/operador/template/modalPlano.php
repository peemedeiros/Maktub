<?php
     require_once('../../../functions/conexao.php');
     $conexao = conexaoMysql();

     $id = (int)0;
     $nome = (String)"";
     $valor = (int)0;
     $descricao = (int)0;
     $operador = (int)0;
     $reembolso = (int)0;

     if(isset($_POST['modo'])){
          if(strtoupper($_POST['modo']) == "EDITAR"){
               
               $id = $_POST['id'];

               $SQL = "SELECT * FROM plano WHERE id = ".$id;
               $SELECT = mysqli_query($conexao, $SQL);

               if($rsConsulta = mysqli_fetch_array($SELECT)){

                    $nome = $rsConsulta['nome'];
                    $valor = $rsConsulta['valor'];
                    $descricao = $rsConsulta['descricao'];
                    $operador = $rsConsulta['id_operador'];
                    $reembolso = $rsConsulta['id_reembolso'];

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
        <title>Document</title>
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

        <h4 class="mb-4">Editar plano</h4>
        <form action="actions/operador-cadastrar-plano.php?operador=<?=$operador?>&modo=editar&plano=<?=$id?>" method="POST">
            
            <div class="form-group row">
                <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" name="nome" value="<?=$nome?>" class="form-control" id="inputNome" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputValor" class="col-sm-2 col-form-label">Valor</label>
                <div class="col-sm-10">
                    <input type="text" name="valor" value="<?=$valor?>" class="form-control small-input" id="inputValor" required>
                    <small id="valorHelper" class="form-text text-muted">Valor base para cálculo do plano.</small>
                </div>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control resize-none" name="descricao" id="descricao" rows="3"><?=$descricao?></textarea>
            </div>

            <div class="form-group">
                <label for="reembolso">Reembolso</label>
                <select class="form-control" name="reembolso" id="reembolso">
                    <?php

                        $SQLreembolso = "SELECT * FROM reembolso";
                        $SELECTreembolso = mysqli_query($conexao, $SQLreembolso);

                        while($rsConsultaReembolso = mysqli_fetch_array($SELECTreembolso)){
                    ?>
                        <option value="<?=$reembolso?>"><?= $rsConsultaReembolso['nome'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>


            <div class="d-flex"> <span class="mr-2"> Modalidades: </span> 

                <?php
                    $SQLSelectModalidade = "SELECT planos_modalidades.*, modalidade.nome AS modalidade FROM planos_modalidades INNER JOIN modalidade ON planos_modalidades.id_modalidades = modalidade.id WHERE planos_modalidades.id_planos =".$id;

                    $SELECTmodalidadesPlanos = mysqli_query($conexao, $SQLSelectModalidade);

                    while($rsConsultaPlanoModalidade = mysqli_fetch_array($SELECTmodalidadesPlanos)){
                ?>
                    <p class="btn btn-info btn-sm mr-1"> <?=$rsConsultaPlanoModalidade['modalidade']?> </p>
                <?php
                    }
                ?>

            </div>

            <div class="form-group row ">
                <div class="col-sm-10 ">
                    <button type="button" class="btn btn-danger fechar">Fechar</button>
                    <button type="submit" name="btn-cadastrar-plano" class="btn btn-success">Editar</button>
                </div>
            </div>
        </form>
        
    </body>
</html>