<?php

require_once('../../../database/env/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-login'])){

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $SQL = "SELECT * FROM operador";
    $SELECT = mysqli_query($conexao, $SQL);

    if($rsConsulta = mysqli_fetch_array($SELECT)){

        if($rsConsulta['email'] == $email && $rsConsulta['senha'] == $senha){
            header('location: ../operador-home.php?operador='.$rsConsulta['id']);
        }else{
            header('location: ../operador-login.php?invalid=true');
        }
    }
}

?>