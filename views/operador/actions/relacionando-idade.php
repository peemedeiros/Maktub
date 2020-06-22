<?php

require_once('../../../database/env/conexao.php');
$conexao = conexaoMysql();

if(isset($_GET['plano'])){

    $id = $_GET['plano'];
    $operador = $_GET['operador'];

    foreach($_POST['idades'] as $selected){

        $SQLIdades = "INSERT INTO planos_faixas_etarias (id_planos, id_faixas_etarias) 
                        VALUES (".$id.", ".$selected.")";

        if(mysqli_query($conexao, $SQLIdades))
            header('location: ../operador-planos.php?operador='.$operador.'&success=true');
        else{
            echo($SQLIdades);
            var_dump($selected);
        }
            //header('location: ../operador-planos.php?operador='.$operador.'&success=false&error=');
    }
}



?>