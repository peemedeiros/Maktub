<?php

require_once('../../../functions/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-cadastrar-contato'])){

    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $obs = $_POST['obs'];
    $data = date("Y-m-d");

    $SQL = "INSERT INTO contato (nome, contato, email, obs, data) 
            VALUES ('".$nome."', '".$contato."', '".$email."', '".$obs."', '".$data."')";

    if(mysqli_query($conexao, $SQL)){
        header('location: ../contato.php?success=true');
    }else{
        header('location: ../contato.php?success=false');
    }

}

?>