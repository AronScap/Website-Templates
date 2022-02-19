
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
			Nova mensagem de Contato | MEVAM Chapecó<br>
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
	    $mail->Username = "mevamchapeco@mevamchapeco.org";
	    $mail->Password = "z5D883yG";
	    $mail->From 	= "mevamchapeco@mevamchapeco.org";
	    $mail->FromName = "Contato - MEVAM Chapecó";
	    $mail->AddAddress("mevamchapeco@mevamchapeco.org", "Contato");
	    $mail->IsHTML(true);
	    $mail->CharSet 	= 'utf-8';
	    $mail->Subject  = "Contato - MEVAM Chapecó";
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

<section style="background: linear-gradient(to right, #344480 20%, #324075 50%, #344480 80%);">
	<div class="parallax-overlay" style="opacity: 0.3;"></div>
	<div class="carousel slide">
    <div class="carousel-inner">
      	<div class="carousel-item active" style="height: 207px;">
    
	        <div class="container">
		          <div class="carousel-caption text-center">
		            <h1 style="color:#fff;text-shadow: 2px -3px 5px black;">ENTRE EM CONTATO</h1>
		            <p>Veja as informações abaixo</p>
		          </div>
	        </div>

    	</div>
	</div>
</section>

<section id="main-container">
	<div class="container">

		<div class="row">
			<div class="col-md-7">
				<form id="contact-form" action="<?php echo URL::getBase() ?>contato?contato" method="post" role="form">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Nome Completo:</label>
								<input class="form-control" name="nomecompleto" id="nomecompleto" placeholder="Nome completo" type="text" required />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>E-mail:</label>
								<input class="form-control" name="email" id="email" placeholder="E-mail" type="email" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Telefone/Celular:</label>
								<input class="form-control" name="telefone" id="telefone" maxlength="15" onkeypress="mascara(this,mtel)" placeholder="(__) _____-____" required />
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Descreva sua dúvida/sugestão:</label>
								<textarea class="form-control" name="obs" id="obs" placeholder="Qual a sua dúvida/sugestão" type="text" required style="min-height: 170px;"></textarea>
							</div>
						</div>
					</div>
					<div class="text-right"><br><button class="btn btn-primary solid blank" type="submit">Enviar E-mail</button></div>
				</form> 
			</div>
			<div class="col-md-5">
				<div class="contact-info">
					<h3>Entre em contato</h3>
					<p>Envie-nos um e-mail com sua dúvida ou sugestão!</p>
					<br>
					<p><i class="fa fa-home info"></i> Rua Blumenau 198 | 89805-243 Chapecó/SC </p>
					<p><i class="fa fa-whatsapp info"></i> <a href="" target="_blank">(49) 99826-1883</a></p>
					<p><i class="fa fa-envelope-o info"></i> mevamchapeco@mevamchapeco.org</p>
					<hr />
					<p><i class="fa fa-instagram info"></i> <a href="https://instagram.com/mevamchapeco" target="_blank">@mevamchapeco</a></p>
					<p><i class="fa fa-facebook-official info"></i> <a href="https://facebook.com/mevamchapeco" target="_blank">mevamchapeco</a></p>
				</div>
			</div>
		</div>
	</div>
</section>




<section id="main-container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 " style="background: #f4f4f4 !important;padding: 20px;padding-bottom: 40px;">
				<div class="row">
					<div class="col-sm-12 col-md-1"><i style="font-size: 30px;margin-top: 100px;" class="fa fa-barcode"></i></div>
					<div class="col-sm-12 col-md-11" style="margin-top: 30px;">
						<h5 style="font-weight: normal;">Contribua para a obra!</h5>
						<h4 style="color: #344480;font-weight: bold;">Depósito Bancário</h4>
						<div class="row">
							<div class="col-sm-12 col-md-4">
								<div style="font-size: 12px; font-weight: bold;">Banco:</div>
								<div><b>SICREDI - 748</b></div>
								<div>Agência: <b>0258</b></div>
								<div>Conta: <b>20187-2</b></div>
							</div>
							<div class="col-sm-12 col-md-8">
								<div style="font-size: 12px; font-weight: bold;">Dados necessários para fazer o depósito:</div>
								<div><b>Ministério Vinho Novo as Nações Mevam Chapecó</b></div>
								<div>CNPJ: 38.298.474/0001-34<b></b></div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>
</section>


