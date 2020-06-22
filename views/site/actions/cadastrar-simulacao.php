<?php

require_once('../../../functions/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-cadastrar-cotacao'])){
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $contato = $_POST['contato'];

    $plano = $_POST['selecionePlano'];
    $modalidade = $_GET['modalidade'];
    $reembolso = $_GET['reembolso'];
    $idade = $_GET['idade'];

    $operador = $_POST['operador'];

    $SQL = "INSERT INTO cotacao ( nome , email , contato , id_operador, id_plano, id_modalidade, id_faixa_etaria, id_reembolso) 
            VALUES ( '".$nome."', '".$email."', '".$contato."', ".$operador.", ".$plano.", ".$modalidade.", ".$idade.", ".$reembolso.")";

    if(mysqli_query($conexao, $SQL)){
        mysqli_close($conexao);
        header('location: ../contato.php?success=info');
    }else{
        //caso o usuario não selecione um plano, os dados são enviados para index
        header('location: ../../../index.php?nome='.$nome.'&email='.$email.'&contato='.$contato.'&idmodalidade='.$modalidade.'&idfaixa='.$idade.'&idreembolso='.$reembolso.'&modo=error');
    }

}

?>