<?php
  require_once('controlador/controlador.php');
  if (isset($_SESSION['usuario'])) {
    
    require_once('./vista/dashboard.php');
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['usuario']);
      header("location: index.php");
    }
  } else {
    if (isset($_POST['ACT_REGISTRO'])){
      require_once('vista/register.php');
    } elseif (isset($_POST['ACT_LOGIN'])){
      $_SESSION['msg'] = "NECESITAS ENTRAR PREVIAMENTE";
      require_once('vista/login.php');
    } else {
      require_once('vista/login.php');
    }
  }
?>