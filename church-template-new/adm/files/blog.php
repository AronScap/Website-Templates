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
	if(isset($_GET['go']) && $_GET['go'] == 'blog'){
		if(!isset($_GET['edit'])){ /*inicio*/
			if (isset($_GET['validainsert'])) {  
				if(isset($_POST['titulo']))$titulo = valida_campos($_POST['titulo'],$conn);else $titulo = ""; 
				if(isset($_POST['descricao']))$descricao = mysqli_real_escape_string($conn,$_POST['descricao']);else $descricao = "";  
				$q_profissionai = mysqli_query($conn,"SELECT titulo FROM sp_blog WHERE titulo LIKE '".$titulo."'"); 
				if(!mysqli_num_rows($q_profissionai)){
					$foto = '';
					$extensao = '';
					if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ''){ 
						$_UP['pasta'] = 'blog/';  
						$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg'); 
						$_UP['retituloia'] = false; 
						$_UP['erros'][0] = 'N??o houve erro';
						$_UP['erros'][1] = 'O documento no upload ?? maior do que o limite do PHP'; 
						$_UP['erros'][3] = 'O upload do documento foi feito parcialmente';
						$_UP['erros'][4] = 'N??o foi feito o upload do documento'; 
						if ($_FILES['foto']['error'] != 0) {  ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao editar!<br><?php echo $_UP['erros'][$_FILES['foto']['error']] ?>.</h5><br>
								<a class="close button" href="index.php?go=blog">Voltar</a>
							</center>
							<?php 
							exit;   
						} 
						$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extens??o "<?php echo $extensao ?>" n??o ?? permitida.</h5><br>
								<a class="close button" href="index.php?go=blog" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit; 
						} 
						$titulo_final = "blog_".$id.'_'.time()."_";
						if ($_UP['retituloia'] == true) { 
						  $titulo_final .= md5(time()).'.'.$extensao;
						} else {  
							$tituloblog = str_replace(' ', '_', $_FILES['foto']['name']);
						  	$titulo_final .= $tituloblog;
						} 
						if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $titulo_final)) { 
						  // echo "Upload efetuado com sucesso!";
						  // echo '<a href="' . $_UP['pasta'] . $titulo_final . '" target="_blanc">Clique aqui para acessar o documento</a>';
						} else {   ?> 
							<center>
								<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
								<a class="close button" href="index.php?go=blog" aria-label=" ">Voltar</a>
							</center>
							<?php 
							exit;
						}  
						$foto = $titulo_final; 
					}	
					$data_cadastro = date('y-m-d H:i:s');
					$sqlEdit = "INSERT INTO sp_blog (titulo,descricao,data_cadastro) VALUES ('$titulo','$descricao','$data_cadastro')"; 
					$q_edit = mysqli_query($conn,$sqlEdit);
					if($q_edit){			
						$id_blog = mysqli_insert_id($conn);
						mysqli_query($conn,"INSERT INTO sp_blog_fotos (id_blog,foto) VALUES ('$id_blog','$foto')"); 
						include "inc/salvo.php";
						echo "<script>setTimeout('blog()', 400);</script>";
					}
					else{ ?> 
						<center> 
							<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=blog" aria-label="Close">Voltar</a>
						</center>
						<?php 
						exit;
					}
				}
				else{ ?> 
					<center> 
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Este blog j?? foi cadastrado anteriormente!</h5><br>
						<a class="close button" href="index.php?go=blog" aria-label="Close">Voltar</a>
					</center>
					<?php   
				}
				exit;
			} 
			?>
			<fieldset>
				<legend>
					<i class="fa fa-newspaper-o" style="color:rgb(237,50,55);"></i>
					<a href="?go=blog" style="color:#008CBA;">NOT??CIAS</a>
				</legend> 
				<form> 
					<div id="tabela">
						<i class="fa fa-search" style="float:left;font-size:20px; margin:4px; color:#ccc; position:absolute;"></i>
						<input type="text" autocomplete="off" placeholder="Buscar NOT??CIAS" id="txtColuna1"  class="input_busca_lote" style="padding-left: 26px!important;"> 
						<input type="submit" disabled class="hide">
					</div> 
					<div id="divConteudo"> 						
						<table>
							<thead>
							    <tr>
									<th style="width:7%"></th> 
									<th style="">DATA</th> 
									<th style="text-align: left;">FOTO</th>        
									<th style="">T??TULO</th>                 
									<th style="text-align: left;">DESCRI????O</th>        
							    </tr>
							</thead>
							<tbody>
								<?php 
									$query_orgaos = mysqli_query($conn,"SELECT 
										sp_blog.id,
										sp_blog.data_cadastro,
										sp_blog.titulo, 
										sp_blog.descricao, 
										(SELECT foto FROM sp_blog_fotos WHERE sp_blog_fotos.id_blog = sp_blog.id LIMIT 1) AS foto
										FROM sp_blog 
										ORDER BY sp_blog.data_cadastro DESC LIMIT 200");
									$numeroLinhas = mysqli_num_rows($query_orgaos);
									if($numeroLinhas > 0){
										while($rowOrgao = mysqli_fetch_array($query_orgaos,MYSQLI_ASSOC)){ 
											$idblogi = $rowOrgao['id']; ?>
											<div style="padding:20px;width: 35%;text-align:center;" id="delblog<?php echo $idblogi ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
												<h5 id="modalTitle">Tem certeza que deseja excluir o blog: <br><?php echo $rowOrgao['titulo'] ?> ?</h5>
												<a href="inc/deleteData.php?id=<?php echo $idblogi ?>&tabela=sp_blog&volta=blog" style="color:white"><button class="excluirS">Excluir</button></a>
												<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
											</div>	 
											<tr>
												<td> 
													<a style="background:#0077bd;" class="div_add_person fa-pencil" href="?go=blog&edit=<?php echo $idblogi ?>"></a>
													<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delblog<?php echo $idblogi ?>" title="Excluir"></a>  
												</td>  
												<td>
													<?php echo date('d/m/Y',strtotime($rowOrgao['data_cadastro'])) ?><br>
													<?php // echo date('H:i',strtotime($rowOrgao['data_cadastro'])) ?>
												</td>
												<td style="text-align: left;"><!-- foto -->
													<?php  
														$arquivo = "blog/".$rowOrgao['foto'];
														if(file_exists($arquivo)){ ?>
															<img src='<?php echo $arquivo ?>' alt="<?php echo $rowOrgao['titulo'] ?>" style="height:60px;">
															<?php
														}  
													?>
												</td>    
												<td style="text-align: left;"><?php echo $rowOrgao['titulo']; ?></td>         
												<td style="text-align: left;"><?php echo limitarTexto($rowOrgao['descricao'], $limite = 50); ?></td>    
											</tr>	
											<input id="idblogi" value="<?php echo $idblogi ?>" disabled type="hidden">	 
											<script type="text/javascript">
												$('a.closeprofissional').on('click', function() {
												  $('#delblog'+$('#idblogi').val()).foundation('reveal', 'close');
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
								<a href="#" style="color:#008CBA; cursor:default;">CADASTRO DE UMA PUBLICA????O</a>  
							</legend>
							<form data-abide action="?go=blog&validainsert" method="POST" enctype="multipart/form-data">  
								<div class="small-12 large-12 columns">
									<label>T??tulo:
										<input name="titulo" id="titulo" required pattern="[a-zA-Z0-9]+" type="text">
									</label>
									<small class="error">Digite o t??tulo.</small>
								</div>
								<div class="small-12 large-4 columns">
									<label>Foto capa: <small>Obrigat??rio</small>
										<input name="foto" id="foto" required="" type="file">
									</label>
									<small class="error">Selecione um arquivo.</small>
								</div>   
								<div class="small-12 columns"><p></p></div>
								<div class="small-12 columns">
									<label>Descri????o:
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
				if(isset($_POST['data_cadastro']))$data_cadastro = valida_campos($_POST['data_cadastro'],$conn)." ".date('H:i:s');else $data_cadastro = ""; 
				if(isset($_POST['titulo']))$titulo = valida_campos($_POST['titulo'],$conn);else $titulo = ""; 
				if(isset($_POST['descricao']))$descricao = mysqli_real_escape_string($conn,$_POST['descricao']);else $descricao = ""; 
				$q_profissionai = mysqli_query($conn,"SELECT id FROM sp_blog WHERE id <> '$id' AND titulo LIKE '$titulo' AND data_cadastro = '$data_cadastro'");
				if(!mysqli_num_rows($q_profissionai)){ 
					$q_edit = mysqli_query($conn,$sqlEdit);
					$sqlEdit = "UPDATE sp_blog SET titulo = '$titulo',data_cadastro = '$data_cadastro',descricao = '$descricao' WHERE id = ".$id; 
					$q_edit = mysqli_query($conn,$sqlEdit);
					if($q_edit){
						$foto = '';
						$extensao = '';
						if(isset($_FILES['foto']) && $_FILES['foto']['name'][0] != ''){ 
						 	foreach ($_FILES['foto']['name'] as $key => $value) {
								$_UP['pasta'] = 'blog/';  
								$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg'); 
								$_UP['retituloia'] = false; 
								$_UP['erros'][0] = 'N??o houve erro';
								$_UP['erros'][1] = 'O documento no upload ?? maior do que o limite do PHP'; 
								$_UP['erros'][3] = 'O upload do documento foi feito parcialmente';
								$_UP['erros'][4] = 'N??o foi feito o upload do documento'; 
								if ($_FILES['foto']['error'][$key] != 0) {  ?> 
									<center>
										<h5 style="color:rgb(237,50,55);">Erro ao editar!<br><?php echo $_UP['erros'][$_FILES['foto']['error'][$key]] ?>.</h5><br>
										<a class="close button" href="index.php?go=blog&edit=<?php echo $id ?>">Voltar</a>
									</center>
									<?php 
									exit;   
								} 
								$extensao = strtolower(end(explode('.', $_FILES['foto']['name'][$key])));
								if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
									<center>
										<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extens??o "<?php echo $extensao ?>" n??o ?? permitida.</h5><br>
										<a class="close button" href="index.php?go=blog&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
									</center>
									<?php 
									exit; 
								} 
								$titulo_final = "blog_".$id.'_'.time()."_";
								if ($_UP['retituloia'] == true) { 
								  $titulo_final .= md5(time()).'.'.$extensao;
								} else {  
									$tituloblog = str_replace(' ', '_', $_FILES['foto']['name'][$key]);
								  	$titulo_final .= $tituloblog;
								} 
								if (move_uploaded_file($_FILES['foto']['tmp_name'][$key], $_UP['pasta'] . $titulo_final)) {
									$foto = $titulo_final;  
									if($foto != '')mysqli_query($conn,"INSERT INTO sp_blog_fotos (id_blog,foto) VALUES ('$id','$foto')");
								} else {   ?> 
									<center>
										<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
										<a class="close button" href="index.php?go=blog&edit=<?php echo $id ?>" aria-label=" ">Voltar</a>
									</center>
									<?php 
									exit;
								}  
							}
						}	
						include "inc/salvo.php";
						echo "<script>setTimeout('blogEdit(".$id.")', 400);</script>";
					}
					else{
						?> 
						<center>
							<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=blog&edit=<?php echo $id ?>" aria-label="Close">Voltar</a>
						</center>
						<?php 
						exit;
					}  
				}
				else{
					?> 
					<center>
						<h5 id="modalTitle" style="color:rgb(237,50,55);">Esta informa????o j?? foi cadastrada anteriormente!</h5><br>
						<a class="close button" href="index.php?go=blog&edit=<?php echo $id ?>" aria-label="Close">Voltar</a>
					</center>
					<?php  
				}
				exit;
			}  
			?> 
			<fieldset>
				<?php 
				$id = valida_campos($_GET['edit'],$conn);
				$qorgaogestor = mysqli_query($conn,"SELECT * FROM sp_blog WHERE id = ".$id);
				$rowOrgaoGestor = mysqli_fetch_array($qorgaogestor,MYSQLI_ASSOC);
				?>
				<legend>
					<i class="fa fa-newspaper-o" style="color:rgb(237,50,55);"></i>
					<a href="?go=blog" style="color:#008CBA;">NOT??CIAS</a> 
					<i class="fa fa-angle-double-right" style="color:rgb(237,50,55);"></i>
					<a href="#" style="color:#555;font-weight:normal; cursor:default;">EDITAR</a>
				</legend>
				<form data-abide action="?go=blog&edit=<?php echo $id ?>&validaedit" method="POST" enctype="multipart/form-data"> 
					<div class="small-12 large-8 columns" style="border-right: solid 1px lightgray;">
						<div class="small-12 large-8 columns">
							<label>T??tulo:
								<input name="titulo" id="titulo" value="<?php echo $rowOrgaoGestor['titulo'] ?>" required="" pattern="[a-zA-Z0-9]+" type="text">
							</label>
							<small class="error">Digite o t??tulo.</small>
						</div>
						<div class="small-12 large-4 columns">
							<label>Data:
								<input name="data_cadastro" id="data_cadastro" value="<?php echo date('Y-m-d',strtotime($rowOrgaoGestor['data_cadastro'])) ?>" required type="date">
							</label>
							<small class="error">Digite o t??tulo.</small>
						</div>
						<div class="small-12 columns"><p></p></div>
						<div class="small-12 columns">
							<label>Descri????o:
								<textarea name="descricao" id="descricao" style="min-height: 150px;"><?php echo $rowOrgaoGestor['descricao'] ?></textarea>
							</label>
						</div>
					</div>
					<div class="small-12 large-4 columns">
						<div class="small-12 columns"> 
					    	<label>Adicionar foto:
								<input name="foto[]" id="foto" type="file" multiple />
							</label>
							<small class="error">Selecione um arquivo.</small> 
						</div>
						<hr>
						<fieldset><!-- fotos cadastradas -->
							<legend>IMAGENS CADASTRADAS</legend>
							<?php  
								$sqlFotos = "SELECT * FROM sp_blog_fotos WHERE id_blog = '$id'";
								$qFotos = mysqli_query($conn,$sqlFotos);
								if (mysqli_num_rows($qFotos)) {
									while ($rFotos = mysqli_fetch_array($qFotos,MYSQLI_ASSOC)) { ?>
										<div class="small-6 columns end" style="margin-bottom: 10px;">
											<div style="position: absolute;">
												<?php  
													$idblogi = $rFotos['id'];   
													$apaga = false;  	
												?>
												<div style="padding:20px;width: 35%;text-align:center;" id="delblog<?php echo $idblogi ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
													<h5 id="modalTitle">Tem certeza que deseja excluir a foto: <br><img src="blog/<?php echo $rFotos['foto'] ?>" alt="" style="height: 50px;">?</h5>
													<a href="inc/deleteData.php?id=<?php echo $idblogi ?>&tabela=sp_blog_fotos&volta=blogEdit&id_volta=<?php echo $id ?>" style="color:white"><button class="excluirS">Excluir</button></a>
													<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
												</div>	
												<a class="div_add_person fa fa-times" style="padding: 8px 9px; margin:5px;font-size: 15px; height: 30px;width: 30px;" data-reveal-id="delblog<?php echo $idblogi ?>" title="Excluir"></a>						 
												<input id="idblogi" value="<?php echo $idblogi ?>" disabled type="hidden">	 
												<script type="text/javascript">
													$('a.closeprofissional').on('click', function() {
													  $('#delblog'+$('#idblogi').val()).foundation('reveal', 'close');
													});
												</script>
											</div>
											<a href="blog/<?php echo $rFotos['foto'] ?>" target="_blanc" class="aopacity"><img class="aopacity" src="blog/<?php echo $rFotos['foto'] ?>" alt="" style="height: 100px;object-fit: cover;object-position: center;"></a>
										</div>
										<?php
									}
								}
							?>
						</fieldset>
					</div>
					<input required name="id" value="<?php echo $id ?>" id="id" required  type="hidden" />
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
					page:'blog'
				}, function(retorno){
					saida.html(retorno);
				});
	        } 
	    }, DURACAO_DIGITACAO); 
	} 
</script> 