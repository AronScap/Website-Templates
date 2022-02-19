
 <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo URL::getBase() ?>images/bg_2.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo URL::getBase() ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Sobrenome <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread" style="font-size: 35px;">Pesquise seu sobrenome</h1>
     </div>
   </div>
 </div>
</section>

<?php 
$query = "SELECT * FROM sp_sobrenomes ORDER BY sobrenome ASC";
if ($database->num_rows($query) > 0) {
  $results1 = $database->get_results($query); ?>
 
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center pb-4">

          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">PESQUISE AQUI:</span>
            <input type="text" onchange="atualiza()" name="pesquisasobrenome" id="pesquisasobrenome" autofocus class="form-control" style="width: 80%;margin: auto;" placeholder="Digite para pesquisar" />
            <div style="position: absolute;margin-top: -35px;right: 11%;"><button type="submit" class="btn btn-primary" style="padding: 4px 10px;border-radius: 0px;"><i class="fa fa-search"></i></button></div>
            <!-- <h2 class="mb-4">NOSSA EQUIPE</h2> -->
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 col-lg-12 justify-content-center d-flex">
            <div class="staff" style="width: 100%;">
              <div style="text-align: center;"></div>
              <table class="table table-hover" id="tableexport" style="margin-bottom: 0;">
                <thead>
                  <tr>
                    <th style="font-size: 12px; width: 25%">SOBRENOME</th>
                    <th style="font-size: 12px; width: 25%">CLEMENTE GIUSEPE</th>
                    <th style="font-size: 12px; width: 10%;text-align: center;">NASCIMENTO</th>
                    <th style="font-size: 12px; width: 30%">FILIAÇÃO</th>
                    <th style="font-size: 12px; width: 10%;text-align: center;">CASAMENTO</th>
                  </tr>
                </thead>
                <tbody id="divConteudo">
                  <?php
                  foreach ($results1 as $row) { ?>
                    <tr>
                      <td style="font-size:13px;width: 25%"><?php echo $row['sobrenome'] ?></td>
                      <td style="font-size:13px;width: 25%"><?php echo $row['clementegiusepe'] ?></td>
                      <td style="font-size:13px;width: 10%;text-align: center;"><?php echo $row['datanascimento']=='0000-00-00' ? "" : ($row['datanascimento']=='0001-01-01' ? "" :  date('d/m/Y',strtotime($row['datanascimento']))) ?></td>
                      <td style="font-size:13px;width: 30%"><?php echo $row['filiacao'] ?></td>
                      <td style="font-size:13px;width: 10%;text-align: center;"><?php echo $row['datacasamento']=='0000-00-00' ? "" : ($row['datacasamento']=='0001-01-01' ? "" :  date('d/m/Y',strtotime($row['datacasamento']))) ?></td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php 
}
else{ ?>
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">NENHUM SOBRENOME CADASTRADO!</span>
          <h2 class="mb-4">AGUARDE</h2>
        </div>
      </div>
    </div>
  </section>
  <?php
}
?>