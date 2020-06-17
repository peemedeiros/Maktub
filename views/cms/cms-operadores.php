<?php
    require_once('../../database/env/conexao.php');
    $conexao = conexaoMysql();

    $status = 'info d-none';
    $message = "";

    if(isset($_GET['success'])){
        if($_GET['success'] == 'true'){
            $status = 'success d-block';
            $message = "Operador cadastrado com sucesso!";
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
            });
            
            function editar(idOperador){
                $.ajax({
                    type:"POST",
                    url:"template/modalOperador.php",
                    data:{
                        modo:"editar",
                        id:idOperador
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
                <h4 class="mb-4">Novo operador</h4>
                <form action="actions/cms-cadastrar-operador.php" method="POST">
                    
                    <div class="form-group row">
                        <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" id="inputNome" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail" required>
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
            </div>
        </div>
        <div id="container-modal2">
            <div id="modal2">
            
            </div>
        </div>
        
        <?php require_once('template/nav-bar.php')?>
        
        <div id="cms-home">
        
            <div class="container pt-2">
                <div class="contato-content mb-3 d-flex justify-content-between">
                    <h2>Seus operadores</h2>
                    <button class="btn btn-success btn cadastrar"> Novo operador </button>
                </div>
                <div class="alert alert-<?=$status?>" role="alert">
                    <?=$message?>
                </div>
                <table class="table table-striped">
                    <thead>

                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Opcoes</th>
                        </tr>

                    </thead>
                    <tbody>

                    <!-- Listar Operadores -->
                        <?php
                            $SQL = "SELECT * FROM operador";
                            $SELECT = mysqli_query($conexao, $SQL);

                            while($rsConsulta = mysqli_fetch_array($SELECT)){
                              
                        ?>

                        <tr>
                            <td><?=$rsConsulta['nome']?></td>
                            <td><?=$rsConsulta['email']?></td>
                            <td class="d-flex">
                                <a href="actions/cms-deletar.php?idoperador=<?=$rsConsulta['id']?>&modo=deletaroperador" class="btn btn-danger btn-sm text-white mr-2"> Excluir </a>
                                <button type="button" onclick="editar(<?=$rsConsulta['id']?>)" class="btn btn-primary btn-sm mr-2 editar"> Editar </button>
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