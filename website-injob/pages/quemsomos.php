
 <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo URL::getBase() ?>images/bg_2.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo URL::getBase() ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Quem somos <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Quem somos</h1>
     </div>
   </div>
 </div>
</section>

<section class="ftco-section ftco-about img" style="padding-bottom: 45px;">
  <div class="container">
    <div class="row d-flex">
       <div class="col-md-12 about-intro">
          <div class="row">
             <div class="col-md-6 d-flex">
                <div class="d-flex about-wrap">
                   <div class="img d-flex align-items-center justify-content-center" style="background-image:url('<?php echo URL::getBase() ?>img/02.jpeg');"></div>
                   <div class="img-2 d-flex align-items-center justify-content-center" style="background-image:url('<?php echo URL::getBase() ?>img/05.jpeg');"></div>
               </div>
           </div>
           <div class="col-md-6 pl-md-5 py-5">
            <div class="row justify-content-start pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                   <span class="subheading">EXPERIÊNCIA E COMPROMISSO</span>
                   <h2 class="mb-4">QUEM SOMOS</h2>
                   <div><?php echo $descricaoquemsomos ?></div>
                   <!-- <p><a href="<?php echo URL::getBase() ?>quemsomos" class="btn btn-primary">Saiba mais</a></p> -->
               </div>
           </div>
       </div>
   </div>
  </div>
  </div>
  </div>
</section>


<?php  
$queryimagens = "SELECT * FROM sp_galeria";
if ($database->num_rows($queryimagens) > 0) {
  $resultsimagens = $database->get_results($queryimagens); ?>
  <section class="ftco-section ftco-about img" style="padding-top: 0px;">
    <div class="container">
      <div class="row d-flex">
         <div class="col-md-12 about-intro">
            <div class="row justify-content-start pb-3">
              <?php 
                foreach ($resultsimagens as $row) { ?>
                  <div class="col-md-3 heading-section ftco-animate"><a class="example-image-link" href="<?php echo URL::getBase() ?>adm/anexos/<?php echo $row['foto'] ?>" data-lightbox="example-set" data-title=""><div style=" margin-bottom: 30px; background: url('<?php echo URL::getBase() ?>adm/anexos/<?php echo $row['foto'] ?>') no-repeat;background-size: cover;background-position: center;width: 100%;height: 250px;"></div></a></div>
                  <?php
                }
              ?>

            </div>
          </div>
      </div>
    </div>
  </section>
  <?php
}
?>
 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>





