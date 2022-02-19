<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ 
	selector:'textarea',
	height: 150,
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
	function limitarTexto($texto, $limite){
        $contador = strlen($texto);
        if ( $contador >= $limite ) {      
            $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
            return $texto;
        }
        else{
            return $texto;
        }
    } 
	if(isset($_GET['go']) && $_GET['go'] == 'empreendimentos'){
		if(!isset($_GET['edit'])){ /*inicio*/
			if (isset($_GET['validainsert'])) {   
				if(isset($_POST['vendaemail']))$vendaemail = valida_campos($_POST['vendaemail'],$conn);else $vendaemail = "0";
				if(isset($_POST['venda']))$venda = valida_campos($_POST['venda'],$conn);else $venda = "0";
				if($venda != '0')$venda = '1';
				if(isset($_POST['home']))$home = valida_campos($_POST['home'],$conn);else $home = "0";
				if($home != '0')$home = '1';
				if(isset($_POST['titulo']))$titulo = valida_campos($_POST['titulo'],$conn);else $titulo = ""; 
				if(isset($_POST['percent']))$percent = valida_campos($_POST['percent'],$conn);else $percent = ""; 
				if(isset($_POST['situacao']))$situacao = valida_campos($_POST['situacao'],$conn);else $situacao = ""; 
				if(isset($_POST['descricao']))$descricao = mysqli_real_escape_string($conn,$_POST['descricao']);else $descricao = "";  
				if(isset($_POST['mapagoogle']))$mapagoogle = mysqli_real_escape_string($conn,$_POST['mapagoogle']);else $mapagoogle = ""; 

				$data_cadastro = date('y-m-d H:i:s');
				$foto = '';
				$extensao = '';
				if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ''){ 
					$_UP['pasta'] = 'anexos/';  
					$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg'); 
					$_UP['retituloia'] = false; 
					$_UP['erros'][0] = 'Não houve erro';
					$_UP['erros'][1] = 'O documento no upload é maior do que o limite do PHP'; 
					$_UP['erros'][3] = 'O upload do documento foi feito parcialmente';
					$_UP['erros'][4] = 'Não foi feito o upload do documento'; 
					if ($_FILES['foto']['error'] != 0) {  ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao editar!<br><?php echo $_UP['erros'][$_FILES['foto']['error']] ?>.</h5><br>
							<a class="close button" href="index.php?go=empreendimentos">Voltar</a>
						</center>
						<?php 
						exit;   
					} 
					$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
					if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
							<a class="close button" href="index.php?go=empreendimentos" aria-label=" ">Voltar</a>
						</center>
						<?php 
						exit; 
					} 
					$titulo_final = "empreendimentos".$id.'_'.time().uniqid().".".$extensao;
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $titulo_final)) { 
						// mysqli_query($conn,"INSERT INTO sp_empreendimentos_fotos (id_empreendimentos,foto) VALUES ('$id_empreendimentos','$titulo_final')"); 
					} else {   ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=empreendimentos" aria-label=" ">Voltar</a>
						</center>
						<?php 
						exit;
					}
				}	
				$sqlEdit = "INSERT INTO sp_empreendimentos (venda,vendaemail,home,titulo,situacao,percent,descricao,data_cadastro,foto,mapagoogle) 
						VALUES ('$venda','$vendaemail','$home','$titulo','$situacao','$percent','$descricao','$data_cadastro','$titulo_final','$mapagoogle')"; 
				$q_edit = mysqli_query($conn,$sqlEdit);
				if($q_edit){			
					$id_empreendimentos = mysqli_insert_id($conn);
					foreach ($_POST['opcoes'] as $key => $value) {
						$opcao = valida_campos($value,$conn);
						if ($opcao != '')mysqli_query($conn,"INSERT INTO sp_empreendimentos_opcoes (nome,id_empreendimento) VALUES ('$opcao','$id_empreendimentos')");
					}
					include "inc/salvo.php";
					echo "<script>setTimeout('empreendimentos()', 400);</script>";
				}
				else{ ?> 
					<center> 
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
						<a class="close button" href="index.php?go=empreendimentos" aria-label="Close">Voltar</a>
					</center>
					<?php 
					exit;
				} 
				exit;
			} 
			?>
			<fieldset>
				<legend>
					<i class="fa fa-newspaper-o" style="color:rgb(237,50,55);"></i>
					<a href="?go=empreendimentos" style="color:#008CBA;">EMPREENDIMENTOS</a>
				</legend> 
				<form> 
					<div id="tabela">
						<i class="fa fa-search" style="float:left;font-size:20px; margin:4px; color:#ccc; position:absolute;"></i>
						<input type="text" autocomplete="off" placeholder="Buscar empreendimentos" id="txtColuna1"  class="input_busca_lote" style="padding-left: 26px!important;"> 
						<input type="submit" disabled class="hide">
					</div> 
					<div id="divConteudo"> 						
						<table>
							<thead>
							    <tr>
									<th style="width:7%"></th>
									<th style="text-align: left;">FOTO</th>        
									<th style="">TÍTULO</th>       
									<th style="">% ANDAMENTO</th>       
									<th style="">SITUAÇÃO</th>   
									<th style="">PÁGINA INICIAL</th>   
							    </tr>
							</thead>
							<tbody>
								<?php 
									$query_orgaos = mysqli_query($conn,"SELECT 
										sp_empreendimentos.id,
										sp_empreendimentos.foto, 
										sp_empreendimentos.home, 
										sp_empreendimentos.titulo, 
										COALESCE((select nome from sp_situacao where sp_empreendimentos.situacao = sp_situacao.id limit 1),'') as situacao,
										sp_empreendimentos.percent
										FROM sp_empreendimentos 
										ORDER BY sp_empreendimentos.id DESC LIMIT 200");
									$numeroLinhas = mysqli_num_rows($query_orgaos);
									if($numeroLinhas > 0){
										while($rowOrgao = mysqli_fetch_array($query_orgaos,MYSQLI_ASSOC)){ 
											$idempreendimentosi = $rowOrgao['id']; ?>
											<div style="padding:20px;width: 35%;text-align:center;" id="delempreendimentos<?php echo $idempreendimentosi ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
												<h5 id="modalTitle">Tem certeza que deseja excluir o empreendimento: <br><?php echo $rowOrgao['titulo'] ?> ?</h5>
												<a href="inc/deleteData.php?id=<?php echo $idempreendimentosi ?>&tabela=sp_empreendimentos&volta=empreendimentos" style="color:white"><button class="excluirS">Excluir</button></a>
												<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
											</div>	 
											<tr>
												<td> 
													<a style="background:#0077bd;" class="div_add_person fa-pencil" href="?go=empreendimentos&edit=<?php echo $idempreendimentosi ?>"></a>
													<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delempreendimentos<?php echo $idempreendimentosi ?>" title="Excluir"></a>  
												</td>  
												<td style="text-align: left;"><!-- foto -->
													<?php  
														$arquivo = "anexos/".$rowOrgao['foto'];
														if(file_exists($arquivo)){ ?>
															<img src='<?php echo $arquivo ?>' alt="<?php echo $rowOrgao['titulo'] ?>" style="height:60px;">
															<?php
														}  
													?>
												</td>    
												<td style="text-align: left;"><?php echo $rowOrgao['titulo']; ?></td>
												<td><?php echo $rowOrgao['percent']."%"; ?></td>
												<td><?php echo $rowOrgao['situacao']; ?></td> 
												<td style="text-align: left;"><!-- foto -->
													<?php  
														if($rowOrgao['home'] == '1')echo "Sim";
														else echo "Não";  
													?>
												</td>  
											</tr>	
											<input id="idempreendimentosi" value="<?php echo $idempreendimentosi ?>" disabled type="hidden">	 
											<script type="text/javascript">
												$('a.closeprofissional').on('click', function() {
												  $('#delempreendimentos'+$('#idempreendimentosi').val()).foundation('reveal', 'close');
												});
											</script>				
											<?php 
										} 
									}
									else{
										echo "<tr><td colspan='5' style='text-align:center; color:red;'>Nenhum dado cadastrado!</td></tr>";
									}
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
								<a href="#" style="color:#008CBA; cursor:default;">CADASTRO DE UMA PUBLICAÇÃO</a>  
							</legend>
							<form data-abide action="?go=empreendimentos&validainsert" method="POST" enctype="multipart/form-data">  
								<div class="small-12 large-6 columns">
									<label>Título:
										<input name="titulo" id="titulo" required pattern="[a-zA-Z0-9]+" type="text">
									</label>
									<small class="error">Digite o título.</small>
								</div> 
								<div class="small-12 large-3 columns">
									<label>% andamento:
										<input name="percent" id="percent" required pattern="[a-zA-Z0-9]+" type="number">
									</label>
									<small class="error">Preencha este campo</small>
								</div>
								<div class="small-12 large-3 columns">
									<label for="situacao">Situação:
										<select name="situacao" required id="situacao">
											<option value="">Selecione uma opção</option>
											<?php 
												$query = mysqli_query($conn,"SELECT * FROM sp_situacao");
												while ($rsituacao = mysqli_fetch_array($query,MYSQLI_ASSOC)) { 	?>
													<option value="<?php echo $rsituacao['id'] ?>"><?php echo $rsituacao['nome'] ?></option>
													<?php
												}
											?>
										</select>
									</label>
									<small class="error">Selecione uma opção</small>
								</div>
								<div class="small-12 columns"><p></p></div>
								<div class="small-12 large-3 columns">
									<label>Foto capa: <small>Obrigatório</small>
										<input name="foto" id="foto" required="" type="file">
									</label>
									<small class="error">Selecione um arquivo.</small>
								</div>    
								<div class="small-12 large-9 columns">
									<label>Mapa localização google:
										<input name="mapagoogle" id="mapagoogle" type="text">
									</label>
								</div> 
								<div class="small-12 columns"><p></p></div>
								<div class="small-12 large-3 columns">
									<label>Página inicial:
										<select required name="home" id="home">
											<option value="0">Não</option>
											<option value="1">Sim</option>
										</select>
									</label>
								</div> 
								<div class="small-12 large-3 columns">
									<label>Botão Venda:
										<select required name="venda" id="venda">
											<option value="0">Não</option>
											<option value="1">Sim</option>
										</select>
									</label>
								</div>  
								<div class="small-12 large-6 columns">
									<label>Email (Botão Venda):
										<input name="vendaemail" id="vendaemail" type="text">
									</label>
								</div> 
								<div class="small-12 columns"><p></p></div>
								<div class="small-12 columns">
									<label>Descrição:
										<textarea name="descricao" id="descricao" style="min-height: 150px;"></textarea>
									</label>
								</div>
								<div class="small-12 columns"><p><hr></p></div>
								<script type="text/javascript">
									$(document).ready(function(){  
										$("input[name='add']").click(function( e ){  
											$.post('files/addFiles.php',{  
												page:'insertText'
											}, function(retorno){
												$('#inputs_adicionais').append(retorno); 
											});  
										}); 
										$('#inputs_adicionais').delegate('a','click',function( e ){
											e.preventDefault();
											$( this ).parent('label').remove();
										});

									});
								</script>   
								<fieldset>  
									<legend>OPÇÕES DO EMPREENDIMENTO</legend>
									<?php 
										$sqlopcoes = mysqli_query($conn,"SELECT sp_empreendimentos_opcoes.* FROM sp_empreendimentos_opcoes 
										 WHERE sp_empreendimentos_opcoes.id_empreendimento = '$id'");
										if (mysqli_num_rows($sqlopcoes)) {
											while ($ropcoes = mysqli_fetch_array($sqlopcoes,MYSQLI_ASSOC)) {
												echo "<div class='small-4 columns'>"; ?>
												<div style="position: absolute;right:5px;">
													<?php  
														$idblogicaracteristica = $ropcoes['id'];   
														$apaga = false;  	
													?>
													<div style="padding:20px;width: 35%;text-align:center;" id="delblog<?php echo $idblogicaracteristica ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
														<h5 id="modalTitle">Tem certeza que deseja excluir: <br><?php echo $ropcoes['nome'] ?>?</h5>
														<a href="inc/deleteData.php?id=<?php echo $idblogicaracteristica ?>&tabela=sp_empreendimentos_opcoes&volta=empreendimentosEdit&id_volta=<?php echo $id ?>" style="color:white"><button class="excluirS">Excluir</button></a>
														<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
													</div>	
													<a class="div_add_person fa fa-times" style="padding: 8px 9px; margin:5px;font-size: 15px; height: 30px;width: 30px;" data-reveal-id="delblog<?php echo $idblogicaracteristica ?>" title="Excluir"></a>						 
													<input id="idblogicaracteristica" value="<?php echo $idblogicaracteristica ?>" disabled type="hidden">	 
													<script type="text/javascript">
														$('a.closeprofissional').on('click', function() {
														  $('#delblog'+$('#idblogicaracteristica').val()).foundation('reveal', 'close');
														});
													</script>
												</div> 
												<?php
												echo "<p style='border-bottom: dotted 1px'>".$ropcoes['nome']."</p></div>";
											}
											echo "<div class='small-12 columns'><br></div><hr>";
										}
									?> 
									<div class="small-4 columns">
										<label>
											<input type="text" name="opcoes[]" id="opcoes1">
										</label>
									</div>
									<div id="inputs_adicionais"></div>  
									<div class="small-12 columns"><p></p></div>
									<div class="small-12 columns"> 
										<input type="button" value="Adicionar" style="float: left;cursor:pointer;margin-bottom:20px;" name="add">
									</div>  
								</fieldset>
								<div class="small-12 columns"><p><hr></p></div>
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
			header('X-XSS-Protection:0');
			$id = valida_campos($_GET['edit'],$conn); 
			if (isset($_GET['validaedit'])) {  	 
				if(isset($_POST['home']))$home = valida_campos($_POST['home'],$conn);else $home = "0"; 
				if($home != '0')$home = "1"; 
				if(isset($_POST['venda']))$venda = valida_campos($_POST['venda'],$conn);else $venda = "0"; 
				if($venda != '0')$venda = "1";
				if(isset($_POST['vendaemail']))$vendaemail = valida_campos($_POST['vendaemail'],$conn);else $vendaemail = ""; 
				if(isset($_POST['titulo']))$titulo = valida_campos($_POST['titulo'],$conn);else $titulo = ""; 
				if(isset($_POST['percent']))$percent = valida_campos($_POST['percent'],$conn);else $percent = ""; 
				if(isset($_POST['situacao']))$situacao = valida_campos($_POST['situacao'],$conn);else $situacao = ""; 
				if(isset($_POST['descricao']))$descricao = mysqli_real_escape_string($conn,$_POST['descricao']);else $descricao = "";  
				if(isset($_POST['mapagoogle']))$mapagoogle = mysqli_real_escape_string($conn,$_POST['mapagoogle']);else $mapagoogle = "";  

				$q_edit = mysqli_query($conn,$sqlEdit);
				if(isset($_FILES['fotocapa']) && $_FILES['fotocapa']['name'] != '' && $_FILES['fotocapa']['size'] > 0){ 
					$_UP['pasta'] = 'anexos/';  
					$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg'); 
					$_UP['retituloia'] = false; 
					$_UP['erros'][0] = 'Não houve erro';
					$_UP['erros'][1] = 'O documento no upload é maior do que o limite do PHP'; 
					$_UP['erros'][3] = 'O upload do documento foi feito parcialmente';
					$_UP['erros'][4] = 'Não foi feito o upload do documento'; 
					if ($_FILES['fotocapa']['error'] != 0) {  ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao editar!<br><?php echo $_UP['erros'][$_FILES['fotocapa']['error']] ?>.</h5><br>
							<a class="close button" href="index.php?go=empreendimentos&edit=<?php echo $id ?>">Voltar</a>
						</center>
						<?php 
						exit;   
					} 
					$extensao = strtolower(end(explode('.', $_FILES['fotocapa']['name'])));
					if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
							<a class="close button" href="index.php?go=empreendimentos&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
						</center>
						<?php 
						exit; 
					} 
					$fotocapa = "empreendimentos".$id.'_'.time().uniqid().".".$extensao;
					if (move_uploaded_file($_FILES['fotocapa']['tmp_name'], $_UP['pasta'] . $fotocapa)) { 

					} else {   ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=empreendimentos&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
						</center>
						<?php 
						exit;
					}
					$sqlEdit = "UPDATE sp_empreendimentos SET venda='$venda',vendaemail='$vendaemail',home='$home', titulo = '$titulo',percent = '$percent',situacao = '$situacao',foto = '$fotocapa',mapagoogle = '$mapagoogle',descricao = '$descricao' WHERE id = '$id'"; 
				}
				else{
					$sqlEdit = "UPDATE sp_empreendimentos SET venda='$venda',vendaemail='$vendaemail',home='$home', titulo = '$titulo',percent = '$percent',situacao = '$situacao', mapagoogle = '$mapagoogle',descricao = '$descricao' WHERE id = '$id'"; 					
				}
				$q_edit = mysqli_query($conn,$sqlEdit);
				if($q_edit){   
					$extensao = ''; 
					if(isset($_FILES['foto']) && $_FILES['foto']['name'] != '' && $_FILES['foto']['size'] > 0){  
						$_UP['pasta'] = 'anexos/';  
						$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg'); 
						$_UP['retituloia'] = false; 
						$_UP['erros'][0] = 'Não houve erro';
						$_UP['erros'][1] = 'O documento no upload é maior do que o limite do PHP'; 
						$_UP['erros'][3] = 'O upload do documento foi feito parcialmente';
						$_UP['erros'][4] = 'Não foi feito o upload do documento'; 
						if ($_FILES['foto']['error'] != 0) {  ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao editar!<br><?php echo $_UP['erros'][$_FILES['foto']['error']] ?>.</h5><br>
								<a class="close button" href="index.php?go=empreendimentos&edit=<?php echo $id ?>">Voltar</a>
							</center>
							<?php 
							exit;   
						} 
						$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
								<a class="close button" href="index.php?go=empreendimentos&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit; 
						} 
						$titulo_final = "empreendimentos".$id.'_'.time().uniqid().".".$extensao;
						if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $titulo_final)) { 
							$sqlfoto = "INSERT INTO sp_empreendimentos_fotos (id_empreendimento,foto) VALUES ('$id','$titulo_final')";
							// exit;
							if($titulo_final != '')mysqli_query($conn,$sqlfoto);
						} else {   ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
								<a class="close button" href="index.php?go=empreendimentos&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit;
						}  
					} 
					foreach ($_POST['opcoes'] as $key => $value) {
						$opcao = valida_campos($value,$conn);
						if ($opcao != '') {
							mysqli_query($conn,"INSERT INTO sp_empreendimentos_opcoes (nome,id_empreendimento) VALUES ('$opcao','$id')");
						}
					}
					include "inc/salvo.php";
					echo "<script>setTimeout('empreendimentosEdit(".$id.")', 400);</script>";
				}
				else{
					?> 
					<center>
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
						<a class="close button" href="index.php?go=empreendimentos&edit=<?php echo $id ?>" aria-label="Close">Voltar</a>
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
				$qorgaogestor = mysqli_query($conn,"SELECT * FROM sp_empreendimentos WHERE id = ".$id);
				$rowOrgaoGestor = mysqli_fetch_array($qorgaogestor,MYSQLI_ASSOC);
				?>
				<legend>
					<i class="fa fa-newspaper-o" style="color:rgb(237,50,55);"></i>
					<a href="?go=empreendimentos" style="color:#008CBA;">EMPREENDIMENTOS</a> 
					<i class="fa fa-angle-double-right" style="color:rgb(237,50,55);"></i>
					<a href="#" style="color:#555;font-weight:normal; cursor:default;">EDITAR</a>
				</legend>
				<form data-abide action="?go=empreendimentos&edit=<?php echo $id ?>&validaedit" method="POST" enctype="multipart/form-data"> 
					<div class="small-12 large-8 columns" style="border-right: solid 1px lightgray;">
						<div class="small-12 large-6 columns">
							<label>Título:
								<input name="titulo" id="titulo" value="<?php echo $rowOrgaoGestor['titulo'] ?>" required="" pattern="[a-zA-Z0-9]+" type="text">
							</label>
							<small class="error">Digite o título.</small>
						</div> 
						<div class="small-12 large-3 columns">
							<label>% andamento:
								<input name="percent" id="percent" value="<?php echo $rowOrgaoGestor['percent'] ?>" required pattern="[a-zA-Z0-9]+" type="number">
							</label>
							<small class="error">Preencha este campo</small>
						</div>
						<div class="small-12 large-3 columns">
							<label for="situacao">Situação:
								<select name="situacao" required id="situacao">
									<option value="">Selecione uma opção</option>
									<?php 
										$query = mysqli_query($conn,"SELECT * FROM sp_situacao");
										while ($rsituacao = mysqli_fetch_array($query,MYSQLI_ASSOC)) { 	?>
											<option <?php if ($rsituacao['id'] == $rowOrgaoGestor['situacao']): ?>selected<?php endif ?> value="<?php echo $rsituacao['id'] ?>"><?php echo $rsituacao['nome'] ?></option>
											<?php
										}
									?>
								</select>
							</label>
							<small class="error">Selecione uma opção</small>
						</div>
						<div class="small-12 columns"><p></p></div>
						<div class="small-12 large-3 columns">
							<label>Alterar Foto capa:
								<input name="fotocapa" id="fotocapa" type="file">
							</label> 
						</div>    
						<div class="small-12 large-9 columns">
							<label>Mapa localização google:
								<input name="mapagoogle" value='<?php echo ( $rowOrgaoGestor['mapagoogle'] ); ?>' id="mapagoogle" type="text">
							</label>
						</div>
						<div class="small-12 columns"><p></p></div>
						<div class="small-12 large-3 columns">
							<label>Página inicial:
								<select required name="home" id="home">
									<option <?php if ($rowOrgaoGestor['home'] == '0'): ?>selected <?php endif ?>value="0">Não</option>
									<option <?php if ($rowOrgaoGestor['home'] == '1'): ?>selected <?php endif ?>value="1">Sim</option>
								</select>
							</label>
						</div> 
						<div class="small-12 large-3 columns">
							<label>Botão Venda:
								<select required name="venda" id="venda">
									<option <?php if ($rowOrgaoGestor['venda'] == '0'): ?>selected <?php endif ?>value="0">Não</option>
									<option <?php if ($rowOrgaoGestor['venda'] == '1'): ?>selected <?php endif ?>value="1">Sim</option>
								</select>
							</label>
						</div> 
						<div class="small-12 large-6 columns">
							<label>Email (Botão Venda):
								<input name="vendaemail" value='<?php echo ( $rowOrgaoGestor['vendaemail'] ); ?>' id="vendaemail" type="text">
							</label>
						</div>
						<div class="small-12 columns"><p></p></div>
						<div class="small-12 columns">
							<label>Descrição:
								<textarea name="descricao" id="descricao" style="min-height: 150px;"><?php echo $rowOrgaoGestor['descricao'] ?></textarea>
							</label>
						</div>
					</div>
					<div class="small-12 large-4 columns">
						<div class="small-12 columns"> 
					    	<label>Adicionar foto:
								<input name="foto" id="foto" type="file">
							</label>
							<small class="error">Selecione um arquivo.</small> 
						</div>
						<hr>
						<fieldset class="small-12 columns"><!-- fotos cadastradas -->
							<legend>IMAGENS CADASTRADAS</legend>
							<?php  
								$sqlFotos = "SELECT * FROM sp_empreendimentos_fotos WHERE id_empreendimento = '$id'";
								$qFotos = mysqli_query($conn,$sqlFotos);
								if (mysqli_num_rows($qFotos)) {
									while ($rFotos = mysqli_fetch_array($qFotos,MYSQLI_ASSOC)) { ?>
										<div class="small-6 columns end" style="margin-bottom: 10px;">
											<div style="position: absolute;">
												<?php  
													$idempreendimentosi = $rFotos['id'];   
													$apaga = false;  	
												?>
												<div style="padding:20px;width: 35%;text-align:center;" id="delempreendimentos<?php echo $idempreendimentosi ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
													<h5 id="modalTitle">Tem certeza que deseja excluir a foto: <br><img src="anexos/<?php echo $rFotos['foto'] ?>" alt="" style="height: 50px;">?</h5>
													<a href="inc/deleteData.php?id=<?php echo $idempreendimentosi ?>&tabela=sp_empreendimentos_fotos&volta=empreendimentosEdit&id_volta=<?php echo $id ?>" style="color:white"><button class="excluirS">Excluir</button></a>
													<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
												</div>	
												<a class="div_add_person fa fa-times" style="padding: 8px 9px; margin:5px;font-size: 15px; height: 30px;width: 30px;" data-reveal-id="delempreendimentos<?php echo $idempreendimentosi ?>" title="Excluir"></a>						 
												<input id="idempreendimentosi" value="<?php echo $idempreendimentosi ?>" disabled type="hidden">	 
												<script type="text/javascript">
													$('a.closeprofissional').on('click', function() {
													  $('#delempreendimentos'+$('#idempreendimentosi').val()).foundation('reveal', 'close');
													});
												</script>
											</div>
											<a href="anexos/<?php echo $rFotos['foto'] ?>" target="_blanc" class="aopacity"><img class="aopacity" src="anexos/<?php echo $rFotos['foto'] ?>" alt="" style="height: 100px;object-fit: cover;object-position: center;"></a>
										</div>
										<?php
									}
								}
							?>
						</fieldset>
					</div> 
					<div class="small-12 columns"><p><hr></p></div>
					<script type="text/javascript">
						$(document).ready(function(){  
							$("input[name='add']").click(function( e ){  
								$.post('files/addFiles.php',{  
									page:'insertText'
								}, function(retorno){
									$('#inputs_adicionais').append(retorno); 
								});  
							}); 
							$('#inputs_adicionais').delegate('a','click',function( e ){
								e.preventDefault();
								$( this ).parent('label').remove();
							});

						});
					</script>   
					<fieldset class="small-12 columns"> 
						<script type="text/javascript">
							$(document).ready(function(){  
								$("input[name='add']").click(function( e ){  
									$.post('files/addFiles.php',{  
										page:'insertEmpreendimentoCaracteristica'
									}, function(retorno){
										$('#inputs_adicionais').append(retorno); 
									});  
								}); 
								$('#inputs_adicionais').delegate('a','click',function( e ){
									e.preventDefault();
									$( this ).parent('label').remove();
								}); 
							});
						</script>   
						<legend>OPÇÕES DO EMPREENDIMENTO</legend>
						<?php 
							$sqlopcoes = mysqli_query($conn,"SELECT sp_empreendimentos_opcoes.* FROM sp_empreendimentos_opcoes 
							 WHERE sp_empreendimentos_opcoes.id_empreendimento = '$id'");
							if (mysqli_num_rows($sqlopcoes)) {
								while ($ropcoes = mysqli_fetch_array($sqlopcoes,MYSQLI_ASSOC)) {
									echo "<div class='small-4 columns'>"; ?>
									<div style="position: absolute;right:5px;">
										<?php  
											$idblogicaracteristica = $ropcoes['id'];   
											$apaga = false;  	
										?>
										<div style="padding:20px;width: 35%;text-align:center;" id="delblog<?php echo $idblogicaracteristica ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
											<h5 id="modalTitle">Tem certeza que deseja excluir: <br><?php echo $ropcoes['nome'] ?>?</h5>
											<a href="inc/deleteData.php?id=<?php echo $idblogicaracteristica ?>&tabela=sp_empreendimentos_opcoes&volta=empreendimentosEdit&id_volta=<?php echo $id ?>" style="color:white"><button class="excluirS">Excluir</button></a>
											<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
										</div>	
										<a class="div_add_person fa fa-times" style="padding: 8px 9px; margin:5px;font-size: 15px; height: 30px;width: 30px;" data-reveal-id="delblog<?php echo $idblogicaracteristica ?>" title="Excluir"></a>						 
										<input id="idblogicaracteristica" value="<?php echo $idblogicaracteristica ?>" disabled type="hidden">	 
										<script type="text/javascript">
											$('a.closeprofissional').on('click', function() {
											  $('#delblog'+$('#idblogicaracteristica').val()).foundation('reveal', 'close');
											});
										</script>
									</div> 
									<?php
									echo "<p style='border-bottom: dotted 1px'>".$ropcoes['nome']."</p></div>";
								}
								echo "<div class='small-12 columns'><br></div><hr>";
							}
						?> 
						<div class="small-4 columns">
							<label>
								<input type="text" name="opcoes[]" id="opcoes1">
							</label>
						</div>
						<div id="inputs_adicionais"></div>  
						<div class="small-12 columns"><p></p></div>
						<div class="small-12 columns"> 
							<input type="button" value="Adicionar" style="float: left;cursor:pointer;margin-bottom:20px;" name="add">
						</div>  
					</fieldset>
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
	}
	function hide_cadastro_lote(id_add,id_edit,del_id){
		document.getElementById(id_add).style.display = 'none'; 
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
					page:'empreendimentos'
				}, function(retorno){
					saida.html(retorno);
				});
	        } 
	    }, DURACAO_DIGITACAO); 
	} 
</script> 
