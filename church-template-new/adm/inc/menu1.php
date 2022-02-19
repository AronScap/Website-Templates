<script type="text/javascript">
	function change(id){ 
		if(document.getElementById(id).teste == '1'){  
			document.getElementById(id).className = 'fa fa-caret-right';
			document.getElementById(id).teste = '0';
		}
		else{ 
			document.getElementById(id).className = 'fa fa-caret-down';
			document.getElementById(id).teste = '1';
		}
	} 
	function change2(id){  
		if(document.getElementById(id).teste == '0'){  
			document.getElementById(id).className = 'fa fa-caret-down';
			document.getElementById(id).teste = '1';
		}
		else{	
			document.getElementById(id).className = 'fa fa-caret-right';
			document.getElementById(id).teste = '0';
		}
	}   
</script>  
<!-- versão PC -->
	<div class="show-for-large-up small-2 menu-left" style="overflow:auto; margin-top:65px;">
		<div class="row">
			<div class="small-12"> 
				
			 	<ul class="accordion act "  >  	
					<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'gerais')): ?> active <?php endif ?>" >
					    <a href="?go=gerais" title="Cadastros Gerais" style="<?php if (isset($_GET['go']) && $_GET['go']=='gerais'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
					    	<i class="fa fa-briefcase" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='gerais'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
					    	Cadastros gerais
						</a>  
					</li>
				</ul> 
				<ul class="accordion act "  >  	
					<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'equipe')): ?> active <?php endif ?>" >
					    <a href="?go=equipe" title="" style="<?php if (isset($_GET['go']) && $_GET['go']=='equipe'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
					    	<i class="fa fa-cubes" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='equipe'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
					    	Pastores
						</a>
					</li>
				</ul>
				<ul class="accordion act "  >  	
					<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'ministracoes')): ?> active <?php endif ?>" >
					    <a href="?go=ministracoes" title="" style="<?php if (isset($_GET['go']) && $_GET['go']=='ministracoes'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
					    	<i class="fa fa-cubes" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='ministracoes'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
					    	Ministrações
						</a>
					</li>
				</ul>
				<ul class="accordion act "  >  	
					<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'eventos')): ?> active <?php endif ?>" >
					    <a href="?go=eventos" title="" style="<?php if (isset($_GET['go']) && $_GET['go']=='eventos'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
					    	<i class="fa fa-cubes" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='eventos'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
					    	Eventos
						</a>
					</li>
				</ul>
				<ul class="accordion act "  >  	
					<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'banners')): ?> active <?php endif ?>" >
					    <a href="?go=banners" title="" style="<?php if (isset($_GET['go']) && $_GET['go']=='banners'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
					    	<i class="fa fa-image" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='banners'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
					    	Banners
						</a>
					</li>
				</ul>
				<!-- cadastros -->
					<!-- <ul class="accordion act" data-accordion >  	
						<li class="accordion-navigation" <?php if (isset($_GET['go']) && ($_GET['go'] == 'servicos' || $_GET['go'] == 'striverclube' || $_GET['go'] == 'tiposdeplanos' || $_GET['go'] == 'empresa' || $_GET['go'] == 'planos')): ?> active <?php endif ?>>
						    <a href="#panel3aasd" <?php if (isset($_GET['go']) && ($_GET['go'] == 'servicos' || $_GET['go'] == 'striverclube' || $_GET['go'] == 'tiposdeplanos' || $_GET['go'] == 'empresa' || $_GET['go'] == 'planos')){ ?> onclick="change2('setinha123')" <?php }else{ ?> onclick="change('setinha123')" <?php } ?>> 
						    	<i class="fa fa-pencil-square-o" style="color:#333;"></i>
						    	Produtos/Serviços
						    	<i id="setinha123" <?php if (isset($_GET['go']) && ($_GET['go'] == 'servicos' || $_GET['go'] == 'striverclube' || $_GET['go'] == 'tiposdeplanos' || $_GET['go'] == 'empresa' || $_GET['go'] == 'planos')){ ?> class="fa fa-caret-down" teste="0" <?php }else{ ?> class="fa fa-caret-right" teste="1"<?php } ?> style="float:right;display:table; margin-top:5px;"></i>
							</a> 
						    <div id="panel3aasd" class="content <?php if (isset($_GET['go']) && ($_GET['go'] == 'servicos' || $_GET['go'] == 'striverclube' || $_GET['go'] == 'tiposdeplanos' || $_GET['go'] == 'empresa' || $_GET['go'] == 'planos')): ?> active <?php endif ?>" style="padding-left:30px;">
						    	<ul> 
						    		<li>
						    			<a title="" style="color:#222;<?php if (isset($_GET['go']) && $_GET['go']=='servicos'): ?>font-weight:bold;color:#008CBA; <?php endif ?>font-size:14px; " href="?go=servicos">
						    				<i class="fa fa-laptop"  style="font-size:16px;<?php if (isset($_GET['go']) && $_GET['go']=='servicos'): ?>color:rgb(237,50,55);<?php endif ?>"></i>
						    				Serviços
						    			</a>
						    		</li> 
						    		<li>
						    			<a title="" style="color:#222;<?php if (isset($_GET['go']) && $_GET['go']=='striverclube'): ?>font-weight:bold;color:#008CBA; <?php endif ?>font-size:14px; " href="?go=striverclube">
						    				<i class="fa fa-handshake-o"  style="font-size:16px;<?php if (isset($_GET['go']) && $_GET['go']=='striverclube'): ?>color:rgb(237,50,55);<?php endif ?>"></i>
						    				Striver Club
						    			</a>
						    		</li>
						    		<li>
						    			<a style="color:#222;<?php if (isset($_GET['go']) && $_GET['go']=='planos'): ?>font-weight:bold;color:#008CBA; <?php endif ?>font-size:14px; " href="?go=planos">
						    				<i class="fa fa-cubes"  style="font-size:16px;<?php if (isset($_GET['go']) && $_GET['go']=='planos'): ?>color:rgb(237,50,55);<?php endif ?>"></i>
						    				Nossos planos
						    			</a>
						    		</li> 
						    		<li>
						    			<a style="color:#222;<?php if (isset($_GET['go']) && $_GET['go']=='tiposdeplanos'): ?>font-weight:bold;color:#008CBA; <?php endif ?>font-size:14px; " href="?go=tiposdeplanos">
						    				<i class="fa fa-cubes"  style="font-size:16px;<?php if (isset($_GET['go']) && $_GET['go']=='tiposdeplanos'): ?>color:rgb(237,50,55);<?php endif ?>"></i>
						    				Tipos de planos
						    			</a>
						    		</li>  
						    	</ul>
						    </div>
						</li>
					</ul>  -->
				<!-- blog -->
					<!-- <ul class="accordion act "  >  	
						<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'empresa')): ?> active <?php endif ?>" >
						    <a href="?go=empresa" title="" style="<?php if (isset($_GET['go']) && $_GET['go']=='empresa'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
						    	<i class="fa fa-home" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='empresa'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
						    	Quem Somos
							</a>  
						</li>
					</ul> 
					<ul class="accordion act "  >  	
						<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'blog')): ?> active <?php endif ?>" >
						    <a href="?go=blog" title="Newsletter" style="<?php if (isset($_GET['go']) && $_GET['go']=='blog'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
						    	<i class="fa fa-newspaper-o" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='blog'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
						    	Blog/Notícias
							</a>  
						</li>
					</ul>  -->
				<!-- portfolio -->
					<!-- <ul class="accordion act "  >  	
						<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'servicos')): ?> active <?php endif ?>" >
						    <a href="?go=servicos" title="Newsletter" style="<?php if (isset($_GET['go']) && $_GET['go']=='servicos'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
						    	<i class="fa fa-laptop" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='servicos'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
						    	Produtos/Serviços
							</a>  
						</li>
					</ul> -->
					
					<!-- <ul class="accordion act "  >  	
						<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'depoimentos')): ?> active <?php endif ?>" >
						    <a href="?go=depoimentos" title="" style="<?php if (isset($_GET['go']) && $_GET['go']=='depoimentos'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
						    	<i class="fa fa-cubes" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='depoimentos'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
						    	Depoimentos
							</a>
						</li>
					</ul>
					<ul class="accordion act "  >  	
						<li class="accordion-navigation<?php if (isset($_GET['go']) && ($_GET['go'] == 'newsletter')): ?> active <?php endif ?>" >
						    <a href="?go=newsletter" title="Newsletter" style="<?php if (isset($_GET['go']) && $_GET['go']=='newsletter'): ?>font-weight:bold;color:#008CBA; <?php endif ?>"> 
						    	<i class="fa fa-list-ul" style="color:#333;<?php if (isset($_GET['go']) && $_GET['go']=='newsletter'): ?>font-weight:bold;color:rgb(237,50,55); <?php endif ?>"></i>
						    	Contatos | Newsletter
							</a>
						</li>
					</ul>  -->
				<!-- sair -->
					<ul class="accordion act "  >  	
						<li class="accordion-navigation  " >
						    <a href="logout.php" title="Sair"> 
						    	<i class="fa fa-sign-out" style="color:#333;"></i>
						    	Sair
							</a>  
						</li>
					</ul>   
			</div>
		</div>	 
	</div>
