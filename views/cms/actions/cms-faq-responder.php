<?php

require_once('../../../functions/conexao.php');
$conexao = conexaoMysql();


if(isset($_POST['btn-responder'])){
    if($_GET['modo'] == 'responder'){

        $id = $_GET['pergunta'];
        $resposta = $_POST['resposta'];

        $SQL = "UPDATE faq SET status = 1, resposta = '".$resposta."'  WHERE id = ".$id;

        if(mysqli_query($conexao, $SQL)){
            mysqli_close($conexao);
            header('location: ../cms-faq.php?success=true');
        }else{
            header('location: ../cms-faq.php?success=false');
        }
    }
}

?>