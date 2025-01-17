<?php

    // Exibe mensagem de erro, successo ou informação
    // de acordo com a ação do usuario
    $status = 'info d-none';
    $message = "";

    if(isset($_GET['success'])){
        if($_GET['success'] == 'true'){
            $status = 'success d-block';
            $message = "Sua mensagem foi enviada!";
        }else if($_GET['success'] == 'false'){
            $status = 'danger d-block';
            $message = "Erro ao conectar com o banco de dados";
        }else{
            $status = 'info d-block';
            $message = "Sua cotação foi enviada para um de nossos consultores, caso prefira, entre em contato diretamente!";
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
                        <li class="navigation-item ">
                            <a href="sobre.php">
                                SOBRE
                            </a>
                        </li>
                        <li class="navigation-item ativado">
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
            <div class="contato-title d-flex justify-content-center align-items-center">
                <h1>
                    Contate nos
                </h1>
            </div>
            <section class="contato-section1 d-flex ">
                <div class="formulario-contato d-flex justify-content-center">
                    <div class="contato-formulario-title">
                        <h2> Entre em contato com a gente</h2>
                        <h5> Estamos abertos a qualquer sugestão. </h5>
                    </div>
                    
                    <div class="contato-formulario-info">
                        <div class=row>
                            <div class="coluna-img mr-5  d-flex align-items-center">
                                <img src="../../assets/img/phone.png" alt="">
                            </div>
                            <div class="coluna-info">
                                <h6> +55 (11) 3055 - 1213</h6>
                                <h6> +55 (11) 93055 - 1213 </h6>
                            </div>
                        </div>
                    </div>

                    <div class="contato-formulario-info">
                        <div class=row>
                            <div class="coluna-img mr-5  d-flex align-items-center justify-content-center">
                                <img src="../../assets/img/mail.png" alt="">
                            </div>
                            <div class="coluna-info">
                                <h6> info@gmail.com</h6>
                                <h6> support@aragon.com </h6>
                            </div>
                        </div>
                    </div>

                    <div class="contato-formulario-info">
                        <div class=row>
                            <div class="coluna-img mr-5 d-flex align-items-center">
                                <img src="../../assets/img/pin.png" alt="">
                            </div>
                            <div class="coluna-info">
                                <h6> Rua Robert Bosch, 544  </h6>
                                <h6> 06453-017 </h6>
                                <h6> Barra Funda, São Paulo - SP</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formulario-contato-mensagem">
                    <form class="mensagem" action="actions/cadastrar-contato.php" method="POST">
                        <div class="alert alert-<?=$status?>" role="alert">
                            <?=$message?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome <span class="text-danger">*</span></label>
                            <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telefone para contato <span  class="text-danger">*</span></label>
                            <input type="text" name="contato" class="form-control" id="exampleInputPassword1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sua observação  <span class="text-danger">*</span></label>
                            <textarea required name="obs" class="form-control resize-none" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <small id="emailHelp" class="form-text text-muted mb-3">Os itens com <span class="text-danger">*</span> são obrigatórios</small>
                        <button type="submit" name="btn-cadastrar-contato" class="btn btn-primary btn-block">Enviar</button>
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


    </body>
</html>