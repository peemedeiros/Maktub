<?php
    // verificando o operador logado
     require_once('actions/operador-logged.php');
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

            //controle de modal
            $(document).ready(function(){

                $('.editar').click(function(){
                    $('#container-modal3').css({
                        visibility:'visible',
                        opacity:'1',
                        zIndex:'999'
                    });
                });
            })

            //carrega as informações da cotação
            function editar(idCotacao){
                $.ajax({
                    type:"POST",
                    url:"template/modalCotacao.php",
                    data:{
                        modo:"editar",
                        id:idCotacao,
                    },
                    success: function(dados){
                        $('#modal3').html(dados);
                    }
                })
            }
        </script>
     </head>

    <body>

        <div id="container-modal3">
            <div id="modal3">
            
            </div>
        </div>
        
        <?php require_once('template/nav-bar.php')?>
        
        <div id="operador-home">
            <div class="container pt-2">
                <div class="home-content mb-3">
                    <h2>Suas cotações</h2>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data</th>
                        <th scope="col">Opcoes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            $SQL = "SELECT * FROM cotacao WHERE id_operador = ".$_GET['operador'];
                            
                            if($SELECT = mysqli_query($conexao, $SQL)){
                                while($rsConsulta = mysqli_fetch_array($SELECT)){
                               
                        ?>

                        <tr>
                            <td><?=$rsConsulta['nome']?></td>
                            <td><?=$rsConsulta['email']?></td>
                            <td><?=$rsConsulta['contato']?></td>
                            <td>
                                <button onclick="editar(<?=$rsConsulta['id']?>);" class="editar btn btn-primary">
                                    ver
                                </button>
                            </td>
                        </tr>

                        <?php
                        
                                    }   
                                }     

                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>