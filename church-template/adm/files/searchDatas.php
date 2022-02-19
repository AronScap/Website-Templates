<?php  
	include "../inc/conn.php";   
	function valida_campos($campo,$conn){
		return mysqli_real_escape_string($conn,htmlspecialchars($campo));
	} 
	if (!isset($_SESSION['tarefasuserid'])) {
		session_start();
	}
	$valor = valida_campos($_POST['valor'],$conn);
	switch ($_POST['page']) { 
		case 'logs':
			$sqqqsl = "SELECT sp_logs.ip,sp_logs.sql,sp_usuarios.nome,sp_logs.operacao,sp_logs.tabela_alterada,sp_logs.dados_antigos,sp_logs.data_cadastro 
			FROM sp_logs JOIN sp_usuarios ON sp_usuarios.id = sp_logs.id_usuario 
			WHERE sp_usuarios.nome LIKE '%{$valor}%' OR sp_logs.ip LIKE '%{$valor}%' OR sp_logs.tabela_alterada LIKE '%{$valor}%' OR sp_logs.operacao LIKE '%{$valor}%'  OR DATE_FORMAT(sp_logs.data_cadastro,'%d/%m/%Y (%H:%i)')  LIKE '%{$valor}%' 
			ORDER BY sp_logs.data_cadastro DESC";
			$q_armas = mysqli_query($conn,$sqqqsl);
			if (mysqli_num_rows($q_armas)) {?>
				<table>
					<thead>
					    <tr>
							<th style="width:10%">IP</th>
							<th>USUÁRIO</th> 
							<th>DATA</th> 
							<th>AÇÃO</th>
							<th>TABELA</th>
							<th>DADOS ANTIGOS</th>
							<th style="width:30%">SQL</th>
					    </tr>
					</thead>
					<tbody>
						<?php
							while($rowOrgao = mysqli_fetch_array($q_armas,MYSQLI_ASSOC)){  ?>  
								<tr>
									<td><?php echo $rowOrgao['ip'] ?></td>
									<td><?php  echo $rowOrgao['nome']; ?></td> 
									<td><?php echo date('d/m/Y (H:i)',strtotime($rowOrgao['data_cadastro'])); ?></td> 
									<td><?php echo $rowOrgao['operacao'] ?></td>
									<td><?php echo $rowOrgao['tabela_alterada'] ?></td>
									<td><?php echo $rowOrgao['dados_antigos'] ?></td>
									<td><?php echo $rowOrgao['sql'] ?></td>
								</tr> 			
								<?php 
							} 
						?>	 
					</tbody>
				</table>
				<?php 
			} 
			else{
				echo "<center>Nenhum dado encontrado!</center>";
			}
			break;
		case 'newsletter':
			$SDAASDSDA = "SELECT * FROM sp_newsletter
				WHERE email LIKE '%{$valor}%'
				ORDER BY email ASC
				LIMIT 200";
			$q_armas = mysqli_query($conn,$SDAASDSDA);
			if (mysqli_num_rows($q_armas)) {?>
				<table>
					<thead>
					    <tr>
							<th style="width:8%"></th>           
							<th style="">CADASTRO</th>        
							<th style="">NOME</th>         
							<th style="">E-MAIL</th>           
					    </tr>
					</thead>
					<tbody>
						<?php 
							while($rowOrgao = mysqli_fetch_array($q_armas,MYSQLI_ASSOC)){ 
								$idemaili = $rowOrgao['id']; ?>
								<div style="padding:20px;width: 35%;text-align:center;" id="delnewsletter<?php echo $idemaili ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
									<h5 id="modalTitle">Tem certeza que deseja excluir o banner: <br><?php echo $rowOrgao['email'] ?> ?</h5>
									<a href="inc/deleteData.php?id=<?php echo $idemaili ?>&tabela=sp_newsletter&volta=newsletter" style="color:white"><button class="excluirS">Excluir</button></a>
									<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
								</div>	 
								<tr>
									<td>
										<!-- <a style="background:#0077bd" class="div_add_person fa-pencil" href="?go=newsletter&edit=<?php echo $idemaili ?>"></a> -->
										<?php  
											$apaga = false;
											// $q_1 = mysqli_query($conn,"SELECT * FROM sp_turmas WHERE id_profissional = {$idemaili}");
											// if(mysqli_num_rows($q_1))$apaga = true;
											if ($apaga) { 	?>
												<a class="div_add_person fa fa-times" style="background:gray;cursor:no-drop; margin-left:5px;" title="Não é possível excluir"></a>											 
												<?php
											}	
											else{ 	?>
												<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delnewsletter<?php echo $idemaili ?>" title="Excluir"></a>											 
												<?php
											}
										?> 											 
									</td>     
									<td><?php if($rowOrgao['data'] != '0000-00-00')echo date('d/m/Y',strtotime($rowOrgao['data'])); ?></td>    
									<td><?php echo $rowOrgao['nome']; ?></td>    
									<td><?php echo $rowOrgao['email']; ?></td>    
								</tr>	
								<input id="idemaili" value="<?php echo $idemaili ?>" disabled type="hidden">
								<script type="text/javascript">
									$('a.closeprofissional').on('click', function() {
									  $('#delnewsletter'+$('#idemaili').val()).foundation('reveal', 'close');
									});
								</script>						
								<?php 
							} 
						?>	 
					</tbody>
				</table>
				<?php 
			} 
			else{
				echo "<center>Nenhum dado encontrado!</center>";
			}
			break;
		case 'produtos':
			$SDAASDSDA = "SELECT sp_produtos.*,sp_categorias.nome as categoria, IF(sp_produtos.estado_produto = 1,'USADO','NOVO') AS estado_produtoA, IF(sp_produtos.destaque = 'N','',IF(sp_produtos.destaque = 'S','Sim','')) AS DESTAQUEA FROM sp_produtos JOIN sp_categorias ON sp_categorias.id = sp_produtos.id_categoria 
				WHERE sp_produtos.nome LIKE '%{$valor}%'
				OR sp_produtos.marca LIKE '%{$valor}%'
				OR sp_produtos.ano LIKE '%{$valor}%'
				OR sp_categorias.nome LIKE '%{$valor}%'
				ORDER BY sp_produtos.nome ASC
				LIMIT 500";
			$q_armas = mysqli_query($conn,$SDAASDSDA);
			if (mysqli_num_rows($q_armas)) {?>
				<table>
					<thead>
					    <tr>
							<th style="width:8%"></th> 
							<th style="text-align: center;">FOTO</th>        
							<th style="">NOME - MARCA</th>        
							<th style="text-align: center;" class="show-for-large-up">CATEGORIA</th>        
							<th style="text-align: center;" class="show-for-large-up">ANO - ESTADO</th>        
							<th style="">VALOR (R$)</th>        
							<th style="text-align: center;" class="show-for-large-up">DESTAQUE</th>        
					    </tr>
					</thead>
					<tbody>
						<?php 
							while($rowOrgao = mysqli_fetch_array($q_armas,MYSQLI_ASSOC)){ 
								$idprodutoi = $rowOrgao['id']; ?>
								<div style="padding:20px;width: 35%;text-align:center;" id="delprodutos<?php echo $idprodutoi ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
									<h5 id="modalTitle">Tem certeza que deseja excluir o produto: <br><?php echo $rowOrgao['nome'] ?> ?</h5>
									<a href="inc/deleteData.php?id=<?php echo $idprodutoi ?>&tabela=sp_produtos&volta=produtos" style="color:white"><button class="excluirS">Excluir</button></a>
									<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
								</div>	 
								<tr>
									<td><!-- primeiro -->
										<a style="background:#0077bd" class="div_add_person fa-pencil" href="?go=produtos&edit=<?php echo $idprodutoi ?>"></a>
										<?php  
											$apaga = false;
											// $q_1 = mysqli_query($conn,"SELECT * FROM sp_turmas WHERE id_profissional = {$idprodutoi}");
											// if(mysqli_num_rows($q_1))$apaga = true;
											if ($apaga) { 	?>
												<a class="div_add_person fa fa-times" style="background:gray;cursor:no-drop; margin-left:5px;" title="Não é possível excluir"></a>											 
												<?php
											}	
											else{ 	?>
												<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delprodutos<?php echo $idprodutoi ?>" title="Excluir"></a>											 
												<?php
											}
										?> 											 
									</td>  
									<td style="text-align: center;"><!-- foto -->
										<?php 
											$sqlFotos = "SELECT * FROM sp_produtos_fotos WHERE id_produtos = '$idprodutoi' LIMIT 1";
											$qFotos = mysqli_query($conn,$sqlFotos);
											if (mysqli_num_rows($qFotos)) {
												$rFotos = mysqli_fetch_array($qFotos,MYSQLI_ASSOC);
												$arquivo = "anexos/".$rFotos['img'];
												if(file_exists($arquivo)){ ?>
													<img src='<?php echo $arquivo ?>' alt="<?php echo $rFotos['nome'] ?>" style="height:60px;">
													<?php
												} 
											}
										?>
									</td>    
									<td style="text-align: left;"><?php echo $rowOrgao['nome']."<br>".$rowOrgao['marca']; ?></td>    
									<td class="show-for-large-up"  style="text-align: center;"><?php echo $rowOrgao['categoria']; ?></td>    
									<td class="show-for-large-up"  style="text-align: center;"><?php echo $rowOrgao['ano']."<br>".$rowOrgao['estado_produtoA']; ?></td>    
									<td><?php echo "R$ ".number_format($rowOrgao['valor'],2,',','.'); ?></td>    
									<td class="show-for-large-up" style="text-align: center;"><?php echo $rowOrgao['DESTAQUEA']; ?></td>    
								</tr>	
								<input id="idprodutoi" value="<?php echo $idprodutoi ?>" disabled type="hidden">	 
								<script type="text/javascript">
									$('a.closeprofissional').on('click', function() {
									  $('#delprodutos'+$('#idprodutoi').val()).foundation('reveal', 'close');
									});
								</script>						
								<?php 
							} 
						?>	 
					</tbody>
				</table>
				<?php 
			} 
			else{
				echo "<center>Nenhum dado encontrado!</center>";
			}
			break;
		case 'categorias':
			$SDAASDSDA = "SELECT * FROM sp_categorias
				WHERE nome LIKE '%{$valor}%'  
				ORDER BY nome ASC
				LIMIT 200";
			$q_armas = mysqli_query($conn,$SDAASDSDA);
			if (mysqli_num_rows($q_armas)) {?>
				<table>
					<thead>
					    <tr>
							<th style="width:8%"></th> 
							<th style="">NOME</th>              
							<th style="">DESCRIÇÃO</th>           
					    </tr>
					</thead>
					<tbody>
						<?php 
							while($rowOrgao = mysqli_fetch_array($q_armas,MYSQLI_ASSOC)){ 
								$idcati = $rowOrgao['id']; ?>
								<div style="padding:20px;width: 35%;text-align:center;" id="delcategorias<?php echo $idcati ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
									<h5 id="modalTitle">Tem certeza que deseja excluir o banner: <br><?php echo $rowOrgao['nome'] ?> ?</h5>
									<a href="inc/deleteData.php?id=<?php echo $idcati ?>&tabela=sp_categorias&volta=categorias" style="color:white"><button class="excluirS">Excluir</button></a>
									<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
								</div>	 
								<tr>
									<td>
										<a style="background:#0077bd" class="div_add_person fa-pencil" href="?go=categorias&edit=<?php echo $idcati ?>"></a>
										<?php  
											$apaga = false;
											$q_1 = mysqli_query($conn,"SELECT * FROM sp_produtos WHERE id_categoria = {$idcati}");
											if(mysqli_num_rows($q_1))$apaga = true;
											if ($apaga) { 	?>
												<a class="div_add_person fa fa-times" style="background:gray;cursor:no-drop; margin-left:5px;" title="Não é possível excluir"></a>											 
												<?php
											}	
											else{ 	?>
												<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delcategorias<?php echo $idcati ?>" title="Excluir"></a>											 
												<?php
											}
										?> 											 
									</td>   
									<td style="text-align: left;"><?php echo $rowOrgao['nome']; ?></td>    
									<td><?php echo $rowOrgao['Descricao']; ?></td>    
								</tr>	
								<input id="idcati" value="<?php echo $idcati ?>" disabled type="hidden">	 
								<script type="text/javascript">
									$('a.closeprofissional').on('click', function() {
									  $('#delcategorias'+$('#idcati').val()).foundation('reveal', 'close');
									});
								</script>						
								<?php 
							} 
						?>	 
					</tbody>
				</table>
				<?php 
			} 
			else{
				echo "<center>Nenhum dado encontrado!</center>";
			}
			break;
		case 'banners':
			$SDAASDSDA = "SELECT * FROM sp_banners
				WHERE titulo LIKE '%{$valor}%' 
					OR subtitulo LIKE '%{$valor}%' 
				ORDER BY titulo ASC
				LIMIT 200";
			$q_armas = mysqli_query($conn,$SDAASDSDA);
			if (mysqli_num_rows($q_armas)) {?>
				<table>
					<thead>
					    <tr>
							<th style="width:8%"></th> 
							<th style="">ANEXO</th>        
							<th style="text-align: center;">TÍTULO - SUBTÍTULO</th>        
							<th style="">LINK</th>           
					    </tr>
					</thead>
					<tbody>
						<?php 
							while($rowOrgao = mysqli_fetch_array($q_armas,MYSQLI_ASSOC)){ 
								$idbanneri = $rowOrgao['id']; ?>
								<div style="padding:20px;width: 35%;text-align:center;" id="delbanners<?php echo $idbanneri ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
									<h5 id="modalTitle">Tem certeza que deseja excluir o banner: <br><?php echo $rowOrgao['titulo'] ?> ?</h5>
									<a href="inc/deleteData.php?id=<?php echo $idbanneri ?>&tabela=sp_banners&volta=banners" style="color:white"><button class="excluirS">Excluir</button></a>
									<a class="closeprofissional" style="color:white"><button style='background:#0077bd;'>Cancelar</button></a>
								</div>	 
								<tr>
									<td>
										<!-- <a style="background:#0077bd" class="div_add_person fa-pencil" href="?go=banners&edit=<?php echo $idbanneri ?>"></a> -->
										<?php  
											$apaga = false;
											// $q_1 = mysqli_query($conn,"SELECT * FROM sp_turmas WHERE id_profissional = {$idbanneri}");
											// if(mysqli_num_rows($q_1))$apaga = true;
											if ($apaga) { 	?>
												<a class="div_add_person fa fa-times" style="background:gray;cursor:no-drop; margin-left:5px;" title="Não é possível excluir"></a>											 
												<?php
											}	
											else{ 	?>
												<a class="div_add_person fa fa-times" style=" margin-left:5px;" data-reveal-id="delbanners<?php echo $idbanneri ?>" title="Excluir"></a>											 
												<?php
											}
										?> 											 
									</td>  
									<td><img src='anexos/<?php echo $rowOrgao['anexo']; ?>')' alt="<?php echo $rowOrgao['titulo'] ?>" style="height:60px;"></td>    
									<td style="text-align: center;"><?php echo $rowOrgao['titulo']."<br>".$rowOrgao['subtitulo']; ?></td>    
									<td><?php echo $rowOrgao['link']; ?></td>    
								</tr>	
								<input id="idbanneri" value="<?php echo $idbanneri ?>" disabled type="hidden">	 
								<script type="text/javascript">
									$('a.closeprofissional').on('click', function() {
									  $('#delbanners'+$('#idbanneri').val()).foundation('reveal', 'close');
									});
								</script>						
								<?php 
							} 
						?>	 
					</tbody>
				</table>
				<?php 
			} 
			else{
				echo "<center>Nenhum dado encontrado!</center>";
			}
			break;
		default:
			break;
	}
		
?>