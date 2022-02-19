
 <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo URL::getBase() ?>images/bg_2.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo URL::getBase() ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Serviços <i class="fa fa-chevron-right"></i></span></p>
       <?php if (!URL::getURL(1)){ ?><h1 class="mb-0 bread">Nossos Serviços</h1><?php } else{ 
        $idservico = $database->escape(URL::getURL(1));
        $query = "SELECT titulo,descricao FROM sp_servicos WHERE sp_servicos.id = '$idservico' LIMIT 1";
        if ($database->num_rows($query) > 0) {
          list($tituloservico,$descricaoservico) = $database->get_row($query); ?>
          <h4 style="color: white;"><?php echo $tituloservico ?></h4>
          <?php
        }
        else { ?>
          <script type="text/javascript">alert("Serviço não encontrado! Tente novamente mais tarde!");window.location.href="<?php echo URL::getBase() ?>servicos";</script>
          <?php
        }
       } ?>
     </div>
   </div>
 </div>
</section>


<?php 
if (!URL::getURL(1) ){ 
  $query1 = "SELECT * FROM sp_servicos";
  if ($database->num_rows($query1) > 0) {
    $results1 = $database->get_results($query1); ?>
    <section class="ftco-section" style="padding-top: 70px;">
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
} 
else{ ?>
  <section class="ftco-section ">
    <div class="container">
        <div class="row pb-4">
          <div class="col-md-12 heading-section ftco-animate">
            <h2 class="mb-4 text-center"><?php echo $tituloservico ?></h2>
          </div>
        </div>
        <div class="row">
         
              <div class="col-md-12 d-flex align-items-center">
                <div class="staff-detail w-100 pl-md-5">
                  <?php echo $descricaoservico ?> 
                </div>
              </div>
        </div>
    </div>
  </section>



  <section class="ftco-intro ftco-section ftco-no-pb" style="padding-top: 0px; padding-bottom: 7rem!important;">
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
  $query1 = "SELECT * FROM sp_servicos WHERE id <> '$idservico' LIMIT 3";
  if ($database->num_rows($query1) > 0) {
    $results1 = $database->get_results($query1); ?>
    <section class="ftco-section" style="padding-top: 0px;">
       <div class="container">
          <div class="row justify-content-center pb-4">
              <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">OUTROS SERVIÇOS</span>
                <h2 class="mb-4" style="font-size: 30px;">VEJA MAIS</h2>
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
  <?php
}
?>