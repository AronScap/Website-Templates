<?php  
	include "topo.php"; 
	include "verificasessao.php";
	function valida_campos($campo,$conn){
		return mysqli_real_escape_string($conn,htmlspecialchars($campo));
	} 
	if (isset($_GET['id']) && isset($_GET['tabela']) && $_GET['volta']) { 
		$id = valida_campos($_GET['id'],$conn);
		$tabela = valida_campos($_GET['tabela'],$conn);
		$volta = valida_campos($_GET['volta'],$conn); 
		if (isset($_GET['id_volta']) && $_GET['id_volta']!='') {
			$id_volta = valida_campos($_GET['id_volta'],$conn);
		} 
		if ($_GET['id'] == '') {
			if(isset($_GET['id_volta'])){ 
				echo "<script>setTimeout('".$volta."(".$id_volta.")', 400);</script>";
			} 
			else echo "<script>setTimeout('{$volta}()', 400);</script>";
			exit;
		}
		// SELECIONA DADOS A SEREM EXCLUIDOS
			if($tabela == 'sp_time'){
				$s_documento = mysqli_query($conn,"SELECT foto FROM sp_time WHERE id = ".$id);
				$r_documento = mysqli_fetch_array($s_documento,MYSQLI_ASSOC);
				$exclusao = $r_documento['foto'];
			}
			if($tabela == 'sp_portfolio'){
				$s_documento = mysqli_query($conn,"SELECT foto FROM sp_portfolio WHERE id = ".$id);
				$r_documento = mysqli_fetch_array($s_documento,MYSQLI_ASSOC);
				$exclusao = $r_documento['foto'];
			}
			if($tabela == 'sp_parceiros'){
				$s_documento = mysqli_query($conn,"SELECT img FROM sp_parceiros WHERE id = ".$id);
				$r_documento = mysqli_fetch_array($s_documento,MYSQLI_ASSOC);
				$exclusao = $r_documento['img'];
			}
		$delete = "DELETE FROM `$tabela` WHERE `id` = ".$id;  
		$qDele = mysqli_query($conn,$delete);
		if($qDele){ 
			if($tabela == 'sp_time' || $tabela == 'sp_parceiros' || $tabela == 'sp_portfolio'){ 
				$pasta = '../anexos/'; 
				$arquivo = $pasta.$exclusao;
				if(file_exists($arquivo)){
					unlink($arquivo);
				}
			}  
			include "salvo.php";    
			if(isset($_GET['id_volta'])){ 
				echo "<script>setTimeout('".$volta."(".$id_volta.")', 400);</script>";
			} 
			else echo "<script>setTimeout('{$volta}()', 400);</script>";
		}
		else{ 
			?> 
			<center>
				<div class="reveal-modal-bg" style="display: block;"></div>
				<div id="enviarModal12" class="reveal-modal open" data-reveal="" aria-labelledby="modalTitle" aria-hidden="false" role="dialog" style="display: block; opacity: 1; visibility: visible; top: 100px;width:25%; text-align:center;" tabindex="0">
					<h5 id="modalTitle" style="color:rgb(237,50,55);">Não é permitido excluir!</h5><br>
					<a class="close button" href="../index.php?go=<?php echo $volta ?>" aria-label="Close">Voltar</a>
				</div>
			</center>
			<?php  
		}
	}
?>
