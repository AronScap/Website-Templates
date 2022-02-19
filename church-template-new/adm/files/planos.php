<?php 
	include "inc/verificasessao.php"; 
	include "inc/mask.php"; 
	function valida_campos($campo,$conn){
		return mysqli_real_escape_string($conn,htmlspecialchars($campo));
	}  
	if(isset($_GET['go']) && $_GET['go'] == 'planos'){
		if(!isset($_GET['edit'])){ /*inicio*/
			if (isset($_GET['validainsert'])) { 
				$nome = mb_strtoupper(valida_campos($_POST['nome'],$conn),'UTF-8'); 
				$tipodeplanoID = valida_campos($_POST['tipodeplano'],$conn);

				// $descricao = valida_campos($_POST['descricao'],$conn);
				$q_profissionai = mysqli_query($conn,"SELECT nome FROM sp_planos WHERE nome LIKE '$nome' AND tipodeplanoID LIKE '$tipodeplanoID'"); 
				if(!mysqli_num_rows($q_profissionai)){	 
					$sqlEdit = "INSERT INTO sp_planos (nome,tipodeplanoID) VALUES ('$nome','$tipodeplanoID')"; 
					$q_edit = mysqli_query($conn,$sqlEdit);
					if($q_edit){				
						include "inc/salvo.php";
						echo "<script>setTimeout('planos()', 400);</script>";
					}
					else{ ?> 
						<center> 
							<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=planos" aria-label="Close">Voltar</a>
						</center>
						<?php 
						exit;
					}
				}
				else{ ?> 
					<center> 
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Esta informação já foi cadastrado anteriormente!</h5><br>
						<a class="close button" href="index.php?go=planos" aria-label="Close">Voltar</a>
					</center>
					<?php   
				}
				exit;
			} 
			?>
			<fieldset>
				<legend>
					<i class="fa fa-cubes" style="color:rgb(237,50,55);"></i>
					<a href="?go=planos" style="color:#008CBA;">PLANOS</a>
				</legend> 
				<form> 
					<!-- <div id="tabela">
						<i class="fa fa-search" style="float:left;font-size:20px; margin:4px; color:#ccc; position:absolute;"></i>
						<input type="text" autocomplete="off" placeholder="Buscar planos" id="txtColuna1"  class="input_busca_lote" style="padding-left: 26px!important;"> 
						<input type="submit" disabled class="hide">
					</div>  -->
					<div id="divConteudo"> 						
						<table>
							<thead>
							    <tr>
									<th style="width:8%"></th> 
									<th style="">TIPO DE PLANO</th>        
									<th style="">NOME</th>         
							    </tr>
							</thead>
							<tbody>
								<?php 
									$query_orgaos = mysqli_query($conn,"SELECT sp_planos.*,COALESCE((SELECT nome FROM sp_tiposdeplanos WHERE sp_tiposdeplanos.id = sp_planos.tipodeplanoID LIMIT 1),'-') AS tipodeplano FROM sp_planos ORDER BY id ASC ");
									$numeroLinhas = mysqli_num_rows($query_orgaos);
									if($numeroLinhas > 0){
										while($rowOrgao = mysqli_fetch_array($query_orgaos,MYSQLI_ASSOC)){ 
											$idcati = $rowOrgao['id']; ?>
											<div style="padding:20px;width: 35%;text-align:center;" id="delplanos<?php echo $idcati ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
												<h5 id="modalTitle">Tem certeza que deseja excluir esta informação: <br><?php echo $rowOrgao['nome'] ?> ?</h5>
												<a href="inc/deleteData.php?id=<?php echo $idcati ?>&tabela=sp_planos&volta=planos" style="color:white"><button class="excluirS">Excluir</button></a>
												<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
											</div>	 
											<tr>
												<td>
													<a style="background:#0077bd" class="div_add_person fa-pencil" href="?go=planos&edit=<?php echo $idcati ?>"></a>
													<?php  
														$apaga = false;
														$q_1 = mysqli_query($conn,"SELECT * FROM sp_portfolio WHERE id_categoria = {$idcati}");
														if(mysqli_num_rows($q_1))$apaga = true;
														if ($apaga) { 	?>
															<a class="div_add_person fa fa-times" style="background:gray;cursor:no-drop; margin-left:5px;" title="Não é possível excluir"></a>											 
															<?php
														}	
														else{ 	?>
															<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delplanos<?php echo $idcati ?>" title="Excluir"></a>											 
															<?php
														}
													?> 											 
												</td>   
												<td><?php echo $rowOrgao['tipodeplano']; ?></td>    
												<td style="text-align: left;"><?php echo $rowOrgao['nome']; ?></td>    
											</tr>	
											<input id="idcati" value="<?php echo $idcati ?>" disabled type="hidden">	 
											<script type="text/javascript">
												$('a.closeprofissional').on('click', function() {
												  $('#delplanos'+$('#idcati').val()).foundation('reveal', 'close');
												});
											</script>				
											<?php 
										} 
									}
									else{
										echo "<tr><td colspan='4' style='text-align:center; color:red;'>Nenhum dado cadastrado!</td></tr>";
									}
								?>	
							</tbody>
						</table>
					</div> 
				</form>  
			</fieldset> 
			<div class="circulo fa-plus" onclick="mostra_cadastro_lote('cadastro_orgao')"></div> 
			<!-- CADASTRO DE UM banner -->
				<div style="display:none;" id="cadastro_orgao"><!-- Cadastrar novo banner -->
					<div class="fundo_opaco" onclick="hide_cadastro_lote('cadastro_orgao')"></div>
					<div class="iframe_lote">
						<div class="circuloX fa fa-times" onclick="hide_cadastro_lote('cadastro_orgao')"></div>
						<div class="small-12 large-12 columns">
							<fieldset style='min-height:375px;'>
								<legend>
									<i class="fa fa-plus" style="color:rgb(237,50,55);"></i>
									<a href="#" style="color:#008CBA; cursor:default;">NOVO CADASTRO</a>  
								</legend>
								<form data-abide action="?go=planos&validainsert" method="POST" enctype="multipart/form-data"> 
									<div class="small-12 large-6 columns">
										<label>Tipo de Plano: <small>Obrigatório</small>
											<select name="tipodeplano" id="tipodeplano" required>
												<option value="">Selecione uma opção</option>
												<?php 
												$qeutipos = mysqli_query($conn,"SELECT * FROM sp_tiposdeplanos ORDER BY nome ASC");
												if (mysqli_num_rows($qeutipos) > 0) {
													while ($row = mysqli_fetch_array($qeutipos,MYSQLI_ASSOC)) {
														echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';		
													}
												}
												?>
												
											</select>
										</label>
										<small class="error">Digite o nome.</small>
									</div>
									<div class="small-12 large-6 columns">
										<label>Nome: <small>Obrigatório</small>
											<input name="nome" id="nome" pattern="[a-zA-Z0-9]+" required type="text">
										</label>
										<small class="error">Digite o nome.</small>
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
		else{ /*edit*/ 
			$id = valida_campos($_GET['edit'],$conn); 
			if (isset($_GET['validaedit'])) {  	 
				$nome = valida_campos($_POST['nome'],$conn);  
				// $descricao = valida_campos($_POST['descricao'],$conn);  
				$q_profissionai = mysqli_query($conn,"SELECT nome FROM sp_planos WHERE id <> '$id' AND nome LIKE '".$nome."'");
				if(!mysqli_num_rows($q_profissionai)){ 
					$q_edit = mysqli_query($conn,$sqlEdit);
					$sqlEdit = "UPDATE sp_planos SET nome = '$nome' WHERE id = ".$id; 
					$q_edit = mysqli_query($conn,$sqlEdit);
					if($q_edit){				
						include "inc/salvo.php";
						echo "<script>setTimeout('planos()', 400);</script>";
					}
					else{
						?> 
						<center>
							<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=planos" aria-label="Close">Voltar</a>
						</center>
						<?php 
						exit;
					}  
				}
				else{
					?> 
					<center>
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Esta informação já foi cadastrada anteriormente!</h5><br>
						<a class="close button" href="index.php?go=planos" aria-label="Close">Voltar</a>
					</center>
					<?php  
				}
				exit;
			}  
			?> 
			<fieldset>
				<?php 
				$id = valida_campos($_GET['edit'],$conn);
				$qorgaogestor = mysqli_query($conn,"SELECT * FROM sp_planos WHERE id = ".$id);
				$rowOrgaoGestor = mysqli_fetch_array($qorgaogestor,MYSQLI_ASSOC);
				?>
				<legend>
					<i class="fa fa-cubes" style="color:rgb(237,50,55);"></i>
					<a href="?go=planos" style="color:#008CBA;">PLANOS</a> 
					<i class="fa fa-angle-double-right" style="color:rgb(237,50,55);"></i>
					<a href="#" style="color:#555;font-weight:normal; cursor:default;">EDITAR</a>
				</legend>
				<form data-abide action="?go=planos&edit=<?php echo $id ?>&validaedit" method="POST"> 
					<div class="small-12 large-6 columns">
						<label>Tipo de Plano: <small>Obrigatório</small>
							<select name="tipodeplano" id="tipodeplano" required>
								<option value="">Selecione uma opção</option>
								<?php 
								$qeutipos = mysqli_query($conn,"SELECT * FROM sp_tiposdeplanos ORDER BY nome ASC");
								if (mysqli_num_rows($qeutipos) > 0) {
									while ($row = mysqli_fetch_array($qeutipos,MYSQLI_ASSOC)) {
										echo '<option value="'.$row['id'].'"';
										if($row['id'] == $rowOrgaoGestor['tipodeplanoID'])echo " selected ";
										echo '>'.$row['nome'].'</option>';		
									}
								}
								?>
								
							</select>
						</label>
						<small class="error">Digite o nome.</small>
					</div>
					<div class="small-12 large-6 columns">
						<label>Nome: <small>Obrigatório</small>
							<input name="nome" id="nome" value="<?php echo $rowOrgaoGestor['nome'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
						</label>
						<small class="error">Digite o nome.</small>
					</div>   
					<div class="small-12 columns"><p></p></div> 
					<input required name="id" value="<?php echo $id ?>" id="id" required  type="hidden">
					<div class="small-12 columns end">
						<button type="submit">Salvar</button>
					</div>	
				</form>
			</fieldset>		 
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
					page:'planos'
				}, function(retorno){
					saida.html(retorno);
				});
	        } 
	    }, DURACAO_DIGITACAO); 
	} 
</script> 