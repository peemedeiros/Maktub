<?php
require_once('../../functions/conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-simular'])){

    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $modalidade = $_POST['modalidade'];
    $reembolso = $_POST['reembolso'];

    $display = "block";
    $buttonDisplay = "none";
    $error = 'none';

    $aumentoPorIdade = 0;
    $aumentoPorModalidade = 0;

    $SQLAcrescimo = "SELECT * FROM faixa_etaria WHERE id = ".$idade.";";
    $SELECTAcrescimo = mysqli_query($conexao, $SQLAcrescimo);
    
    if($rsAcrescimo = mysqli_fetch_array($SELECTAcrescimo)){
        $aumentoPorIdade = $rsAcrescimo['acrescimo'];
    }


    $SQLAcrescimoModalidade = "SELECT * FROM modalidade WHERE id= ".$modalidade;

    if($SELECTAcrescimoModalidade = mysqli_query($conexao, $SQLAcrescimoModalidade)){

        if($rsAcrescimoModalidade = mysqli_fetch_array($SELECTAcrescimoModalidade)){
            $aumentoPorModalidade = $rsAcrescimoModalidade['acrescimo'];
        }

    }else{
        echo('teste');
    }

}else if(isset($_GET['modo'])){
    if($_GET['modo'] == 'error'){

        $nome = $_GET['nome'];
        $contato = $_GET['contato'];
        $email = $_GET['email'];
        $idade = $_GET['idfaixa'];
        $modalidade = $_GET['idmodalidade'];
        $reembolso = $_GET['idreembolso'];

        $display = "block";
        $buttonDisplay = "none";
        $error = 'block';

        $aumentoPorIdade = 0;
        $aumentoPorModalidade = 0;

        $SQLAcrescimo = "SELECT * FROM faixa_etaria WHERE id = ".$idade.";";
        $SELECTAcrescimo = mysqli_query($conexao, $SQLAcrescimo);
        
        if($rsAcrescimo = mysqli_fetch_array($SELECTAcrescimo)){
            $aumentoPorIdade = $rsAcrescimo['acrescimo'];
        }


        $SQLAcrescimoModalidade = "SELECT * FROM modalidade WHERE id= ".$modalidade;

        if($SELECTAcrescimoModalidade = mysqli_query($conexao, $SQLAcrescimoModalidade)){

            if($rsAcrescimoModalidade = mysqli_fetch_array($SELECTAcrescimoModalidade)){
                $aumentoPorModalidade = $rsAcrescimoModalidade['acrescimo'];
            }

        }else{
            echo('teste');
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="site.css">
        <title>Aragon Seguros</title>
        <link rel="icon" type="imagem/png" href="../../assets/img/aragon-icon.png" />
        <script src="../../assets/js/jquery.js"></script>
        <script>
            $(document).ready(function(){
                $('.botaoSelecionado').click(function(){
                    $('.botaoSelecionado').css({border:'', color:'', backgroundColor:''});
                    $(this).css({
                        border:'solid 2px #ffffff',
                        backgroundColor:'#194d11'
                    });

                });
            });
        </script>
    </head>
    <body>
        <div class="top-bar">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="login-box">
                        <div class="nav-icon">
                            <img src="../../assets/img/user.png" alt="login">
                        </div>
                        <div class="nav-link">
                            <a href="../operador/operador-login.php" class="text-white">Sou consultor</a>
                        </div>
                    </div>

                    <div class="login-box">
                        <div class="nav-icon">
                            <img src="../../assets/img/adm.png" alt="login">
                        </div>
                        <div class="nav-link">
                            <a href="../cms/cms-login.php" class="text-white">Sou administrador</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav id="navigation-bar">
            <div class="container d-flex justify-content-between">
                <div class="logo">
                    <img src="../../assets/img/aragon.png" alt="logo">
                </div>
                <ul class="navigation-all-itens">
                    <li class="navigation-item ativado">
                        <a href="../../index.php ">
                            HOME
                        </a>
                    </li>
                    <li class="navigation-item ">
                        <a href="sobre.php">
                            SOBRE
                        </a>
                    </li>
                    <li class="navigation-item ">
                        <a href="contato.php">
                            CONTATO
                        </a>
                    </li>
                    <li class="navigation-item ">
                        <a href="suporte.php">
                            SUPORTE
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="operador-home" class="mt-5">
            <div class="container pt-2">
                <div class="home-content mb-3 d-flex justify-content-center">
                    <h2>Planos ideais para você</h2>
                    
                </div>
                <div class="alert alert-danger d-<?=$error?>" role="alert">
                    Erro: Selecione um plano antes de enviar a cotação!
                </div>
                <hr>
                
                <form action="actions/cadastrar-simulacao.php?modalidade=<?=$modalidade?>&reembolso=<?=$reembolso?>&idade=<?=$idade?>" method="POST">

                    <div class="form-group">
                        <input type="text" name="nome" value="<?=$nome?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="<?=$email?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="contato" value="<?=$contato?>" readonly class="form-control">
                    </div>


                    <div class="row d-flex">
                        
                    <?php
                    
                        $SQLselect = "SELECT plano.*,
                                            reembolso.nome AS reembolso,
                                            planos_faixas_etarias.id_faixas_etarias as idIdade,
                                            planos_modalidades.id_modalidades 
                                            FROM plano INNER JOIN reembolso ON plano.id_reembolso = reembolso.id 
                                            INNER JOIN planos_faixas_etarias ON plano.id = planos_faixas_etarias.id_planos 
                                            INNER JOIN planos_modalidades ON plano.id = planos_modalidades.id_planos 
                                            WHERE planos_faixas_etarias.id_faixas_etarias = ".$idade." AND 
                                            planos_modalidades.id_modalidades =".$modalidade." AND 
                                            plano.id_reembolso = ".$reembolso;
                        
                        $SELECT = mysqli_query($conexao, $SQLselect);
                        while($rsConsultaPlano = mysqli_fetch_array($SELECT)){
                            
                            if(count($rsConsultaPlano)){
                                $display = "none";
                                $buttonDisplay = "flex";
                            }
                                

                    ?>
                        
                        <div class="card sombra aumentar-card text-white bg-primary mb-3 aumentar-card  center" style="max-width: 18rem;">
                            <div class="card-header"><?=$rsConsultaPlano['nome']?></div>
                                
                                <div class="card-body scroll-on">
                                    <h5 class="card-title">
                                        R$ <?=number_format($rsConsultaPlano['valor'] + $aumentoPorModalidade + $aumentoPorIdade, 2, ',', '.')?>
                                    </h5>
                                <p class="card-text"><?=$rsConsultaPlano['descricao']?></p>
                            </div>
                            <div class="card-footer">
                                    
                                    <div class="d-flex "> <span class="mr-2"> Modalidades: </span> 

                                        <?php
                                            $SQLSelectModalidade = "SELECT planos_modalidades.*, modalidade.nome AS modalidade FROM planos_modalidades INNER JOIN modalidade ON planos_modalidades.id_modalidades = modalidade.id WHERE planos_modalidades.id_planos =".$rsConsultaPlano['id'];

                                            $SELECTmodalidadesPlanos = mysqli_query($conexao, $SQLSelectModalidade);

                                            while($rsConsultaPlanoModalidade = mysqli_fetch_array($SELECTmodalidadesPlanos)){
                                        ?>
                                            <p class="btn btn-outline-light btn-sm mr-1"> <?=$rsConsultaPlanoModalidade['modalidade']?> </p>
                                        <?php
                                            }
                                        ?>

                                    </div>
                                    <p>Reembolso: <?=$rsConsultaPlano['reembolso']?></p>
                                    <div class="form-group">
                                        <input type="text" name="operador" value="<?=$rsConsultaPlano['id_operador']?>" readonly class="form-control d-none">
                                    </div>

                                    <div class="d-flex">
                                        <label for="plano<?=$rsConsultaPlano['id']?>" class="btn btn-success btn botaoSelecionado"> Selecionar plano </label>
                                        <input class="form-check-input d-none" type="radio" name="selecionePlano" id="plano<?=$rsConsultaPlano['id']?>" value=" <?=$rsConsultaPlano['id']?> ">
                                    </div>
                            </div>
                        </div>
                    
                    <?php
                        }
                    ?>      
                        <div class="alert alert-warning d-<?=$display?>" role="alert">
                            Não temos planos disponíveis para as opções escolhidas, fale diretamente conosco <a href="contato.php"> clicando aqui </a>
                        </div>      
                    </div>
                    <div class="row d-<?=$buttonDisplay?> justify-content-center mb-5">
                        <button name="btn-cadastrar-cotacao" class="btn btn-success btn-lg"> Enviar cotação</button>
                    </div>
                </form>
            </div>
        </div>



        <footer>
            <div class="container flexColumn">
                <div class="footer_menu">
                    <div class="fm_1">
                        <div class="fm_title">
                            Health Insurance
                        </div>
                        <div class="fm_desc">
                            <a href="./">Aragon seguros possui →</a>
                        </div>
                    </div>
                    <div class="fm_2">
                        <div class="fm_title">
                            Medical Records
                        </div>
                        <div class="fm_desc">
                            <a href="./">Aragon seguros possui →</a>
                        </div>
                    </div>
                    <div class="fm_3">
                        <div class="fm_title">
                            Online Bill..
                        </div>
                        <div class="fm_desc">
                            <a href="./">Aragon seguros possui →</a>
                        </div>
                    </div>
                </div>

                <div class="footer_area">
                    <div class="footer_area_item">
                        <div class="widget">
                            <div class="widget_title">
                                <div class="widget_title_text">Aragon Seguros</div>
                                <div class="widget_title_bar"></div>
                            </div>
                            <div class="widget_body">
                                <div class="medicenter_text">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi eleifend, purus quis laoreet faucibus
                                </div>
                                <div class="medicenter_contact_title">
                                    Aragon Seguros
                                </div>
                                <div class="medicenter_cols">
                                    <div>
                                        33 Parque Santa Tereza<br />
                                        Jandira<br />
                                        SP 30,33, Brasil.
                                    </div>
                                    <div>
                                        +123 123 123<br />
                                        +123 123 123<br />
                                        <a href="./">aragonseguros@aragon.com</a>
                                    </div>
                                </div>
                                <div class="medicenter_social_media">
                                    <div class="social_media_space">
                                        <a href="./"><img src="../../assets/img/facebook.png" border="0" width="20" /></a>
                                    </div>
                                    <div class="social_media_space">
                                        <a href="./"><img src="../../assets/img/twitter.png" border="0" width="20" /></a>
                                    </div>
                                    <div class="social_media_space">
                                        <a href="./"><img src="../../assets/img/rss.png" border="0" width="20" /></a>
                                    </div>
                                    <div class="social_media_space">
                                        <a href="./"><img src="../../assets/img/googleplus.png" border="0" width="20" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_area_item">
                            <div class="widget">
                                <div class="widget_title">
                                    <div class="widget_title_text">Latest Posts</div>
                                    <div class="widget_title_bar"></div>
                                </div>
                                <div class="widget_body">
                                    <div class="latest_post">
                                        <div class="latest_title">
                                            <div class="flecha_title">
                                                <img src="../../assets/img/arrow.png" border="0" width="10" />
                                            </div>
                                            <div class="latest_text">
                                                <a href="./">Mauris adipiscing mauris fringilla turpis interdum pulvinar nisi malesuada.</a>
                                                <div class="latest_post_data">1 hour ago</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="latest_post">
                                        <div class="latest_title">
                                            <div class="flecha_title">
                                                <img src="../../assets/img/arrow.png" border="0" width="10" />
                                            </div>
                                            <div class="latest_text">
                                                <a href="./">Mauris adipiscing mauris fringilla turpis interdum pulvinar nisi malesuada.</a>
                                                <div class="latest_post_data">1 hour ago</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="latest_post">
                                        <div class="latest_title">
                                            <div class="flecha_title">
                                                <img src="../../assets/img/arrow.png" border="0" width="10" />
                                            </div>
                                            <div class="latest_text">
                                                <a href="./">Mauris adipiscing mauris fringilla turpis interdum pulvinar nisi malesuada.</a>
                                                <div class="latest_post_data">1 hour ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="footer_area_item">
                        <div class="widget">
                            <div class="widget_title">
                                <div class="widget_title_text">Latest tweets</div>
                                <div class="widget_title_bar"></div>
                            </div>
                            <div class="widget_body">
                                <div class="latest_tweet">
                                    <div class="tweet_title">
                                        <div class="flecha_title">
                                            <img src="../../assets/img/arrow.png" border="0" width="10" />
                                        </div>
                                        <div class="latest_tweet_text">
                                            <a href="./">Mauris adipiscing mauris fringilla turpis interdum pulvinar nisi malesuada.</a>
                                            <div class="latest_tweet_data">1 hour ago</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="latest_tweet">
                                    <div class="tweet_title">
                                        <div class="flecha_title">
                                            <img src="../../assets/img/arrow.png" border="0" width="10" />
                                        </div>
                                        <div class="latest_tweet_text">
                                            <a href="./">Mauris adipiscing mauris fringilla turpis interdum pulvinar nisi malesuada.</a>
                                            <div class="latest_tweet_data">1 hour ago</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="latest_tweet">
                                    <div class="tweet_title">
                                        <div class="flecha_title">
                                            <img src="../../assets/img/arrow.png" border="0" width="10" />
                                        </div>
                                        <div class="latest_tweet_text">
                                            <a href="./">Mauris adipiscing mauris fringilla turpis interdum pulvinar nisi malesuada.</a>
                                            <div class="latest_tweet_data">1 hour ago</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="latest_tweet">
                                    <div class="tweet_title">
                                        <div class="flecha_title">
                                            <img src="../../assets/img/arrow.png" border="0" width="10" />
                                        </div>
                                        <div class="latest_tweet_text">
                                            <a href="./">Mauris adipiscing mauris fringilla turpis interdum pulvinar nisi malesuada.</a>
                                            <div class="latest_tweet_data">1 hour ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_copy">
                    Copyright - <a href="./" > Aragon </a> by <a href="./">Pedro Medeiros.</a>
                </div>
            </div>
        </footer>

        <script src="../../assets/js/script.js"></script>
        <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>