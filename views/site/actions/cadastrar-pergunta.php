<?php

require_once('../../../functions/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-cadastrar-pergunta'])){

    $pergunta = $_POST['pergunta'];
    
    $SQL = "INSERT INTO faq ( pergunta ) VALUES ('".$pergunta."')" ;
    
    if(mysqli_query($conexao, $SQL)){
        header('location: ../suporte.php?success=true');
    }else{
        header('location: ../suporte.php?success=false');
    }

}

?>