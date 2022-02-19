<?php 
	include "inc/conn.php";
	$CHAVE_ACESSO = "armas_cliente1"; //////////////// CHAVE ACESSO 
	$password = $CHAVE_ACESSO;
	function get_rnd_iv($iv_len){
		$iv = '';
		while ($iv_len-- > 0) {
			$iv .= chr(mt_rand() & 0xff);
		}
		return $iv;
	}  
	function md5_decrypt($enc_text, $password, $iv_len = 16){
		$enc_text = base64_decode($enc_text);
		$n = strlen($enc_text);
		$i = $iv_len;
		$plain_text = '';
		$iv = substr($password ^ substr($enc_text, 0, $iv_len), 0, 512);
		while ($i < $n) {
			$block = substr($enc_text, $i, 16);
			$plain_text .= $block ^ pack('H*', md5($iv));
			$iv = substr($block . $iv, 0, 512) ^ $password;
			$i += 16;
		}
		return preg_replace('/\\x13\\x00*$/', '', $plain_text);
	}
	session_start(); 
	$sql = "UPDATE `sp_usuarios` SET `flag_online` = '0' WHERE `id` = ".md5_decrypt($_SESSION['tarefasuserid'],$CHAVE_ACESSO);
	mysqli_query($conn,$sql); 
	// log login
      $id_usuario = md5_decrypt($_SESSION['tarefasuserid'],$CHAVE_ACESSO);
      $data_cadastro = date('Y-m-d H:i:s');
      $ip = $_SERVER["REMOTE_ADDR"];
      $sqluserlogin = "INSERT INTO sp_logs (data_cadastro,ip,id_usuario,operacao,tabela_alterada) VALUES ('$data_cadastro','$ip','$id_usuario','LOGOUT','sp_usuarios')"; 
      mysqli_query($conn,$sqluserlogin);
    // 
	session_destroy();
	header("Location: login.php"); exit;
?>