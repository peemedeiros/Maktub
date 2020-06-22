<?php
     require_once('../../../functions/conexao.php');
     $conexao = conexaoMysql();

     if(isset($_POST['modo'])){
          if(strtoupper($_POST['modo']) == "EDITAR"){
               
               $id = $_POST['id'];

               $SQL = "SELECT cotacao.nome AS nome, cotacao.email AS email, cotacao.contato as contato, plano.nome as plano,
               plano.valor as valor, modalidade.acrescimo as modalidade, modalidade.nome as modalidade_nome,
               faixa_etaria.acrescimo as faixa, faixa_etaria.range_idade AS idade, reembolso.nome AS reembolso
               FROM cotacao INNER JOIN plano ON cotacao.id_plano = plano.id
               INNER JOIN faixa_etaria ON cotacao.id_faixa_etaria = faixa_etaria.id
               INNER JOIN modalidade ON cotacao.id_modalidade = modalidade.id
               INNER JOIN reembolso ON cotacao.id_reembolso = reembolso.id
               WHERE cotacao.id = ".$id;

               $SELECT = mysqli_query($conexao, $SQL);

               if($rsConsulta = mysqli_fetch_array($SELECT)){

                    $nome = $rsConsulta['nome'];
                    $email = $rsConsulta['email'];
                    $contato = $rsConsulta['contato'];
                    $plano = $rsConsulta['plano'];
                    $valor = $rsConsulta['valor'];
                    $modalidade = $rsConsulta['modalidade'];
                    $modalidade_nome = $rsConsulta['modalidade_nome'];
                    $faixa = $rsConsulta['faixa'];
                    $idade = $rsConsulta['idade'];
                    $reembolso = $rsConsulta['reembolso'];

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
                $('#container-modal3').css({
                    visibility:'hidden',
                    opacity:'0',
                    zIndex:'-1'
                });
            });
        </script>
    </head>
    <body>

        <h5 class="mb-3">Cotação de <?=$nome?></h5>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNome" disabled value="<?=$email?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Contato</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  disabled value="<?=$contato?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label">Plano</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNome" disabled value="<?=$plano?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputValor" class="col-sm-2 col-form-label">Valor</label>
                    <div class="col-sm-10">
                        <input type="text" name="valor" class="form-control small-input" id="inputValor" disabled value="<?=number_format($valor + $faixa + $modalidade, 2, ',','.')?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Modalidade</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  disabled value="<?=$modalidade_nome?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Faixa etaria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  disabled value="<?=$idade?>">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label">Reembolso</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  disabled value="<?=$reembolso?>">
                    </div>
                </div>

                <div class="form-group row justify-content-center ">
                    <div class="col-sm-10  ">
                        <button type="button" class="btn btn-danger btn-block fechar">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>