<?php 
$query = "SELECT * FROM sp_depoimentos";
if ($database->num_rows($query) > 0) {
  $results1 = $database->get_results($query); ?>
  <section class="ftco-section testimony-section bg-light">
     <div class="overlay" style="background-image: url('<?php echo URL::getBase() ?>img/09.jpeg');opacity: 0.7;"></div>
       <div class="container">
        <div class="row pb-4">
          <div class="col-md-7 heading-section ftco-animate">
             <span class="subheading">O QUE FALAM DA GENTE!</span>
             <h2 class="mb-4">DEPOIMENTOS</h2>
         </div>
        </div>
      </div>
      <div class="container container-2">
          <div class="row ftco-animate">
            <div class="col-md-12">
              <div class="carousel-testimony owl-carousel">
                <?php 
                foreach ($results1 as $row) { ?>
                  <div class="item">
                    <div class="testimony-wrap py-4">
                      <div class="text">
                         <p class="star">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </p>
                        <p class="mb-4"><?php echo $row['descricao'] ?></p>
                        <div class="d-flex align-items-center">
                           <div class="user-img" style="background-image: url('<?php echo URL::getBase() ?>adm/anexos/<?php echo $row['foto'] ?>')"></div>
                           <div class="pl-3">
                              <p class="name"><?php echo $row['titulo'] ?></p>
                              <!-- <span class="position">Marketing Manager</span> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
      </div>
  </section>
  <?php 
}
?>

<?php 
  $query = "SELECT * FROM sp_equipe ";
  if ($database->num_rows($query) > 0) {
    $results = $database->get_results($query); ?>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">TRABALHAMOS COM EXCELÊNCIA</span>
            <h2 class="mb-4">NOSSA EQUIPE</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <?php  
            foreach ($results as $row) { ?>
              <div class="col-md-6 col-lg-3 justify-content-center d-flex">
                <div class="staff" style="width: 100%;">
                  <div class="img-wrap d-flex justify-content-center">
                    <div class="img justify-content-center" style="background-image: url('<?php echo URL::getBase() ?>adm/anexos/<?php echo $row['foto'] ?>');"></div>
                  </div>
                  <div class="text pt-3">
                    <h3><?php echo $row['nome'] ?></h3>
                    <span class="position mb-2"><?php echo $row['cargo'] ?></span>
                    <div class="faded">
                      <h3 style="text-align: center;"><?php echo $row['titulo'] ?></h3>
                      <p><?php echo $row['descricao'] ?></p>
                      <?php if ($row['email'] != '' || $row['facebook'] != '' || $row['linkedin'] != '' || $row['instagram'] != '' || $row['whatsapp'] != '' ): ?>
                        <ul class=" text-center" style="display: inline-flex;">
                          <?php if ($row['email']): ?><li style="text-decoration: none;list-style: none;margin: auto 12px;"><a href="<?php echo $row['email'] ?>" target="_blank"><span class="fa fa-envelope-o"></span></a></li><?php endif ?>
                          <?php if ($row['facebook']): ?><li style="text-decoration: none;list-style: none;margin: auto 12px;"><a href="<?php echo $row['facebook'] ?>" target="_blank"><span class="fa fa-facebook"></span></a></li><?php endif ?>
                          <?php if ($row['linkedin']): ?><li style="text-decoration: none;list-style: none;margin: auto 12px;"><a href="<?php echo $row['linkedin'] ?>" target="_blank"><span class="fa fa-linkedin"></span></a></li><?php endif ?>
                          <?php if ($row['instagram']): ?><li style="text-decoration: none;list-style: none;margin: auto 12px;"><a href="<?php echo $row['instagram'] ?>" target="_blank"><span class="fa fa-instagram"></span></a></li><?php endif ?>
                          <?php if ($row['whatsapp']): ?><li style="text-decoration: none;list-style: none;margin: auto 12px;"><a href="<?php echo $row['whatsapp'] ?>" target="_blank"><span class="fa fa-whatsapp"></span></a></li><?php endif ?>
                        </ul>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          ?>
        </div>
      </div>
    </section>
    <?php
  }
?>

<!-- <section class="ftco-section services-section">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
       <div class="w-100 mb-4 mb-md-0">
        <span class="subheading">Welcome to StudyLab</span>
        <h2 class="mb-4">We Are StudyLab An Online Learning Center</h2>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        <div class="d-flex video-image align-items-center mt-md-4">
          <a href="#" class="video img d-flex align-items-center justify-content-center" style="background-image: url(<?php echo URL::getBase() ?>images/about.jpg);">
           <span class="fa fa-play-circle"></span>
         </a>
         <h4 class="ml-4">Learn anything from StudyLab, Watch video</h4>
       </div>
     </div>
   </div>
   <div class="col-md-6">
     <div class="row">
      <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
        <div class="services">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tools"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Top Quality Content</h3>
            <p>A small river named Duden flows by their place and supplies</p>
          </div>
        </div>      
      </div>
      <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
        <div class="services">
          <div class="icon icon-2 d-flex align-items-center justify-content-center"><span class="flaticon-instructor"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Highly Skilled Instructor</h3>
            <p>A small river named Duden flows by their place and supplies</p>
          </div>
        </div>    
      </div>
      <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
        <div class="services">
          <div class="icon icon-3 d-flex align-items-center justify-content-center"><span class="flaticon-quiz"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">World Class &amp; Quiz</h3>
            <p>A small river named Duden flows by their place and supplies</p>
          </div>
        </div>      
      </div>
      <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
        <div class="services">
          <div class="icon icon-4 d-flex align-items-center justify-content-center"><span class="flaticon-browser"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Get Certified</h3>
            <p>A small river named Duden flows by their place and supplies</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</div>
</div>
</section>
 -->

<?php  
$query = "SELECT * FROM sp_perguntasfrequentes";
if ($database->num_rows($query) > 0) {
  $results = $database->get_results($query); ?>
    <section class="ftco-section ftco-about" style="padding-bottom: 0px;">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-12 about-intro">
              <div class="row">                 
                <div class="col-md-12 pl-md-12 py-5">
                  <div class="row justify-content-start pb-3">
                      <div class="col-md-12 heading-section ftco-animate">
                         <span class="subheading">TIRE SUAS DÚVIDAS</span>
                         <h2 class="mb-4">PERGUNTAS FREQUENTES</h2>
                         <div>
                          <?php 
                            // $idpf = 1;
                            foreach ($results as $row) { ?>
                              <div class='question'>
                                <input type='checkbox' id='question-<?php echo $row['id'] ?>'>
                                <label for='question-<?php echo $row['id'] ?>'><?php echo $row['pergunta'] ?></label>
                                <div class='answer'><?php echo $row['resposta'] ?></div>
                              </div>
                              <?php
                              // $idpf ++;
                            }
                          ?>

                         </div>
                     </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
  <?php
}
?>


<section class="ftco-intro ftco-section ftco-no-pb" style="padding-bottom: 7rem!important;">
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-12 text-center">
          <div class="img" style="background-image: url(<?php echo URL::getBase() ?>img/04.jpeg);">
             <div class="overlay" style="background: rgba(0,0,0,1);"></div>
             <h2>Fale conosco também pelo Whatsapp</h2>
             <p class="mb-0"><a target="_blank" href="https://api.whatsapp.com/send?phone=393247842182&text=Ol%C3%A1,%20vim%20pelo%20site,%20pode%20me%20ajudar?" class="btn btn-warning px-4 py-3"><i class="fa fa-whatsapp"></i> Vamos conversar</a></p>
         </div>
     </div>
 </div>
</div>
</section>
