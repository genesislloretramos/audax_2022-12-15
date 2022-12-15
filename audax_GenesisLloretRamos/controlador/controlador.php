<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'genesis', 'lloret', 'audax');
// ACCIONES AL REGISTRARSE
if (isset($_POST['REGISTRARSE'])) {
  $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
  $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
  if (empty($usuario)) { array_push($errors, "EL USUARIO ES REQUERIDO"); }
  if (empty($email)) { array_push($errors, "EL CORREO ELECTRÓNICO ES REQUERIDO"); }
  if (empty($pass1)) { array_push($errors, "LA CONTRASEÑA ES REQUERIDA"); }
  if ($pass1 != $pass2) {
	  array_push($errors, "LAS CONTRASEÑAS NO COINCIDEN");
  }
  $query_comprobar_usuario = "SELECT * FROM users WHERE username='$usuario' OR email='$email' LIMIT 1";
  $resultado = mysqli_query($db, $query_comprobar_usuario);
  $res_usuario = mysqli_fetch_assoc($resultado);
  if ($res_usuario) {
    if ($res_usuario['username'] === $usuario) {
      array_push($errors, "EL USARIO YA EXISTE");
    }
    if ($res_usuario['email'] === $email) {
      array_push($errors, "EL EMAIL YA EXISTE");
    }
  }
  if (count($errors) == 0) {
  	$pass = md5($pass1);
  	$query_insertar_nuevo_usuario = "INSERT INTO users (`username`, `email`, `password`) VALUES('$usuario', '$email', '$pass')";
  	$r=mysqli_query($db, $query_insertar_nuevo_usuario);
  	$_SESSION['usuario'] = $usuario;
  	$_SESSION['aprobado'] = "AHORA ESTÁS CONECTADO";
    session_destroy();
    header("location: index.php");
  }
}
// ACCIONES AL ENTRAR
if (isset($_POST['LOGIN'])) {
  $usuario = mysqli_real_escape_string($db, $_POST['email']);
  $pass_log = mysqli_real_escape_string($db, $_POST['pass']);
  if (empty($usuario)) {
    array_push($errors, "EL USARIO ES REQUERIDO");
  }
  if (empty($pass_log)) {
    array_push($errors, "LA CONTRASEÑA ES REQUERIDA");
  }
  if (count($errors) == 0) {
    $md5 = md5($pass_log);
    $query = "SELECT * FROM users WHERE email='$usuario' AND password='$md5' LIMIT 1";
    $results = mysqli_query($db, $query);
    while($row = mysqli_fetch_array($results)){
      $_SESSION['usuario_id'] = $row[0];
      $_SESSION['usuario_nombre']  = $row[1];
      $_SESSION['usuario_email']  = $row[2];
    }
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['usuario'] = $usuario;
      $_SESSION['aprobado'] = "AHORA ESTÁS CONECTADO";
    }else {
      array_push($errors, "LA COMBINACIÓN DE USUARIO Y CONTRASEÑA SON INCORRECTA");
    }
  }
}
// DASHBOARD DESCONECTAR
if (isset($_GET['desconectar'])) {
  session_destroy();
  header("location: index.php");
}
// GENERAR CONTRATOS
if (isset($_POST['generar'])){
  require('libs\fdpf\fpdf.php');
  try {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $linea1 = "ID: ".$_SESSION["usuario_id"];
    $pdf->Cell(40, 10, "$linea1");
    $pdf->Ln();
    $linea2 = "nombre: " . $_SESSION["usuario_nombre"];
    $pdf->Cell(40, 10, "$linea2");
    $pdf->Ln();
    $linea3 =  "email: " . $_SESSION["usuario_email"];
    $pdf->Cell(40, 10, "$linea3");
    $pdf->Ln();
    $nombrePDF = time().microtime(true) * 10000 ;
    $linea4 =  "numero de contrato: " . $nombrePDF;
    $pdf->Cell(40, 10, "$linea4");
    $url = "docs/".$nombrePDF.".pdf";
    $pdf->Output($url, 'F');
    $usu = $_SESSION["usuario_id"];
    $date = date('Y-m-d H:i:s');
    $info = $linea1."\n".$linea2."\n".$linea3."\n".$linea4;
    $query_contract_add = "INSERT INTO documento (`user`, `date`, `info`, `url`) VALUES('$usu', '$date', '$info', '$url')";
    $results = mysqli_query($db, $query_contract_add);
  }
  catch (Exception $e) {
    $erroresPDF = "No hemos podido generar tu contrato...";
  } finally {
    $generadoOk = "Tu contrato se ha generado correctamente";
  }
}

if (isset($_GET["listar"])){
  // FALTA POR REVISAR A MEJORAR LA SENTENCIA PARA CIBERSEGURIDAD
  $query_contract_list = "SELECT * FROM documento WHERE user = '".$_SESSION["usuario_id"]."'";
  $miscontratos = mysqli_query($db, $query_contract_list);
}
?>
