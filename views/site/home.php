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
        <?php 
            require_once('template/top-bar.php');
            require_once('template/nav-bar.php');
        ?>
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

                                </div>
                            </div>
                            <div class="col-lg-6">

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
                                    <a href="./">Here in Medicenter we have individual →</a>
                                </div>
                            </div>
                            <div class="fm_2">
                                <div class="fm_title">
                                    Medical Records
                                </div>
                                <div class="fm_desc">
                                    <a href="./">Here in Medicenter we have individual →</a>
                                </div>
                            </div>
                            <div class="fm_3">
                                <div class="fm_title">
                                    Online Bill..
                                </div>
                                <div class="fm_desc">
                                    <a href="./">Here in Medicenter we have individual →</a>
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
                                                33 Farlane Street<br />
                                                Keilor East<br />
                                                VIC 30,33, Australia.
                                            </div>
                                            <div>
                                                +123 655 655<br />
                                                +123 755 755<br />
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