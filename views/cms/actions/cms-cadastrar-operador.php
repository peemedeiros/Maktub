<?php

require_once('../../../database/env/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-cadastrar-operador'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    
    if(isset($_GET['modo'])){
        if($senha == "")
            $SQL = "UPDATE operador SET nome = '".$nome."' , email = '".$email."' WHERE id = ".$_GET['operador'];
        else
            $SQL = "UPDATE operador SET nome = '".$nome."' , email = '".$email."' , senha = '".$senha."' WHERE id = ".$_GET['operador'];
    }else{
        $SQL = "INSERT INTO operador (nome, email, senha) VALUE ('".$nome."','".$email."','".$senha."')";
    }

    if(mysqli_query($conexao, $SQL)){
        mysqli_close($conexao);
        header('location: ../cms-operadores.php?success=true');
    }else{
        header('location: ../cms-operadores.php?success=false');
        
    }
}
?>