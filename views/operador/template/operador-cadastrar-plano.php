<?php

require_once('../../../database/env/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-cadastrar-plano'])){

    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $reembolso = $_POST['reembolso'];
    
    // INSERIR UM PLANO, AO INSERIR CADASTRAR AS MODALIDADES SELECIONADAS AO MESMO

    if(!empty($_POST['modalidades'])){

        foreach($_POST['modalidades'] as $selected){

            $SQLmodalidades = "INSERT INTO planos_modalidades (id_planos, id_modalidades) VALUES ()";

        }
    }

}

?>