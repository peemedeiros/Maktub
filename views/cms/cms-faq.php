<?php 
    require_once('../../functions/conexao.php');
    $conexao = conexaoMysql();

    $status = 'info d-none';
    $message = "";

    //trazendo mensagem de erros
    if(isset($_GET['success'])){
        if($_GET['success'] == 'true'){
            $status = 'success d-block';
            $message = "Pergunta respondida e enviada para o site";
        }else if($_GET['success'] == 'false'){
            $status = 'danger d-block';
            $message = "Erro ao conectar com o banco de dados";
        }else if($_GET['success'] == 'info'){
            $status = 'warning d-block';
            $message = "Este consultor ainda possui planos ativos cadastrados";
        }
           
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS - Seguradora</title>
        <link rel="stylesheet" href="cms.css" />
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
        <script src="../../assets/js/jquery.js"></script>
        <script>
            $(document).ready(function(){

                $('.responder').click(function(){
                    $('#container-modal2').css({
                        visibility:'visible',
                        opacity:'1',
                        zIndex:'999'
                    });
                });
            });
            
            function responder(idPergunta){
                $.ajax({
                    type:"POST",
                    url:"template/modalFaq.php",
                    data:{
                        modo:"responder",
                        id:idPergunta
                    },
                    success: function(dados){
                        $('#modal2').html(dados);
                    }
                })
            }
        </script>
    </head>

    <body>
        <div id="container-modal2">
            <div id="modal2">
            
            </div>
        </div>
        <?php require_once('template/nav-bar.php')?>

        <div id="cms-home">
            <div class="container pt-2">
                <div class="alert alert-<?=$status?>" role="alert">
                    <?=$message?>
                </div>
                <div class="contato-content mb-3">
                    <h2>Perguntas</h2>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Pergunta</th>
                        
                        <th scope="col">Opcoes</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 

                            $SQL = "SELECT * FROM faq";
                            $SELECT = mysqli_query($conexao, $SQL);

                            while($rsConsulta = mysqli_fetch_array($SELECT)){
                                if($rsConsulta['status'] == 0)
                                    $visualizado = "error.png";
                                else
                                    $visualizado = "tick.png";
                            
                        ?>
                        <tr>
                            <td><?=$rsConsulta['pergunta']?></td>
                            <td>
                                <button onclick="responder(<?=$rsConsulta['id']?>);" class=" responder btn btn-primary btn-sm">
                                    Ver
                                </button>
                                <a href="actions/cms-deletar.php?id=<?=$rsConsulta['id']?>&modo=deletarfaq" class="btn btn-danger btn-sm mr-3">
                                    Excluir
                                </a>
                                <img class="visualizado-icone-2" src="../../assets/img/<?=$visualizado?>" alt="visualized">
                            </td>
                        </tr>


                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>

    
    <script src="../../assets/js/bootstrap.min.js"></script>
    </body>
</html>