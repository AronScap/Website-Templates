<?php
require "assets/config.php";
require_once('mail.send/class.phpmailer.php');

?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from ydirection.com/IN JOB/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Mar 2021 02:12:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>IN JOB</title>
    <link rel="icon" href="assets/icons/favicon.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="IN JOB Multipurpose  Landing Page Template Template">
    <meta name="keywords" content="IN JOB HTML Template, IN JOB Landing Page Template,  Landing Page Template">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900%7COpen+Sans:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.css"> <!-- Resource style -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css"> <!-- Resource style -->
    <link href="assets/css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
  </head>
  <body class="boxed-layout">
    <div class="wrapper">
      <!-- Navbar Section -->
      <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top wt-border">
        <div class="container">
          <a class="navbar-brand" href="#">IN JOB</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right">
              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#main">Product</a></li>
              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#features">Features</a></li>
              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#reviews">Reviews</a></li>
              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#pricing">Pricing</a></li>
              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#faqs">FAQ</a></li>
              <li><a class="btn-nav js-scroll-trigger" href="#cta">Download</a></li>
            </ul>
          </div>
        </div>
      </nav><!-- Navbar End -->

      <div id="main" class="main">
        <div class="home">
          <div class="container">
            <div class="hero-content wow fadeIn">
              <div class="flex-split">
                <div class="container">
                  <div class="flex-inner flex-inverted align-center">
                    <div class="f-image f-image-inverted">
                      <img class="img-fluid" src="assets/images/head.png" alt="Feature">
                    </div>
                    <div class="f-text">
                      <div class="left-content">
                        <h4>Podemos te ajudar!</h4>
                        <h2>Com a IN JOB o emprego é garantido!</h2>
                        <!-- <a class="btn-action btn-outline nav-link js-scroll-trigger" href="#features">See More</a> -->
                        <a class="btn-action" href="#">Conhecer Treinamento</a>
                      </div>
                      <!-- <p class="condition_txt">Free unrestricted usage for 14 days.<br> No credit card required*</p> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- Hero End -->


        <div id="cta" class="yd_cta_box" style="background: #f7f7f7;">
          <div class="container">
            <div class="cta_box" style="background: #f7f7f7;">
              <div class="cta_box_inner">
                <div class="col-sm-12 col-md-12">
                  <h4>A IN JOB TE AJUDA!</h4>
                  <h2>Encontre a sua vaga de emprego!</h2>
                  <div class="form">
                    <form action="<?php echo URL::getBase() ?>vagas" method="get" accept-charset="UTF-8" enctype="application/x-www-form-urlencoded" autocomplete="off" novalidate>
                      <input class="mail" style="padding: 0 12px;min-width: 55%; background: white;border: solid 1px #d6d6d6;" id="vaga" type="text" name="vaga" placeholder="Encontre sua vaga de emprego" autocomplete="off"><button class="submit-button" type="submit" ><i class="fa fa-search"></i> Buscar</button>
                    </form>
                   <div id="response"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!--- About Section -->
        <div class="yd-cat">
          <div class="container">
            <div class="cat-inner">
              <div class="cat-flex">
                <div class="cat2">
                  <h4>Passo-a-passo</h4>
                  <h2>Veja como é simples conquistar sua vaga de emprego!</h2>
                  <!-- <p> Get staright to the point always, people find it attractive when they visit your website.</p> -->
                </div>
              </div>
              <div class="cat-flex">
                <div class="cat1">
                  <div class="cat-item clr1">
                    <div class="cat-icon">
                      <div class="cat-img">
                        <img src="assets/icons/cat1.png" width="80" alt="Feature">
                      </div>
                    </div>
                    <div class="cat-text">
                      <h3>1. Anuncie seu currículo</h3>
                      <p>Deliver the best stories and ideas on the topics you care about most straight to you.</p>
                    </div>
                  </div>
                </div>
                <div class="cat1">
                  <div class="cat-item clr2">
                    <div class="cat-icon">
                      <div class="cat-img">
                        <img src="assets/icons/cat3.png" width="80" alt="Feature">
                      </div>
                    </div>
                    <div class="cat-text">
                      <h3>2. Procure por vagas</h3>
                      <p>Deliver the best stories and ideas on the topics you care about most straight to you.</p>
                    </div>
                  </div>
                </div>
                <div class="cat1">
                  <div class="cat-item clr3">
                    <div class="cat-icon">
                      <div class="cat-img">
                        <img src="assets/icons/cat2.png" width="80" alt="Feature">
                      </div>
                    </div>
                    <div class="cat-text">
                      <h3>3. Veja quem te viu</h3>
                      <p>Deliver the best stories and ideas on the topics you care about most straight to you.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<!--         <div id="features" class="ft-flex">
          <div class="container">
            <div class="ft-inner align-center">
              <div class="ft-image wow">
                <img class="img-fluid" src="assets/images/support.png" alt="Feature">
              </div>
              <div class="ft-text">
                <div class="ft-content">
                  <h2>Data Sharing.</h2>
                  <p> When you get staright to the point the presentation looks attractive on your web pages.</p>
                  <ul>
                    <li><img src="assets/icons/tick.svg" alt="Tick"> Realtime broadcasts </li>
                    <li><img src="assets/icons/tick.svg" alt="Tick"> Upload and sit tight </li>
                    <li><img src="assets/icons/tick.svg" alt="Tick"> View realtime stats</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="ft-inner ft-inverted align-center">
              <div class="ft-image f-image-inverted">
                <img class="img-fluid" src="assets/images/write.png" alt="Feature">
              </div>
              <div class="ft-text">
                <div class="ft-content">
                  <h2>High Definition</h2>
                  <p> When you get staright to the point the presentation looks attractive on your web pages.</p>
                  <ul>
                    <li><img src="assets/icons/tick.svg" alt="Tick"> Realtime broadcast </li>
                    <li><img src="assets/icons/tick.svg" alt="Tick"> View realtime stats </li>
                    <li><img src="assets/icons/tick.svg" alt="Tick"> Upload and sit tight </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
 -->

  <div id="reviews" class="yd_reviews">
          <div class="container">
            <div class="yd_rev_inner">
              <div class="row">
                <div class="col-md-5">
                  <div class="rev-intro">
                    <h2>Stories from our customers</h2>
                    <p> When you get staright to the point the presentation looks attractive.</p>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="rev-list owl-carousel owl-theme">
                    <div class="rev-block">
                      <img src="assets/icons/quote.svg" width="60" alt="Quote">
                      <h2>Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. We use IN JOB for key for easy and seamless weekly communication with our clients and .</h2>
                      <div class="rev-client">
                        <div class="rev-icon">
                          <div class="rev-img">
                            <img class="rounded-circle" src="assets/icons/rev.png" width="60" alt="Feature">
                          </div>
                        </div>
                        <div class="rev-text">
                          <h3>Marty McFly</h3>
                          <p>Head of OP, <a href="#">Future LLC</a></p>
                        </div>
                      </div>
                    </div>

                    <div class="rev-block">
                      <img src="assets/icons/quote.svg" width="60" alt="Quote">
                      <h2> Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. We use IN JOB for key for easy and seamless weekly communication with our clients.</h2>
                      <div class="rev-client">
                        <div class="rev-icon">
                          <div class="rev-img">
                            <img class="rounded-circle" src="assets/icons/rev2.png" width="60" alt="Feature">
                          </div>
                        </div>
                        <div class="rev-text">
                          <h3>Dr. Strange</h3>
                          <p>CTO, <a href="#">Arma Systems</a></p>
                        </div>
                      </div>
                    </div>

                    <div class="rev-block">
                      <img src="assets/icons/quote.svg" width="60" alt="Quote">
                      <h2>We use IN JOB for key for easy and seamless weekly communication with our clients. Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</h2>
                      <div class="rev-client">
                        <div class="rev-icon">
                          <div class="rev-img">
                            <img class="rounded-circle" src="assets/icons/rev3.png" width="60" alt="Feature">
                          </div>
                        </div>
                        <div class="rev-text">
                          <h3>John Kennedy</h3>
                          <p>Manager Sales, <a href="#">Optima Corp</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Counter Section -->
        <div class="yd-stats">
          <div class="container-s">
            <div class="row text-center">
             <div class="col-sm-12">
                <div class="intro">
                  <h4>OUR RESULTS</h4>
                  <h2>Our awesome results worth displaying</h2>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="counter-up">
                  <div class="counter-icon">
                    <img src="assets/icons/f1.png" alt="Icon">
                  </div>
                   <h3><span class="counter">47</span>%</h3>
                  <div class="counter-text">
                    <h2>Mobile Users</h2>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="counter-up">
                  <div class="counter-icon">
                    <img src="assets/icons/f2.png" alt="Icon">
                  </div>
                   <h3><span class="counter">33</span>%</h3>
                  <div class="counter-text">
                    <h2>Daily Views</h2>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="counter-up">
                  <div class="counter-icon">
                    <img src="assets/icons/f3.png" alt="Icon">
                  </div>
                   <h3><span class="counter">28</span>%</h3>
                  <div class="counter-text">
                    <h2>Monthly Returns</h2>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="counter-up">
                  <div class="counter-icon">
                    <img src="assets/icons/f4.png" alt="Icon">
                  </div>
                  <h3><span class="counter">349</span>%</h3>
                  <div class="counter-text">
                    <h2>Annual Growth</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- Counter Section Ends -->


        <!-- YD Flex Grid Section -->
       


        <!-- Pricing Tables -->
        <div id="pricing" class="pricing-section text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 offset-lg-2 col-sm-10 offset-sm-1">
                <div class="pricing-intro">
                  <h1>Simple & Affordable Pricing.</h1>
                  <p>
                    Our plans are designed to meet the requirements of both beginners <br class="hidden-xs"> and players.
                    Get the right plan that suits you.
                  </p>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="table-left">
                      <h2>Basic Free</h2>
                      <p>Limited features</p>
                      <img class="img-fluid" src="assets/icons/f1.png" width="120" alt="Icon">
                      <div class="pricing-details">
                       <span>Free</span>
                       <div class="sub_span">One year</div>
                      </div>
                      <a class="btn-action">Download</a>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="table-right">
                      <h2>Premium</h2>
                      <p>Unlimited Lifetime</p>
                      <img class="img-fluid" src="assets/icons/f3.png" width="120" alt="Icon">
                      <div class="pricing-details">
                       <span>$99.99</span>
                       <div class="sub_span sub_span_alt">Lifetime</div>
                      </div>
                      <a class="btn-action btn-outline">Subscribe</a>
                    </div>
                  </div>
                </div>
                <p class="refund-txt">* Refund requests can be accepted with in 10 days of the purchase.</p>
              </div>
            </div>
          </div>
        </div>



        <!-- Faq Section -->
        <div id="faqs" class="yd_faqs">
          <div class="container">
            <div class="faq_inner">
              <div class="col-md-10 offset-md-1">
                <div class="faq_intro">
                  <h2>Frequently Asked Queries</h2>
                  <p>Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</p>
                  <h5>Still have questions?</h5> <a class="link-btm" href="#">Contact us</a>
                </div>
                <div id="accordion">
                  <div class="row">
                    <div class="col-md-6 custompadding">
                      <div class="card mb-0">
                        <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                          <a class="card-title">What is IN JOB?</a>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                            <p>Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                              synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 custompadding">
                      <div class="card mb-0">
                        <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo">
                          <a class="card-title">How much does template cost?</a>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                          <div class="card-body">
                            <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                              synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 custompadding">
                      <div class="card mb-0">
                        <div class="card-header collapsed" data-toggle="collapse" href="#collapseThree">
                          <a class="card-title">How can updates be downloaded?</a>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                          <div class="card-body">
                            <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                              synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 custompadding">
                      <div class="card mb-0">
                        <div class="card-header collapsed" data-toggle="collapse" href="#collapseFour">
                          <a class="card-title">Some other Support related queries.</a>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                          <div class="card-body">
                            <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- Faq Section End -->




        <!-- Footer -->
        <div class="footer">
          <div class="container">
            <div class="row text-center">
              <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="footer-logo">
                  <h2>C O N N E C T.</h2>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="footer-menu">
                  <li><a href="#main">About</a> </li>
                  <li><a href="#main">Privacy</a> </li>
                  <li><a href="#main">Terms</a> </li>
                  <li><a href="#main">Contact</a> </li>
                </ul>
              </div>
              <div class="col-lg-4 col-md-3 col-sm-12">
                <div class="footer-links">
                  <ul>
                    <li><a href="#main"> <img class="img-fluid" src="assets/icons/i1.png" alt="Icon"> </a> </li>
                    <li><a href="#main"> <img class="img-fluid" src="assets/icons/i2.png" alt="Icon"> </a> </li>
                    <li><a href="#main"> <img class="img-fluid" src="assets/icons/i3.png" alt="Icon"> </a> </li>
                    <li><a href="#main"> <img class="img-fluid" src="assets/icons/i4.png" alt="Icon"> </a> </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Scroll To Top -->
              <a id="back-top" class="back-to-top js-scroll-trigger" href="#main"></a>
          <!-- Scroll To Top Ends-->
          </div>
        </div>
      </div> <!-- Main -->
    </div><!-- Wrapper -->


    <!-- Jquery and Js Plugins -->
    <script src="assets/js/jquery-2.1.1.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>

<!-- Mirrored from ydirection.com/IN JOB/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Mar 2021 02:13:21 GMT -->
</html>
