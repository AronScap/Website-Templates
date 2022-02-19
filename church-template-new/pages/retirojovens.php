 
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
	    $eventoID = '2';


	if ( isset($_GET['inscricao']) && isset($_POST['nomecompleto']) && isset($_POST['email'])  ) {
	    $nomecompleto 			= $database->escape($_POST['nomecompleto']);
	    $emailcontato 			= $database->escape($_POST['email']);
	    $telefonecontato 		= $database->escape($_POST['telefone']);
	    $lideranca 				= $database->escape($_POST['lideranca']);
	    $telefonelider 			= $database->escape($_POST['telefonelider']);
	    $nomeresponsavel 			= $database->escape($_POST['nomeresponsavel']);
	    
	    $sqlequal = "SELECT contato.contatoID FROM contato WHERE contato.email = '$emailcontato' LIMIT 1";
	    if ($database->num_rows($sqlequal) > 0)list($contatoID) = $database->get_row($sqlequal);
	    else{
	        $newla = array(
	            'email' 		=> $emailcontato,
	            'nomecompleto' 	=> $nomecompleto,
	            'telefone' 		=> $telefonecontato,
	            'lideranca' 	=> $lideranca,
	            'telefonelider'	=> $telefonelider,
	            'nomeresponsavel'	=> $nomeresponsavel,
	        	'datacadastro' 	=> date('Y-m-d H:i:s'),
	        );
	        $database->insert('contato',$newla);
	        $contatoID = $database->lastid();
	    }
	    $sqlequaladsdsa = "SELECT inscricaoevento.inscricaoeventoID FROM inscricaoevento WHERE inscricaoevento.contatoID = '$contatoID' AND inscricaoevento.eventoID = '$eventoID' LIMIT 1";
	    if ($database->num_rows($sqlequaladsdsa) > 0){ ?><script type="text/javascript">alert("❌ Você já está inscrito neste evento!");window.location.href="<?php echo URL::getBase() ?>"</script><?php }
	    else{
	        $inscricaonova 	= array(
	        	'datacadastro' 	=> date('Y-m-d H:i:s'),
	        	'contatoID'		=> $contatoID,
	        	'eventoID'		=> $eventoID
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
							                                      <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">Bem vindo ao RETIRO MEVAM JOVENS CHAPECÓ.</div>
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
			    $mail->FromName = "RETIRO MEVAM JOVENS - MEVAM Chapecó";
			    // $mail->AddAddress("mevamchapeco@mevamchapeco.org", "RETIRO DOS JOVENS");
			    $mail->AddAddress($emailcontato, "RETIRO MEVAM JOVENS CHAPECÓ");
			    $mail->IsHTML(true);
			    $mail->CharSet 	= 'utf-8';
			    $mail->Subject  = "RETIRO MEVAM JOVENS - MEVAM Chapecó";
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
  	<section style="background: /*linear-gradient(to right, #222222 20%, #adadad 50%, #222222 80%) */url('<?php echo URL::getBase(); ?>img/fundo.png') no-repeat;background-position: center;background-size: cover;">
  		<div class="parallax-overlay" style="opacity: 0.3;"></div>
  		<div class="carousel slide">
	        <div class="carousel-inner">
	          <div class="carousel-item active" style="height: 337px;">
            
	            <div class="container">
	              <div class="carousel-caption text-center">
	                <h1 style="color:#fff;text-shadow: 2px -3px 5px black;">RETIRO MEVAM JOVENS CHAPECÓ</h1>
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
						$queryvagastotais = "SELECT vagas FROM evento WHERE evento.eventoID = '$eventoID' LIMIT 1";
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
							WHERE inscricaoevento.eventoID = '$eventoID'
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
			<div class="row" style="margin-top: 55px;">
				<div class="col-md-12 heading">
					<span class="title-icon classic float-left"><i class="fa fa-users"></i></span>
					<h2 class="title classic">Retiro Mevam Jovens Chapecó</h2>
				</div>
			</div>
			<div class="row">
				<!-- <div class="col-md-6"><img src="images/palestrante.png" alt /></div> -->
				<div class="col-md-12">
					<div class="video-block-head">
						<p style="text-align: justify;">
							<hr><p style="padding-left: 25px;font-size: 18px;">“Cristo em vós, a esperança da Glória" (Colossenses 1:27).</p>
							<hr>
							<br>
							Estar em Cristo é um desafio maravilhoso, pois não vivemos a partir da cultura que este mundo nos apresenta, mas a partir da cultura que o próprio Cristo revela em nós. O reino dos céus é semelhante a um homem que estava à procura de pérolas preciosas, que encontrando uma pérola de grande valor vendeu tudo o que tinha e a comprou (Mateus 13:45). O que podemos entender desta parábola é que o Reino dos Céus é nossa maior riqueza e ao encontrarmos esse bem precioso, passamos a renunciar aquilo que trazemos, pois achamos algo de muito mais valor.
							<br>
							<br>
							Foi assim com os discípulos e é assim até os dias de hoje. Por isso te convidamos para estar conosco nos dias 05, 06 e 07 de março de 2021, pois é muito mais que um retiro ou um evento. É Cristo sendo formado em nós! Não queremos apenas um mover, queremos algo intenso e contínuo, queremos Jesus em nós, queremos uma jornada com o nosso Rei. 
							<br>
							<br>
							Se o seu desejo é que o próprio Jesus seja formado dentro de ti e que a sua caminhada venha glorificar a Ele, então lhe convidamos a buscar este lugar juntos.
							<br>
							<br>
							
							<hr>
							<br>
							<p style="font-size: 16px;">Desejamos à você boas vindas ao <b>RETIRO MEVAM JOVENS CHAPECÓ</b>.</p>
							 

							Fique ligado, estamos trabalhando com capacidade reduzida conforme as normas estabelecidas pelo poder público.
							A sua pré-inscrição pode ser feita logo abaixo, mas não perca tempo, pois <b>as vagas são limitadas.</b>,
							após preencher a ocupação máxima do local não será mais permitida a entrada, conforme as diretrizes governamentais.

							<b>A inscrição deve ser individual.</b> 
							Após informar os seus dados, aguarde em seu e-mail e/ou whatsapp a confirmação da sua entrada. 
							<br>Iremos entrar em contato para confirmar seu pagamento!
						</p>
					</div>
				</div>
				<div class="col-md-12"><br></div>
				<div class="col-md-6">
					<div class="video-block-content">
						<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
						<div class="feature-content">
							<h3>Grupo de risco</h3>
							<p>Participe apenas se não fizer parte do grupo de risco!</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="video-block-content">
						<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
						<div class="feature-content">
							<h3>Venha de máscara, não esqueça!</h3>
							<p>O uso de máscara é obrigatório!</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="video-block-content">
						<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
						<div class="feature-content">
							<h3>Dormitórios separados</h3>
							<p>Meninos e meninas ficarão em ambientes separados! É proibida a entrada nos ambientes do sexo oposto. Mesmo os que são casados!</p>
						</div>
					</div>
				</div> 
				<div class="col-md-6">
					<div class="video-block-content">
						<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
						<div class="feature-content">
							<h3>Menor de idade</h3>
							<p>Caso seja menor de idade, imprima <a href="<?php echo URL::getBase() ?>ficha.docx" target="_blank" style="color: blue;font-weight: bold;">este termo de responsabilidade <i class="fa fa-file-pdf-o"></i></a>, preencha-o e entregue no evento!</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="video-block-content">
						<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
						<div class="feature-content">
							<h3>Inscrição Individual</h3>
							<p>A sua inscrição deve ser individual! Após se inscrever, verifique seu e-mail com a confirmação! Iremos entrar em contato para confirmar sua inscrição e o pagamento!</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="video-block-content">
						<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
						<div class="feature-content">
							<h3>Vagas Limitadas</h3>
							<p>As vagas estão limitadas a ocupação de no máximo 70 pessoas. Após preencher as vagas não será mais possível fazer a sua incrição!</p>
						</div>
					</div>
				</div>
			</div>
			<br /><br />
		</div>
	</section> 

	<section class="buy-pro" style="padding-bottom: 50px;padding-top: 0px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mx-auto">
					<div class="pro-block text-center " style="padding: 40px 50px; background: white; box-shadow: 0px 2px 28px 0px #7777775e; border-radius: 5px;">
						<div class="title2" style="padding-bottom: 40px;">
							<h5 style="font-size: 12px; line-height: 1; ">MEVAM CHAPECÓ APRESENTA:</h5>
							<h3 style="padding: 10px 0 15px 0;font-weight: 600;">RETIRO MEVAM JOVENS CHAPECÓ</h3>
						</div> 
						
						<div style="margin: 50px 0px 40px;">
							<div class="row text-center justify-content-center">

								<div class="col-md-4 col-sm-4 mb-5 wow fadeInDown" data-wow-delay=".1s">
									<div class="service-content text-center">
										<span class="service-icon icon-pentagon" style="width: 190px;">
											<div style="display: inline-table;width: 46%;float: left;text-align: center;">
												<div style="color: white;font-size: 26px;font-weight: bold;">05</div>
												<div style="color: white;font-size: 16px;">Mar</div>
											</div>
											<div style="display: inline-table;width: 40%; padding-top: 10px;"><div style="color: white;font-size: 16px;">Sexta</div></div>
										</span>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 mb-5 wow fadeInDown" data-wow-delay=".3s">
									<div class="service-content text-center">
										<span class="service-icon icon-pentagon" style="width: 190px;">
											<div style="display: inline-table;width: 46%;float: left;text-align: center;">
												<div style="color: white;font-size: 26px;font-weight: bold;">06</div>
												<div style="color: white;font-size: 16px;">Mar</div>
											</div>
											<div style="display: inline-table;width: 40%; padding-top: 10px;">
												<div style="color: white;font-size: 16px;">Sábado</div>
											</div>
										</span>
										<!-- <h3>Café</h3> -->
									</div>
								</div>
								<div class="col-md-4 col-sm-4 mb-5 wow fadeInDown" data-wow-delay=".5s">
									<div class="service-content text-center">
										<span class="service-icon icon-pentagon" style="width: 190px;">
											<div style="display: inline-table;width: 46%;float: left;text-align: center;">
												<div style="color: white;font-size: 26px;font-weight: bold;">07</div>
												<div style="color: white;font-size: 16px;">Mar</div>
											</div>
											<div style="display: inline-table;width: 40%; padding-top: 10px;">
												<div style="color: white;font-size: 16px;">Domingo</div>
											</div>
										</span>
									</div>
								</div>
							</div>							 
						</div>

						<div class="row mb-5">
							<div class="col-md-3 col-sm-12"><p></p></div>
							<div class="col-md-3 col-sm-12 mb-5 wow fadeInDown" data-wow-delay=".3s">
								<div class="service-content text-center">
									<i class="fa fa-user" style="font-size: 24px;margin-bottom: 20px;"></i>
									<i class="fa fa-user" style="font-size: 22px;margin-bottom: 20px;position: absolute;margin-left: -6px;"></i>
									<div style="font-size: 24px;font-weight: bold;">R$ 150,00</div>
									<div>para Noivos/Casados</div>
								</div>
							</div> 
							<div class="col-md-3 col-sm-12 mb-5 wow fadeInDown" data-wow-delay=".5s">
								<div class="service-content text-center">
									<i class="fa fa-user" style="font-size: 24px;margin-bottom: 20px;"></i>
									<div style="font-size: 24px;font-weight: bold;">R$ 170,00</div>
									<div>para Solteiros</div>
								</div>
							</div>
						</div>
						<div><hr class="mb-5"></div>

						<?php 
							$queryvagas = "SELECT evento.eventoID FROM evento WHERE evento.vagas < (SELECT COUNT(inscricaoevento.inscricaoeventoID) FROM inscricaoevento WHERE inscricaoevento.eventoID = evento.eventoID LIMIT 1) LIMIT 1";
							if ($database->num_rows($queryvagas) > 0) { ?>
								<a class="btn btn-danger" style="margin-bottom: 20px; letter-spacing: 2px; font-weight: 700; padding: 16px 45px;color: white;">Inscrições finalizadas!</a>
								<?php
							}
							else{ ?>
								<!-- <a class="btn btn-success" style=" color: white;cursor: pointer; margin-bottom: 20px; letter-spacing: 2px; font-weight: 700; padding: 16px 45px;">Faça sua pré-inscrição!</a> -->
								<a data-toggle="modal" data-target="#myModal" target="_blank" class="btn btn-success" style=" color: white;cursor: pointer; margin-bottom: 20px; letter-spacing: 2px; font-weight: 700; padding: 16px 45px;">Faça sua pré-inscrição!</a>
								<?php
							}
						?>
						<p><strong>Vagas limitadas devido à pandemia!</strong></p>
						
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 55px;">
				<div class="col-md-12 heading">
					<span class="title-icon classic float-left"><i class="fa fa-calendar"></i></span>
					<h2 class="title classic">Programação</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
					<div class="plan text-center" style="min-height: 690px;">
						<p class="plan-price"><span class="plan-name" style="color: black;">05 Março <small >Sexta-Feira</small></span></p>
						<ul class="list-unstyled text-left">
							<li><b>19:30 hrs</b> | Check-in</li>
							<li><b>20:00 hrs</b> | Reunião de avisos</li>
							<li><b>20:30 hrs</b> | Jantar</li>
							<li><b>21:00 hrs</b> | Sessão 01</li>
						</ul> 
					</div>
				</div><!-- plan end -->

				<!-- plan start -->
				<div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-delay=".5s">
					<div class="plan text-center" style="min-height: 690px;">
						<p class="plan-price"><span class="plan-name" style="color: black;">06 Março <small >Sábado</small></span></p>
						<ul class="list-unstyled text-left">
							<li><b>07:30 hrs</b> | Despertar</li>
							<li><b>08:00 hrs</b> | Devocional</li>
							<li><b>08:30 hrs</b> | Café da manhã</li>
							<li><b>09:00 hrs</b> | Sessão 02</li>
							<li><b>11:00 hrs</b> | Sessão 03</li>
							<li><b>12:30 hrs</b> | Almoço</li>
							<li><b>15:00 hrs</b> | Gincana</li>
							<li><b>16:30 hrs</b> | Café da tarde</li>
							<li><b>19:30 hrs</b> | Jantar</li>
							<li><b>20:30 hrs</b> | Sessão 04</li>
						</ul> 
					</div>
				</div> 
				<div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="0.7s">
					<div class="plan text-center" style="min-height: 690px;">
						<p class="plan-price"><span class="plan-name" style="color: black;">07 Março <small >Domingo</small></span></p>
						<ul class="list-unstyled text-left">
							<li><b>08:30 hrs</b> | Café da Manhã</li>
							<li><b>09:30 hrs</b> | Sessão 05</li>
							<li><b>12:30 hrs</b> | Almoço</li>
							<li><b>13:00 hrs</b> | Check-out</li> 
						</ul> 
					</div>
				</div><!-- plan end -->
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
		          	<form id="contact-form" action="<?php echo URL::getBase() ?>retirojovens?inscricao" method="post" role="form">
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
									<label>Possui 18 anos ou mais?</label>
									<select class="form-control" name="lideranca" id="lideranca" ng-model="lideranca">
										<option value="">Selecione uma opção</option>
										<option value="0">Não</option>
										<option value="1">Sim</option>
									</select>
								</div>
							</div>
							<div class="col-md-12" ng-if="lideranca === '0'">
								<label>Documento Obrigatório:</label>
								<a href="<?php echo URL::getBase() ?>ficha.docx" target="_blank" style="color: blue;font-weight: bold;" class="btn btn-default">Termo de responsabilidade <i class="fa fa-file-pdf-o"></i></a>
							</div>
							<div class="col-md-12" ng-if="lideranca === '0'">
								<label>Telefone/Celular do seu responsável:</label>
								<input class="form-control" name="telefonelider" id="telefonelider" maxlength="15" onkeypress="mascara(this,mtel)" placeholder="(__) _____-____" required />
							</div>
							<div class="col-md-12" ng-if="lideranca === '0'">
								<label>Nome do Responsável:</label>
								<input class="form-control" name="nomeresponsavel" id="nomeresponsavel" placeholder="Nome do Responsável" type="text" required />
							</div>
						</div>
						<!-- <div class="col-md-12"><div class="form-group">*Obs: Entraremos em!</div></div> -->
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

	

	<section id="main-container" style="padding-top: 20px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 heading">
					<span class="title-icon classic float-left"><i class="fa fa-map-marker"></i></span>
					<h2 class="title classic">Localização</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47795.56326239482!2d-52.52481520183884!3d-27.079845065042424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjfCsDA1JzIzLjAiUyA1MsKwMjknNTMuMiJX!5e0!3m2!1spt-BR!2sbr!4v1607112854929!5m2!1spt-BR!2sbr" height="450" frameborder="0" style="border:0;width: 100%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div> 
			</div>
		</div>
	</section>
	<section id="main-container" style="padding-top: 20px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 heading">
					<span class="title-icon classic float-left"><i class="fa fa-image"></i></span>
					<h2 class="title classic">Retiros anteriores</h2>
				</div>
			</div>
			<style type="text/css">.imagesgaleriareiro img{width: 100%;}</style>
			<div class="row imagesgaleriareiro">
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/1.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/1.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/2.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/2.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/3.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/3.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/4.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/4.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/5.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/5.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/6.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/6.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/7.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/7.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/8.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/8.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/9.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/9.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/10.png"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/10.png') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/11.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/11.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/12.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/12.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/13.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/13.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/14.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/14.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/15.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/15.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/16.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/16.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/17.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/17.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/18.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/18.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/19.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/19.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/20.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/20.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/21.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/21.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/22.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/22.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/23.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/23.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/24.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/24.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/25.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/25.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/26.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/26.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/27.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/27.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/28.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/28.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/29.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/29.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/30.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/30.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/31.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/31.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/32.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/32.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/33.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/33.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/34.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/34.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/35.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/35.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/36.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/36.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/37.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/37.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/38.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/38.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/39.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/39.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <!-- <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/40.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/40.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div> -->
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/41.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/41.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/42.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/42.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/43.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/43.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/44.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/44.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/45.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/45.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/46.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/46.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/47.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/47.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/48.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/48.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/49.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/49.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/50.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/50.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/51.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/51.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/52.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/52.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            <div class="col-md-3 col-sm-12"><a data-rel="prettyPhoto" href="<?php echo URL::getBase() ?>adm/retiro/53.jpg"><div style="background:url('<?php echo URL::getBase() ?>adm/retiro/53.jpg') no-repeat;background-size: cover;background-position: center;height: 200px;width: 100%;margin-bottom: 15px;"></div></a></div>
	            
			</div>
		</div>
	</section>
	<?php
}
?>