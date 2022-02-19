<?php 
	include "inc/verificasessao.php"; 
	include "inc/mask.php"; 
	function valida_campos($campo,$conn){
		return mysqli_real_escape_string($conn,htmlspecialchars($campo));
	}  
	if(isset($_GET['go']) && $_GET['go'] == 'newsletter'){
		if(!isset($_GET['edit'])){ /*inicio*/
			$totalEmails = 0;
			$qEmails = mysqli_query($conn,'SELECT COUNT(id) AS totalEmails FROM sp_newsletter');
			$remails = mysqli_fetch_array($qEmails,MYSQLI_ASSOC);
			$totalEmails = $remails['totalEmails'];
			if (isset($_GET['validainsert'])) { 
				$nome = valida_campos($_POST['nome'],$conn);
				$email = valida_campos($_POST['email'],$conn);
				$q_profissionai = mysqli_query($conn,"SELECT email FROM sp_newsletter WHERE email LIKE '".$email."'");
				if(!mysqli_num_rows($q_profissionai)){	
					$sqlEdit = "INSERT INTO sp_newsletter (nome,email) VALUES ('$nome','$email')"; 
					$q_edit = mysqli_query($conn,$sqlEdit);
					if($q_edit){				
						include "inc/salvo.php";
						echo "<script>setTimeout('newsletter()', 400);</script>";
					}
					else{ ?> 
						<center> 
							<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=newsletter" aria-label="Close">Voltar</a>
						</center>
						<?php 
						exit;
					}
				}
				else{ ?> 
					<center> 
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Este contato já foi cadastrado anteriormente!</h5><br>
						<a class="close button" href="index.php?go=newsletter" aria-label="Close">Voltar</a>
					</center>
					<?php   
				}
				exit;
			} 
			?>
			<fieldset>
				<legend>
					<i class="fa fa-address-card" style="color:rgb(237,50,55);"></i>
					<a href="?go=newsletter" style="color:#008CBA;">CONTATOS (<?php echo $totalEmails ?>)</a>
				</legend> 
				<form> 
					<div id="tabela">
						<i class="fa fa-search" style="float:left;font-size:20px; margin:4px; color:#ccc; position:absolute;"></i>
						<input type="text" autocomplete="off" placeholder="Buscar newsletter" id="txtColuna1"  class="input_busca_lote" style="padding-left: 26px!important;"> 
						<input type="submit" disabled class="hide">
					</div> 
					<div id="divConteudo"> 						
						<table>
							<thead>
							    <tr>
									<th style="width:8%"></th>          
									<th style="">CADASTRO</th>        
									<th style="">NOME</th>        
									<th style="">E-MAIL</th>        
							    </tr>
							</thead>
							<tbody>
								<?php 
									$query_orgaos = mysqli_query($conn,"SELECT * FROM sp_newsletter ORDER BY email ASC LIMIT 200");
									$numeroLinhas = mysqli_num_rows($query_orgaos);
									if($numeroLinhas > 0){
										while($rowOrgao = mysqli_fetch_array($query_orgaos,MYSQLI_ASSOC)){ 
											$idemaili = $rowOrgao['id']; ?>
											<div style="padding:20px;width: 35%;text-align:center;" id="delnewsletter<?php echo $idemaili ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
												<h5 id="modalTitle">Tem certeza que deseja excluir o contato: <br><?php echo $rowOrgao['email'] ?> ?</h5>
												<a href="inc/deleteData.php?id=<?php echo $idemaili ?>&tabela=sp_newsletter&volta=newsletter" style="color:white"><button class="excluirS">Excluir</button></a>
												<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
											</div>	 
											<tr>
												<td>
													<!-- <a style="background:#0077bd" class="div_add_person fa-pencil" href="?go=newsletter&edit=<?php echo $idemaili ?>"></a> -->
													<?php  
														$apaga = false;
														// $q_1 = mysqli_query($conn,"SELECT * FROM sp_turmas WHERE id_profissional = {$idemaili}");
														// if(mysqli_num_rows($q_1))$apaga = true;
														if ($apaga) { 	?>
															<a class="div_add_person fa fa-times" style="background:gray;cursor:no-drop; margin-left:5px;" title="Não é possível excluir"></a>											 
															<?php
														}	
														else{ 	?>
															<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delnewsletter<?php echo $idemaili ?>" title="Excluir"></a>											 
															<?php
														}
													?> 											 
												</td>     
												<td><?php if($rowOrgao['data'] != '0000-00-00')echo date('d/m/Y',strtotime($rowOrgao['data'])); ?></td>    
												<td><?php echo $rowOrgao['nome']; ?></td>    
												<td><?php echo $rowOrgao['email']; ?></td>    
											</tr>	
											<input id="idemaili" value="<?php echo $idemaili ?>" disabled type="hidden">
											<script type="text/javascript">
												$('a.closeprofissional').on('click', function() {
												  $('#delnewsletter'+$('#idemaili').val()).foundation('reveal', 'close');
												});
											</script>				
											<?php 
										} 
									}
									else{
										echo "<tr><td colspan='2' style='text-align:center; color:red;'>Nenhum dado cadastrado!</td></tr>";
									}
								?>	
							</tbody>
						</table>
					</div> 
				</form>  
			</fieldset> 
			<!-- <div class="circulo fa-plus" onclick="mostra_cadastro_lote('cadastro_orgao')"></div>  -->
			<!-- CADASTRO DE UM contato -->
				<div style="display:none;" id="cadastro_orgao"><!-- Cadastrar novo contato -->
					<div class="fundo_opaco" onclick="hide_cadastro_lote('cadastro_orgao')"></div>
					<div class="iframe_lote">
						<div class="circuloX fa fa-times" onclick="hide_cadastro_lote('cadastro_orgao')"></div>
						<div class="small-12 large-12 columns">
							<fieldset style='min-height:375px;'>
								<legend>
									<i class="fa fa-plus" style="color:rgb(237,50,55);"></i>
									<a href="#" style="color:#008CBA; cursor:default;">CADASTRO DE UM contato</a>  
								</legend>
								<form data-abide action="?go=newsletter&validainsert" method="POST"> 
									<div class="small-12 large-4 columns">
										<label>E-mail: <small>Obrigatório</small>
											<input name="email" id="email" required type="email">
										</label>
										<small class="error">Digite o e-mail.</small>
									</div>   
									<div class="small-12 columns"><p></p></div>
									<div class="small-12 columns end">
										<button type="submit">Cadastrar</button>
									</div>	
								</form>
							</fieldset>
						</div>
					</div>
				</div>
			<!--  -->
			<?php
		} 
	}   
