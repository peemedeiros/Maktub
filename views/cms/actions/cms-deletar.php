<?php

require_once('../../../functions/delete.php');

if(isset($_GET['modo'])){

     if($_GET['modo'] == "deletaroperador"){

          $idoperador = $_GET['idoperador'];

          if(!delete("operador", $idoperador))
               echo("erro");

          header('location: ../cms-operadores.php');
     }
}


?>