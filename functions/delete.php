<?php

function delete($table, $id){
      
     require_once('conexao.php');
     $conexao = conexaoMysql();

     $SQL = "DELETE FROM ".$table." WHERE id = ".$id;

     if($delete = mysqli_query($conexao, $SQL)){
          return $delete;
     }else{
          return false;
     }
}


?>