<?php
     require_once('../../functions/conexao.php');
     $conexao = conexaoMysql();

     $nome = (String) "";
     $email = (String) "";
     $ativo = (int) "";

     if(isset($_GET['operador'])){

          $id = $_GET['operador'];

          $SQL = "SELECT * FROM operador WHERE id = ".$id;
          $SELECT = mysqli_query($conexao, $SQL);

          if($rsConsulta = mysqli_fetch_array($SELECT)){
               $nome = $rsConsulta['nome'];
               $email = $rsConsulta['email'];
               $ativo = $rsConsulta['ativo'];
          }
     } else {
          header('location: operador-login.php');
     }
?>