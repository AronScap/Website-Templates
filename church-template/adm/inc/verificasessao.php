<?php if (!isset($_SESSION))session_start();
  // $tempo = 3000;
  // if(!isset($_SESSION['ECuserid']) || ($_SESSION['status'] != 1)) { ?>
  <script type="text/javascript">
  //     window.location.href="logout.php";
  //   </script>
   <?php 
  //   exit;
  // } 
  // if (!isset($_SESSION['CREATED'])) {
  //     $_SESSION['CREATED'] = time();
  // } else if (time() - $_SESSION['CREATED'] > $tempo) { 
  //     session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
  //     $_SESSION['CREATED'] = time();  // update creation time
  // } 
   
  // if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $tempo)) { 
  //     mysqli_query($conn,"UPDATE `usuarios` SET `flag_online` = '0' WHERE `id` = ".md5_decrypt($_SESSION['ECuserid'],$CHAVE_ACESSO));  
  //     // log login
  //       $id_usuario = md5_decrypt($_SESSION['ECuserid'],$CHAVE_ACESSO);
  //       $data_cadastro = date('Y-m-d H:i:s');
  //       $ip = $_SERVER["REMOTE_ADDR"];
  //       // $sqluserlogin = "INSERT INTO sp_logs (data_cadastro,ip,id_usuario,operacao,tabela_alterada) VALUES ('$data_cadastro','$ip','$id_usuario','LOGOUT','usuarios')"; 
  //       // mysqli_query($conn,$sqluserlogin);
  //     // 
  //     session_unset();
  //     session_destroy();
  // }
  // $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp 
?>

