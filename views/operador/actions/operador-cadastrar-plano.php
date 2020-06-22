<?php

require_once('../../../database/env/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-cadastrar-plano'])){

    $id = $_GET['plano'];
    $operador = $_GET['operador'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $reembolso = $_POST['reembolso'];

        $SQL = "INSERT INTO plano (nome, valor, descricao, id_operador, id_reembolso) 
                VALUES ('".$nome."', '".$valor."', '".$descricao."', ".$operador.", ".$reembolso.")";
    
    if(mysqli_query($conexao, $SQL)){

        $SQLlastId = "SELECT * FROM plano ORDER BY id DESC LIMIT 1";

        $SQLlastId = mysqli_query($conexao, $SQLlastId);

        if($rsInserted = mysqli_fetch_array($SQLlastId)){

            if(!empty($_POST['modalidades'])){

                foreach($_POST['modalidades'] as $selected){
        
                    $SQLmodalidades = "INSERT INTO planos_modalidades (id_planos, id_modalidades) 
                                        VALUES ('".$rsInserted['id']."', '".$selected."')";
    
                    if(mysqli_query($conexao, $SQLmodalidades)){
                        header('location: ../operador-planos.php?operador='.$operador.'&success=info');
                    }else{
                        header('location: ../operador-planos.php?operador='.$operador.'&success=false');
                    }
                }
            }
        }

        header('location: ../operador-planos.php?operador='.$operador.'&success=info');

    }else{
        header('location: ../operador-planos.php?operador='.$operador.'&success=false');
    }
}

?>