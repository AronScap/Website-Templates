
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


	if ( isset($_GET['inscricao']) && isset($_POST['nomecompleto']) && isset($_POST['email'])  ) {
	    $nomecompleto 			= $database->escape($_POST['nomecompleto']);
	    $emailcontato 			= $database->escape($_POST['email']);
	    $telefonecontato 		= $database->escape($_POST['telefone']);
	    $lideranca 				= $database->escape($_POST['lideranca']);
	    $telefonelider 			= $database->escape($_POST['telefonelider']);
	    $ministerio 			= $database->escape($_POST['ministerio']);
	    
	    $sqlequal = "SELECT contato.contatoID FROM contato WHERE contato.email = '$emailcontato' LIMIT 1";
	    if ($database->num_rows($sqlequal) > 0)list($contatoID) = $database->get_row($sqlequal);
	    else{
	        $newla = array(
	            'email' 		=> $emailcontato,
	            'nomecompleto' 	=> $nomecompleto,
	            'telefone' 		=> $telefonecontato,
	            'lideranca' 	=> $lideranca,
	            'telefonelider'	=> $telefonelider,
	            'ministerio'	=> $ministerio,
	        	'datacadastro' 	=> date('Y-m-d H:i:s'),
	        );
	        $database->insert('contato',$newla);
	        $contatoID 		= $database->lastid();
	    }

	    $sqlequaladsdsa = "SELECT inscricaoevento.inscricaoeventoID FROM inscricaoevento WHERE inscricaoevento.contatoID = '$contatoID' LIMIT 1";
	    if ($database->num_rows($sqlequaladsdsa) > 0){ ?><script type="text/javascript">alert("❌ Você já está inscrito neste evento!");window.location.href="<?php echo URL::getBase() ?>"</script><?php }
	    else{
	        $inscricaonova 	= array(
	        	'datacadastro' 	=> date('Y-m-d H:i:s'),
	        	'contatoID'		=> $contatoID,
	        	'eventoID'		=> '1'
	        );
	        $inscricaoevento_ = $database->insert('inscricaoevento',$inscricaonova);
	        if($inscricaoevento_){
		        $inscricaoeventoID = $database->lastid();
			    $arquivo = '
					<div class="m_4639243122964952794mj-container" style="background-color:#f7f7f7"> 
						<div style="margin:0px auto;max-width:600px">
							<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
							  <tbody>
							    <tr>
							      <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:10px;border-collapse:collapse"></td>
							    </tr>
							  </tbody>
							</table>
							</div>
							<div style="border:1px solid #d9d9d9;margin:0px auto;max-width:600px;background:#ffffff" class="m_4639243122964952794dropShadow-1 m_4639243122964952794mainContainer">
							<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
							  <tbody>
							    <tr>
							      <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-bottom:30px;border-collapse:collapse">									        
							        <div style="margin:0px auto;max-width:600px">
							          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
							            <tbody>
							              <tr>
							                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-top:0px;border-collapse:collapse">
							                  
							                  <div class="m_4639243122964952794mj-column-per-100 m_4639243122964952794outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
							                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
							                      <tbody>
							                        <tr>
							                          <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;border-collapse:collapse" align="center">
							                            <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px" align="center" border="0">
							                              <tbody>
							                                <tr>
							                                  <td style="width:80px;border-collapse:collapse"><img alt="" src="http://mevamchapeco.org/images/logo.png" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;" width="80">
							                                  </td>
							                                </tr>
							                              </tbody>
							                            </table>
							                          </td>
							                        </tr>
							                      </tbody>
							                    </table>
							                  </div>
							                  
							                </td>
							              </tr>
							            </tbody>
							          </table>
							        </div>
							        
							        <div style="margin:0px auto;max-width:600px">
							          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
							            <tbody>
							              <tr>
							                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px;padding-top:0px;border-collapse:collapse">
							                  
							                  <div class="m_4639243122964952794mj-column-per-100 m_4639243122964952794outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
							                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
							                      <tbody>
							                        <tr>
							                          <td style="word-wrap:break-word;font-size:0px;padding:0px 0px;border-collapse:collapse" align="center">
							                            <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px" align="center" border="0">
							                              <tbody>
							                                <tr>
							                                  <td style="width:600px;border-collapse:collapse">
							                                  	<div style="width: 100%;height: 2px;background-color: #0077bd;"></div>
							                                  </td>
							                                </tr>
							                              </tbody>
							                            </table>
							                          </td>
							                        </tr>
							                      </tbody>
							                    </table>
							                  </div>										                  
							                </td>
							              </tr>
							            </tbody>
							          </table>
							        </div>
							        <div style="margin:0px auto;max-width:600px">
							          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
							            <tbody>
							              <tr>
							                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 40px 60px 40px;border-collapse:collapse">
							                  
							                  <div style="margin:0px auto;max-width:600px">
							                    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
							                      <tbody>
							                        <tr>
							                          <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;border-collapse:collapse">
							                            
							                            <div class="m_4639243122964952794mj-column-per-100 m_4639243122964952794outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
							                              <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
							                                <tbody>
							                                  <tr>
							                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:40px;border-collapse:collapse" align="center">
							                                      <div style="color:#555;font-family:sans-serif;font-size:24px;line-height:1.5;text-align:center">Olá, <strong>' . $nomecompleto . '</strong>!</div>
							                                    </td>
							                                  </tr>
							                                  <tr>
							                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:27px;border-collapse:collapse" align="center">
							                                      <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">Bem vindo ao Café da Aliança.</div>
							                                    </td>
							                                  </tr>
							                                  <tr>
							                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:27px;border-collapse:collapse" align="center">
							                                      <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">Sua Inscrição foi efetuada com sucesso!</div>
							                                    </td>
							                                  </tr> 
							                                </tbody>
							                              </table>
							                            </div>									                            
							                          </td>
							                        </tr>
							                      </tbody>
							                    </table>
							                  </div>			

							                  <div style="margin:0px auto;max-width:600px">
							                    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
							                      <tbody>
							                        <tr>
							                          <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-bottom:0px;border-collapse:collapse">
							                            
							                            <div class="m_4639243122964952794mj-column-per-100 m_4639243122964952794outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
							                              <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
							                                <tbody>
							                                  <tr>
							                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:27px;border-collapse:collapse" align="center">
							                                      <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">Se tiver alguma dúvida, é só chamar.</div>
							                                    </td>
							                                  </tr>
							                                  <tr>
							                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;border-collapse:collapse" align="center">
							                                      <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">Um abraço,
							                                        <br> Equipe MEVAM Chapecó</div>
							                                      </td>
							                                    </tr>
							                                  </tbody>
							                                </table>
							                              </div>
							                              
							                            </td>
							                          </tr>
							                        </tbody>
							                      </table>
							                    </div>
							                    
							                  </td>
							                </tr>
							              </tbody>
							            </table>
							          </div>
							        </td>
							      </tr>
							    </tbody>
							  </table>
							</div>
							<div style="margin:0px auto;max-width:600px">
							  <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
							    <tbody>
							      <tr>
							        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-top:30px;border-collapse:collapse">
							          
							          <div class="m_4639243122964952794mj-column-per-100 m_4639243122964952794outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
							            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
							              <tbody>
							                <tr>
							                  <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;border-collapse:collapse" align="center">
							                    <div>
							                      <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;border-collapse:collapse" align="center" border="0">
							                        <tbody>
							                          <tr>
							                            <td style="padding:4px;vertical-align:middle;border-collapse:collapse">
							                              <table role="presentation" cellpadding="0" cellspacing="0" style="background:transparent;border-radius:3px;width:40px;border-collapse:collapse" border="0">
							                                <tbody>
							                                  <tr>
							                                    <td style="font-size:0px;vertical-align:middle;width:40px;height:40px;border-collapse:collapse">
							                                      <a href="https://www.facebook.com/mevamchapeco/" target="_blank" data-saferedirecturl="https://www.facebook.com/mevamchapeco/"><img alt="FacePrecisa" height="40" src="http://mevamchapeco.org/img/faceicon.png" style="display:block;border-radius:3px;border:0;height:auto; outline:none;text-decoration:none" width="30"></a>
							                                    </td>
							                                  </tr>
							                                </tbody>
							                              </table>
							                            </td>
							                            <td style="padding:4px 4px 4px 0;vertical-align:middle;border-collapse:collapse">
							                              <a href="https://www.facebook.com/mevamchapeco/" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;border-radius:3px" target="_blank" data-saferedirecturl="https://www.facebook.com/mevamchapeco/"> </a>
							                            </td>
							                          </tr>
							                        </tbody>
							                      </table>
							                      
							                      <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;border-collapse:collapse" align="center" border="0">
							                        <tbody>
							                          <tr>
							                            <td style="padding:4px;vertical-align:middle;border-collapse:collapse">
							                              <table role="presentation" cellpadding="0" cellspacing="0" style="background:transparent;border-radius:3px;width:40px;border-collapse:collapse" border="0">
							                                <tbody>
							                                  <tr>
							                                    <td style="font-size:0px;vertical-align:middle;width:40px;height:40px;border-collapse:collapse">
							                                      <a href="http://mevamchapeco.org/" target="_blank" data-saferedirecturl="http://mevamchapeco.org/"><img alt="Precisa" height="40" src="http://mevamchapeco.org/img/favicon.png" style="display:block;border-radius:3px;border:0;height:auto; outline:none;text-decoration:none" width="25"></a>
							                                    </td>
							                                  </tr>
							                                </tbody>
							                              </table>
							                            </td>
							                            <td style="padding:4px 4px 4px 0;vertical-align:middle;border-collapse:collapse">
							                              <a href="http://mevamchapeco.org/" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;border-radius:3px" target="_blank" data-saferedirecturl="http://mevamchapeco.org/"> </a>
							                            </td>
							                          </tr>
							                        </tbody>
							                      </table> 
							                    </div>
							                  </td>
							                </tr>
							              </tbody>
							            </table>
							          </div>
							          
							        </td>
							      </tr>
							    </tbody>
							  </table>
							</div> 
							<div style="margin:0px auto;max-width:600px">
							  <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
							    <tbody>
							      <tr>
							        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-top:0px;border-collapse:collapse">
							          <div class="m_4639243122964952794mj-column-per-100 m_4639243122964952794outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
							            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
							              <tbody>
							                <tr>
							                  <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:0px;border-collapse:collapse" align="center">
							                    <div style="color:#777;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:1.5;text-align:center">Atendimento 24 horas</div>
							                  </td>
							                </tr>
							                <tr>
							                  <td style="word-wrap:break-word;font-size:0px;padding:10px 40px 20px 40px;border-collapse:collapse" align="center">
							                    <div style="color:#777;font-family:sans-serif;font-size:13px;line-height:1.5;text-align:center">Em caso de qualquer dúvida, fique à vontade para responder esse email ou nos contatar no <a href="http://mevamchapeco@mevamchapeco.org" style="color:#ed3237;font-weight:bold" target="_blank">mevamchapeco@mevamchapeco.org</a></p>
							                  </div>
							                </td>
							              </tr> 
							              <tr>
							                <td style="word-wrap:break-word;font-size:0px;padding:10px 40px 20px 40px;border-collapse:collapse" align="center">
							                  <div style="color:#777;font-family:sans-serif;font-size:13px;line-height:1.5;text-align:center">MEVAM Chapecó ' . date('Y') . '</div>
							                  </td>
							                </tr>
							              </tbody>
							            </table>
							          </div>										          
							        </td>
							      </tr>
							    </tbody>
							  </table>
							</div> 
						</div>
					</div>
				';
				$mail 			= new PHPMailer();
			    $mail->IsSMTP();
			    $mail->Host 	= "174.136.13.89";
			    $mail->SMTPAuth = true;
			    $mail->Username = "mevamchapeco@mevamchapeco.org";
			    $mail->Password = "z5D883yG";
			    $mail->From 	= "mevamchapeco@mevamchapeco.org";
			    $mail->FromName = "Café da Aliança - MEVAM Chapecó";
			    // $mail->AddAddress("mevamchapeco@mevamchapeco.org", "Café da Aliança");
			    $mail->AddAddress($emailcontato, "Café da Aliança");
			    $mail->IsHTML(true);
			    $mail->CharSet 	= 'utf-8';
			    $mail->Subject  = "Café da Aliança - MEVAM Chapecó";
			    $mail->Body 	= $arquivo;
			    $enviado 		= $mail->Send();
			    $mail->ClearAllRecipients();
			    if ($enviado) {
			    	?><script type="text/javascript">alert("✅ Obrigado pela sua inscrição, verifique seu e-mail!");window.location.href="<?php echo URL::getBase() ?>"</script><?php
			        exit;
			    }
			    else{ ?><script type="text/javascript">alert("❌ Nosso servidor está em manutenção, tente novamente mais tarde!");window.location.href="<?php echo URL::getBase() ?>"</script><?php }
		    } 
	    }
	}