<!-- versão celular -->
	<div class="show-for-medium-down">
		<div class="contain-to-grid">  
		    <nav class="top-bar" data-topbar>
		        <ul class="title-area">
		            <li class="name"></li>
		            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		        </ul>
		        <section class="top-bar-section"> 
		            <ul class="right"> 
		            	<li class="">
		                    <a href="?go=inicial"><i class="fa fa-home" style="color:#fff;"></i> Início</a> 
		                </li>  
	                	<li>
		                    <a href="?go=banners"><i class="fa fa-image" style="color:#fff;"></i> Banners</a> 
		                </li> 
		                <li class="has-dropdown not-click moved">
		                    <a href="#"><i class="fa fa-pencil-square-o" style="color:#fff;"></i> Cadastros</a>	                    
		                    <ul class="dropdown left">
		                    	<li class="title back js-generated">
		                    		<h5><a href="javascript:void(0)">Voltar</a></h5>
		                    	</li> 
				          		<li><label><i class="fa fa-pencil-square-o"></i> Cadastros</label></li>   
					    		<li <?php if (isset($_GET['go']) && $_GET['go']=='categorias'): ?>style="font-weight:bold;"<?php endif ?>>
					    			<a style="font-size:14px;" href="?go=categorias"><i class="fa fa-cubes" style="color:#fff;"></i> Categorias</a>
					    		</li>  	 
					    		<li <?php if (isset($_GET['go']) && $_GET['go']=='empresa'): ?>style="font-weight:bold;"<?php endif ?>>
					    			<a style="font-size:14px;" href="?go=empresa"><i class="fa fa-briefcase" style="color:#fff;"></i> empresa</a>
					    		</li>  	 	          
					        </ul>
		                </li>     	
	                	<li>
		                    <a href="?go=newsletter"><i class="fa fa-address-card" style="color:#fff;"></i> Newsletter</a> 
		                </li> 	  	
		                <li>
		                    <a href="logout.php"><i class="fa fa-sign-out" style="color:#fff;"></i> Sair</a> 
		                </li> 	
		            </ul> 
		        </section>
		    </nav>
		</div>
	</div> 