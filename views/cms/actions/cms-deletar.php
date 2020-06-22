<?php

require_once('../../../functions/delete.php');
require_once('../../../functions/conexao.php');

$conexao = conexaoMysql();

if(isset($_GET['modo'])){

     if($_GET['modo'] == "deletaroperador"){

          $idoperador = $_GET['idoperador'];

          $SQL = "DELETE FROM plano WHERE id_operador = ".$idoperador;

          if(mysqli_query($conexao, $SQL)){

               if(!delete("operador", $idoperador))
                    echo("erro");

               header('location: ../cms-operadores.php');
          }else{
               header('location: ../cms-operadores.php?success=info');
          }
     }else if($_GET['modo'] == "deletarfaq"){
          $idpergunta = $_GET['id'];

          if(!delete("faq", $idpergunta))
               echo("erro");

          header('location: ../cms-faq.php');
     }
}


?>