 
<?php 
	// include "inc/verificasessao.php"; 
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
	if(isset($_GET['go']) && valida_campos($_GET['go'],$conn) == 'gerais'){ 
		if (isset($_GET['validainsert'])) {
			$telefone 			= valida_campos($_POST['telefone'],$conn);
			$instagram 			= valida_campos($_POST['instagram'],$conn);
			$facebook 			= valida_campos($_POST['facebook'],$conn);
			$titulobanner 		= valida_campos($_POST['titulobanner'],$conn);
			$subtitulobanner 	= valida_campos($_POST['subtitulobanner'],$conn);
			$youtube 			= valida_campos($_POST['youtube'],$conn);
			$email 				= valida_campos($_POST['email'],$conn);
			// $query 				= mysqli_query($conn,"SELECT imagemfundobanner FROM sp_gerais ORDER BY id DESC LIMIT 1");
			// if (mysqli_num_rows($query) > 0) {
			// 	$r = mysqli_fetch_array($query,MYSQLI_ASSOC);
			// 	$imagemfundobanner 	= $r['imagemfundobanner']; 
			// }
			$deleteall = mysqli_query($conn,"DELETE FROM sp_gerais");
			$query = mysqli_query($conn,"INSERT INTO sp_gerais (email,telefone,titulobanner,subtitulobanner,instagram,facebook,youtube) 
				VALUES ('$email','$telefone','$titulobanner','$subtitulobanner','$instagram','$facebook','$youtube')");
			if($query){
				$id_tarefa = mysqli_insert_id($conn);
				 
				include "inc/salvo.php";
				echo "<script>setTimeout('gerais()', 400);</script>";
			}
			else{ ?>
				<center>
					<h5 id="modalTitle" style="color:rgb(237,50,55);">Erro ao salvar!<br>Tente novamente mais tarde.</h5><br>
					<a class="close button" href="index.php?go=gerais" aria-label="Close">Voltar</a>
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
				<a href="?go=gerais" style="color:#008CBA;">CADASTROS GERAIS</a>
			</legend> 
			<?php  
				$sqlgerais = mysqli_query($conn,"SELECT * FROM sp_gerais");
				$rEmrepsa = mysqli_fetch_array($sqlgerais,MYSQLI_ASSOC);
			?>
			<form data-abide action="?go=gerais&validainsert" method="POST" enctype="multipart/form-data">
				
				<div class="small-12 large-3 columns">
					<label>Facebook:
						<input name="facebook" id="facebook" value="<?php echo $rEmrepsa['facebook'] ?>" pattern="[a-zA-Z0-9]+" type="text">
					</label>
					<small class="error">Preencha este campo.</small>
				</div>
				<div class="small-12 large-3 columns">
					<label>Instagram:
						<input name="instagram" id="instagram" value="<?php echo $rEmrepsa['instagram'] ?>" pattern="[a-zA-Z0-9]+" type="text">
					</label>
					<small class="error">Preencha este campo.</small>
				</div>
				<div class="small-12 large-3 columns">
					<label>Youtube:
						<input name="youtube" id="youtube" value="<?php echo $rEmrepsa['youtube'] ?>" pattern="[a-zA-Z0-9]+" type="text">
					</label>
					<small class="error">Preencha este campo.</small>
				</div>
				<div class="small-12 large-3 columns">
					<label>Telefone/Whatsapp:
						<input name="telefone" id="telefone" value="<?php echo $rEmrepsa['telefone'] ?>" onkeypress="mascara(this,mtel)" maxlength="15" pattern="[0-9]+"  type="text">
					</label>
					<small class="error">Preencha este campo.</small>
				</div>
				<div class="small-12 columns"><p></p></div>
				<div class="small-12 large-6 columns">
					<label>E-mail:
						<input name="email" id="email" value='<?php echo ($rEmrepsa['email']) ?>' style="width:100%;" />
					</label>
				</div>
				<div class="small-12 columns"><hr><br /></div>
				
				<!-- <div class="small-12 large-6 columns">
					<label>Título Cabeçalho Página Inicial:
						<input name="titulobanner" id="titulobanner" required value="<?php echo $rEmrepsa['titulobanner'] ?>" pattern="[a-zA-Z0-9]+" type="text">
					</label>
					<small class="error">Preencha este campo.</small>
				</div>
				<div class="small-12 large-6 columns">
					<label>Sub-título Cabeçalho Página Inicial:
						<input name="subtitulobanner" id="subtitulobanner" required value="<?php echo $rEmrepsa['subtitulobanner'] ?>" pattern="[a-zA-Z0-9]+" type="text">
					</label>
					<small class="error">Preencha este campo.</small>
				</div> -->
				<!-- <div class="small-12 large-3 columns">
			    	<label>Adicionar imagem de fundo na Home (BANNER INICIAL):
						<input name="imagemfundobanner" id="imagemfundobanner" type="file">
					</label>
					<small class="error">Selecione um arquivo.</small>
					<?php if ($rEmrepsa['imagemfundobanner'] != '' && file_exists('anexos/'.$rEmrepsa['imagemfundobanner'])): ?>
						<a href="anexos/<?php echo $rEmrepsa['imagemfundobanner'] ?>" target="_blank">
							<img src="anexos/<?php echo $rEmrepsa['imagemfundobanner'] ?>" height="100" style="width:100%;object-fit:cover;object-position:center;" />
						</a>
					<?php endif ?>
				</div> -->
				
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
					page:'gerais'
				}, function(retorno){
					saida.html(retorno);
				});
	        } 
	    }, DURACAO_DIGITACAO); 
	} 
</script> 