?>
<script type="text/javascript">  
	function mostra_cadastro_lote(id_add,id_edit,del_id){
		document.getElementById(id_add).style.display = 'block';
		document.getElementById(id_edit).style.display = 'block';
		document.getElementById(del_id).style.display = 'block';
	}
	function hide_cadastro_lote(id_add,id_edit,del_id){
		document.getElementById(id_add).style.display = 'none';
		document.getElementById(id_edit).style.display = 'none';
		document.getElementById(del_id).style.display = 'none';
	}  
	var input = $('#tabela input'),saida = $('#divConteudo'); 
	var DURACAO_DIGITACAO = 300,digitando = false,tempoUltimaDigitacao; 
	var waiting = "<center><i class='fa fa-spinner fa-spin'></i></center>";
	input.on('input', function () {
	   atualiza();
	}); 
	function atualiza () { 
	    if(!digitando) {
	        digitando = true;
	        saida.html(waiting);
	    } 
	    tempoUltimaDigitacao = (new Date()).getTime(); 
	    setTimeout(function () { 
	        var digitacaoTempo = (new Date()).getTime();
	        var diferencaTempo = digitacaoTempo - tempoUltimaDigitacao; 
	        if(diferencaTempo >= DURACAO_DIGITACAO && digitando) {
	            digitando = false;
	            var valor = input.val();  
				$.post('files/searchDatas.php',
				{ 
					valor: valor,
					page:'newsletter'
				}, function(retorno){
					saida.html(retorno);
				});
	        } 
	    }, DURACAO_DIGITACAO); 
	} 
</script> 