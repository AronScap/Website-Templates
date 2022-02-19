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
        else return $texto;
    } 
	if(isset($_GET['go']) && $_GET['go'] == 'equipe'){
		if(!isset($_GET['edit'])){ /*inicio*/
			if (isset($_GET['validainsert'])) {
				if(isset($_POST['titulo']))$titulo = valida_campos($_POST['titulo'],$conn);else $titulo = ""; 
				// if(isset($_POST['cargo']))$cargo = valida_campos($_POST['cargo'],$conn);else $cargo = ""; 

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
							<a class="close button" href="index.php?go=equipe">Voltar</a>
						</center>
						<?php 
						exit;   
					} 
					$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
					if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
							<a class="close button" href="index.php?go=equipe" aria-label=" ">Voltar</a>
						</center>
						<?php 
						exit; 
					} 
					$titulo_final = "equipe".$id.'_'.time().uniqid().".".$extensao;
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $titulo_final)) { 
						// mysqli_query($conn,"INSERT INTO sp_equipe_fotos (id_equipe,foto) VALUES ('$id_equipe','$titulo_final')"); 
					} else {   ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=equipe" aria-label=" ">Voltar</a>
						</center>
						<?php 
						exit;
					}
				}	
				$sqlEdit = "INSERT INTO sp_equipe (titulo,foto) VALUES ('$titulo','$titulo_final')"; 
				$q_edit = mysqli_query($conn,$sqlEdit);
				if($q_edit){			
					include "inc/salvo.php";
					echo "<script>setTimeout('equipe()', 400);</script>";
				}
				else{ ?> 
					<center> 
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
						<a class="close button" href="index.php?go=equipe" aria-label="Close">Voltar</a>
					</center>
					<?php 
					exit;
				} 
				exit;
			} 
			?>
			<fieldset>
				<legend>
					<i class="fa fa-cubes" style="color:rgb(237,50,55);"></i>
					<a href="?go=equipe" style="color:#008CBA;">PASTORES</a>
				</legend> 
				<form> 
					<!-- <div id="tabela">
						<i class="fa fa-search" style="float:left;font-size:20px; margin:4px; color:#ccc; position:absolute;"></i>
						<input type="text" autocomplete="off" placeholder="Buscar equipe" id="txtColuna1"  class="input_busca_lote" style="padding-left: 26px!important;"> 
						<input type="submit" disabled class="hide">
					</div>  -->
					<div id="divConteudo"> 						
						<table>
							<thead>
							    <tr>
									<th style="width:7%"></th>
									<th style="text-align: left;">FOTO</th>        
									<th style="">NOME</th>
							    </tr>
							</thead>
							<tbody>
								<?php 
									$query_orgaos = mysqli_query($conn,"SELECT 
										sp_equipe.id,
										sp_equipe.foto,
										sp_equipe.titulo
										FROM sp_equipe 
									");
									$numeroLinhas = mysqli_num_rows($query_orgaos);
									if($numeroLinhas > 0){
										while($rowOrgao = mysqli_fetch_array($query_orgaos,MYSQLI_ASSOC)){ 
											$idequipei = $rowOrgao['id']; ?>
											<div style="padding:20px;width: 35%;text-align:center;" id="delequipe<?php echo $idequipei ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
												<h5 id="modalTitle">Tem certeza que deseja excluir esta informação: <br><?php echo $rowOrgao['titulo'] ?> ?</h5>
												<a href="inc/deleteData.php?id=<?php echo $idequipei ?>&tabela=sp_equipe&volta=equipe" style="color:white"><button class="excluirS">Excluir</button></a>
												<a onclick="closeprofissional()" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
											</div>	 
											<tr>
												<td> 
													<a style="background:#0077bd;" class="div_add_person fa-pencil" href="?go=equipe&edit=<?php echo $idequipei ?>"></a>
													<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delequipe<?php echo $idequipei ?>" title="Excluir"></a>  
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
												<!-- <td><?php echo $rowOrgao['cargo']; ?></td> -->
											</tr>	
											<input id="idequipei" value="<?php echo $idequipei ?>" disabled type="hidden">	 
											<script type="text/javascript"> function closeprofissional(){ $('#delequipe'+$('#idequipei').val()).foundation('reveal', 'close'); }; </script>
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
								<a href="#" style="color:#008CBA; cursor:default;">NOVO CADASTRO</a>  
							</legend>
							<form data-abide action="?go=equipe&validainsert" method="POST" enctype="multipart/form-data">  
								<div class="small-12 large-12 columns">
									<label>Nome dos pastores:
										<input name="titulo" id="titulo" required pattern="[a-zA-Z0-9]+" type="text">
									</label>
									<small class="error">Preencha este campo corretamente.</small>
								</div> 
								<!-- <div class="small-12 large-12 columns">
									<label>Cargo:
										<input name="cargo" id="cargo" required pattern="[a-zA-Z0-9]+" type="text">
									</label>
									<small class="error">Preencha este campo corretamente.</small>
								</div> -->
								<div class="small-12 columns"><p></p></div>
								<div class="small-12 large-12 columns">
									<label>Foto: <small>Obrigatório</small>
										<input name="foto" id="foto" required="" type="file">
									</label>
									<small class="error">Selecione um arquivo.</small>
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
			<?php
		} 
		else{ /*edit*/ 
			header('X-XSS-Protection:0');
			$id = valida_campos($_GET['edit'],$conn); 
			if (isset($_GET['validaedit'])) {
				if(isset($_POST['titulo']))$titulo = valida_campos($_POST['titulo'],$conn);else $titulo = ""; 
				// if(isset($_POST['cargo']))$cargo = valida_campos($_POST['cargo'],$conn);else $cargo = ""; 

				 
				$sqlEdit = "UPDATE sp_equipe SET titulo = '$titulo' WHERE id = '$id'";
				 
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
								<a class="close button" href="index.php?go=equipe&edit=<?php echo $id ?>">Voltar</a>
							</center>
							<?php 
							exit;   
						} 
						$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
								<a class="close button" href="index.php?go=equipe&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit; 
						} 
						$titulo_final = "equipe".$id.'_'.time().uniqid().".".$extensao;
						if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $titulo_final)) { 
							$sqlfoto = "UPDATE sp_equipe SET foto='$titulo_final' WHERE id = '$id'";
							// exit;
							if($titulo_final != '')mysqli_query($conn,$sqlfoto);
						} else {   ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
								<a class="close button" href="index.php?go=equipe&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit;
						}  
					}
					include "inc/salvo.php";
					echo "<script>setTimeout('equipeEdit(".$id.")', 400);</script>";
				}
				else{
					?> 
					<center>
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
						<a class="close button" href="index.php?go=equipe&edit=<?php echo $id ?>" aria-label="Close">Voltar</a>
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
				$qorgaogestor = mysqli_query($conn,"SELECT * FROM sp_equipe WHERE id = ".$id);
				$rowOrgaoGestor = mysqli_fetch_array($qorgaogestor,MYSQLI_ASSOC);
				?>
				<legend>
					<i class="fa fa-cubes" style="color:rgb(237,50,55);"></i>
					<a href="?go=equipe" style="color:#008CBA;">EQUIPE</a> 
					<i class="fa fa-angle-double-right" style="color:rgb(237,50,55);"></i>
					<a href="#" style="color:#555;font-weight:normal; cursor:default;">EDITAR</a>
				</legend>
				<form data-abide action="?go=equipe&edit=<?php echo $id ?>&validaedit" method="POST" enctype="multipart/form-data"> 
					<div class="small-12 large-12 columns">
						<label>Nome dos pastores:
							<input name="titulo" id="titulo" value="<?php echo $rowOrgaoGestor['titulo'] ?>" required="" pattern="[a-zA-Z0-9]+" type="text">
						</label>
						<small class="error">Preencha este campo corretamente.</small>
					</div>
					<div class="small-12 columns"><p></p></div>
					<div class="small-12 large-12 columns">
						<label>Alterar Foto:
							<input name="foto" id="foto" type="file">
						</label> 
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
					page:'equipe'
				}, function(retorno){
					saida.html(retorno);
				});
	        } 
	    }, DURACAO_DIGITACAO); 
	} 
</script> 
