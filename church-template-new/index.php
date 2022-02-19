<?php
require "assets/config.php";
require_once('mail.send/class.phpmailer.php');
function enviaemail($database,$contatoID,$mensagem,$tipomensagem,$arquivo){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = MAIL_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = USERNAMEMAIL;
    $mail->Password = USERNAMPASS;
    $mail->From = USERNAMEMAIL;
    $mail->FromName = $tipomensagem . " - TRASS Tecnologia";
    $mail->AddAddress(USERNAMEMAIL, $tipomensagem);
    $mail->IsHTML(true);
    $mail->CharSet = 'utf-8';
    $mail->Subject  = $tipomensagem . " - TRASS Tecnologia";
    $mail->Body = $arquivo;
    $enviado = $mail->Send();
    $mail->ClearAllRecipients();
    if ($enviado) {
        $datacadastro = date('Y-m-d H:i:s');
        $newlamsg = array(
            'contatoID'     => $contatoID,
            'mensagem'      => $mensagem,
            'datacadastro'  => $datacadastro
        );
        $insert = $database->insert('contatomensagem',$newlamsg);
        ?><script type="text/javascript">alert("✅ Obrigado, em breve entraremos em contato!");</script><?php
        return;
    }
    else{ ?><script type="text/javascript">alert("❌ Nosso servidor está em manutenção, tente novamente mais tarde!");</script><?php }
    return;
}
if ( isset($_POST['email_newsletter']) ) {
    $email_newsletter = $database->escape($_POST['email_newsletter']);
    $sqlequal = "SELECT contato.* FROM contato WHERE contato.email = '$email_newsletter' LIMIT 1";
    if ($database->num_rows($sqlequal) > 0) { 
        list($contatoID) = $database->get_row($sqlequal);
        ?><script type="text/javascript">alert("✅ Você já está inscrito em nossa newsletter!");</script><?php 
    }
    else{
        $newla = array(
            'email' 		=> $email_newsletter,
            'nomecompleto' 	=> "",
            'telefone' 		=> "",
        );
        $database->insert('contato',$newla); 
        ?><script type="text/javascript">alert("✅ Obrigado por se inscrever em nossa newsletter!");</script><?php
    }
}

$sql1 = "SELECT email,facebook,instagram,youtube,telefone FROM sp_gerais LIMIT 1";
if ($database->num_rows($sql1) > 0 ) {
    list($email,$facebooksite,$instagramsite,$youtubesite,$whatsapppadrao) = $database->get_row($sql1);
    $whatsapp = str_replace('(', '', $whatsapppadrao);
    $whatsapp = str_replace(')', '', $whatsapp);
    $whatsapp = str_replace(' ', '', $whatsapp);
    $whatsapp = str_replace('-', '', $whatsapp);
}  
// $sqasdasasdsad = "SELECT titulo,sobre,video,missao,visao,valores,capacita,fomenta,transforma,conecta,endereco FROM sp_empresa LIMIT 1";
// if ($database->num_rows($sqasdasasdsad) > 0 ) {
//     list($empresatitulo,$empresasobre,$empresavideo,$empresamissao,$empresavisao,$empresavalores,$empresacapacita,$empresafomenta,$empresatransforma,$empresaconecta,$empresaendereco) = $database->get_row($sqasdasasdsad);
// }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Mevam Chapecó</title>
  <!-- Primary Meta Tags -->
	<meta name="title" content="Mevam Chapecó">
	<meta name="description" content="Mevam Chapecó - Missões Evangelísticas Vinde Amados Meus Chapecó">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="http://mevamchapeco.org/">
	<meta property="og:title" content="Mevam Chapecó">
	<meta property="og:description" content="Mevam Chapecó - Missões Evangelísticas Vinde Amados Meus Chapecó">
	<meta property="og:image" content="<?php echo URL::getBase() ?>images/logo/png">

	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="http://mevamchapeco.org/">
	<meta property="twitter:title" content="Mevam Chapecó">
	<meta property="twitter:description" content="Mevam Chapecó - Missões Evangelísticas Vinde Amados Meus Chapecó">
	<meta property="twitter:image" content="<?php echo URL::getBase() ?>images/logo/png">

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo URL::getBase() ?>plugins/bootstrap/bootstrap.min.css">
	<!-- FontAwesome -->
  <link rel="stylesheet" href="<?php echo URL::getBase() ?>plugins/fontawesome/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo URL::getBase() ?>plugins/animate.css">
	<link rel="stylesheet" href="<?php echo URL::getBase() ?>plugins/prettyPhoto.css">
	<link rel="stylesheet" href="<?php echo URL::getBase() ?>plugins/owl/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo URL::getBase() ?>plugins/owl/owl.theme.css">
	<link rel="stylesheet" href="<?php echo URL::getBase() ?>plugins/flex-slider/flexslider.css">
	<link rel="stylesheet" href="<?php echo URL::getBase() ?>plugins/cd-hero/cd-hero.css">
	<link id="style-switch" href="<?php echo URL::getBase() ?>css/presets/preset3.css" media="screen" rel="stylesheet" type="text/css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="<?php echo URL::getBase() ?>plugins/html5shiv.js"></script>
      <script src="<?php echo URL::getBase() ?>plugins/respond.min.js"></script>
    <![endif]-->

  <!-- Main Stylesheet -->
  <link href="<?php echo URL::getBase() ?>css/style.css" rel="stylesheet">
  
  <!--Favicon-->
	<link rel="icon" type="image/x-icon" href="<?php echo URL::getBase() ?>images/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL::getBase() ?>images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL::getBase() ?>images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="<?php echo URL::getBase() ?>images/favicon.ico">


	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
