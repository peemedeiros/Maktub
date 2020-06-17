<?php
     require_once('actions/operador-logged.php');
?>

<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Operadores</title>
          <link rel="stylesheet" href="operador.css">
          <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
          <script src="../../assets/js/jquery.js"></script>
          <script>
               $(document).ready(function(){
                    $('.cadastrar').click(function(){
                         $('#container-modal').css({
                         visibility:'visible',
                         opacity:'1',
                         zIndex:'999'
                         });
                    });
                    $('.fechar').click(function(){
                         $('#container-modal').css({
                         visibility:'hidden',
                         opacity:'0',
                         zIndex:'-1'
                         });
                    });
               })
          </script>
     </head>
    <body>
        <div id="container-modal">
            <div id="modal">
                <h4 class="mb-4">Novo plano</h4>
                <form action="actions/cms-cadastrar-operador.php" method="POST">
                    
                    <div class="form-group row">
                        <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" id="inputNome" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputValor" class="col-sm-2 col-form-label">Valor</label>
                        <div class="col-sm-10">
                            <input type="text" name="valor" class="form-control small-input" id="inputValor" required>
                            <small id="valorHelper" class="form-text text-muted">Valor base para cálculo do plano.</small>
                        </div>
                    </div>

                    <div class="form-group">
                         <label for="descricao">Descrição</label>
                         <textarea class="form-control resize-none" id="descricao" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                         <label for="reembolso">Reembolso</label>
                         <select class="form-control" id="reembolso">
                              <option>1</option>
                         </select>
                    </div>

                    <div class="form-check form-check-inline">
                         <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                         <label class="form-check-label" for="inlineCheckbox1">1</label>
                         </div>
                         <div class="form-check form-check-inline">
                         <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                         <label class="form-check-label" for="inlineCheckbox2">2</label>
                    </div>

                    <div class="form-group row ">
                        <div class="col-sm-10 ">
                            <button type="button" class="btn btn-danger fechar">Fechar</button>
                            <button type="submit" name="btn-cadastrar-operador" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once('template/nav-bar.php')?>
        <div id="operador-home">
            <div class="container pt-2">
                <div class="home-content mb-3 d-flex justify-content-between">
                    <h2>Seus planos</h2>
                    <button class="btn btn-success btn cadastrar"> Novo plano </button>
                </div>
                <hr>
                <div class="row d-flex justify-content-between">
                    <div class="card min-body text-white bg-primary mb-3" style="max-width: 18rem;">
                         <div class="card-header">Nome</div>
                              <div class="card-body">
                              <h5 class="card-title">VALOR</h5>
                              <p class="card-text">Descrição</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>