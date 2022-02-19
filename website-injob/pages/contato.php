
<script type="text/javascript">
  function mascara(o,f){           
    $(document).keyup(function(e) {
      if (e.keyCode != 37 && e.keyCode != 39) {
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
      }
    }); 
    return;
  }
  function execmascara(){
    v_obj.value=v_fun(v_obj.value)
  }
  function mtel(v){
      v=v.replace(/\D/g,"")  
      v=v.replace(/(\d{2})(\d)/,"($1) $2")
      if(v.length <= 13)v=v.replace(/(\d{4})(\d)/,"$1-$2")
      if(v.length > 13)v=v.replace(/(\d{5})(\d)/,"$1-$2")
      return v
  }
</script>

<?php 
if ( isset($_GET['contato']) && isset($_POST['nomecompleto']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['obs']) ) {
    $nomecompleto 			= $database->escape($_POST['nomecompleto']);
    $emailcontato 			= $database->escape($_POST['email']);
    $telefonecontato 		= $database->escape($_POST['telefone']);
    $obs 					= $database->escape($_POST['obs']);
    $sqlequal 				= "SELECT contato.contatoID FROM contato WHERE contato.email = '$emailcontato' LIMIT 1";
    if ($database->num_rows($sqlequal) > 0)list($contatoID) = $database->get_row($sqlequal);
    else{
        $newla = array(
            'email' 		=> $emailcontato,
            'nomecompleto' 	=> $nomecompleto,
            'telefone' 		=> $telefonecontato,
        	'datacadastro' 	=> date('Y-m-d H:i:s'),
        );
        $database->insert('contato',$newla);
        $contatoID = $database->lastid();
    }
    $mensagemmmm = array(
    	'datacadastro' 	=> date('Y-m-d H:i:s'),
    	'contatoID'		=> $contatoID,
    	'mensagem'		=> $obs
    );
    $inscricaoevento_ = $database->insert('contatomsg',$mensagemmmm);
    if($inscricaoevento_){
	    $arquivo = '
			Nova mensagem de Contato | CASANUOVA<br>
			<br>
			Nome Completo: '.$nomecompleto.'<br>
			E-mail: '.$emailcontato.'<br>
			Telefone: '.$telefonecontato.'<br><br>
			Mensagem: '.$obs.'
		';
		$mail 			= new PHPMailer();
	    $mail->IsSMTP();
	    $mail->Host 	= "174.136.13.89";
	    $mail->SMTPAuth = true;
	    $mail->Username = "info@casanuova.com.br";
	    $mail->Password = "z5D883yG";
	    $mail->From 	= "info@casanuova.com.br";
	    $mail->FromName = "Contato - CASANUOVA";
	    $mail->AddAddress("info@casanuova.com.br", "Contato");
	    $mail->IsHTML(true);
	    $mail->CharSet 	= 'utf-8';
	    $mail->Subject  = "Contato - CASANUOVA";
	    $mail->Body 	= $arquivo;
	    $enviado 		= $mail->Send();
	    $mail->ClearAllRecipients();
	    if ($enviado) {
	    	?><script type="text/javascript">alert("✅ Obrigado, retornaremos em breve!");window.location.href="<?php echo URL::getBase() ?>"</script><?php
	        exit;
	    }
	    else{ ?><script type="text/javascript">alert("❌ Nosso servidor está em manutenção, tente novamente mais tarde!");window.location.href="<?php echo URL::getBase() ?>"</script><?php }
    }
}
?>
	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo URL::getBase() ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contato <i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread">Entre em contato</h1>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-section" style="padding-bottom: 50px;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Preencha os campos abaixo</h3>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="name">Nome completo</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
													<label class="label" for="email">Seu melhor e-mail</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="telefone">Telefone</label>
													<input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Mensagem</label>
													<textarea name="message" class="form-control" id="message" cols="30" rows="6" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Enviar mensagem" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<h3>Qual a sua dúvida?</h3>
									<p class="mb-4">Nos envie sua dúvida, iremos te responder em breve!</p>
									<div class="dbox w-100 d-flex align-items-start">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-map-marker"></span>
										</div>
										<div class="text pl-3">
											<p><span>Endereço:</span> Região da Toscana - Itália</p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-phone"></span>
										</div>
										<div class="text pl-3">
											<p><span>Telefone:</span> <a href="tel:<?php echo $telefone ?>"><?php echo $telefone ?></a></p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-paper-plane"></span>
										</div>
										<div class="text pl-3">
											<p><span>E-mail:</span> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
										</div>
									</div>
									<div><div style="width: 100%;border-bottom: dashed 1px #aa3333;margin-bottom: 30px;"></div></div>
									<div style="width: 100%;"><h5 style="color: white;">Siga nas redes sociais:</h5></div>
									<div class="dbox w-100 d-flex align-items-center">
										<!-- <?php if ($telefone): ?><a href="#" style="margin-right: 12px;" class="icon d-flex align-items-center justify-content-center"><span class="fa fa-whatsapp"></span></a><?php endif ?> -->
										<?php if ($facebook): ?><a href="<?php echo $facebook ?>" target="_blank" style="margin-right: 12px;" class="icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook-official"></span></a><?php endif ?>
										<?php if ($instagram): ?><a href="<?php echo $instagram ?>" target="_blank" style="margin-right: 12px;" class="icon d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a><?php endif ?>
										<?php if ($youtube): ?><a href="<?php echo $youtube ?>" target="_blank" style="margin-right: 12px;" class="icon d-flex align-items-center justify-content-center"><span class="fa fa-youtube"></span></a><?php endif ?>
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
$query = "SELECT * FROM sp_perguntasfrequentes";
if ($database->num_rows($query) > 0) {
  $results = $database->get_results($query); ?>
    <section class="ftco-section ftco-about" style="padding-bottom: 0px;padding-top: 0px;">
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



<section class="ftco-intro ftco-section ftco-no-pb" style="padding-bottom: 7rem!important;padding-top: 50px;">
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