</head>

<body>
 

<div class="body-inner">
 
	<header id="header" class="fixed-top header" role="banner">
		<a class="navbar-brand navbar-bg" style="z-index: 9;" href="<?php echo URL::getBase() ?>"><img class="img-fluid float-right" src="<?php echo URL::getBase() ?>images/logo.png" style="height: 77px" alt="logo"></a>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark">
				<button class="navbar-toggler ml-auto border-0 rounded-0 text-white" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
				<div class="collapse navbar-collapse text-center" id="navigation">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="<?php echo URL::getBase() ?>" role="button">Home</a></li> 
						<!-- <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>#" role="button">Quem somos</a></li>  -->
						<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="<?php echo URL::getBase() ?>#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cursos</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo URL::getBase() ?>">Café da Aliança (Em breve)</a>
								<a class="dropdown-item" href="<?php echo URL::getBase() ?>cafedaalianca">Café da Aliança</a>
								<a class="dropdown-item" href="portfolio-classic.html">Mevam Academy</a>
								<a class="dropdown-item" href="portfolio-static.html">CPL - Capacitação de Pastores e Líderes</a>
							</div>
						</li> -->
						<!-- <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>cafedaalianca">Café da Aliança</a></a></li> -->
						<li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>retirojovens">Retiro de Jovens</a></a></li>
						<!-- <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>contact.html">Ministrações</a></a></li> -->
						<!-- <li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>contact.html">Blog/Notícias</a></a></li> -->
						<li class="nav-item"><a class="nav-link" href="<?php echo URL::getBase() ?>contato">Contato</a></a></li>
						<?php if ($instagramsite != ''): ?><li class="nav-item"><a class="nav-link" style="padding-right: 0px!important;font-size: 20px;" href="<?php echo $instagramsite ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php endif ?>
						<?php if ($facebooksite != ''): ?><li class="nav-item"><a class="nav-link" style="padding-right: 0px!important;font-size: 20px;" href="<?php echo $facebooksite ?>" target="_blank"><i class="fa fa-facebook-official"></i></a></li><?php endif ?>
						<?php if ($whatsapppadrao != ''): ?><li class="nav-item"><a class="nav-link" style="padding-right: 0px!important;font-size: 20px;" href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp ?>&text=Olá, vim pelo site, pode me ajudar?" target="_blank"><i class="fa fa-whatsapp"></i></a></li><?php endif ?>
						<?php if ($youtubesite != ''): ?><li class="nav-item"><a class="nav-link" style="padding-right: 0px!important;font-size: 20px;" href="<?php echo $youtubesite ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php endif ?>
					</ul>
				</div>
			</nav>
		</div>
	</header>
 
	<?php
	$modulo = Url::getURL( 0 );
	if( $modulo == null )$modulo = "presentation";
	if( file_exists( "pages/" . $modulo . ".php" ) ) require "pages/" . $modulo . ".php";
	else require "pages/404.php";
	?>


	

  <section class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h3>Entre em contato também pelo Whatsapp e tire todas as suas dúvidas</h3>
          <a href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp ?>&text=Ol%C3%A1,%20vim%20pelo%20site,%20pode%20me%20ajudar?" target="_blank" class="float-right btn btn-primary white"><i class="fa fa-whatsapp"></i> Vamos conversar?</a>
        </div>
      </div>
    </div>
  </section> 
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3552.6950315635113!2d-52.62195238495164!3d-27.071372683059646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e4b57bef0b32bd%3A0xddc6a158373850bc!2sMevam%20Chapec%C3%B3!5e0!3m2!1sen!2sbr!4v1592269998294!5m2!1sen!2sbr" height="400" frameborder="0" style="border:0;width: 100%;margin-bottom:-10px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  
	<!-- Footer start -->
	<!-- <footer id="footer" class="footer">
	  <div class="container">
	    <div class="row">
	      	<div class="col-md-4 col-sm-12 footer-widget">
		        <h3 class="widget-title">Recent Posts</h3>
		        <div class="latest-post-items media">
		          <div class="latest-post-content media-body">
		            <h4><a href="<?php echo URL::getBase() ?>#">Bulgaria claims to find Europe's 'oldest town'</a></h4>
		            <p class="post-meta">
		              <span class="author">Posted by John Doe</span>
		              <span class="post-meta-cat">in<a href="<?php echo URL::getBase() ?>#"> Blog</a></span>
		            </p>
		          </div>
		        </div>

		        <div class="latest-post-items media">
		          <div class="latest-post-content media-body">
		            <h4><a href="<?php echo URL::getBase() ?>#">Few Answers in Case of Murdered Law Professor</a></h4>
		            <p class="post-meta">
		              <span class="date"><i class="icon icon-calendar"></i> Mar 15, 2015</span>
		              <span class="post-meta-comments"><i class="icon icon-bubbles4"></i> <a href="<?php echo URL::getBase() ?>#">03</a></span>
		            </p>
		          </div>
		        </div>

		        <div class="latest-post-items media">
		          <div class="latest-post-content media-body">
		            <h4><a href="<?php echo URL::getBase() ?>#">Over the year we have lots of experience in our field</a></h4>
		            <p class="post-meta">
		              <span class="date"><i class="icon icon-calendar"></i> Apr 17, 2015</span>
		              <span class="post-meta-comments"><i class="icon icon-bubbles4"></i> <a href="<?php echo URL::getBase() ?>#">14</a></span>
		            </p>
		          </div>
		        </div>

	      	</div> 


	      <div class="col-md-4 col-sm-12 footer-widget">
	        <h3 class="widget-title">Flickr Photos</h3>

	        <div class="img-gallery">
	          <div class="img-container">
	            <a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/1.jpg">
	              <img src="<?php echo URL::getBase() ?>images/gallery/1.jpg" alt="">
	            </a>
	            <a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/2.jpg">
	              <img src="<?php echo URL::getBase() ?>images/gallery/2.jpg" alt="">
	            </a>
	            <a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/3.jpg">
	              <img src="<?php echo URL::getBase() ?>images/gallery/3.jpg" alt="">
	            </a>
	            <a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/4.jpg">
	              <img src="<?php echo URL::getBase() ?>images/gallery/4.jpg" alt="">
	            </a>
	            <a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/5.jpg">
	              <img src="<?php echo URL::getBase() ?>images/gallery/5.jpg" alt="">
	            </a>
	            <a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/6.jpg">
	              <img src="<?php echo URL::getBase() ?>images/gallery/6.jpg" alt="">
	            </a>
	            <a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/6.jpg">
	              <img src="<?php echo URL::getBase() ?>images/gallery/7.jpg" alt="">
	            </a>
	            <a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/6.jpg">
	              <img src="<?php echo URL::getBase() ?>images/gallery/8.jpg" alt="">
	            </a>
	            <a class="thumb-holder" data-rel="prettyPhoto" href="images/gallery/6.jpg">
	              <img src="<?php echo URL::getBase() ?>images/gallery/9.jpg" alt="">
	            </a>
	          </div>
	        </div>
	      </div> 

	      <div class="col-md-3 col-sm-12 footer-widget footer-about-us">
	        <h3 class="widget-title">About Craft</h3>
	        <p>We are a awward winning multinational company. We believe in quality and standard worldwide.</p>
	        <h4>Address</h4>
	        <p>1102 Saint Marys, Junction City, KS</p>
	        <div class="row">
	          <div class="col-md-6">
	            <h4>Email:</h4>
	            <p>info@craftbd.com</p>
	          </div>
	          <div class="col-md-6">
	            <h4>Phone No.</h4>
	            <p>+(785) 238-4131</p>
	          </div>
	        </div>
	        <form action="#" role="form">
	          <div class="input-group subscribe">
	            <input type="email" class="form-control" placeholder="Email Address" required="">
	            <span class="input-group-addon">
	              <button class="btn" type="submit"><i class="fa fa-envelope-o"> </i></button>
	            </span>
	          </div>
	        </form>
	      </div> 
	    </div>
	  </div>
	</footer> -->

 
	<section id="copyright" class="copyright angle">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12 text-center">
	        <ul class="footer-social unstyled">
	          <li> 
	            <?php if ($facebooksite != ''): ?><a title="Facebook" href="<?php echo $facebooksite ?>" target="_blank"><span class="icon-pentagon wow bounceIn"><i class="fa fa-facebook"></i></span></a><?php endif ?>
	            <?php if ($instagramsite != ''): ?><a title="Instagram" href="<?php echo $instagramsite ?>" target="_blank"><span class="icon-pentagon wow bounceIn"><i class="fa fa-instagram"></i></span></a><?php endif ?>
	            <?php if ($whatsapp != ''): ?><a title="WhatsApp" href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp ?>&text=Ol%C3%A1,%20vim%20pelo%20site,%20pode%20me%20ajudar?" target="_blank"><span class="icon-pentagon wow bounceIn"><i class="fa fa-whatsapp"></i></span></a><?php endif ?>
	            <?php if ($youtubesite != ''): ?><a title="Youtube" href="<?php echo $youtubesite ?>" target="_blank"><span class="icon-pentagon wow bounceIn"><i class="fa fa-youtube"></i></span></a><?php endif ?>
	             
	          </li>
	        </ul>
	      </div>
	    </div>
	    <div class="row"><div class="col-md-12 text-center"><div class="copyright-info">&copy; Copyright <?php echo date('Y') ?>. <span>Todos os direitos reservados à Mevam Chapecó.</span></div></div></div>
	    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix position-fixed"><button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i></button></div>
	  </div> 
	</section>  

</div>

<!-- jQuery -->
<script src="<?php echo URL::getBase() ?>plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo URL::getBase() ?>plugins/bootstrap/bootstrap.min.js"></script>
<!-- Style Switcher -->
<!-- <script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/style-switcher.js"></script> -->
<!-- Owl Carousel -->
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/owl/owl.carousel.js"></script>
<!-- PrettyPhoto -->
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/jquery.prettyPhoto.js"></script>
<!-- Bxslider -->
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/flex-slider/jquery.flexslider.js"></script>
<!-- CD Hero slider -->
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/cd-hero/cd-hero.js"></script>
<!-- Isotope -->
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/isotope.js"></script>
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/ini.isotope.js"></script>
<!-- Wow Animation -->
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/wow.min.js"></script>
<!-- Eeasing -->
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/jquery.easing.1.3.js"></script>
<!-- Counter -->
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/jquery.counterup.min.js"></script>
<!-- Waypoints -->
<script type="text/javascript" src="<?php echo URL::getBase() ?>plugins/waypoints.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="<?php echo URL::getBase() ?>plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>

</html>