<?php 
	include "inc/topo.php";  
?>
<div class="row" style="position:relative;z-index:9999; padding-top:100px;"> 
	<div class="small-10 large-7 small-centered columns"> 
	  	<form action="validacao.php" method="post">
			<fieldset style="margin-top:0px; border:none">	
				<div class="small-12 small-centered columns" style="text-align:center;margin-top:5px;margin-bottom:20px;">
					<img src="../img/logo.png" style="max-width:100%;" alt="">
				</div>			
				<div class="small-12 small-centered columns">
					<label for="txUsuario" style="color:white;">Usuário</label>
					<input type="text" name="usuario" id="txUsuario" />
					<label for="txSenha" style="color:white;">Senha</label>
					<input type="password" name="senha" id="txSenha" /> 
				</div>	
				<div class="small-12 large-3 columns">
					<input type="submit" class="button" value="Entrar" style="padding: 1rem 2rem 1.0625rem 2rem!important;display: inline-block;height: 50px!important;" />
				</div> 
				<div style="position:absolute; bottom:10px; right:30px;"><i style="font-size:12px;">Versão <?php echo $VERSAO ?></i></div>
			</fieldset>
		</form>
	</div>  
</div> 
<?php include 'inc/rodape.php'; ?>