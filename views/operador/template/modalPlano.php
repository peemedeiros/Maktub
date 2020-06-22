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

        <h6 >Novo plano</h6>
        <small>Relacione o plano com as idades que melhor o atendem.</small>
        
        <form action="actions/relacionando-idade.php?plano=<?=$id?>&operador=<?=$operador?>" method="POST">
            <div class="row ">
                <div class="col-md-8 ">
                    <div class="form-group row">
                        <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" id="inputNome" disabled value="<?=$nome?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputValor" class="col-sm-2 col-form-label">Valor</label>
                        <div class="col-sm-10">
                            <input type="text" name="valor" class="form-control small-input" id="inputValor" disabled value="<?=$valor?>">
                            <small id="valorHelper" class="form-text text-muted">Valor base para o cálculo. Cálculo do valor é feito a partir da idade do contratante</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control resize-none" name="descricao" id="descricao" rows="3" disabled><?=$descricao?></textarea>
                    </div>

                    <div class="form-group row ">
                        <div class="col-sm-10 ">
                            <button type="button" class="btn btn-danger fechar">Fechar</button>
                            <button type="submit" name="btn-cadastrar-plano" class="btn btn-success">Relacionar</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex flex-column align-items-center overflow-auto">
                    
                    <?php
                    
                        $SQL = "SELECT * FROM faixa_etaria";
                        $SELECT = mysqli_query($conexao, $SQL);

                        while($rsConsulta = mysqli_fetch_array($SELECT)){
                            
                    ?>

                    <div class="form-group form-check">
                        <input type="checkbox"  name="idades[]" value="<?=$rsConsulta['id']?>" class="form-check-input">
                        <label class="form-check-label"><?=$rsConsulta['range_idade']?></label>
                    </div>

                    <?php
                        }
                    ?>

                </div>
            </div>
                
        </form>
        
    </body>
</html>