<?php

    require_once('../../../database/env/conexao.php');
    $conexao = conexaoMysql();

    if(isset($_POST['btn-login'])){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $SQL = "SELECT * FROM administrador";
        $SELECT = mysqli_query($conexao, $SQL);

        if($rsConsulta = mysqli_fetch_array($SELECT)){

            if($rsConsulta['email'] == $email && $rsConsulta['senha'] == $senha){
                header('location: ../cms-home.php');
            }else{
                header('location: ../cms-login.php?invalid=true');
            }
        }
    }





?>