<?php 
  include "inc/topo.php"; ?>
  <style type="text/css">
    b{color:white;}
  </style>
  <?php
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {      ?>
    <script type="text/javascript">
      window.location.href='index.php';
    </script>
    <?php
    exit;
  }  
  $usuario = mysqli_real_escape_string($conn , $_POST['usuario']);
  $senha = mysqli_real_escape_string($conn , $_POST['senha']); 
  $sql = "SELECT * FROM `sp_usuarios` WHERE (`login` = '". $usuario ."') AND (`senha` = '". sha1($senha) ."' ) LIMIT 1";
  $query = mysqli_query($conn , $sql); 
  if (!mysqli_num_rows($query)) {      ?>
    <div class="row">
      <div class="small-6 small-centered columns" style="text-align:center;margin-top:50px;">
        <img src="../img/logo.png" alt style="max-width:100%;" />
      </div>
        <div class="small-10 large-6 small-centered columns"> 
          <hr>
          <center><b style="color: #fff;">Login e/ou senha inválidos!</b><hr><a class="button" href='logout.php'>Voltar</a></center>
      </div>
    </div>
    <?php
  } else { 
    $resultado = mysqli_fetch_array($query,MYSQLI_ASSOC);
    if ($resultado['status'] != 1) { 
      ?>
      <div class="row">
        <div class="small-6 small-centered columns" style="text-align:center;margin-top:50px;">
          <img src="../img/logo.png" alt style="max-width:100%;" />
        </div>
          <div class="small-10 large-6 small-centered columns"> 
            <hr>
            <center> <b style="color: #fff;">Usuário Inativo!</b><hr><a class="button" href='logout.php'>Voltar</a></center>
        </div>
      </div>
      <?php
      // echo "<script>alert('Usuário inativo!');window.location.href='logout.php'</script>"; 
    }  
    if(!isset($_SESSION))session_start();  
    $_SESSION['ECuserid'] = md5_encrypt($resultado['id'],$CHAVE_ACESSO);
    $_SESSION['status'] = ($resultado['status']);  
    $_SESSION['nivel'] = md5_encrypt($resultado['nivel'],$CHAVE_ACESSO);
    $_SESSION['admOnline'] = 1;
    $sqluser = "UPDATE `sp_usuarios` SET `flag_online` = '1' WHERE `id` = ".$resultado['id'];   
    mysqli_query($conn,$sqluser);
    // log login
      $id_usuario = $resultado['id'];
      $data_cadastro = date('Y-m-d H:i:s');
      $ip = $_SERVER["REMOTE_ADDR"];
      // $sqluserlogin = "INSERT INTO sp_logs (data_cadastro,ip,id_usuario,operacao,tabela_alterada) VALUES ('$data_cadastro','$ip','$id_usuario','LOGIN','sp_usuarios')"; 
      // mysqli_query($conn,$sqluserlogin);
    // 
    ?>
    <script type="text/javascript">
      window.location.href="index.php";
    </script>
    <?php
    exit; 
  }
?>