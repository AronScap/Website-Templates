<script type="text/javascript">
window.location.href="?go=gerais";</script>
<?php  
exit;
	include "inc/verificasessao.php"; 
	include "inc/mask.php"; 
	// $ano = date('Y');
	$sclientes = "SELECT count(id) as count FROM sp_newsletter";
	$qclientes = mysqli_query($conn,$sclientes);
	$rclientes = mysqli_fetch_array($qclientes,MYSQLI_ASSOC);
	$numNewsletter = $rclientes['count'];  
 
	$stestetiro = "SELECT count(id) as count FROM sp_portfolio";
	$qtestetiro = mysqli_query($conn,$stestetiro);
	$rTarefas = mysqli_fetch_array($qtestetiro,MYSQLI_ASSOC);
	$numTarefas = $rTarefas['count'];

	$stestetiro = "SELECT count(id) as count FROM sp_categorias";
	$qtestetiro = mysqli_query($conn,$stestetiro);
	$rTarefas = mysqli_fetch_array($qtestetiro,MYSQLI_ASSOC);
	$numTarefasFinalizados = $rTarefas['count']; 

	$stestetiro = "SELECT count(id) as count FROM sp_parceiros";
	$qtestetiro = mysqli_query($conn,$stestetiro);
	$rTarefas = mysqli_fetch_array($qtestetiro,MYSQLI_ASSOC);
	$numParceiros = $rTarefas['count']; 
?>
<fieldset>
	<legend>
		<i class="fa fa-bar-chart" style="color:rgb(237,50,55);"></i>
		<a href="index.php" style="color:#008CBA;">DADOS GERAIS</a>  
		<!-- <i class="fa fa-angle-double-right" style="color:rgb(237,50,55);"></i> -->
		<!-- <a href="#" style="color:#555;font-weight:normal; cursor:default;"><?php echo $ano ?></a> -->
	</legend>
	<!-- <div class="row"> -->   
		<a href="?go=newsletter" class="aopacity">
			<div class="small-12 large-4 columns end" style="margin-bottom:10px;">
				<div class="aopacity" style="border:solid 2px lightgray;border-radius:5px; padding:5px;display:table;width:100%;">
					<i class="fa fa-address-card" style="font-size:50px;color:rgb(237,50,55); float:left;display:table;margin-right: 10px;"></i>
					<div style="float:left;display:table;color:gray;font-size:20px; ">
						<i style="font-size:30px;float: left;margin-right: 5px;"><?php echo $numNewsletter ?></i>
						Contatos
					</div>
				</div>
			</div> 
		</a>  
		<a href="?go=categorias" class="aopacity">
			<div class="small-12 large-4 columns end" style="margin-bottom:10px;">
				<div class="aopacity" style="border:solid 2px lightgray;border-radius:5px; padding:5px;display:table;width:100%;">
					<i class="fa fa-cubes" style="font-size:50px;color:rgb(237,50,55); float:left;display:table;margin-right: 10px;"></i>
					<div style="float:left;display:table;color:gray;font-size:20px; ">
						<i style="font-size:30px;float: left;margin-right: 5px;"><?php echo $numTarefasFinalizados ?></i>
						Categorias
					</div>
				</div>
			</div> 
		</a>    
		<a href="?go=portfolio" class="aopacity">
			<div class="small-12 large-4 columns end" style="margin-bottom:10px;">
				<div class="aopacity" style="border:solid 2px lightgray;border-radius:5px; padding:5px;display:table;width:100%;">
					<i class="fa fa-laptop" style="font-size:50px;color:rgb(237,50,55); float:left;display:table;margin-right: 10px;"></i>
					<div style="float:left;display:table;color:gray;font-size:20px; ">
						<i style="font-size:30px;float: left;margin-right: 5px;"><?php echo $numTarefas ?></i>
						Portfólio
					</div>
				</div>
			</div> 
		</a>    
		<div class="small-12 columns"><p><br></p></div>  
		<a href="?go=parceiros" class="aopacity">
			<div class="small-12 large-4 columns end" style="margin-bottom:10px;">
				<div class="aopacity" style="border:solid 2px lightgray;border-radius:5px; padding:5px;display:table;width:100%;">
					<i class="fa fa-users" style="font-size:50px;color:rgb(237,50,55); float:left;display:table;margin-right: 10px;"></i>
					<div style="float:left;display:table;color:gray;font-size:20px; ">
						<i style="font-size:30px;float: left;margin-right: 5px;"><?php echo $numParceiros ?></i>
						Parceiros
					</div>
				</div>
			</div> 
		</a>    
	<!-- </div>  -->
</fieldset> 