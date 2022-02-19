<?php ob_start();   
	error_reporting(1);
	include "inc/topo.php"; 
	include "inc/verificasessao.php"; 
	$id_user = md5_decrypt($_SESSION['ECuserid'],$CHAVE_ACESSO);
	$query_user = mysqli_query($conn,"SELECT * FROM sp_usuarios WHERE id=".$id_user);
		$user = mysqli_fetch_array($query_user,MYSQLI_ASSOC);  ?>
		<style type="text/css">body{ background:white!important; }</style> 
		<div class="bar-top show-for-large-up" style="height:65px;background:#142536;">	
			<div class="small-12 large-2 columns" style="padding-left: 0px;height: 100%;"><a href="index.php"><img src="../img/logo.png" class="logo" style="height:100%;"></a></div> 
			<div class="small-12 large-10 columns" style="text-align:center; font-size:14px;">
				<?php echo "<i style='font-size:11px;color:white;'>Version ".$VERSAO."</i>"; ?>
				<a href="logout.php" style="float:right; margin-left:20px; color:#fff">Sair <i class="fa fa-sign-out"></i></a>
				<?php				 
				$saddsa = mysqli_query($conn,"SELECT * FROM sp_usuarios WHERE id = ".md5_decrypt($_SESSION['ECuserid'],$CHAVE_ACESSO));
				$uasdas = mysqli_fetch_array($saddsa,MYSQLI_ASSOC); 
			 	$usuariosP = false;
				$query_user_papel = mysqli_query($conn,"SELECT * FROM sp_usuarios JOIN sp_papeis ON sp_usuarios.id_papel = sp_papeis.id WHERE sp_usuarios.id=".md5_decrypt($_SESSION['ECuserid'],$CHAVE_ACESSO));
				$user_papel = mysqli_fetch_array($query_user_papel,MYSQLI_ASSOC);
				$explodeP = explode('|#|',$user_papel['permissoes'] );
				foreach ($explodeP as $key => $value) {
					switch ($value) {
						case 'usuarios':
							$usuariosP = true;
							break; 
					}
				}
			 	?>
				<p style="float:right; margin-right:20px!important; font-size:14px; display:table;color:white;">Bem vindo <?php if($usuariosP){ ?><a href="?go=usuarios&edit=<?php echo $uasdas['id'] ?>"><b><?php echo ucwords($uasdas['nome']); ?> <i class="fa fa-cog"></i></b></a> <?php }else echo "<b>".ucwords($uasdas['nome'])."</b>";  ?></p>
			</div>
		</div> 
		<?php include "inc/menu1.php"; ?>
		<div style="padding-top:65px;">	
			<div class="small-12 columns show-for-medium-down"><a href="index.php"><img src="../img/logo.png" style="width:100%;" class="logo"></a><hr></div>
			<div class="small-12 large-10 columns" style="float:right;   height: 100%;">
				<script type="text/javascript">
					$(document).ready(function() {
						var switched = false;
						var updateTables = function() {
						    if (($(window).width() < 767) && !switched ){
						      switched = true;
						      $("table.responsive").each(function(i, element) {
						        splitTable($(element));
						      });
						      return true;
						    }
						    else if (switched && ($(window).width() > 767)) {
						      switched = false;
						      $("table.responsive").each(function(i, element) {
						        unsplitTable($(element));
						      });
						    }
						};
					   
						$(window).load(updateTables);
						$(window).on("redraw",function(){switched=false;updateTables();}); // An event to listen for
						$(window).on("resize", updateTables); 
						function splitTable(original)
						{
							original.wrap("<div class='table-wrapper' />");
							
							var copy = original.clone();
							copy.find("td:not(:first-child), th:not(:first-child)").css("display", "none");
							copy.removeClass("responsive");
							
							original.closest(".table-wrapper").append(copy);
							copy.wrap("<div class='pinned' />");
							original.wrap("<div class='scrollable' />");

					    	setCellHeights(original, copy);
						}
						
						function unsplitTable(original) {
					    original.closest(".table-wrapper").find(".pinned").remove();
					    original.unwrap();
					    original.unwrap();
						}

					  function setCellHeights(original, copy) {
					    var tr = original.find('tr'),
					        tr_copy = copy.find('tr'),
					        heights = [];

					    tr.each(function (index) {
					      var self = $(this),
					          tx = self.find('th, td');

					      tx.each(function () {
					        var height = $(this).outerHeight(true);
					        heights[index] = heights[index] || 0;
					        if (height > heights[index]) heights[index] = height;
					      });

					    });

					    tr_copy.each(function (index) {
					      $(this).height(heights[index]);
					    });
					  }

					});
				</script>
				<style type="text/css"> 
					table th { font-weight: bold; }
					table td, table th { padding: 9px 10px; text-align: left; }

					/* Mobile */
					@media only screen and (max-width: 767px) {
						
						table.responsive { margin-bottom: 0; }
						
						.pinned { position: absolute; left: 0; top: 0; background: #fff; width: 12%; overflow: hidden; overflow-x: scroll; border-right: 1px solid #ccc; border-left: 1px solid #ccc; }
						.pinned table { border-right: none; border-left: none; width: 100%; }
						.pinned table th, .pinned table td { white-space: nowrap; }
						.pinned td:last-child { border-bottom: 0; }
						
						div.table-wrapper { position: relative; margin-bottom: 20px; overflow: hidden; border-right: 1px solid #ccc;width: 70%; }
						div.table-wrapper div.scrollable { margin-left: 12%; }
						div.table-wrapper div.scrollable { overflow: scroll; overflow-y: hidden; }	
						
						table.responsive td, table.responsive th { position: relative; white-space: nowrap; overflow: hidden; }
						table.responsive th:first-child, table.responsive td:first-child, table.responsive td:first-child, table.responsive.pinned td { display: none; }
						
						
					}
				</style> 
				<?php  
			        if(isset($_GET['go']))
			          $filename = 'files/'.$_GET['go'].'.php';
			        else
			          $filename = 'files/inicial.php';

			        if (file_exists($filename)) {
			            include $filename;
			        } else {
			            include "404.php";
			        }
			    ?>
			</div>
		</div> 
<?php include 'inc/rodape.php'; ?>