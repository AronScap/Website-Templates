<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo URL::getBase() ?>images/bg_1.jpg');">
  <div class="overlay" style="background-color: black;opacity: 0.6;"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
      <div class="col-md-6 ftco-animate">
        <span class="subheading">Bem vindo!</span>
        <h1 class="mb-4" style="font-size: 57px!important;">Seja mais um ítalo-brasileiro com a Casanuova</h1>
        <p class="caps">A Casanuova Cidadania Italiana inicia o seu percurso no ano de 2013, com 100% de processos concluídos com o reconhecimento da cidadania italiana de todos os nossos clientes.</p>
        <p class="mb-0"><a href="<?php echo URL::getBase() ?>services" class="btn btn-primary">Veja nossos Serviços</a></p>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-no-pb ftco-no-pt">
   <div class="container">
      <div class="row">
         <div class="col-md-7"></div>
         <div class="col-md-5 order-md-last">
          <div class="login-wrap p-4 p-md-5">
              <h3 class="mb-4">Entre em contato!</h3>
              <form action="#" class="signup-form">
                 <div class="form-group">
                    <label class="label" for="name">Nome Completo</label>
                    <input type="text" class="form-control" required />
                </div>
                <div class="form-group">
                    <label class="label" for="email">E-mail</label>
                    <input type="text" class="form-control" required />
                </div>
                <div class="form-group">
                    <label class="label" for="telefone">Telefone</label>
                    <input type="text" class="form-control" required />
                </div>
                <div class="form-group">
                    <label class="label" for="duvida">Observações</label>
                    <textarea class="form-control" required style="min-height: 100px;"></textarea>
                </div>
               <div class="form-group d-flex justify-content-end mt-4">
                   <button type="submit" class="btn btn-primary submit">Enviar <span class="fa fa-paper-plane"></span></button>
               </div>
         </form>
     </div>
   </div>
  </div>
  </div>
</section>



<section class="ftco-section ftco-about img">
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
                   <!-- <p>A Casanuova Cidadania Italiana inicia o seu percurso no ano de 2013, com 100% de processos concluídos com o reconhecimento da cidadania italiana de todos os nossos clientes.</p> -->
                   
                   <div><?php echo $descricaoquemsomos ?></div>
                   <p><a href="<?php echo URL::getBase() ?>quemsomos" class="btn btn-primary">Saiba mais</a></p>
               </div>
           </div>
       </div>
   </div>
  </div>
  </div>
  </div>
</section>


<?php  
$query1 = "SELECT * FROM sp_servicos";
if ($database->num_rows($query1) > 0) {
  $results1 = $database->get_results($query1); ?>
  <section class="ftco-section" style="padding-top: 0px;">
     <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
            	<span class="subheading">COMO PODEMOS TE AJUDAR?</span>
              <h2 class="mb-4">NOSSOS SERVIÇOS</h2>
          </div>
      </div>
      <div class="row justify-content-center">
        <?php  
        foreach ($results1 as $row) { ?>
          
          <div class="col-md-12 col-lg-4 d-flex align-self-stretch ftco-animate">
            <div class="services" style="text-align: center;">
              <div class="icon d-flex align-items-center justify-content-center" style="margin: auto;text-align: center;padding: 10px;background: #3d3d3d;"><span class="flaticon-tools"></span></div>
              <div class="media-body media-bottom" style="padding-bottom: 25px;">
                <h3 class="heading mb-3" style="margin-top: 10px;"><?php echo $row['titulo'] ?></h3>
                <p><?php echo $row['subtitulo'] ?></p>
              </div>
              <div style="text-align: center;position: absolute;bottom: 15px;width: calc(100% - 60px);"><a href="<?php echo URL::getBase() ?>servicos/<?php echo $row['id'] ?>" class="btn btn-primary" style="font-size: 12px;">Saiba mais <i class="fa fa-chevron-right"></i></a></div>
            </div>      
          </div>
          <?php
        }
        ?>
      <!-- <div class="col-md-12 text-center mt-5"><a href="<?php echo URL::getBase() ?>#" class="btn btn-primary">Ver todos os serviços</a></div> -->
    </div>
    </div>
  </section>

  <?php
}
?>
<!-- 


<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(<?php echo URL::getBase() ?>images/bg_4.jpg);">
 <div class="overlay"></div>
 <div class="container">
    <div class="row">
       <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
         <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-online"></span></div>
            <div class="text">
             <strong class="number" data-number="400">0</strong>
             <span>Online Courses</span>
         </div>
     </div>
 </div>
 <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
     <div class="block-18 d-flex align-items-center">
        <div class="icon"><span class="flaticon-graduated"></span></div>
        <div class="text">
         <strong class="number" data-number="4500">0</strong>
         <span>Students Enrolled</span>
     </div>
 </div>
</div>
<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
 <div class="block-18 d-flex align-items-center">
    <div class="icon"><span class="flaticon-instructor"></span></div>
    <div class="text">
     <strong class="number" data-number="1200">0</strong>
     <span>Experts Instructors</span>
 </div>
</div>
</div>
<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
 <div class="block-18 d-flex align-items-center">
    <div class="icon"><span class="flaticon-tools"></span></div>
    <div class="text">
     <strong class="number" data-number="300">0</strong>
     <span>Hours Content</span>
 </div>
</div>
</div>
</div>
</div>
</section>
 -->

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

<section class="ftco-intro ftco-section ftco-no-pb">
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
<?php  
$query = "SELECT DISTINCT 
          sp_blog.*, 
          COALESCE((SELECT sp_blog_fotos.foto FROM sp_blog_fotos WHERE sp_blog_fotos.id_blog = sp_blog.id LIMIT 1),'') as foto
      FROM sp_blog
      WHERE data_cadastro <= NOW() 
      ORDER BY data_cadastro DESC 
       LIMIT 3";
if ($database->num_rows($query) > 0) {
  $results = $database->get_results($query); ?>
  <section class="ftco-section bg-light" style="padding-top: 0px;">
    <div class="container">
       <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
           <span class="subheading">FIQUE POR DENTRO DE TUDO</span>
           <h2 class="mb-4">NOSSO BLOG</h2>
       </div>
   </div>
    <div class="row d-flex">
      <?php  
      foreach ($results as $row) { ?>
        <div class="col-lg-4 ftco-animate">
          <div class="blog-entry">
            <a href="<?php echo URL::getBase() ?>blog/<?php echo $row['id'] ?>" class="block-20" style="background-image: url('<?php echo URL::getBase() ?>adm/blog/<?php echo $row['foto'] ?>');"></a>
            <div class="text d-block">
              <div class="meta"><p><a href="<?php echo URL::getBase() ?>#"><span class="fa fa-calendar mr-2"></span><?php echo date('d/m/Y',strtotime($row['data_cadastro'])) ?></a></p></div>
              <h3 class="heading"><a href="<?php echo URL::getBase() ?>blog/<?php echo $row['id'] ?>"><?php echo $row['titulo'] ?></a></h3>
              <p></p>
              <p><a href="<?php echo URL::getBase() ?>blog/<?php echo $row['id'] ?>" class="btn btn-primary py-2 px-3">Leia mais</a></p>
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