?>
<!-- header -->
  	<section style="background: linear-gradient(to right, #222222 20%, #833d0c 50%, #222222 80%);">
  		<div class="parallax-overlay" style="opacity: 0.3;"></div>
  		<div class="carousel slide">
	        <div class="carousel-inner">
	          <div class="carousel-item active" style="height: 207px;">
            
	            <div class="container">
	              <div class="carousel-caption text-center">
	                <h1 style="color:#fff;text-shadow: 2px -3px 5px black;">CAFÉ DA ALIANÇA</h1>
	                <p>Veja as informações abaixo</p>
	              </div>
	            </div>

	        </div>
	    </div>
	</section>
<!--  -->
<?php 
if (isset($_GET['inscritos'])){ ?>
	<section id="main-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-border" style="margin-bottom: 40px;">Dados do Evento</h3>
					<div class="row">
						<?php
						$numvagas = 0;
						$queryvagastotais = "SELECT vagas FROM evento WHERE evento.eventoID = '1' LIMIT 1";
						if ($database->num_rows($queryvagastotais) > 0)list($numvagas) = $database->get_row($queryvagastotais);
						else {
							echo "Ocorreu um erro. Evento não encontrado!";
							exit;
						}
						$queryinscritos = "
							SELECT 
								inscricaoevento.datacadastro,
								contato.nomecompleto,
								contato.email,
								contato.telefone,
								contato.lideranca,
								contato.telefonelider,
								contato.ministerio
							FROM inscricaoevento
								JOIN contato ON contato.contatoID = inscricaoevento.contatoID
							WHERE inscricaoevento.eventoID = '1'
							ORDER BY inscricaoevento.datacadastro DESC
						";
						$numinscritos = $database->num_rows($queryinscritos);
						if ($numinscritos > 0) { ?>

							<div style="margin-bottom: 20px!important;text-align: center!important;" class="col-sm-12 d-none d-lg-block"><a href="print.php" class="btn btn-primary solid blank" type="submit"><i class="fa fa-file-excel-o"></i> Baixar Lista Inscritos</a></div>

							<div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-delay=".5s">
								<div class="plan text-center">
									<span class="plan-name">Total de Vagas</span>
									<p style="font-size: 48px;padding: 30px 0;margin-bottom: 30px;position: relative;background: #f2f2f2;"><strong><?php echo $numvagas ?> </strong></p>
								</div>
							</div>
							<div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-delay=".5s">
								<div class="plan text-center">
									<span class="plan-name">Total de Inscritos</span>
									<p style="font-size: 48px;padding: 30px 0;margin-bottom: 30px;position: relative;background: #f2f2f2;"><strong><?php echo $numinscritos ?> </strong></p>
								</div>
							</div>
							<div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-delay=".5s">
								<div class="plan text-center">
									<span class="plan-name">% Vagas Preenchidas</span>
									<p style="font-size: 48px;padding: 30px 0;margin-bottom: 30px;position: relative;background: #f2f2f2;"><strong><?php echo number_format((($numinscritos/$numvagas)*100),1,',','') ?>% </strong></p>
								</div>
							</div>

							<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay=".5s"><br><br><br></div>
						</div>

						<h3 class="title-border">Lista de Inscritos</h3>
						<div class="row">
								<?php
								$inscritoslist = $database->get_results($queryinscritos);
								foreach ($inscritoslist as $inscrito) { ?>
									<blockquote class="col-sm-6 col-md-4">
										<?php if ($inscrito['lideranca'] == '1'): ?><div style="position: absolute;left: -20px;top: -10px;background: #344480;width: 35px;height: 35px;text-align: center;padding-top: 6px;border-radius: 100%;font-size: 17px;color: white;" title="Esta pessoa é líder em um ministério!"><i class="fa fa-flag"></i></div><?php endif ?>
										<small><?php echo "Data Inscrição: ".date('d/m/Y à\s H:i',strtotime($inscrito['datacadastro'])) ?></small>
										<div style="font-weight: bold;"><?php echo $inscrito['nomecompleto'] ?></div>
										<small><a style="text-decoration: underline;" href="mailto:<?php echo $inscrito['email'] ?>"><i class="fa fa-envelope-o"></i> <?php echo $inscrito['email'] ?></a> | <a style="text-decoration: underline;" href="https://api.whatsapp.com/send?phone=55<?php echo $inscrito['telefone'] ?>&text"><i class="fa fa-whatsapp"></i> <?php echo $inscrito['telefone'] ?></a></small>
										<div><?php echo $inscrito['ministerio'] ?> | <?php echo $inscrito['telefonelider'] ?></div>
									</blockquote>
									<?php
								}
							}
						?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 
} 
else{ ?>
	<section id="featured-video" class="featured-video" style="padding-bottom: 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6"><img src="images/palestrante.png" alt /></div>
				<div class="col-md-6">
					<div class="video-block-head">
						<h3>CAFÉ DA ALIANÇA</h3>
						<p><br>Seja bem vindo ao Café da Aliança de Chapecó. 
							Fique ligado, estamos trabalhando com capacidade reduzida conforme as normas estabelecidas pelo poder público.
							Não será necessário fazer nenhuma inscrição, mas chegue cedo, pois <b>as vagas são limitadas.</b>,
							após preencher a ocupação não será mais permitida a entrada, conforme as diretrizes governamentais.

							<!-- <b>A inscrição deve ser individual.</b>  -->
							<!-- Após informar os seus dados, aguarde em seu e-mail e/ou whatsapp a confirmação da sua entrada. Ela será solicitada no acesso ao templo. -->
						</p>
					</div>

					<div class="video-block-content">
						<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
						<div class="feature-content">
							<h3>Grupo de risco</h3>
							<p>Participe apenas se não fizer parte do grupo de risco!</p>
						</div>
					</div>

					<div class="video-block-content">
						<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
						<div class="feature-content">
							<h3>Venha de máscara, não esqueça!</h3>
							<p>O uso de máscara é obrigatório!</p>
						</div>
					</div>

					<!-- <div class="video-block-content">
						<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
						<div class="feature-content">
							<h3>Tenha certeza!</h3>
							<p>Inscreva-se apenas na certeza de sua presença!</p>
						</div>

					</div> -->

				</div>
			</div>
		</div>
	</section> 
	<section class="buy-pro" style="padding-bottom: 50px;padding-top: 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mx-auto">
					<div class="pro-block text-center " style="padding: 40px 50px; background: white; box-shadow: 0px 2px 28px 0px #7777775e; border-radius: 5px;">
						<div class="title2" style="padding-bottom: 40px;">
							<h5 style="font-size: 12px; line-height: 1; ">MEVAM CHAPECÓ APRESENTA:</h5>
							<h3 style="padding: 10px 0 15px 0;font-weight: 600;">Café da Aliança</h3>
						</div>
						<div class="">
							<p style="line-height: 1;font-size: 16px;">Com:</p>
							<h5 style="font-weight: 700; color: black;line-height: 1;margin-top: 15px;font-size: 20px;">Pr. Fernando Tolentino</h5>
							<p style="line-height: 1;font-size: 16px;">Mevam Itajaí</p>
						</div>
						
						<div style="margin: 50px 0px 40px;">
							<div class="row text-center justify-content-center">

								<!-- <div class="col-md-4 col-sm-4 mb-5 wow fadeInDown" data-wow-delay=".5s">
									<div class="service-content text-center">
										<span class="service-icon icon-pentagon" style="width: 190px;">
											<div style="display: inline-table;width: 46%;float: left;text-align: center;">
												<div style="color: white;font-size: 26px;font-weight: bold;">09</div>
												<div style="color: white;font-size: 16px;">Out</div>
											</div>
											<div style="display: inline-table;width: 40%; padding-top: 10px;">
												<div style="color: white;font-size: 16px;">20:00 hrs</div>
											</div>
										</span>
										<h3>Culto</h3>
										<p style="line-height: 0;">*Aberto ao público</p>
									</div>
								</div> -->
								<div class="col-md-4 col-sm-4 mb-5 wow fadeInDown" data-wow-delay=".5s">
									<div class="service-content text-center">
										<span class="service-icon icon-pentagon" style="width: 190px;">
											<div style="display: inline-table;width: 46%;float: left;text-align: center;">
												<div style="color: white;font-size: 26px;font-weight: bold;">14</div>
												<div style="color: white;font-size: 16px;">Nov</div>
											</div>
											<div style="display: inline-table;width: 40%; padding-top: 10px;">
												<div style="color: white;font-size: 16px;">08:30 hrs</div>
											</div>
										</span>
										<h3>Café</h3>
										<!-- <p style="line-height: 0;">*Somente para pastores e líderes!</p> -->
									</div>
								</div>
								<div class="col-md-4 col-sm-4 mb-5 wow fadeInDown" data-wow-delay=".5s">
									<div class="service-content text-center">
										<span class="service-icon icon-pentagon" style="width: 190px;">
											<div style="display: inline-table;width: 46%;float: left;text-align: center;">
												<div style="color: white;font-size: 26px;font-weight: bold;">14</div>
												<div style="color: white;font-size: 16px;">Nov</div>
											</div>
											<div style="display: inline-table;width: 40%; padding-top: 10px;">
												<div style="color: white;font-size: 16px;">09:00 hrs</div>
											</div>
										</span>
										<h3>Ministração</h3>
										<!-- <p style="line-height: 0;">*Aberto ao público</p> -->
									</div>
								</div>

							</div>
							 
						</div>
						<?php 
							$queryvagas = "SELECT evento.eventoID FROM evento WHERE evento.vagas < (SELECT COUNT(inscricaoevento.inscricaoeventoID) FROM inscricaoevento WHERE inscricaoevento.eventoID = evento.eventoID LIMIT 1) LIMIT 1";
							if ($database->num_rows($queryvagas) > 0) { ?>
								<!-- <a class="btn btn-danger" style="margin-bottom: 20px; letter-spacing: 2px; font-weight: 700; padding: 16px 45px;color: white;">Inscrições finalizadas!</a> -->
								<?php
							}
							else{ ?>
								<!-- <a data-toggle="modal" data-target="#myModal" target="_blank" class="btn btn-success" style=" color: white;cursor: pointer; margin-bottom: 20px; letter-spacing: 2px; font-weight: 700; padding: 16px 45px;">Faça sua Inscrição!</a> -->
								<?php
							}
						?>
						<p><strong>Vagas limitadas devido à pandemia!</strong></p>
						<p><strong>Inscrições por ordem de chegada!</strong></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="myModal" role="dialog" ng-app="">
	    <div class="modal-dialog">

	      	<div class="modal-content">
		        <div class="modal-header">
		          	<h4 class="modal-title">Faça sua Inscrição</h4>
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body">
		          	<p>Preenchas as informações abaixo para realizar sua inscrição!</p>
		          	<form id="contact-form" action="<?php echo URL::getBase() ?>cafedaalianca?inscricao" method="post" role="form">
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
							<div class="col-md-12" >
								<div class="form-group">
									<label>Exerce liderança em um ministério?</label>
									<select class="form-control" name="lideranca" id="lideranca" ng-model="lideranca">
										<option value="">Selecione uma opção</option>
										<option value="0">Não</option>
										<option value="1">Sim</option>
									</select>
								</div>
							</div>
							<div class="col-md-12" ng-if="lideranca === '0'">
								<div class="form-group">
									<label>Telefone/Celular do seu líder:</label>
									<input class="form-control" name="telefonelider" id="telefonelider" maxlength="15" onkeypress="mascara(this,mtel)" placeholder="(__) _____-____" required />
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Nome do Ministério:</label>
									<input class="form-control" name="ministerio" id="ministerio" placeholder="Nome do Ministério" type="text" required />
								</div>
							</div>
						</div>
						<div class="col-md-12"><div class="form-group">*Obs: Não haverá culto para crianças!</div></div>
						<div class="text-right"><br>
							<button class="btn btn-default solid blank" data-dismiss="modal">Cancelar</button>
							<button class="btn btn-primary solid blank" type="submit">Enviar Inscrição</button>
						</div>
					</form>
		        </div>
		        <div class="modal-footer"></div>
	      	</div>
	      
	    </div>
	  </div>

	

	<section id="main-container">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 " style="background: #f4f4f4 !important;padding: 20px;padding-bottom: 40px;">
					<div class="row">
						<div class="col-sm-12 col-md-1"><i style="font-size: 30px;margin-top: 100px;" class="fa fa-barcode"></i></div>
						<div class="col-sm-12 col-md-11" style="margin-top: 30px;">
							<h4 style="color: #344480;font-weight: bold;">Deseja contribuir com o evento?</h4>
							<h5 style="font-weight: normal;color: #333;">Depósito Bancário</h5>
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
	<?php
}
?>
