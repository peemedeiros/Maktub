<?php

//realizando o cadastro do plano

require_once('../../../database/env/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-cadastrar-plano'])){

    $id = $_GET['plano'];
    $operador = $_GET['operador'];
    $nome = $_POST['nome'];

    $valor = explode(',' , $_POST['valor']);
    $valor = $valor[0].'.'.$valor[1];

    $descricao = $_POST['descricao'];
    $reembolso = $_POST['reembolso'];

        $SQL = "INSERT INTO plano (nome, valor, descricao, id_operador, id_reembolso) 
                VALUES ('".$nome."', '".$valor."', '".$descricao."', ".$operador.", ".$reembolso.")";
    
    //cadastra o plano
    if(mysqli_query($conexao, $SQL)){

        //recupera o ultimo plano inserido
        $SQLlastId = "SELECT * FROM plano ORDER BY id DESC LIMIT 1";

        $SQLlastId = mysqli_query($conexao, $SQLlastId);

        if($rsInserted = mysqli_fetch_array($SQLlastId)){

            if(!empty($_POST['modalidades'])){

                foreach($_POST['modalidades'] as $selected){
                    
                    //cadastra as modalidades no plano
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