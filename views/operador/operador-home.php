<?php
     require_once('actions/operador-logged.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once('operador-headers.php')?>

    <body>
        
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
                                <button class="btn btn-primary">
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