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
                        <tr>
                            <td>Pedro Medeiros</td>
                            <td>pedro@hotmail.com</td>
                            <td>20/01/2002</td>
                            <td>@mdo</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>