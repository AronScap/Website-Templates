 
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
				    if ($database->num_rows($sqlequaladsdsa) > 0){ ?><script type="text/javascript">alert("??? Voc?? j?? est?? inscrito neste evento!");window.location.href="<?php echo URL::getBase() ?>"</script><?php }
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
										                                      <div style="color:#555;font-family:sans-serif;font-size:24px;line-height:1.5;text-align:center">Ol??, <strong>' . $nomecompleto . '</strong>!</div>
										                                    </td>
										                                  </tr>
										                                  <tr>
										                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:27px;border-collapse:collapse" align="center">
										                                      <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">Bem vindo ao Caf?? da Alian??a.</div>
										                                    </td>
										                                  </tr>
										                                  <tr>
										                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:27px;border-collapse:collapse" align="center">
										                                      <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">Sua Inscri????o foi efetuada com sucesso!</div>
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
										                                      <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">Se tiver alguma d??vida, ?? s?? chamar.</div>
										                                    </td>
										                                  </tr>
										                                  <tr>
										                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;border-collapse:collapse" align="center">
										                                      <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">Um abra??o,
										                                        <br> Equipe MEVAM Chapec??</div>
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
										                    <div style="color:#777;font-family:sans-serif;font-size:13px;line-height:1.5;text-align:center">Em caso de qualquer d??vida, fique ?? vontade para responder esse email ou nos contatar no <a href="http://mevamchapeco@mevamchapeco.org" style="color:#ed3237;font-weight:bold" target="_blank">mevamchapeco@mevamchapeco.org</a></p>
										                  </div>
										                </td>
										              </tr> 
										              <tr>
										                <td style="word-wrap:break-word;font-size:0px;padding:10px 40px 20px 40px;border-collapse:collapse" align="center">
										                  <div style="color:#777;font-family:sans-serif;font-size:13px;line-height:1.5;text-align:center">MEVAM Chapec?? ' . date('Y') . '</div>
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
						    $mail->FromName = "Caf?? da Alian??a - MEVAM Chapec??";
						    // $mail->AddAddress("mevamchapeco@mevamchapeco.org", "Caf?? da Alian??a");
						    $mail->AddAddress($emailcontato, "Caf?? da Alian??a");
						    $mail->IsHTML(true);
						    $mail->CharSet 	= 'utf-8';
						    $mail->Subject  = "Caf?? da Alian??a - MEVAM Chapec??";
						    $mail->Body 	= $arquivo;
						    $enviado 		= $mail->Send();
						    $mail->ClearAllRecipients();
						    if ($enviado) {
						    	?><script type="text/javascript">alert("??? Obrigado pela sua inscri????o, verifique seu e-mail!");window.location.href="<?php echo URL::getBase() ?>"</script><?php
						        exit;
						    }
						    else{ ?><script type="text/javascript">alert("??? Nosso servidor est?? em manuten????o, tente novamente mais tarde!");window.location.href="<?php echo URL::getBase() ?>"</script><?php }
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
				                <h1 style="color:#fff;text-shadow: 2px -3px 5px black;">RETIRO DOS JOVENS</h1>
				                <p>Veja as informa????es abaixo</p>
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
										echo "Ocorreu um erro. Evento n??o encontrado!";
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
													<?php if ($inscrito['lideranca'] == '1'): ?><div style="position: absolute;left: -20px;top: -10px;background: #344480;width: 35px;height: 35px;text-align: center;padding-top: 6px;border-radius: 100%;font-size: 17px;color: white;" title="Esta pessoa ?? l??der em um minist??rio!"><i class="fa fa-flag"></i></div><?php endif ?>
													<small><?php echo "Data Inscri????o: ".date('d/m/Y ??\s H:i',strtotime($inscrito['datacadastro'])) ?></small>
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
									<h3>CAF?? DA ALIAN??A</h3>
									<p><br>Seja bem vindo ao Caf?? da Alian??a de Chapec??. 
										Fique ligado, estamos trabalhando com capacidade reduzida conforme as normas estabelecidas pelo poder p??blico.
										N??o ser?? necess??rio fazer nenhuma inscri????o, mas chegue cedo, pois <b>as vagas s??o limitadas.</b>,
										ap??s preencher a ocupa????o n??o ser?? mais permitida a entrada, conforme as diretrizes governamentais.

										<!-- <b>A inscri????o deve ser individual.</b>  -->
										<!-- Ap??s informar os seus dados, aguarde em seu e-mail e/ou whatsapp a confirma????o da sua entrada. Ela ser?? solicitada no acesso ao templo. -->
									</p>
								</div>

								<div class="video-block-content">
									<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
									<div class="feature-content">
										<h3>Grupo de risco</h3>
										<p>Participe apenas se n??o fizer parte do grupo de risco!</p>
									</div>
								</div>

								<div class="video-block-content">
									<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
									<div class="feature-content">
										<h3>Venha de m??scara, n??o esque??a!</h3>
										<p>O uso de m??scara ?? obrigat??rio!</p>
									</div>
								</div>

								<!-- <div class="video-block-content">
									<span class="feature-icon float-left"><i class="fa fa-exclamation-circle"></i></span>
									<div class="feature-content">
										<h3>Tenha certeza!</h3>
										<p>Inscreva-se apenas na certeza de sua presen??a!</p>
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
										<h5 style="font-size: 12px; line-height: 1; ">MEVAM CHAPEC?? APRESENTA:</h5>
										<h3 style="padding: 10px 0 15px 0;font-weight: 600;">Caf?? da Alian??a</h3>
									</div>
									<div class="">
										<p style="line-height: 1;font-size: 16px;">Com:</p>
										<h5 style="font-weight: 700; color: black;line-height: 1;margin-top: 15px;font-size: 20px;">Pr. Fernando Tolentino</h5>
										<p style="line-height: 1;font-size: 16px;">Mevam Itaja??</p>
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
													<p style="line-height: 0;">*Aberto ao p??blico</p>
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
													<h3>Caf??</h3>
													<!-- <p style="line-height: 0;">*Somente para pastores e l??deres!</p> -->
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
													<h3>Ministra????o</h3>
													<!-- <p style="line-height: 0;">*Aberto ao p??blico</p> -->
												</div>
											</div>

										</div>
										 
									</div>
									<?php 
										$queryvagas = "SELECT evento.eventoID FROM evento WHERE evento.vagas < (SELECT COUNT(inscricaoevento.inscricaoeventoID) FROM inscricaoevento WHERE inscricaoevento.eventoID = evento.eventoID LIMIT 1) LIMIT 1";
										if ($database->num_rows($queryvagas) > 0) { ?>
											<!-- <a class="btn btn-danger" style="margin-bottom: 20px; letter-spacing: 2px; font-weight: 700; padding: 16px 45px;color: white;">Inscri????es finalizadas!</a> -->
											<?php
										}
										else{ ?>
											<!-- <a data-toggle="modal" data-target="#myModal" target="_blank" class="btn btn-success" style=" color: white;cursor: pointer; margin-bottom: 20px; letter-spacing: 2px; font-weight: 700; padding: 16px 45px;">Fa??a sua Inscri????o!</a> -->
											<?php
										}
									?>
									<p><strong>Vagas limitadas devido ?? pandemia!</strong></p>
									<p><strong>Inscri????es por ordem de chegada!</strong></p>
								</div>
							</div>
						</div>
					</div>
				</section>
				<div class="modal fade" id="myModal" role="dialog" ng-app="">
				    <div class="modal-dialog">

				      	<div class="modal-content">
					        <div class="modal-header">
					          	<h4 class="modal-title">Fa??a sua Inscri????o</h4>
					          	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        <div class="modal-body">
					          	<p>Preenchas as informa????es abaixo para realizar sua inscri????o!</p>
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
												<label>Exerce lideran??a em um minist??rio?</label>
												<select class="form-control" name="lideranca" id="lideranca" ng-model="lideranca">
													<option value="">Selecione uma op????o</option>
													<option value="0">N??o</option>
													<option value="1">Sim</option>
												</select>
											</div>
										</div>
										<div class="col-md-12" ng-if="lideranca === '0'">
											<div class="form-group">
												<label>Telefone/Celular do seu l??der:</label>
												<input class="form-control" name="telefonelider" id="telefonelider" maxlength="15" onkeypress="mascara(this,mtel)" placeholder="(__) _____-____" required />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Nome do Minist??rio:</label>
												<input class="form-control" name="ministerio" id="ministerio" placeholder="Nome do Minist??rio" type="text" required />
											</div>
										</div>
									</div>
									<div class="col-md-12"><div class="form-group">*Obs: N??o haver?? culto para crian??as!</div></div>
									<div class="text-right"><br>
										<button class="btn btn-default solid blank" data-dismiss="modal">Cancelar</button>
										<button class="btn btn-primary solid blank" type="submit">Enviar Inscri????o</button>
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
										<h5 style="font-weight: normal;color: #333;">Dep??sito Banc??rio</h5>
										<div class="row">
											<div class="col-sm-12 col-md-4">
												<div style="font-size: 12px; font-weight: bold;">Banco:</div>
												<div><b>SICREDI - 748</b></div>
												<div>Ag??ncia: <b>0258</b></div>
												<div>Conta: <b>20187-2</b></div>
											</div>
											<div class="col-sm-12 col-md-8">
												<div style="font-size: 12px; font-weight: bold;">Dados necess??rios para fazer o dep??sito:</div>
												<div><b>Minist??rio Vinho Novo as Na????es Mevam Chapec??</b></div>
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
