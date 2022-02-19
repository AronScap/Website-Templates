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
	// include "inc/verificasessao.php"; 
	include "inc/mask.php"; 
	function valida_campos($campo,$conn){ return mysqli_real_escape_string($conn,htmlspecialchars($campo)); }
	function limitarTexto($texto, $limite){
        $contador = strlen($texto);
        if ( $contador >= $limite ) {      
            $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
            return $texto;
        }
        else{ return $texto; }
    } 
	if(isset($_GET['go']) && valida_campos($_GET['go'],$conn) == 'empresa'){ 
		if (isset($_GET['validainsert'])) {
			$sobre 		= mysqli_real_escape_string($conn,$_POST['sobre']);
			$titulo 	= valida_campos($_POST['titulo'],$conn);
			$video 		= valida_campos($_POST['video'],$conn);
			$query 		= mysqli_query($conn,"SELECT fotosobre FROM sp_empresa ORDER BY id DESC LIMIT 1");
			if (mysqli_num_rows($query) > 0) {
				$r = mysqli_fetch_array($query,MYSQLI_ASSOC);
				$fotosobre = $r['fotosobre'];
			}
			$deleteall = mysqli_query($conn,"DELETE FROM sp_empresa");
			$query = mysqli_query($conn,"INSERT INTO sp_empresa (sobre,titulo,video,fotosobre) VALUES ('$sobre','$titulo','$video','$fotosobre')");
			if($query){
				$id_tarefa = mysqli_insert_id($conn);
				if(isset($_FILES['fotosobre']) && $_FILES['fotosobre']['name'] != '' && $_FILES['fotosobre']['size'] != 0){
					$_UP['pasta'] = 'anexos/';  
					$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg'); 
					$_UP['renomeia'] = false; 
					$_UP['erros'][0] = 'Não houve erro';
					$_UP['erros'][1] = 'O documento no upload é maior do que o limite do PHP'; 
					$_UP['erros'][3] = 'O upload do documento foi feito parcialmente';
					$_UP['erros'][4] = 'Não foi feito o upload do documento'; 
					if ($_FILES['fotosobre']['error'] != 0) {?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao editar!<br><?php echo $_UP['erros'][$_FILES['fotosobre']['error']] ?>.</h5><br>
							<a class="close button" href="index.php?go=empresa">Voltar</a>
						</center>
						<?php 
						exit;   
					} 
					$extensao = strtolower(end(explode('.', $_FILES['fotosobre']['name'])));
					if (array_search($extensao, $_UP['extensoes']) === false) { ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao cadastrar!<br>A extensão "<?php echo $extensao ?>" não é permitida.</h5><br>
							<a class="close button" href="index.php?go=empresa" aria-label=" ">Voltar</a>
						</center>
						<?php 
						exit; 
					} 
					$nome_final = 'fotosobre_' . time() . "_" . uniqid().".".$extensao;
					if (move_uploaded_file($_FILES['fotosobre']['tmp_name'], $_UP['pasta'] . $nome_final)) { 
						mysqli_query($conn,"UPDATE sp_empresa SET fotosobre = '$nome_final'");
					} else {   ?> 
						<center>
							<h5 style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
							<a class="close button" href="index.php?go=empresa" aria-label=" ">Voltar</a>
						</center>
						<?php 
						exit;
					}
				}
				include "inc/salvo.php";
				echo "<script>setTimeout('empresa()', 400);</script>";
			}
			else{ 	?> 
				<center>
					<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
					<a class="close button" href="index.php?go=empresa" aria-label="Close">Voltar</a>
				</center>
				<?php 
				exit;
			}
			exit;
		} 
		?>
		<fieldset>
			<legend>
				<i class="fa fa-briefcase" style="color:rgb(237,50,55);"></i>
				<a href="?go=empresa" style="color:#008CBA;">EMPRESA</a>
			</legend> 
			<?php  
				$sqlEmpresa = mysqli_query($conn,"SELECT * FROM sp_empresa");
				$rEmrepsa = mysqli_fetch_array($sqlEmpresa,MYSQLI_ASSOC);
			?>
			<form data-abide action="?go=empresa&validainsert" method="POST" enctype="multipart/form-data">

				<div class="small-12 large-6 columns">
					<label>Título: <small>Obrigatório</small>
						<input name="titulo" id="titulo" value="<?php echo $rEmrepsa['titulo'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
					<div></div>
					<label>Sobre: <small>Obrigatório</small>
						<textarea name="sobre" placeholder="Sobre a empresa" required style="min-height: 200px;"><?php echo $rEmrepsa['sobre'] ?></textarea>
					</label>
					<small class="error">Preencha este campo.</small>
				</div>
				<div class="small-12 large-6 columns">
					<label>Vídeo (Código da URL do Vimeo): <small>Obrigatório</small>
						<input name="video" id="video" value="<?php echo $rEmrepsa['video'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
					<div></div>
			    	<label>Adicionar foto:
						<input name="fotosobre" id="fotosobre" type="file">
					</label>
					<small class="error">Selecione um arquivo.</small>
					<?php if (file_exists('anexos/'.$rEmrepsa['fotosobre'])): ?>
						<a href="anexos/<?php echo $rEmrepsa['fotosobre'] ?>" target="_blank">
							<img src="anexos/<?php echo $rEmrepsa['fotosobre'] ?>" style="width: 200px;object-fit:cover;object-position:center;" />
						</a>
					<?php endif ?>
				</div>
				<div class="small-12 columns"><p></p></div>
				<div class="small-12 columns end">
					<button type="submit">Salvar</button>
				</div>	
			</form>
		</fieldset>  
		<?php 
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
					page:'empresa'
				}, function(retorno){
					saida.html(retorno);
				});
	        } 
	    }, DURACAO_DIGITACAO); 
	} 
</script> 