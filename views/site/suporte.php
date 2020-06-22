<?php
    require_once('../../functions/conexao.php');
    $conexao = conexaoMysql();

    $status = 'info d-none';
    $message = "";
    $pergunta = "";

    if(isset($_GET['success'])){
        if($_GET['success'] == 'true'){
            $status = 'success d-block';
            $message = "Sua pergunta foi enviada para nossa equipe!";
        }else{
            $status = 'danger d-block';
            $message = "Erro ao conectar com o banco de dados";
        }
    }

    if(isset($_POST['btn-buscar'])){

        $pergunta = $_POST['ask'];
        
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
                    <li class="navigation-item ">
                        <a href="../../index.php">
                            HOME
                        </a>
                    </li>
                    <li class="navigation-item">
                        <a href="sobre.php">
                            SOBRE
                        </a>
                    </li>
                    <li class="navigation-item ">
                        <a href="contato.php">
                            CONTATO
                        </a>
                    </li>
                    <li class="navigation-item ativado">
                        <a href="suporte.php">
                            SUPORTE
                        </a>
                    </li>
                </ul>
            </div>
        </nav>  
        <div class="suporte-title d-flex justify-content-center align-items-center">
            
        </div>


        <section id="suporte-section1">
            <div class="container">
                <div class="suporte-busca mb-4"> 
                    <h3>Dúvidas? Talvez nós já respondemos</h3>
                    <div class="row">
                        <form class="form-inline" action="suporte.php" method="post">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" name="ask" value="<?=$pergunta?>" class="form-control aumentar-input" id="inputPassword2" placeholder="Busque uma dúvida">
                            </div>
                            <button type="submit" name="btn-buscar" class="btn btn-primary mb-2"> <img src="../../assets/img/search.png" class="search-icon" alt=""> Buscar </button>
                        </form>
                    </div>
                </div>
                <div class="alert alert-<?=$status?>" role="alert">
                    <?=$message?> Caso prefira entre em contato <a href="contato.php"> clicando aqui </a>
                </div>
                <h4 class="mb-2">Perguntas frequentes</h4>
                <hr class="mb-5">

                <div id="duvidas">

                    <?php

                        if(isset($_POST['btn-buscar'])){

                            $SQL = "SELECT * FROM faq WHERE pergunta LIKE '%".$pergunta."%' AND status = 1 ";
                            
                        }else{
                            $SQL = "SELECT * FROM faq WHERE status = 1";
                        }

                        
                        $SELECT = mysqli_query($conexao, $SQL);

                        while($rsConsulta = mysqli_fetch_array($SELECT)){

                    ?>
                    <div class="card mb-4 sombra">
                        <div class="card-header bg-primary text-white ">
                            <h5><?=$rsConsulta['pergunta']?></h5>
                        </div>
                        <div class="card-body">
                            R: <?=$rsConsulta['resposta']?>
                        </div>
                        <div class="card-footer">
                            <small> Respondido Por <a href="suporte.php"> Equipe Aragon </a> </small>
                        </div>
                    </div>


                    <?php
                        }
                    ?>
                </div>
                <hr>
                    <h6 class="ml-3">Não achou o que procura? Mande nos sua pergunta ou entre em contato <a href="contato.php"> clicando aqui </a></h6>
                    <form class="form-inline mb-5" action="actions/cadastrar-pergunta.php" method="POST">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" name="pergunta" id="inputPergunta" placeholder="Pergunte" required>
                        </div>
                        <button type="submit" name="btn-cadastrar-pergunta" class="btn light-blue btn-primary mb-2">Mandar nova pergunta</button>
                    </form>
                    
            </div>
        </section>

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