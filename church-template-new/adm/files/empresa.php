<script src="js/tinymce/tinymce.min.js"></script>
<!-- <script>tinymce.init({ 
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
</script> -->
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
			$endereco 	= valida_campos($_POST['endereco'],$conn);
			$capacita 	= valida_campos($_POST['capacita'],$conn);
			$transforma	= valida_campos($_POST['transforma'],$conn);
			$fomenta 	= valida_campos($_POST['fomenta'],$conn);
			$conecta 	= valida_campos($_POST['conecta'],$conn);
			$titulo 	= valida_campos($_POST['titulo'],$conn);
			$missao 	= valida_campos($_POST['missao'],$conn);
			$visao 		= valida_campos($_POST['visao'],$conn);
			$valores 	= valida_campos($_POST['valores'],$conn);
			$video 		= valida_campos($_POST['video'],$conn);
			// $query 		= mysqli_query($conn,"SELECT fotosobre FROM sp_empresa ORDER BY id DESC LIMIT 1");
			// if (mysqli_num_rows($query) > 0) {
			// 	$r = mysqli_fetch_array($query,MYSQLI_ASSOC);
			// 	$fotosobre = $r['fotosobre'];
			// }
			$deleteall = mysqli_query($conn,"DELETE FROM sp_empresa");
			$query = mysqli_query($conn,"INSERT INTO sp_empresa (sobre,titulo,video,missao,visao,valores,capacita,transforma,fomenta,conecta,endereco) 
				VALUES ('$sobre','$titulo','$video','$missao','$visao','$valores','$capacita','$transforma','$fomenta','$conecta','$endereco')");
			if($query){
				// $id_tarefa = mysqli_insert_id($conn);

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

				<div class="small-12 columns">
					<label>Título: <small>Obrigatório</small>
						<input name="titulo" id="titulo" value="<?php echo $rEmrepsa['titulo'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
				</div>
				<div class="small-12 columns">
					<label>Sobre: <small>Obrigatório</small>
						<textarea name="sobre" placeholder="Sobre a empresa" required style="min-height: 100px;"><?php echo $rEmrepsa['sobre'] ?></textarea>
					</label>
					<small class="error">Preencha este campo.</small>
				</div>
				<div class="small-12 columns">
					<label>Missão: <small>Obrigatório</small>
						<input name="missao" id="missao" value="<?php echo $rEmrepsa['missao'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
				</div>
				<div class="small-12 columns">
					<label>Visão: <small>Obrigatório</small>
						<input name="visao" id="visao" value="<?php echo $rEmrepsa['visao'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
				</div>
				<div class="small-12 columns">
					<label>Valores: <small>Obrigatório</small>
						<input name="valores" id="valores" value="<?php echo $rEmrepsa['valores'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
				</div>
				<div class="small-12 columns">
					<label>Endereço: <small>Obrigatório</small>
						<input name="endereco" id="endereco" value="<?php echo $rEmrepsa['endereco'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
				</div>
				<div class="small-12 large-3 columns">
					<label>Vídeo (Código da URL do Vimeo): <small>Obrigatório</small>
						<input name="video" id="video" value="<?php echo $rEmrepsa['video'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
				</div>
				<!-- <div class="small-12 large-3 columns">
			    	<label>Adicionar foto:
						<input name="fotosobre" id="fotosobre" type="file">
					</label>
					<small class="error">Selecione um arquivo.</small>
					<?php if (file_exists('anexos/'.$rEmrepsa['fotosobre'])): ?>
						<a href="anexos/<?php echo $rEmrepsa['fotosobre'] ?>" target="_blank">
							<img src="anexos/<?php echo $rEmrepsa['fotosobre'] ?>" style="width: 200px;object-fit:cover;object-position:center;" />
						</a>
					<?php endif ?>
				</div> -->
				<div class="small-12 columns"><p><hr></p></div>

				<div class="small-12 columns">
					<label>Capacita: <small>Obrigatório</small>
						<input name="capacita" id="capacita" value="<?php echo $rEmrepsa['capacita'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
				</div>
				<div class="small-12 columns">
					<label>Transforma: <small>Obrigatório</small>
						<input name="transforma" id="transforma" value="<?php echo $rEmrepsa['transforma'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
				</div>
				<div class="small-12 columns">
					<label>Fomenta: <small>Obrigatório</small>
						<input name="fomenta" id="fomenta" value="<?php echo $rEmrepsa['fomenta'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
				</div>
				<div class="small-12 columns">
					<label>Conecta: <small>Obrigatório</small>
						<input name="conecta" id="conecta" value="<?php echo $rEmrepsa['conecta'] ?>" pattern="[a-zA-Z0-9]+" required type="text">
					</label>
					<small class="error">Preencha este campo corretamente.</small>
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