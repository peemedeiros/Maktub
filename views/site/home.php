<?php
    require_once('functions/conexao.php');
    $conexao = conexaoMysql();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/site/site.css">
        <title>Aragon Seguros</title>
        <link rel="icon" type="imagem/png" href="assets/img/aragon-icon.png" />
    </head>
    <body>
        <div class="top-bar">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="login-box">
                        <div class="nav-icon">
                            <img src="assets/img/user.png" alt="login">
                        </div>
                        <div class="nav-link">
                            <a href="views/operador/operador-login.php" class="text-white">Sou consultor</a>
                        </div>
                    </div>

                    <div class="login-box">
                        <div class="nav-icon">
                            <img src="assets/img/adm.png" alt="login">
                        </div>
                        <div class="nav-link">
                            <a href="views/cms/cms-login.php" class="text-white">Sou administrador</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav id="navigation-bar">
            <div class="container d-flex justify-content-between">
                <div class="logo">
                    <img src="assets/img/aragon.png" alt="logo">
                </div>
                <ul class="navigation-all-itens">
                    <li class="navigation-item ativado">
                        <a href="index.php">
                            HOME
                        </a>
                    </li>
                    <li class="navigation-item ">
                        <a href="views/site/sobre.php">
                            SOBRE
                        </a>
                    </li>
                    <li class="navigation-item ">
                        <a href="views/site/contato.php">
                            CONTATO
                        </a>
                    </li>
                    <li class="navigation-item ">
                        <a href="views/site/suporte.php">
                            SUPORTE
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/hospital.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/hospital2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/hospital3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="section1">
            <div class="container d-flex">
                <div class="col-lg-6">
                    <div class="doc-img">
                        <img src="assets/img/doctor.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row d-flex justify-content-center">
                        <img class="about-logo" src="assets/img/aragon.png" alt="">
                    </div>
                    <div class="row">
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="decoracao">
            <div class="borda-dashed">
                
            </div>
        </div>

        <div class="section2 pt-3">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <h1>Faça uma simulação antes de enviar sua cotação</h1>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="formulario-simulacao">
                            <form method="POST" action="views/site/simulacao-planos.php">
                                <div class="form-group">
                                    <label for="inputNome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="inputNome" aria-describedby="NomeHelper">
                                </div>
                                <div class="form-group">
                                    <label for="inputContato">Contato</label>
                                    <input type="text" name="contato" class="form-control" id="inputContato">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail">
                                </div>
                                
                                <div class="form-group">
                                    <label for="selectIdade">Idade</label>
                                    <select class="form-control" name="idade" id="selectIdade">
                                    <option>Selecione sua idade</option>
                                        <?php
                                            $SQL = "SELECT * FROM faixa_etaria";
                                            $SELECT = mysqli_query($conexao, $SQL);

                                            while($rsConsulta = mysqli_fetch_array($SELECT)){
                                        ?>

                                        <option value="<?=$rsConsulta['id']?>"><?=$rsConsulta['range_idade']?></option>

                                        <?php
                                            }
                                        ?>
                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="selectModalidade">Modalidade</label>
                                    <select class="form-control" name="modalidade" id="selectModalidade">
                                    <option>Tipo de acomodação</option>
                                        <?php
                                            $SQLmodalidade = "SELECT * FROM modalidade";
                                            $SELECTmodalidade = mysqli_query($conexao, $SQLmodalidade);

                                            while($rsConsultaModalidade = mysqli_fetch_array($SELECTmodalidade)){
                                        ?>

                                        <option value="<?=$rsConsultaModalidade['id']?>"><?=$rsConsultaModalidade['nome']?></option>

                                        <?php
                                            }
                                        ?>
                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="selectReembolso">Reembolso</label>
                                    <select class="form-control" name="reembolso" id="selectReembolso">
                                    <option>Tipo de reembolso</option>
                                        <?php
                                            $SQLreembolso = "SELECT * FROM reembolso";
                                            $SELECTreembolso = mysqli_query($conexao, $SQLreembolso);

                                            while($rsConsultaReembolso = mysqli_fetch_array($SELECTreembolso)){
                                        ?>

                                        <option value="<?=$rsConsultaReembolso['id']?>"><?=$rsConsultaReembolso['nome']?></option>

                                        <?php
                                            }
                                        ?>
                        
                                    </select>
                                </div>

                                <button type="submit" name="btn-simular" class="btn btn-primary btn-lg btn-block">Iniciar simulação</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <h3 class="mb-4"> Coloque seus dados para encontrarmos o plano ideal para você</h3>
                        </div>
                        <div class="woman-question">

                        </div>
                    </div>
                </div>
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
                                        <a href="./"><img src="assets/img/facebook.png" border="0" width="20" /></a>
                                    </div>
                                    <div class="social_media_space">
                                        <a href="./"><img src="assets/img/twitter.png" border="0" width="20" /></a>
                                    </div>
                                    <div class="social_media_space">
                                        <a href="./"><img src="assets/img/rss.png" border="0" width="20" /></a>
                                    </div>
                                    <div class="social_media_space">
                                        <a href="./"><img src="assets/img/googleplus.png" border="0" width="20" /></a>
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
                                                <img src="assets/img/arrow.png" border="0" width="10" />
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
                                                <img src="assets/img/arrow.png" border="0" width="10" />
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
                                                <img src="assets/img/arrow.png" border="0" width="10" />
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
                                            <img src="assets/img/arrow.png" border="0" width="10" />
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
                                            <img src="assets/img/arrow.png" border="0" width="10" />
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
                                            <img src="assets/img/arrow.png" border="0" width="10" />
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
                                            <img src="assets/img/arrow.png" border="0" width="10" />
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
                
        <script src="assets/js/script.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>