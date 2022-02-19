<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ 
	selector:'textarea',
	height: 300,
	theme: 'modern',
 	plugins: [
	    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	    'searchreplace wordcount visualblocks visualchars code fullscreen',
	    'insertdatetime media nonbreaking save table contextmenu directionality',
	    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
	],
	toolbar1: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview | forecolor ',
	image_advtab: true, 
	content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css'
	]
	});
</script>
<?php 
	include "inc/verificasessao.php"; 
	include "inc/mask.php"; 
	function valida_campos($campo,$conn){
		return mysqli_real_escape_string($conn,htmlspecialchars($campo));
	}  
	if(isset($_GET['go']) && $_GET['go'] == 'servicos'){
		if(!isset($_GET['edit'])){ /*inicio*/
			if (isset($_GET['validainsert'])) {  
				if(isset($_POST['titulo']))$titulo = valida_campos($_POST['titulo'],$conn);else $titulo = ""; 
				if(isset($_POST['descricao']))$descricao = mysqli_real_escape_string($conn,$_POST['descricao']);else $descricao = "";
				$q_profissionai = mysqli_query($conn,"SELECT titulo FROM sp_servicos WHERE titulo LIKE '$titulo' "); 
				if(!mysqli_num_rows($q_profissionai)){	 
					$fotoservico = '';
					$extensao = '';
					if(isset($_FILES['fotoservico']) && $_FILES['fotoservico']['name'] != ''){
						$_UP['pasta'] = 'anexos/';  
						$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg'); 
						$_UP['retituloia'] = false; 
						$_UP['erros'][0] = 'Não houve erro';
						$_UP['erros'][1] = 'O documento no upload é maior do que o limite do PHP'; 
						$_UP['erros'][3] = 'O upload do documento foi feito parcialmente';
						$_UP['erros'][4] = 'Não foi feito o upload do documento'; 
						if ($_FILES['fotoservico']['error'] != 0) {  ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao editar!<br><?php echo $_UP['erros'][$_FILES['fotoservico']['error']] ?>.</h5><br>
								<a class="close button" href="index.php?go=servicos">Voltar</a>
							</center>
							<?php 
							exit;   
						} 
						$extensao = strtolower(end(explode('.', $_FILES['fotoservico']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
								<a class="close button" href="index.php?go=servicos" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit; 
						} 
						$titulo_final = "servico".$id.'_'.time().uniqid().".".$extensao;					 
						if (move_uploaded_file($_FILES['fotoservico']['tmp_name'], $_UP['pasta'] . $titulo_final)) {
						  // echo "Upload efetuado com sucesso!";
						  // echo '<a href="' . $_UP['pasta'] . $titulo_final . '" target="_blanc">Clique aqui para acessar o documento</a>';
						} else {   ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
								<a class="close button" href="index.php?go=servicos" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit;
						}  
						$fotoservico = $titulo_final;
					}	
					$sqlEdit = "INSERT INTO sp_servicos (titulo,descricao,fotoservico) VALUES ('$titulo','$descricao','$fotoservico')"; 
					$q_edit = mysqli_query($conn,$sqlEdit);
					if($q_edit){
						$servicoID = mysqli_insert_id($conn);
						include "inc/salvo.php";
						echo "<script>setTimeout('servicos()', 400);</script>";
					}
					else{ ?> 
						<center> 
							<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=servicos" aria-label="Close">Voltar</a>
						</center>
						<?php 
						exit;
					}
				}
				else{ ?> 
					<center> 
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Este parceiro já foi cadastrado anteriormente!</h5><br>
						<a class="close button" href="index.php?go=servicos" aria-label="Close">Voltar</a>
					</center>
					<?php   
				}
				exit;
			} 
			?>
			<fieldset>
				<legend>
					<i class="fa fa-laptop" style="color:rgb(237,50,55);"></i>
					<a href="?go=servicos" style="color:#008CBA;">SERVIÇOS</a>
				</legend> 
				<form> 
					<div id="tabela">
						<i class="fa fa-search" style="float:left;font-size:20px; margin:4px; color:#ccc; position:absolute;"></i>
						<input type="text" autocomplete="off" placeholder="Buscar serviços" id="txtColuna1"  class="input_busca_lote" style="padding-left: 26px!important;"> 
						<input type="submit" disabled class="hide">
					</div> 
					<div id="divConteudo"> 						
						<table>
							<thead>
							    <tr>
									<th style="width:7%"></th> 
									<th style="text-align: left; width:5%;">FOTO</th>        
									<th style="">TÍTULO</th>
							    </tr>
							</thead>
							<tbody>
								<?php 
									$query_orgaos = mysqli_query($conn,"SELECT sp_servicos.id,sp_servicos.fotoservico,sp_servicos.titulo
											FROM sp_servicos 
											ORDER BY sp_servicos.titulo ASC LIMIT 200");
									$numeroLinhas = mysqli_num_rows($query_orgaos);
									if($numeroLinhas > 0){
										while($rowOrgao = mysqli_fetch_array($query_orgaos,MYSQLI_ASSOC)){ 
											$idparceiroi = $rowOrgao['id']; ?>
											<div style="padding:20px;width: 35%;text-align:center;" id="delservicos<?php echo $idparceiroi ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
												<h5 id="modalTitle">Tem certeza que deseja excluir : <br><?php echo $rowOrgao['titulo'] ?> ?</h5>
												<a href="inc/deleteData.php?id=<?php echo $idparceiroi ?>&tabela=sp_servicos&volta=servicos" style="color:white"><button class="excluirS">Excluir</button></a>
												<a onclick="closeprofissional()" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
											</div>	 
											<tr>
												<td> 
													<a style="background:#0077bd;" class="div_add_person fa-pencil" href="?go=servicos&edit=<?php echo $idparceiroi ?>"></a>
													<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delservicos<?php echo $idparceiroi ?>" title="Excluir"></a>  
												</td>  
												<td style="text-align: center;background:#142536;">
													<?php  
														$arquivo = "anexos/".$rowOrgao['fotoservico'];
														if(file_exists($arquivo)){ ?>
															<img src='<?php echo $arquivo ?>' alt="<?php echo $rowOrgao['titulo'] ?>" style="height:60px;">
															<?php
														}  
													?>
												</td>    
												<td style="text-align: left;"><?php echo $rowOrgao['titulo']; ?></td>
											</tr>	
											<input id="idparceiroi" value="<?php echo $idparceiroi ?>" disabled type="hidden">	 
											<script type="text/javascript"> function closeprofissional(){ $('#delservicos'+$('#idparceiroi').val()).foundation('reveal', 'close'); }; </script>				
											<?php 
										} 
									}
									else echo "<tr><td colspan='5' style='text-align:center; color:red;'>Nenhum dado cadastrado!</td></tr>";
								?>	
							</tbody>
						</table>
					</div> 
				</form>  
			</fieldset> 
			<div class="circulo fa-plus" onclick="mostra_cadastro_lote('cadastro_orgao')"></div>  
			<div style="display:none;" id="cadastro_orgao"> 
				<div class="fundo_opaco" onclick="hide_cadastro_lote('cadastro_orgao')"></div>
				<div class="iframe_lote">
					<div class="circuloX fa fa-times" onclick="hide_cadastro_lote('cadastro_orgao')"></div>
					<div class="small-12 large-12 columns">
						<fieldset style='min-height:375px;'>
							<legend>
								<i class="fa fa-plus" style="color:rgb(237,50,55);"></i>
								<a href="#" style="color:#008CBA; cursor:default;">CADASTRO</a>  
							</legend>
							<form data-abide action="?go=servicos&validainsert" method="POST" enctype="multipart/form-data"> 
								<div class="small-12 large-4 columns">
									<label>Título:
										<input name="titulo" id="titulo" required="" pattern="[a-zA-Z0-9]+" type="text">
									</label>
									<small class="error">Digite o título.</small>
								</div>      
								<div class="small-12 large-4 columns"> 
							    	<label>Adicionar ícone: <small>Obrigatório</small>
										<input name="fotoservico" id="fotoservico" required type="file">
									</label>
									<small class="error">Selecione um arquivo.</small> 
								</div>
								<div class="small-12 columns"><p></p></div>
								<div class="small-12 columns">
									<label>Descrição:
										<textarea name="descricao" id="descricao" style="min-height: 150px;"></textarea>
									</label>
								</div>
								<div class="small-12 columns"><p><br></p></div>
								

								<div class="small-12 columns end">
									<button type="submit">Cadastrar</button>
								</div>	
							</form>
						</fieldset>
					</div>
				</div>
			</div>
			<?php
		}
		else{ /*edit*/ 
			$id = valida_campos($_GET['edit'],$conn); 
			if (isset($_GET['validaedit'])) {  	 
				if(isset($_POST['titulo']))$titulo = valida_campos($_POST['titulo'],$conn);else $titulo = ""; 
				if(isset($_POST['descricao']))$descricao = mysqli_real_escape_string($conn,$_POST['descricao']);else $descricao = ""; 
				// print_r($_FILES);exit;
				$sqlEdit = "UPDATE sp_servicos SET titulo = '$titulo',descricao = '$descricao' WHERE id = ".$id; 
				$q_edit = mysqli_query($conn,$sqlEdit);
				if($q_edit){
					$fotoservico = '';
					$extensao = '';
					if(isset($_FILES['fotoservico']) && $_FILES['fotoservico']['name'] != ''){  
						$_UP['pasta'] = 'anexos/';  
						$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg'); 
						$_UP['retituloia'] = false; 
						$_UP['erros'][0] = 'Não houve erro';
						$_UP['erros'][1] = 'O documento no upload é maior do que o limite do PHP'; 
						$_UP['erros'][3] = 'O upload do documento foi feito parcialmente';
						$_UP['erros'][4] = 'Não foi feito o upload do documento'; 
						if ($_FILES['fotoservico']['error'] != 0) {  ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao editar!<br><?php echo $_UP['erros'][$_FILES['fotoservico']['error']] ?>.</h5><br>
								<a class="close button" href="index.php?go=servicos&edit=<?php echo $id ?>">Voltar</a>
							</center>
							<?php 
							exit;   
						} 
						$extensao = strtolower(end(explode('.', $_FILES['fotoservico']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
								<a class="close button" href="index.php?go=servicos&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit; 
						} 
						$titulo_final = "servico".$id.'_'.time().uniqid().".".$extensao;
						if (move_uploaded_file($_FILES['fotoservico']['tmp_name'], $_UP['pasta'] . $titulo_final)) { 
							if($titulo_final != '')mysqli_query($conn,"UPDATE sp_servicos SET fotoservico = '$titulo_final' WHERE id = '$id'");
						} else {   ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
								<a class="close button" href="index.php?go=servicos&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit;
						}  
					}
					 
					include "inc/salvo.php";
					echo "<script>setTimeout('servicosEdit(".$id.")', 400);</script>";
				}
				else{ 	?> 
					<center>
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
						<a class="close button" href="index.php?go=servicos&edit=<?php echo $id ?>" aria-label="Close">Voltar</a>
					</center>
					<?php 
					exit;
				}
				exit;
			}  
			?> 
			<fieldset>
				<?php 
					$id = valida_campos($_GET['edit'],$conn);
					$qorgaogestor = mysqli_query($conn,"SELECT * FROM sp_servicos WHERE id = ".$id);
					if (mysqli_num_rows($qorgaogestor) > 0) { 
						$rowOrgaoGestor = mysqli_fetch_array($qorgaogestor,MYSQLI_ASSOC); ?>
						<legend>
							<i class="fa fa-laptop" style="color:rgb(237,50,55);"></i>
							<a href="?go=servicos" style="color:#008CBA;">SERVIÇOS</a> 
							<i class="fa fa-angle-double-right" style="color:rgb(237,50,55);"></i>
							<a href="#" style="color:#555;font-weight:normal; cursor:default;">EDITAR</a>
						</legend>
						<form data-abide action="?go=servicos&edit=<?php echo $id ?>&validaedit" method="POST" enctype="multipart/form-data"> 
							<div class="small-12 large-6 columns">
								<label>Título:
									<input name="titulo" id="titulo" value="<?php echo $rowOrgaoGestor['titulo'] ?>" required="" pattern="[a-zA-Z0-9]+" type="text">
								</label>
								<small class="error">Digite o título.</small>
							</div>   
							<div class="small-12 large-4 columns"> 
						    	<label>Alterar foto: 
									<input name="fotoservico" id="fotoservico" type="file">
								</label> 
								<?php if ($rowOrgaoGestor['fotoservico'] != ''): ?>
									<?php  
										$arquivo = "anexos/".$rowOrgaoGestor['fotoservico'];
										if(file_exists($arquivo)){ ?>
											<a href="<?php echo $arquivo ?>" target="_blank"><img src='<?php echo $arquivo ?>' alt="<?php echo $rowOrgaoGestor['titulo'] ?>" style="height:100px;"></a>
											<?php
										}  
									?>
								<?php endif ?>
							</div>
							<div class="small-12 columns"><p></p></div>
							<div class="small-12 columns">
								<label>Descrição:
									<textarea name="descricao" id="descricao" style="min-height: 150px;"><?php echo $rowOrgaoGestor['descricao'] ?></textarea>
								</label>
							</div> 
						 
							<div class="small-12"><p><hr></p></div>
							

							<input required name="id" value="<?php echo $id ?>" id="id" required  type="hidden">
							<div class="small-12 columns end">
								<button type="submit">Salvar</button>
							</div>	
						</form>
						<?php
					}
					else{
						echo "Erro para encontrar informações";
					} 
				?> 
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
					page:'servicos'
				}, function(retorno){
					saida.html(retorno);
				});
	        } 
	    }, DURACAO_DIGITACAO); 
	} 
</script> 