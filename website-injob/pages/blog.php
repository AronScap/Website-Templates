<?php 
    function getladodireito($database){ ?>
        <div class="col-md-4 col-xs-12">
            <?php
            $sqlblogQuery = "
                SELECT DISTINCT
                    sp_blog.*,
                    COALESCE((SELECT foto FROM sp_blog_fotos WHERE sp_blog_fotos.id_blog = sp_blog.id LIMIT 1),'') as imagem 
                FROM sp_blog ORDER BY data_cadastro DESC LIMIT 8
            ";
            if( $database->num_rows( $sqlblogQuery ) > 0 ){  ?>
                <div class="last-posts">
                    <h4 class="widget-title">Publicações Recentes</h4>
                    <?php
                    $rsblog = $database->get_results($sqlblogQuery);
                    foreach ($rsblog as $row) {  ?>
                        <a href="<?php echo URL::getBase() ?>blog/<?php echo $row['id'] ?>" class="blog-item">
                            <div class="blog-item-img" style="background: url('<?php echo URL::getBase(); ?>adm/blog/<?php echo $row['imagem'] ?>') no-repeat;"></div>
                            <div class="blog-item-desc">
                                <div class="blog-item-desc-title"><?php echo $row['titulo'] ?></div>
                                <div class="blog-item-desc-date"><?php echo date('d',strtotime($row['data_cadastro'])) ?>, <?php echo mes(date('m',strtotime($row['data_cadastro']))) ?> de <?php echo date('Y',strtotime($row['data_cadastro'])) ?></div>
                            </div>
                        </a>
                        <?php        
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            <br>
            <br>
            <?php
            // $queryhashtag = "
            //     SELECT DISTINCT sp_tags.nome
            //     FROM sp_tags
            //         JOIN sp_blog_tags ON sp_blog_tags.id_tag = sp_tags.id 
            //     ORDER BY RAND() LIMIT 10
            // ";
            if( $database->num_rows( $queryhashtag ) > 0 ){  ?>
                <aside class="animated bounceInRight">
                    <div class="widget-categories widget">
                        <h4 class="widget-title">Tags de Publicação</h4>
                        <ul>
                        <?php
                        $rshashtag = $database->get_results($queryhashtag);
                        foreach ($rshashtag as $row) {  ?>
                            <li><a href="<?php echo URL::getBase() ?>blog/tag/<?php echo $row['nome'] ?>"><span>#</span><?php echo ucfirst(mb_strtolower($row['nome'],'utf-8')) ?></a></li>
                            <?php        
                        }
                        ?>
                    </div>
                </ul>
                <?php
            }
            ?>
             
            
            <br>
            <!-- <div class="newsletter-section">
                <h4 style="font-size: 26px;margin-bottom: 20px;">Newsletter</h4>
                <p>Receba informações exclusivas!</p>
                <div>
                    <form action="" method="post">
                        <input type="text" name="email_newsletter" class="form-control" placeholder="Seu melhor e-mail" required />
                        <button type="submit" class="btn btn-primary" style="margin-top: 12px;width: 100%;cursor: pointer;">INSCREVA-SE</button>
                    </form>
                </div>
            </div> -->
        </div>
        <?php 
    }
?>

<?php 
    if(!Url::getURL(1)){ ?>
        
        <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo URL::getBase() ?>images/bg_2.jpg');">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
              <div class="col-md-9 ftco-animate pb-5 text-center">
               <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo URL::getBase() ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Blog/Notícias <i class="fa fa-chevron-right"></i></span></p>
               <h1 class="mb-0 bread">Blog/Notícias</h1>
             </div>
           </div>
         </div>
        </section>

        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row d-flex">
                    <?php 
                    $limiteFinal = 0;
                    $numblog = 6; 
                    $numMaximoPaginas = 6;
                    if(isset($_GET['page'])){
                        $paginaAtual = $database->escape($_GET['page']);
                        $limiteFinal = ($paginaAtual * $numblog)-$numblog; 
                    }
                    else{ ?> <script>window.location.href="?page=1";</script> <?php } 
                    $sql = "SELECT DISTINCT 
                                sp_blog.*, 
                                COALESCE((SELECT sp_blog_fotos.foto FROM sp_blog_fotos WHERE sp_blog_fotos.id_blog = sp_blog.id LIMIT 1),'') as imagem
                            FROM sp_blog
                            WHERE data_cadastro <= NOW() 
                            ORDER BY data_cadastro DESC 
                            LIMIT $limiteFinal,$numblog
                    ";
                    if( $database->num_rows( $sql ) > 0 ){  
                        $results = $database->get_results( $sql ); 
                        foreach( $results as $row ){ ?>
                            
                            <div class="col-lg-4 ftco-animate">
                              <div class="blog-entry">
                                <a href="<?php echo URL::getBase() ?>blog/<?php echo $row['id'] ?>" class="block-20" style="background-image: url('<?php echo URL::getBase() ?>adm/blog/<?php echo $row['imagem'] ?>');"></a>
                                <div class="text d-block">
                                  <div class="meta">
                                    <p>
                                       <a href="<?php echo URL::getBase() ?>#"><span class="fa fa-calendar mr-2"></span><?php echo date('d/m/Y',strtotime($row['data_cadastro'])) ?></a>
                                       <!-- <a href="<?php echo URL::getBase() ?>#"><span class="fa fa-user mr-2"></span>Admin</a> -->
                                       <!-- <a href="<?php echo URL::getBase() ?>#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a> -->
                                    </p>
                                  </div>
                                  <h3 class="heading"><a href="<?php echo URL::getBase() ?>blog/<?php echo $row['id'] ?>"><?php echo $row['titulo'] ?></a></h3>
                                  <p></p>
                                  <p><a href="<?php echo URL::getBase() ?>blog/<?php echo $row['id'] ?>" class="btn btn-primary py-2 px-3">Leia mais</a></p>
                                </div>
                              </div>
                            </div>
                            <?php
                        }
                    }
                    else{ ?><div style="text-align: center;">Nenhuma publicação encontrada!</div><?php } ?>
                    <div class="col-12" style="padding-bottom: 45px;">
                        <?php 
                        $sqlcOUNT = "SELECT COUNT(sp_blog.id)
                            FROM sp_blog
                            WHERE data_cadastro <= NOW()
                        ";
                        if( $database->num_rows( $sqlcOUNT ) > 0 ){
                            list($numblogBanco) = $database->get_row($sqlcOUNT);
                            if($numblogBanco > $numblog){ ?>
                                <div class="row mt-6">
                                    <div class="col text-center">
                                        <div class="block-27">
                                            <ul>
                                                <?php
                                                $countpagina = 0;
                                                if($paginaAtual != 1)echo '<li class=""><a class="" href="?page='.($paginaAtual-1).'"> &lt;</a></li>';
                                                if($paginaAtual == 1)echo '<li class="active"><a style="font-weight:bold;color:white!important;" class="">1</li>';
                                                if($numblogBanco%$numblog != 0)$numPaginas = (int)(1+($numblogBanco/$numblog));
                                                else $numPaginas = ($numblogBanco/$numblog);
                                                if($paginaAtual == 1)for ($i=2; $i <= $numMaximoPaginas && $i <= $numPaginas; $i++)echo '<li class=""><a class="" href="?page='.$i.'">'.$i.'</a></li>';
                                                if($paginaAtual > 1){
                                                  $inicio = 1;
                                                  for ($j=2; $j <= $paginaAtual; $j++)if($paginaAtual-$numMaximoPaginas > $inicio)$inicio = $j;
                                                  if($numPaginas > $numMaximoPaginas && $paginaAtual > ($numMaximoPaginas/2))$inicio = $paginaAtual-intval($numMaximoPaginas/2);
                                                  for ($i=$inicio; $i < $paginaAtual; $i++) { ?>
                                                    <li class=""><a class="" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                                    <?php
                                                    $countpagina++;
                                                  }
                                                  echo '<li class="active"><span style="font-weight:bold;" class="">'.$paginaAtual.'</span></li>'; 
                                                  for ($i=$paginaAtual;$i < $numMaximoPaginas+$paginaAtual && $i < $numPaginas && $i < $paginaAtual+intval($numMaximoPaginas/2); $i++) { ?>
                                                    <li class=""><a class="" href="?page=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
                                                    <?php
                                                  }
                                                } 
                                                if($paginaAtual < $numPaginas){ 
                                                  echo '<li class=""><a class="" aria-label="Next" href="?page='.($paginaAtual+1).'"> &gt;</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                              }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
    else { 
        /*blog publicacao*/
        $id_blog = Url::getURL(1); 
        $id_blog = $database->escape(Url::getURL(1));
        $query = "SELECT DISTINCT
            sp_blog.id,
            sp_blog.titulo,
            sp_blog.data_cadastro,
            sp_blog.descricao,
            COALESCE((SELECT sp_blog_fotos.foto FROM sp_blog_fotos WHERE sp_blog_fotos.id_blog = sp_blog.id LIMIT 1),'') as imagem 
            FROM sp_blog WHERE sp_blog.id = '$id_blog' LIMIT 1";
        if ($database->num_rows( $query ) > 0) { 
            list($id_blog,$titulo,$data_cadastro,$descricao,$imagem) = $database->get_row($query);  ?>
            <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo URL::getBase() ?>images/bg_2.jpg');">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-end justify-content-center">
                        <div class="col-md-9 ftco-animate pb-5 text-center">
                            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo URL::getBase() ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Blog <i class="fa fa-chevron-right"></i></span></p>
                            <h1 class="mb-0 bread">BLOG</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8 ftco-animate py-md-5 mt-md-5">
                    <h2 class="mb-3"><?php echo $titulo ?></h2>
                    <div><img src="<?php echo URL::getBase() ?>adm/blog/<?php echo $imagem ?>" alt style="width: 100%;" /></div>
                    <div style="margin-top: 55px;"><?php echo $descricao ?></div>
                    
                    <!-- <div class="tag-widget post-tag-container mb-5 mt-5">
                      <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">Life</a>
                        <a href="#" class="tag-cloud-link">Sport</a>
                        <a href="#" class="tag-cloud-link">Tech</a>
                        <a href="#" class="tag-cloud-link">Travel</a>
                      </div>
                    </div> -->
                    <!-- 
                    <div class="about-author d-flex p-4 bg-light">
                      <div class="bio mr-5">
                        <img src="<?php echo URL::getBase() ?>images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                      </div>
                      <div class="desc">
                        <h3>George Washington</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                      </div>
                    </div> -->
                  </div>


                  <div class="col-lg-4 sidebar ftco-animate pl-md-4 py-md-5">
                    <div class="sidebar-box mt-md-5 bg-light">
                      <form action="#" class="search-form">
                        <div class="form-group">
                          <span class="icon fa fa-search"></span>
                          <input type="text" class="form-control" placeholder="Pesquisar publicação">
                        </div>
                      </form>
                    </div>
                     

                    <div class="sidebar-box ftco-animate">
                        <h3>Publicações recentes</h3>
                        <?php 
                         $query = "SELECT sp_blog.*,COALESCE((SELECT sp_blog_fotos.foto FROM sp_blog_fotos WHERE sp_blog_fotos.id_blog = sp_blog.id LIMIT 1),'') as foto FROM sp_blog WHERE sp_blog.id <> '$id_blog' ORDER BY sp_blog.data_cadastro DESC LIMIT 4";
                        if ($database->num_rows($query) > 0) {
                            $results = $database->get_results($query);
                            foreach ($results as $row) { ?>
                                <div class="block-21 mb-4 d-flex">
                                    <a class="blog-img mr-4" style="background-image: url(<?php echo URL::getBase() ?>adm/blog/<?php echo $row['foto'] ?>);"></a>
                                    <div class="text">
                                      <h3 class="heading"><a href="<?php echo URL::getBase() ?><?php echo $row['id'] ?>" style="font-size: 16px;line-height: 25px;display: block;"><?php echo $row['titulo'] ?></a></h3>
                                      <div class="meta"><div><a href="#"><span class="fa fa-calendar"></span> <?php echo date('d/m/Y',strtotime($row['data_cadastro'])) ?></a></div></div>
                                    </div>
                                </div>
                                <?php    
                            } 
                        }
                        ?> 
                    </div>

                   <!--  <div class="sidebar-box ftco-animate">
                      <h3>Tag Cloud</h3>
                      <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">design</a>
                        <a href="#" class="tag-cloud-link">learn</a>
                        <a href="#" class="tag-cloud-link">education</a>
                        <a href="#" class="tag-cloud-link">course</a>
                        <a href="#" class="tag-cloud-link">online</a>
                        <a href="#" class="tag-cloud-link">bag</a>
                        <a href="#" class="tag-cloud-link">pen</a>
                        <a href="#" class="tag-cloud-link">teacher</a>
                      </div>
                    </div> -->

                  </div>

                </div>
              </div>
            </section>
            <?php
        }
        else{ ?>  <!-- erro tag -->
            <div style="margin-top: 45px;">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="quadradosubheader"><span class="ti-face-sad"></span> </div>
                            <div class="textsubheader">
                                Que pena - Esta publicação não está mais disponível!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } 
    }
?>


 