<?php  
  $VERSAO = "1.0.1"; 
  $CHAVE_ACESSO = "ec_cliente1"; //////////////// CHAVE ACESSO 
  error_reporting(1);
?>
<!doctype html>
<html lang="pt-br">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <meta http-equiv="Refresh" content="300"> -->
    <title id="title">WOLFI MARKETING INTELIGENTE</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> 
    <meta http-equiv="Refresh" content="2800"><!-- segundos -->
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/govicons.css">
    <!-- tyn textarea -->
      <!-- <script src="js/tinymce/tinymce.min.js"></script> -->
      <!-- <script>tinymce.init({ selector:'textarea' });</script> -->
    <!-- chosen -->
      <link rel="stylesheet" href="css/chosen.css">
      <style type="text/css" media="all">
        /* fix rtl for demo */
        .chosen-rtl .chosen-drop { left: -9000px; }
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
      
    <!--  -->
    <script src="js/vendor/modernizr.js"></script>    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script> 

    <script type="text/javascript">
      $(document).ready(function() {             
        $(document).keyup(function(e) {
          if (e.keyCode == 27) {
            document.getElementById("cadastro_orgao").style.display = 'none'; 
            document.getElementById("cadastro_escola").style.display = 'none'; 
            document.getElementById("cadastro_documento_atleta").style.display = 'none'; 
            document.getElementById("cadastro_atleta_atividade").style.display = 'none'; 
            document.getElementById("cadastro_modalidade_atleta").style.display = 'none'; 
            document.getElementById("cadastro_atleta_turma").style.display = 'none'; 
          }

        });
      });
      function seleicona(i) {
        document.getElementById("uploadFile"+i).value = document.getElementById("uploadBtn"+i).files[0].name;
      };
    </script>
    <?php if (isset($_GET['go'])): ?>
      <script type="text/javascript"> 
        function portfolioEdit(id){
          window.location.href='index.php?go=portfolio&edit='+id;
        }
        function servicosEdit(id){
          window.location.href='index.php?go=servicos&edit='+id;
        }
        function portfolioEdit(id){
          window.location.href='index.php?go=portfolio&edit='+id;
        }
        function blogEdit(id){
          window.location.href='index.php?go=blog&edit='+id;
        }
        function empreendimentosEdit(id){
          window.location.href='index.php?go=empreendimentos&edit='+id;
        }
        function clientesUnidades(id){
          window.location.href='index.php?go=clientes&edit='+id;
        }
        function parceiros(){
          window.location.href='index.php?go=parceiros';
        }
        function banners(){
          window.location.href='index.php?go=banners';
        }
        function gerais(){
          window.location.href='index.php?go=gerais';
        }
        function servicos(){
          window.location.href='index.php?go=servicos';
        }
        function portfolio(){
          window.location.href='index.php?go=portfolio';
        }
        function empreendimentos(){
          window.location.href='index.php?go=empreendimentos';
        }
        function categorias(){
          window.location.href='index.php?go=categorias';
        }
        function empresa(){
          window.location.href='index.php?go=empresa';
        }
        function newsletter(){
          window.location.href='index.php?go=newsletter';
        }
        function tiposdetarefa(){
          window.location.href='index.php?go=tiposdetarefa';
        }
        function blog(){
          window.location.href='index.php?go=blog';
        }
        function sistemas(){
          window.location.href='index.php?go=sistemas';
        }
        function unidades(){
          window.location.href='index.php?go=unidades';
        }
        function formadeportfolios(){
          window.location.href='index.php?go=formadeportfolios';
        }
        function profissionais(){
          window.location.href='index.php?go=profissionais';
        } 
        function usuarios(){
          window.location.href='index.php?go=usuarios';
        }  
        function clientes(){
          window.location.href='index.php?go=clientes';
        }  
        function goBack() {
            window.history.back();
        }
        function campeonatosChaves(id){
          window.location.href='index.php?go=campeonatos&chaveamentos='+id;
        }
      </script>
    <?php endif ?>
    <?php if (!isset($_GET['go'])): ?>
      <script type="text/javascript"> 
        function gerais(){
          window.location.href='../index.php?go=gerais';
        }
        function servicosEdit(id){
          window.location.href='../index.php?go=servicos&edit='+id;
        }
        function clientesUnidades(id){
          window.location.href='../index.php?go=clientes&edit='+id;
        }
        function parceiros(){
          window.location.href='../index.php?go=parceiros';
        }
        function banners(){
          window.location.href='../index.php?go=banners';
        }
        function categorias(){
          window.location.href='../index.php?go=categorias';
        }
        function servicos(){
          window.location.href='../index.php?go=servicos';
        }
        function portfolio(){
          window.location.href='../index.php?go=portfolio';
        }
        function empreendimentos(){
          window.location.href='../index.php?go=empreendimentos';
        }
        function blogEdit(id){
          window.location.href='../index.php?go=blog&edit='+id;
        }
        function unidades(){
          window.location.href='../index.php?go=unidades';
        }
        function formadeportfolios(){
          window.location.href='../index.php?go=formadeportfolios';
        }
        function sistemas(){
          window.location.href='../index.php?go=sistemas';
        } 
        function blog(){
          window.location.href='../index.php?go=blog';
        } 
        function newsletter(){
          window.location.href='../index.php?go=newsletter';
        } 
        function tiposdetarefa(){
          window.location.href='../index.php?go=tiposdetarefa';
        } 
        function empresa(){
          window.location.href='../index.php?go=empresa';
        } 
        function clientes(){
          window.location.href='../index.php?go=clientes';
        } 
        function profissionais(){
          window.location.href='../index.php?go=profissionais';
        }
        function portfolioEdit(id){
          window.location.href='../index.php?go=portfolio&edit='+id;
        }
        function usuarios(){
          window.location.href='../index.php?go=usuarios';
        } 
        function empreendimentosEdit(id){
          window.location.href='../index.php?go=empreendimentos&edit='+id;
        }
        function goBack() {
            window.history.back();
        }
      </script>
    <?php endif ?>
    <link rel="icon" href="https://agenciawolfi.com.br/img/favicon.ico">
      <style type="text/css">
        iframe {
          border: none;
        } 
        li{
          list-style: none;
          color:#454545;
        }
        *{
          font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif, FontAwesome;
        }
      </style> 
  </head>
<body <?php if (!isset($_GET['go'])): ?>style="background: #142536;"<?php endif ?> onKeyDown="javascript:Teclas()"> 
<?php include "conn.php"; ?> 
<?php  
  $password = $CHAVE_ACESSO;
  function get_rnd_iv($iv_len){
     $iv = '';
     while ($iv_len-- > 0) {
       $iv .= chr(mt_rand() & 0xff);
     }
     return $iv;
  } 
  function md5_encrypt($plain_text, $password, $iv_len = 16){
     $plain_text .= "\x13";
     $n = strlen($plain_text);
     if ($n % 16) $plain_text .= str_repeat("\0", 16 - ($n % 16));
     $i = 0;
     $enc_text = get_rnd_iv($iv_len);
     $iv = substr($password ^ $enc_text, 0, 512);
     while ($i < $n) {
       $block = substr($plain_text, $i, 16) ^ pack('H*', md5($iv));
       $enc_text .= $block;
       $iv = substr($block . $iv, 0, 512) ^ $password;
       $i += 16;
     }
     return base64_encode($enc_text);
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
  
?>