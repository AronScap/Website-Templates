 
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
	function converterImagem($source_path, $destination_path, $quality) {
	    $info = getimagesize($source_path);

	    if ($info['mime'] == 'image/jpeg') {
	        $image = imagecreatefromjpeg($source_path);
	    }


	    imagejpeg($image, $destination_path, $quality);

	    return $destination_path;
	}
	if(isset($_GET['go']) && $_GET['go'] == 'portfolio'){
		if(!isset($_GET['edit'])){ /*inicio*/
			if (isset($_GET['validainsert'])) {  
				$subtitulo = "".valida_campos($_POST['subtitulo'],$conn);
				$titulo = "".valida_campos($_POST['titulo'],$conn);
				$descricao = "".mysqli_real_escape_string($conn,$_POST['descricao']);
				$data_cadastro = date('y-m-d H:i:s');   
				// foto
					$foto = '';
					$extensao = '';
					if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ''){ 
						/*Dados upload provasDescritivas*/ 
							$_UP['pasta'] = 'anexos/';  
							$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg'); 
							$_UP['retituloia'] = false; 
							$_UP['erros'][0] = 'Não houve erro';
							$_UP['erros'][1] = 'O documento no upload é maior do que o limite do PHP'; 
							$_UP['erros'][3] = 'O upload do documento foi feito parcialmente';
							$_UP['erros'][4] = 'Não foi feito o upload do documento'; 
							if ($_FILES['foto']['error'] != 0) {  ?> 
								<center>
									<h5 style="color:rgb(237,50,55);">Erro ao realizar o cadastro!<br><?php echo $_UP['erros'][$_FILES['foto']['error']] ?>.</h5><br>
									<a class="close button" href="index.php?go=portfolio">Voltar</a>
								</center>
								<?php 
								exit;   
							} 
							$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
							if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
								<center>
									<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
									<a class="close button" href="index.php?go=portfolio" aria-label=" ">Voltar</a>
								</center>
								<?php
								exit; 
							} 
							$titulo_final = "portfolio_".$id.'_'.time()."_.".$extensao;
							if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $titulo_final)) { 
								$foto = $titulo_final; 
								if($foto != '')mysqli_query($conn,"INSERT INTO sp_portfolio (titulo,subtitulo,foto) VALUES ('$titulo','$subtitulo','$foto')");
							} 
						/* */
					}	
				//
				include "inc/salvo.php";
				echo "<script>setTimeout('portfolio()', 400);</script>";
				exit;
			}
			?>
			<fieldset>
				<legend>
					<i class="fa fa-image" style="color:rgb(237,50,55);"></i>
					<a href="?go=portfolio" style="color:#008CBA;">PORTFOLIO</a>
				</legend> 
				<form> 
					<div id="divConteudo"> 						
						<table>
							<thead>
							    <tr>
									<th style="width:7%"></th>
									<th style="width:10%;text-align: left;">FOTO</th>  
									<th style="text-align: left;">TÍTULO</th>  
									<th style="text-align: left;">SUBTÍTULO</th>  
							    </tr>
							</thead>
							<tbody>
								<?php 
									$query_orgaos = mysqli_query($conn,"SELECT 
											sp_portfolio.*
										FROM sp_portfolio 
									");
									$numeroLinhas = mysqli_num_rows($query_orgaos);
									if($numeroLinhas > 0){
										while($rowOrgao = mysqli_fetch_array($query_orgaos,MYSQLI_ASSOC)){ 
											$idportfolioi = $rowOrgao['id']; ?>
											<div style="padding:20px;width: 35%;text-align:center;" id="delportfolio<?php echo $idportfolioi ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
												<h5 id="modalTitle">Tem certeza que deseja excluir o portfolio: <br><?php echo $rowOrgao['titulo'] ?> ?</h5>
												<a href="inc/deleteData.php?id=<?php echo $idportfolioi ?>&tabela=sp_portfolio&volta=portfolio" style="color:white"><button class="excluirS">Excluir</button></a>
												<a onclick="closeprofissional()" class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
											</div>	 
											<tr>
												<td> 
													<a style="background:#0077bd;" class="div_add_person fa-pencil" href="?go=portfolio&edit=<?php echo $idportfolioi ?>"></a>
													<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delportfolio<?php echo $idportfolioi ?>" title="Excluir"></a>  
												</td>
												<td style="text-align: left;">
													<?php  
														$arquivo = "anexos/".$rowOrgao['foto'];
														if(file_exists($arquivo)){ ?>
															<a href="<?php echo $arquivo ?>" target="_blank"><div style="background:url('<?php echo $arquivo ?>') no-repeat;height:60px; width: 100%; background-size: cover;"></div></a>
															<?php
														}  
													?>
												</td>
												<td><?php echo $rowOrgao['titulo']; ?></td>
												<td><?php echo $rowOrgao['subtitulo']; ?></td>
											</tr>	
											<input id="idportfolioi" value="<?php echo $idportfolioi ?>" disabled type="hidden">	 
											<script type="text/javascript">
												function closeprofissional(){ $('#delportfolio'+$('#idportfolioi').val()).foundation('reveal', 'close'); }												 
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
			<div class="circulo fa-plus" onclick="mostra_cadastro_lote('cadastro_orgao')" accesskey="+"></div> 
			<!-- CADASTRO DE UM portfolio -->
				<div style="display:none;" id="cadastro_orgao"><!-- Cadastrar novo portfolio -->
					<div class="fundo_opaco" onclick="hide_cadastro_lote('cadastro_orgao')"></div>
					<div class="iframe_lote">
						<div class="circuloX fa fa-times" onclick="hide_cadastro_lote('cadastro_orgao')"></div>
						<div class="small-12 large-12 columns">
							<fieldset style='min-height:375px;'>
								<legend>
									<i class="fa fa-plus" style="color:rgb(237,50,55);"></i>
									<a href="#" style="color:#008CBA; cursor:default;">NOVO CADASTRO</a>  
								</legend>
								<form data-abide action="?go=portfolio&validainsert" method="POST" enctype="multipart/form-data">  
									<div class="small-12 columns">
								    	<label>Adicionar foto: 
								    		<small title="Apenas arquivos em formato: 'jpg','png','gif' ou 'jpeg' e no máx. 10Mb">Apenas arquivos em formato: 'jpg','png','gif' ou 'jpeg' e no máx. 10Mb</small>
											<input name="foto" id="foto" type="file" required>
										</label>
										<small class="error">Selecione um arquivo.</small>
									</div>
									<div class="small-12 columns">
								    	<label>Título:
											<input name="titulo" id="titulo" type="text" />
										</label>
									</div>
									<div class="small-12 columns">
								    	<label>Subtítulo:
											<input name="subtitulo" id="subtitulo" type="text" />
										</label>
									</div>

									<div class="small-12 columns"><p><hr></p></div>
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
			header('X-XSS-Protection:0');
			$id = valida_campos($_GET['edit'],$conn); 
			if (isset($_GET['validaedit'])) {  	 
				if(isset($_POST['titulo']))$titulo = valida_campos($_POST['titulo'],$conn);else $titulo = ""; 
				if(isset($_POST['subtitulo']))$subtitulo = valida_campos($_POST['subtitulo'],$conn);else $subtitulo = ""; 
				$sqlEdit = "UPDATE sp_portfolio SET  titulo = '$titulo',subtitulo = '$subtitulo' WHERE id = '$id'";
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
								<a class="close button" href="index.php?go=portfolio&edit=<?php echo $id ?>">Voltar</a>
							</center>
							<?php 
							exit;   
						} 
						$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
								<a class="close button" href="index.php?go=portfolio&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit; 
						} 
						$titulo_final = "portfolio".$id.'_'.time().rand().uniqid().".".$extensao;
						if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $titulo_final)) { 
							$sqlfoto = "INSERT INTO sp_portfolio (id,foto) VALUES ('$id','$titulo_final')";
							if($titulo_final != '')mysqli_query($conn,$sqlfoto);
						} else {   ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
								<a class="close button" href="index.php?go=portfolio&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit;
						}  
					}
					include "inc/salvo.php";
					echo "<script>setTimeout('portfolioEdit(".$id.")', 400);</script>";
				}
				else{ ?> 
					<center>
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
						<a class="close button" href="index.php?go=portfolio&edit=<?php echo $id ?>" aria-label="Close">Voltar</a>
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
				$qorgaogestor = mysqli_query($conn,"SELECT * FROM sp_portfolio WHERE id = ".$id);
				$rowOrgaoGestor = mysqli_fetch_array($qorgaogestor,MYSQLI_ASSOC);
				?>
				<legend>
					<i class="fa fa-image" style="color:rgb(237,50,55);"></i>
					<a href="?go=portfolio" style="color:#008CBA;">PROTFOLIO</a> 
					<i class="fa fa-angle-double-right" style="color:rgb(237,50,55);"></i>
					<a href="#" style="color:#555;font-weight:normal; cursor:default;">EDITAR</a>
				</legend>
				<form data-abide action="?go=portfolio&edit=<?php echo $id ?>&validaedit" method="POST" enctype="multipart/form-data"> 
					<div class="small-12 columns">
				    	<label>Alterar foto: 
				    		<small title="Apenas arquivos em formato: 'jpg','png','gif' ou 'jpeg' e no máx. 10Mb">Apenas arquivos em formato: 'jpg','png','gif' ou 'jpeg' e no máx. 10Mb</small>
							<input name="foto" id="foto" type="file" />
						</label>
						<small class="error">Selecione um arquivo.</small>
						<?php if ($rowOrgaoGestor['foto'] != ''): ?>
							<?php  
								$arquivo = "anexos/".$rowOrgaoGestor['foto'];
								if(file_exists($arquivo)){ ?>
									<a href="<?php echo $arquivo ?>" target="_blank"><img src='<?php echo $arquivo ?>' alt="<?php echo $rowOrgaoGestor['titulo'] ?>" style="height:100px;"></a>
									<?php
								}  
							?>
						<?php endif ?>
					</div>
					<div class="small-12 large-6 columns">
						<label>Título:
							<input name="titulo" id="titulo" value="<?php echo $rowOrgaoGestor['titulo'] ?>" required="" pattern="[a-zA-Z0-9]+" type="text">
						</label>
						<small class="error">Digite o título.</small>
					</div>
					<div class="small-12 large-6 columns">
						<label>Sub-Título:
							<input name="subtitulo" id="subtitulo" value="<?php echo $rowOrgaoGestor['subtitulo'] ?>" required="" pattern="[a-zA-Z0-9]+" type="text">
						</label>
						<small class="error">Digite o subtítulo.</small>
					</div>



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
					page:'portfolio'
				}, function(retorno){
					saida.html(retorno);
				});
	        } 
	    }, DURACAO_DIGITACAO); 
	} 
</script> 