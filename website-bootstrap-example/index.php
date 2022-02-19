<?php
require "assets/class/urlfr.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>TRASS - Soluções Digitais</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo URL::getBase() ?>images/favicon.ico">

    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo URL::getBase() ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL::getBase() ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo URL::getBase() ?>css/owl.carousel.min.css">
    
    <link href="<?php echo URL::getBase() ?>css/animatew3.css" rel="stylesheet">
    <link href="<?php echo URL::getBase() ?>css/style.css" rel="stylesheet">
    <script defer src="<?php echo URL::getBase() ?>fonts/fa/js/all.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo URL::getBase() ?>css/animations.css" type="text/css">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">
    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="<?php echo URL::getBase(); ?>home"><img src="<?php echo URL::getBase(); ?>images/logolado.png" style="max-height:65px;" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link <?php if (!URL::getURL(0) || URL::getURL(0) == 'home'): ?>active<?php endif ?>" href="<?php echo URL::getBase(); ?>home">HOME <span class="sr-only">(current)</span></a> </li>
                                <!-- <li class="nav-item"> <a class="nav-link <?php if ( URL::getURL(0) == 'quemsomos'): ?>active<?php endif ?>" href="<?php echo URL::getBase(); ?>quemsomos">QUEM SOMOS</a> </li> -->
                                <!-- <li class="nav-item"> <a class="nav-link <?php if ( URL::getURL(0) == 'servicos'): ?>active<?php endif ?>" href="<?php echo URL::getBase() ?>servicos">SERVIÇOS</a> </li> -->
                                <li class="nav-item"> <a class="nav-link <?php if ( URL::getURL(0) == 'blog'): ?>active<?php endif ?>" href="<?php echo URL::getBase(); ?>blog">BLOG E NOTÍCIAS</a> </li>
                                <li class="nav-item"> <a class="nav-link <?php if ( URL::getURL(0) == 'contato'): ?>active<?php endif ?>" href="<?php echo URL::getBase() ?>contato">CONTATO</a> </li> 
                                <li class="nav-item"> <a style="background-color: #343a40;color:white;" class="nav-link btn btn-outline-dark my-3 my-sm-0 ml-lg-3 <?php if ( URL::getURL(0) == 'servicos'): ?>active<?php endif ?>" href="<?php echo URL::getBase() ?>servicos/site">CRIE SEU SITE</a> </li>
                                <li class="nav-item"><a href="#" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Acesso do Cliente <i class="ti-lock"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div style="min-height:calc(100vh - 241px);">
        <?php
        $modulo = Url::getURL( 0 );
        if( $modulo == null )$modulo = "home";
        if( file_exists( "pages/" . $modulo . ".php" ) )
            require "pages/" . $modulo . ".php";
        else
            require "pages/404.php";
        ?>
    </div>
    <footer class="section bg-gradient">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 text-center text-lg-left"><img src="<?php echo URL::getBase() ?>images/logolado.png" alt="TRASS" style="width:100%;" /></div>
                <div class="col-12 col-lg-1"></div>
                <div class="col-lg-5 text-center text-lg-left" style="">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> Chapecó - Santa Catarina</p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:contato@trass.com.br">contato@trass.com.br</a>
                        </p>
                    </div>
                    <div class="d-block " >
                        <p class="mb-0">
                            <span class="ti-headphone-alt mr-2"></span> <a href="tel:+5549999934272">(49) 99993-4272</a>
                        </p>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/trasstecnologia/" target="_blank"><span class="ti-facebook gradient-fill"></span></a>
                        <!-- <a href="#"><span class="ti-linkedin gradient-fill"></span></a> -->
                        <a href="https://www.instagram.com/trasstecnologia/" target="_blank"><span class="ti-instagram gradient-fill"></span></a>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    
    <script src="<?php echo URL::getBase() ?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo URL::getBase() ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URL::getBase() ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo URL::getBase() ?>js/script.js"></script>

    <script src='<?php echo URL::getBase() ?>js/css3-animate-it.js'></script>
    
</body>

</html>
