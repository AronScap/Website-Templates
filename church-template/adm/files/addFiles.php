<?php  
	include "../inc/topo.php"; 
	function valida_campos($campo,$conn){
		return mysqli_real_escape_string($conn,htmlspecialchars($campo));
	}
	$page = valida_campos($_POST['page'],$conn);
	switch ($page) {
		case 'insertText':
			?>
			<div class="small-4 columns">
				<label> 
					<input type="text" name="opcoes[]">
				</label>
			</div>
			<?php
			break;
		case 'insertobras':
			?>
			<div class="small-4 columns">
				<label>
					<select name="opcoes[]">
						<option value="">Selecione uma opção</option>
						<?php  
							$queryempreendimento = mysqli_query($conn,"SELECT * FROM sp_empreendimentos");
							while ($rempreendimento = mysqli_fetch_array($queryempreendimento,MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $rempreendimento['id'] ?>"><?php echo $rempreendimento['titulo'] ?></option>
								<?php
							}
						?>
					</select>
				</label>
			</div>
			<?php
			break;
		
		default:
			# code...
			break;
	}
?>