<?php

require_once('../../../database/env/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-cadastrar-operador'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    

    $SQL = "INSERT INTO operador (nome, email, senha) VALUE ('".$nome."','".$email."','".$senha."')";

    if(mysqli_query($conexao, $SQL)){
        header('location: ../cms-operadores.php?success=true');
    }else{
        header('location: ../cms-operadores.php?success=false');
        
    }
}
?>