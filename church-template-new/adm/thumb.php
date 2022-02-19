<?php
//if($_GET[img]=='upload/') $_GET[img] = 'semimagem.png';
#ini_set('error_reporting', E_ALL);
error_reporting(1);
if(!file_exists($_GET['img'])) exit();

if($_GET['bg']){ 
	$_GET['m'] = 1;
	$bg = imagecreatetruecolor($_GET['l'], $_GET['a']); 
	$cor = imagecolorallocate($bg, hexdec(substr($_GET['bg'], 0, 2)), hexdec(substr($_GET['bg'], 2, 2)), hexdec(substr($_GET['bg'], 4, 2))); 
	imagefill ( $bg, 0, 0, $cor );
	$l = $_GET['l'];
	$a = $_GET['a'];
}

list($width, $height) = getimagesize($_GET['img']);
$pro = $width/$height;

if($_GET['m'] && ($width > $_GET['l'] || $height > $_GET['a'])){
	if($pro > $_GET['l']/$_GET['a']){
		$_GET['a'] = 0;
	}else $_GET['l'] = 0;
}elseif($_GET['c']){
	$_GET['bg'] = 1;
	$bg = imagecreatetruecolor($_GET['l'], $_GET['a']); 
	$l = $_GET['l'];
	$a = $_GET['a'];
	if($pro < $_GET['l']/$_GET['a']){
		$_GET['a'] = 0;
	}else $_GET['l'] = 0;
}

if(!$_GET['l']) $_GET['l'] = $pro*$_GET['a'];
if(!$_GET['a']) $_GET['a'] = $_GET['l']/$pro;

if(substr($_GET['img'], -3) == 'png' ){

	$imagem = imagecreatefrompng($_GET['img']);
	
	if(imageistruecolor($imagem)){
		$nova  = imagecreatetruecolor( $_GET['l'], $_GET['a'] );
		imagealphablending($nova, false);
		imagesavealpha  ( $nova  , true );
	}else{
		$nova  = imagecreate( $_GET['l'], $_GET['a'] );
		imagealphablending( $nova, false );
		$transparente = imagecolorallocatealpha( $nova, 0, 0, 0, 127 );
		imagefill( $nova, 0, 0, $transparente );
		imagesavealpha( $nova,true );
		imagealphablending( $nova, true );
	}
	header("Content-Type: 'image/png'");
	imagecopyresampled($nova, $imagem, 0, 0, 0, 0, $_GET['l'], $_GET['a'], $width, $height );
	
	if($_GET['bg']){
		imagecopy($bg, $nova, ($l-$_GET['l'])/2, ($a-$_GET['a'])/2, 0, 0,$_GET['l'], $_GET['a']);
		imagepng($bg);
		imagedestroy($bg);
	}
	else imagepng($nova);
	imagedestroy($nova);

}else{

	if ($_GET['l'] > 300) {
		$qualidade = "90";
	} else {
		$qualidade = "90";
	}
	$nova = imagecreatetruecolor($_GET['l'], $_GET['a']);
	$imagem = imagecreatefromjpeg($_GET['img']);
	header("Content-Type: 'image/jpeg' ");
	imagecopyresampled($nova, $imagem, 0, 0, 0, 0, $_GET['l'], $_GET['a'], $width, $height);
	if($_GET['bg']){
		imagecopy($bg, $nova, ($l-$_GET['l'])/2, ($a-$_GET['a'])/2, 0, 0,$_GET['l'], $_GET['a']);
		imagejpeg($bg, NULL, $qualidade);
		imagedestroy($bg);
	}
	else imagejpeg($nova, NULL, $qualidade);
	imagedestroy($nova);
}
?>
