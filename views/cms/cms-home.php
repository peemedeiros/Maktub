<?php
    require_once('../../functions/conexao.php');
    $conexao = conexaoMysql();
    //Trazendo alert de erros
    
    $status = 'info d-none';
    $message = "";

    if(isset($_GET['success'])){
        if($_GET['success'] == 'true'){
            $status = 'success d-block';
            $message = "Status da mensagem atualizado";
        }else{
            $status = 'danger d-block';
            $message = "Erro ao conectar com o banco de dados";
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

                $('.ver').click(function(){
                    $('#container-modal2').css({
                        visibility:'visible',
                        opacity:'1',
                        zIndex:'999'
                    });
                });
            });
            
            function ver(idContato){
                $.ajax({
                    type:"POST",
                    url:"template/modalContato.php",
                    data:{
                        modo:"ver",
                        id:idContato
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
            <div id="modal2" class="large-modal">
            
            </div>
        </div>
        
        <?php require_once('template/nav-bar.php')?>
        
        <div id="cms-home">
            <div class="container pt-2">
                <div class="alert alert-<?=$status?>" role="alert">
                    <?=$message?>
                </div>
                <div class="contato-content mb-3">
                    <h2>Mensagens</h2>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contato</th>
                        <th scope="col">Data</th>
                        <th scope="col">Opcoes</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $SQL = "SELECT * FROM contato";
                            $SELECT = mysqli_query($conexao, $SQL);

                            while($rsConsulta = mysqli_fetch_array($SELECT)){
                                if($rsConsulta['status'] == 0)
                                    $visualizado = "visualized.png";
                                else
                                    $visualizado = "sended.png";
                                

                                $data = explode('-', $rsConsulta['data']);
                                $data = $data[2]."/".$data[1]."/".$data[0];
                        ?>

                        <tr name="contato<?=$rsConsulta['id']?>">
                            <td><?=$rsConsulta['nome']?></td>
                            <td><?=$rsConsulta['email']?></td>
                            <td><?=$rsConsulta['contato']?></td>
                            <td><?=$data?></td>
                            <td> <button onclick="ver(<?=$rsConsulta['id']?>);" class="btn btn-primary btn-sm ver">VER</button> <img class="visualizado-icone" src="../../assets/img/<?=$visualizado?>" alt="visualized"></td>
                        </tr>
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>