<?php

require_once('../../../functions/delete.php');
require_once('../../../functions/conexao.php');
$conexao = conexaoMysql();

if(isset($_GET['modo'])){

     if($_GET['modo'] == "deletarplano"){

          $idoperador = $_GET['operador'];
          $idplano = $_GET['idplano'];

          //deleta primeiro as modalidades antes de deletar os planos

          $SQLdelete = "DELETE FROM planos_modalidades WHERE id_planos = ".$idplano;

          if(mysqli_query($conexao, $SQLdelete)){

               $SQLdeleteIdades = "DELETE FROM planos_faixas_etarias WHERE id_planos = ".$idplano;

               if(mysqli_query($conexao, $SQLdeleteIdades)){
                    
                    if(!delete("plano", $idplano))
                    header("location: ..asdasd");

                    mysqli_close($conexao);
                    header('location: ../operador-planos.php?operador='.$idoperador); 
               }

                             
          }else{
               echo($SQLdelete);
          }
     }
}


?>