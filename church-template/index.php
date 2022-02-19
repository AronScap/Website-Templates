<?php
require "assets/config.php";
require_once('mail.send/class.phpmailer.php');
$description = "";
$imagem = "";
$dominio = "";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $description ?>">
    <meta name="author" content="TRASS Tecnologia - Soluções Digitais | Aron Scapinello Selhorst">
    <meta name="generator" content="TRASS v1.0.0">
    <title>MEVAM CHAPECÓ</title>
    <meta name="title" content="MEVAM CHAPECÓ">

    <link href="<?php echo URL::getBase() ?>assets/fontawesome/css/all.css" rel="stylesheet">
    <link href="<?php echo URL::getBase() ?>assets/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $dominio ?>">
    <meta property="og:title" content="MEVAM CHAPECÓ">
    <meta property="og:description" content="<?php echo $description ?>">
    <meta property="og:image" content="<?php echo $imagem ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $dominio ?>">
    <meta property="twitter:title" content="MEVAM CHAPECÓ">
    <meta property="twitter:description" content="<?php echo $description ?>">
    <meta property="twitter:image" content="<?php echo $imagem ?>">
     

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="<?php echo URL::getBase() ?>carousel.css" rel="stylesheet">

    
  </head>
  <body>
    <header>       
      <nav id="navbar" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark " style="transition: top 0.7s">
        <div class="container">
          <a class="navbar-brand" href="<?php echo URL::getBase() ?>home"><img src="<?php echo URL::getBase() ?>images/logom.png" alt /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active"><a class="nav-link" href="<?php echo URL::getBase() ?>home">Página Inicial</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>quemsomos">Quem somos</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>programacao">Programação</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cursos</a>
                <div class="dropdown-menu" aria-labelledby="dropdown07">
                  <a class="dropdown-item" href="<?php echo URL::getBase() ?>">Mevam Academy</a>
                  <a class="dropdown-item" href="<?php echo URL::getBase() ?>">CPL - Capacitação para Pastores e Líderes</a>
                  <!-- <a class="dropdown-item" href="<?php echo URL::getBase() ?>"></a> -->
                </div>
              </li>
              <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>ministracao">Ministrações</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>blog">Blog</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>contato">Contato</a></li>
            </ul>
            <a href="https://instagram.com/mevamchapeco" target="_blank" class="navbar-brand"><i class="fab fa-instagram"></i></a>
            <a href="https://facebook.com/mevamchapeco" target="_blank" class="navbar-brand"><i class="fab fa-facebook-square"></i></a>
            <a href="https://youtube.com/mevamchapeco" target="_blank" class="navbar-brand"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </nav>
    </header>
    <main role="main">

      <!-- Colocar em uma section os grupos (Nossos Gruppos)
      <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>">Mulheres</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>">Jovens</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>">Kids</a></li> -->
      <?php
      $modulo = Url::getURL( 0 );
      if( $modulo == null )$modulo = "home";
      if( file_exists( "pages/" . $modulo . ".php" ) ) require "pages/" . $modulo . ".php";
      else require "pages/404.php";
      ?>
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-4 color-white text-left">
                <img src="<?php echo URL::getBase() ?>images/logo.png" alt style="margin-top: 15px;margin-right: 10px;" />
                <div style="display: inline-flex;">Rua Blumenau, 40 - Líder<br> Chapecó - SC, 89805-243</div>
                <br>
                <div class="text-left color-white">
                  <br><a href="tel:+554949988294940"><i class="fa fa-phone-square"></i> (49) 98829-4940</a> 
                  <br><a href="mailto:contato@mevamchapeco.com.br"><i class="fa fa-envelope"></i> contato@mevamchapeco.com.br</a>
                  <br><a href="https://api.whatsapp.com/send?phone=5549988294940&amp;text=Ol%C3%A1,%20vim%20pelo%20site,%20poderia%20me%20ajudar?" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                  <br><a href="https://www.facebook.com/mevamchapeco/" target="_blank"><i class="fab fa-facebook-square"></i> Facebook</a>                            
                </div>
            </div>

            <div class="col-lg-4 col-md-12" style="color:white;font-size: 14px;">
              <div class="mt-4"><h5 style="color:white;">Programação</h5></div>
              <div style="display: inline-block; width: 25%;">Terça-feira</div>
              <div style="display: inline-block; width: 72%;">19:30 hrs - Mevam Academy</div>
              <div style="display: inline-block; width: 25%;">Quinta-feira</div>
              <div style="display: inline-block; width: 72%;">20:00 hrs</div>
              <div style="display: inline-block; width: 25%;">Sábado</div>
              <div style="display: inline-block; width: 72%;">20:00 hrs - Culto dos Jovens.</div>
              <div style="display: inline-block; width: 25%;">Domingo</div>
              <div style="display: inline-block; width: 72%;">09:00 hrs e 19:00 hrs</div>

            </div>
            <div class="col-md-2 ministeriosfootes">
              <div class="mt-4"><h5 style="color:white;">Ministérios</h5></div>
              <a href="<?php echo URL::getBase() ?>"><i class="fa fa-angle-right"></i> Mulheres</a><br>
              <a href="<?php echo URL::getBase() ?>"><i class="fa fa-angle-right"></i> Jovens</a><br>
              <a href="<?php echo URL::getBase() ?>"><i class="fa fa-angle-right"></i> Kids</a><br>
            </div>
            <div class="col-md-2">
              
            </div>
            <div class="col-md-12 text-center" style="color: #aaaaaa;">&copy; Todos os direitos reservados à Mevam Chapecó</div>
            <!-- <p class="float-right"><a href="<?php echo URL::getBase() ?>">Back to top</a></p> -->
          </div>
        </div>
      </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo URL::getBase() ?>assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="<?php echo URL::getBase() ?>assets/dist/js/bootstrap.bundle.js"></script></body>
    <script>
      var prevScrollpos = window.pageYOffset;
      window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        // console.log(prevScrollpos + " | " + currentScrollPos)
        if ( currentScrollPos > (177)) {
          if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
          } else {
            document.getElementById("navbar").style.top = "-100px";
          }
          prevScrollpos = currentScrollPos;
        }
      }
    </script>
</html>
