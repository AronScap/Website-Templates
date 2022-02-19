<header class="bg-gradient-headerservice">
    <div class="headerservice">
        <div></div>
    </div>
</header>
<?php 
// print_r(Url::getURLs());
if(Url::getURL(1)){
	$service = Url::getURL(1);
	switch ($service) {
		case 'aplicativos': 
			include "services/aplicativos.php";
			break;
		case 'ferramentas':
			include "services/ferramentas.php";
			break;
		case 'site':
			include "services/site.php";
			break;
		case 'conteudo':
			include "services/conteudo.php";
			break;
		default: include "services/all.php";
			break;
	}
}
else{
	include "services/all.php";
}
?>

<script type="text/javascript">
    function showTime(){}
</script>