<?php

require_once('../../../functions/conexao.php');
$conexao = conexaoMysql();


if(isset($_POST['btn-visualizar-contato'])){
    if($_GET['modo'] == 'sigle'){
        $id = $_GET['contato'];

        $SQL = "UPDATE contato SET status = 0 WHERE id = ".$id;

        if(mysqli_query($conexao, $SQL)){
            mysqli_close($conexao);
            header('location: ../cms-home.php?success=true');
        }else{
            header('location: ../cms-home.php?success=false');
        }
    }
}

if(isset($_POST['btn-desvizualizar-contato'])){
    if($_GET['modo'] == 'sigle'){
        $id = $_GET['contato'];

        $SQL = "UPDATE contato SET status = 1 WHERE id = ".$id;

        if(mysqli_query($conexao, $SQL)){
            mysqli_close($conexao);
            header('location: ../cms-home.php?success=true');
        }else{
            header('location: ../cms-home.php?success=false');
        }
    }
}
?>