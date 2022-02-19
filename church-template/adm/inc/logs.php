<?php 
function log_insert($id_usuario,$operacao,$tabela_alterada,$sql_operacao,$id_operacao,$conn){
	$dados_antigos = '';
	if ($operacao == 'update' || $operacao == 'delete') {
		  $das = "SELECT * FROM `$tabela_alterada` WHERE id = ".$id_operacao;
		$qasd = mysqli_query($conn,$das);
		$raa = mysqli_fetch_array($qasd,MYSQLI_ASSOC);
		foreach ($raa as $key => $value) {
		 	# code...
			$dados_antigos .= $value."|#|";
		}  
	} 
	$data_cadastro = date("Y-m-d H:i:s");
	$ip_acesso = $_SERVER["REMOTE_ADDR"]; 
	  
	  $tasa = "INSERT INTO sp_logs (data_cadastro,ip_acesso,id_usuario,operacao,tabela_alterada,sql_operacao,dados_antigos) 
		VALUES ('$data_cadastro','$ip_acesso','$id_usuario','$operacao','$tabela_alterada',\"$sql_operacao\",'$dados_antigos')";
	$sql = mysqli_query($conn,$tasa);
	//exit;
}


?>