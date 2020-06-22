<?php
     require_once('actions/operador-logged.php');

    $status = 'info d-none';
    $message = "";

    if(isset($_GET['success'])){
        if($_GET['success'] == 'true'){
            $status = 'success d-block';
            $message = "Idades atribuidas, cadastro do plano finalizado com sucesso!";
        }else if($_GET['success'] == 'false'){
            $status = 'danger d-block';
            $message = "Nome do plano já existe, Por favor escolha outro.";
        }else{
            $status = 'warning d-block';
            $message = "Para que o plano fique disponível no site, atribua as idades que o plano irá cobrir.";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Operadores</title>
          <link rel="stylesheet" href="operador.css">
          <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
          <script src="../../assets/js/jquery.js"></script>
          <script>
            //Controle das modais de cadastro e edição de planos
               $(document).ready(function(){
                    $('.cadastrar').click(function(){
                         $('#container-modal').css({
                         visibility:'visible',
                         opacity:'1',
                         zIndex:'999'
                         });
                    });
                    $('.fechar').click(function(){
                         $('#container-modal').css({
                         visibility:'hidden',
                         opacity:'0',
                         zIndex:'-1'
                         });
                    });

                    $('.editar').click(function(){
                        $('#container-modal2').css({
                            visibility:'visible',
                            opacity:'1',
                            zIndex:'999'
                        });
                    });
               })
               
               //Carregando informações do plano selecionado na modal
               function editar(idPlano){
                    $.ajax({
                        type:"POST",
                        url:"template/modalPlano.php",
                        data:{
                            modo:"editar",
                            id:idPlano,
                        },
                        success: function(dados){
                            $('#modal2').html(dados);
                        }
                    })
                }
          </script>
     </head>
    <body>
        <div id="container-modal">
            <div id="modal">
                <h4 class="mb-4">Novo plano</h4>
                <p> Para finalizar o cadastro do plano, relacione com as idades</p>
                <form action="actions/operador-cadastrar-plano.php?operador=<?=$_GET['operador']?>" method="POST">
                    
                    <div class="form-group row">
                        <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" id="inputNome" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputValor" class="col-sm-2 col-form-label">Valor</label>
                        <div class="col-sm-10">
                            <input type="text" name="valor" class="form-control small-input" id="inputValor" required>
                            <small id="valorHelper" class="form-text text-muted">Valor base para cálculo do plano.</small>
                        </div>
                    </div>

                    <div class="form-group">
                         <label for="descricao">Descrição</label>
                         <textarea class="form-control resize-none" name="descricao" id="descricao" required rows="3"></textarea>
                    </div>

                    <div class="form-group">
                         <label for="reembolso">Reembolso</label>
                         <select class="form-control" name="reembolso" id="reembolso" required>
                            <option value="">selecione um reembolso</option>
                             <?php

                                $SQLreembolso = "SELECT * FROM reembolso";
                                $SELECTreembolso = mysqli_query($conexao, $SQLreembolso);

                                while($rsConsultaReembolso = mysqli_fetch_array($SELECTreembolso)){
                            ?>
                                <option value="<?=strtolower($rsConsultaReembolso['id'])?>"><?= $rsConsultaReembolso['nome'] ?></option>
                            <?php
                                }
                             ?>
                         </select>
                    </div>


                        <?php
                            $SQLmodalidade = "SELECT * FROM modalidade";
                            $SELECTmodalidade = mysqli_query($conexao, $SQLmodalidade);

                            while($rsConsultaModalidade = mysqli_fetch_array($SELECTmodalidade)){
                        ?>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" name="modalidades[]" value="<?=$rsConsultaModalidade['id']?>" type="checkbox" id="<?=$rsConsultaModalidade['id']?>">
                                <label class="form-check-label" for="<?=$rsConsultaModalidade['id']?>"><?=$rsConsultaModalidade['nome']?></label>
                            </div>
                        <?php
                            }
                        ?>

                    <div class="form-group row ">
                        <div class="col-sm-10 ">
                            <button type="button" class="btn btn-danger fechar">Fechar</button>
                            <button type="submit" name="btn-cadastrar-plano" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="container-modal2">
            <div id="modal2">
            
            </div>
        </div>

        <?php require_once('template/nav-bar.php')?>
        
        <div id="operador-home">
            <div class="container pt-2">
                <div class="home-content mb-3 d-flex justify-content-between">
                    <h2>Seus planos</h2>
                    <button class="btn btn-success btn cadastrar"> Novo plano </button>
                </div>
                <hr>
                <div class="alert alert-<?=$status?>" role="alert">
                    <?=$message?>
                </div>
                <div class="row d-flex">
                <?php
                
                    $SQLselect = "SELECT plano.*, reembolso.nome AS reembolso FROM plano INNER JOIN reembolso ON plano.id_reembolso = reembolso.id WHERE plano.id_operador =".$_GET['operador'];
                    $SELECT = mysqli_query($conexao, $SQLselect);

                    while($rsConsultaPlano = mysqli_fetch_array($SELECT)){
                ?>
                
                    <div class="card min-body blue text-white  mb-3 aumentar-card  center" style="max-width: 18rem;">
                         <div class="card-header  "><?=$rsConsultaPlano['nome']?></div>
                              <div class="card-body scroll-on">
                              <h5 class="card-title">R$ <?=number_format($rsConsultaPlano['valor'], 2, ',', '.')?></h5>
                              <p class="card-text"><?=$rsConsultaPlano['descricao']?></p>
                         </div>
                         <div class="card-footer">
                                <div class="d-flex flex-wrap"> <span class="mr-2"> Idades: </span> 

                                <?php
                                    $SQLSelectIdades = "SELECT planos_faixas_etarias.*, faixa_etaria.range_idade AS idade FROM planos_faixas_etarias INNER JOIN faixa_etaria ON planos_faixas_etarias.id_faixas_etarias = faixa_etaria.id WHERE planos_faixas_etarias.id_planos =".$rsConsultaPlano['id'];

                                    $SELECTidadesPlanos = mysqli_query($conexao, $SQLSelectIdades);

                                    $display = "block";

                                    while($rsConsultaIdadesPlanos = mysqli_fetch_array($SELECTidadesPlanos)){

                                        if(count($rsConsultaIdadesPlanos))
                                            $display = "none";
                                ?>
                                    <p class="btn btn-outline-light btn-sm mr-1"> <?=$rsConsultaIdadesPlanos['idade']?> </p>
                                <?php
                                    }
                                ?>

                                </div>

                                <hr class="bg-light">
                                
                                <div class="d-flex "> <span class="mr-2"> Modalidades: </span> 

                                    <?php
                                        $SQLSelectModalidade = "SELECT planos_modalidades.*, modalidade.nome AS modalidade FROM planos_modalidades INNER JOIN modalidade ON planos_modalidades.id_modalidades = modalidade.id WHERE planos_modalidades.id_planos =".$rsConsultaPlano['id'];

                                        $SELECTmodalidadesPlanos = mysqli_query($conexao, $SQLSelectModalidade);

                                        while($rsConsultaPlanoModalidade = mysqli_fetch_array($SELECTmodalidadesPlanos)){
                                    ?>
                                        <p class="btn btn-outline-light btn-sm mr-1"> <?=$rsConsultaPlanoModalidade['modalidade']?> </p>
                                    <?php
                                        }
                                    ?>

                                </div>
                                <p>Reembolso: <?=$rsConsultaPlano['reembolso']?></p></p>

                                <div class="d-flex">
                                    <a href="actions/operador-deletar-plano.php?operador=<?=$_GET['operador']?>&idplano=<?=$rsConsultaPlano['id']?>&modo=deletarplano" class="btn btn-danger btn-sm text-white mr-3"> Excluir </a>
                                    <button onclick="editar(<?=$rsConsultaPlano['id']?>);"  class="btn btn-warning btn-sm text-black editar d-<?=$display?>"> Atribuir idades </button>
                                </div>
                         </div>
                    </div>
                
                <?php
                    }
                ?>            
                </div>
            </div>
        </div>
    </body>
</html>