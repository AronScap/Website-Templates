<?php  
    $querybanner = "SELECT * FROM sp_banners";
    if ($database->num_rows($querybanner) > 0) { ?>
      <section id="home" class="p-0">
        <div id="main-slide" class="cd-hero">
          <ul class="cd-hero-slider">
            <?php  
            $rpastores = $database->get_results($querybanner);
            foreach ($rpastores as $row) { ?>
              <li class="selected">
                <div class="overlay2"><img class="" src="<?php echo URL::getBase() ?>adm/anexos/<?php echo $row['foto'] ?>" alt="slider"></div>
                <div class="cd-full-width">
                  <h2 style="text-shadow: 2px -3px 5px black;"><?php echo $row['titulo'] ?></h2>
                  <div style=" font-size: 24px;color: #fff;"><?php echo $row['subtitulo'] ?></div>
                </div>
              </li> 
              <?php 
            } 
            ?>
        </div>
      </section>
      <?php
    }
    else{ ?>
      <section id="home" class="p-0">
        <div id="main-slide" class="cd-hero">
          <ul class="cd-hero-slider">
            <li class="selected">
              <div class="overlay2"><img class="" src="images/banner1.jpg" alt="slider"></div>
              <div class="cd-full-width">
                <h2 style="text-shadow: 2px -3px 5px black;">Arrependei-vos</h2>
                <div style=" font-size: 24px;color: #fff;">Porque é chegado o Reino dos Céus</div>
              </div>
            </li> 
        </div>
      </section>
      <?php
    }
  ?>  
  <section id="service" class="service angle">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 wow fadeInDown text-center" data-wow-delay=".5s">
          <div class="service-content text-center">
            <img style="height: 140px;" src="images/paguia.jpg" alt />
            <p style="margin-bottom: 5px; color: #777;">Crescendo em Deus através da</p>
            <h3 style="color:#354580; font-size: 24px;">Adoração</h3>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 wow fadeInDown text-center" data-wow-delay=".5s">
          <div class="service-content text-center">
            <img style="height: 140px;" src="images/pboi.jpg" alt />
            <p style="margin-bottom: 5px; color: #777;">Crescendo em Deus através do</p>
            <h3 style="color:#354580; font-size: 24px;">Serviço</h3>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 wow fadeInDown text-center" data-wow-delay=".5s">
          <div class="service-content text-center">
            <img style="height: 140px;" src="images/pleao.jpg" alt />
            <p style="margin-bottom: 5px; color: #777;">Crescendo em Deus através do</p>
            <h3 style="color:#354580; font-size: 24px;">Conhecimento</h3>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 wow fadeInDown text-center" data-wow-delay=".5s">
          <div class="service-content text-center">
            <img style="height: 140px;" src="images/phomem.jpg" alt />
            <p style="margin-bottom: 5px; color: #777;">Crescendo em Deus através do</p>
            <h3 style="color:#354580; font-size: 24px;">Relacionamento</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section id="about" class="about" style="background: #efefef;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 heading text-center">
          <h2 class="title2">
            Nossa Programação
            <span class="title-desc">Horários da semana</span>
          </h2>
        </div>
      </div>
      <div class="row featured-tab mt-4">
        <div class="col-md-3 col-sm-5">
          <div class="nav flex-column nav-pills mt-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="animated fadeIn nav-link mb-1 active d-flex align-items-center" data-toggle="pill" href="#tab_1"
              role="tab" aria-selected="true">
              <i class="fa fa-clock-o mr-4 h3 mb-0"></i>
              <span class="h4 mb-0 font-weight-bold">Terça Feira</span>
            </a>
            <a class="animated fadeIn nav-link mb-1 d-flex align-items-center" data-toggle="pill" href="#tab_2" role="tab"
              aria-selected="true">
              <i class="fa fa-clock-o mr-4 h3 mb-0"></i>
              <span class="h4 mb-0 font-weight-bold">Quinta Feira</span>
            </a>
            <!-- <a class="animated fadeIn nav-link mb-1 d-flex align-items-center" data-toggle="pill" href="#tab_3" role="tab"
              aria-selected="true">
              <i class="fa fa-clock-o mr-4 h3 mb-0"></i>
              <span class="h4 mb-0 font-weight-bold">Sexta Feira</span>
            </a> -->
            <a class="animated fadeIn nav-link mb-1 d-flex align-items-center" data-toggle="pill" href="#tab_4" role="tab"
              aria-selected="true">
              <i class="fa fa-clock-o mr-4 h3 mb-0"></i>
              <span class="h4 mb-0 font-weight-bold">Sábado</span>
            </a>
            <a class="animated fadeIn nav-link mb-1 d-flex align-items-center" data-toggle="pill" href="#tab_5" role="tab"
              aria-selected="true">
              <i class="fa fa-clock-o mr-4 h3 mb-0"></i>
              <span class="h4 mb-0 font-weight-bold">Domingo</span>
            </a>
          </div>
        </div>
        <div class="col-md-9 col-sm-7">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane pl-sm-5 text-center fade show active animated fadeInLeft" id="tab_1" role="tabpanel">
              <div class="text-center horariocultodiv"><a>Mevam Academy</a></div>
              <div class="horarioculto">19:30 hrs</div>
              <div class="img-fluid imagehorario" style="background:url('images/cpl1.jpg') no-repeat;">
                <div class="coverhorarioimagem"></div>
              </div>
            </div>
            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id="tab_2" role="tabpanel">
              <div class="text-center horariocultodiv"><a>Culto - Celebração</a></div>
              <div class="horarioculto">20:00 hrs</div>
              <div class="img-fluid imagehorario" style="background:url('images/cele2.jpg') no-repeat;">
                <div class="coverhorarioimagem"></div>
              </div>
            </div>
            <!-- <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id="tab_3" role="tabpanel">
              <div class="text-center horariocultodiv"><a>CPL - Capacitação de Pastores e Líderes</a></div>
              <div class="horarioculto">20:00 hrs</div>
              <div class="img-fluid imagehorario" style="background:url('images/cpl2.jpg') no-repeat;">
                <div class="coverhorarioimagem"></div>
              </div>
            </div> -->
            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id="tab_4" role="tabpanel">
              <div class="text-center horariocultodiv"><a>Culto de Jovens</a></div>
              <div class="horarioculto">19:30 hrs</div>
              <div class="img-fluid imagehorario" style="background:url('images/1home.jpg') no-repeat;">
                <div class="coverhorarioimagem"></div>
              </div>
            </div>
            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id="tab_5" role="tabpanel">
              <div class="text-center horariocultodiv"><a>Culto - Celebração</a></div>
              <div class="horarioculto">19:00 hrs</div>
              <div class="img-fluid imagehorario" style="background:url('images/cele1.jpg') no-repeat;">
                <div class="coverhorarioimagem"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="clients" class="clients" style="background: #efefef;padding-top: 0px;">
    <div class="container">
      <div class="row wow fadeInLeft text-center">
        <div class="col-sm-12 col-md-4 owl-carousel owl-theme text-center client-carousel" style="display: inherit;">
        <!-- <div id="client-carousel" class="col-sm-12 owl-carousel owl-theme text-center client-carousel"> -->
          <figure class="m-0 item client_logo text-center"><a class="text-center"><img src="images/valentes.jpeg" style="width: 100%;" alt="client"></a></figure>
        </div>
        <div class="col-sm-12 col-md-4 owl-carousel owl-theme text-center client-carousel" style="display: inherit;">
          <figure class="m-0 item client_logo text-center"><a class="text-center"><img src="images/mulheres.jpeg" style="width: 100%;" alt="client"></a></figure>
        </div>
        <div class="col-sm-12 col-md-4 owl-carousel owl-theme text-center client-carousel" style="display: inherit;">
          <figure class="m-0 item client_logo text-center"><a class="text-center"><img src="images/jovens.jpg" style="width: 100%;" alt="client"></a></figure>
        </div>
      </div>
    </div>

  </section>

  <?php  
    $querypastores = "SELECT * FROM sp_equipe";
    if ($database->num_rows($querypastores) > 0) { ?>
      <section id="main-container">
        <div class="container">
          <div class="row">
            <div class="col-md-12 heading text-center">
              <h2 class="title2">
                Nossos Pastores
                <span class="title-desc">Conheça quem são nossos pastores</span>
              </h2>
            </div>
          </div>
          <div class="row d-flex justify-content-center">
            <?php  
              $rpastores = $database->get_results($querypastores);
              foreach ($rpastores as $row) { ?>
                <div class="col-md-3 col-sm-3 mb-5 wow fadeInDown text-center" data-wow-delay=".5s">
                  <div class="service-content text-center">
                    <div class="pastoresimage" style="background: url('adm/anexos/<?php echo $row['foto'] ?>');"></div>
                    <p class="pastorestitle"><?php echo $row['titulo'] ?></p>
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
