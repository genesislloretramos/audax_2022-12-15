<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'genesis', 'lloret', 'audax');
if (isset($_POST['reg_user'])) {
    $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
    if (empty($usuario)) {
        array_push($errors, "$usuario");
    }
    if (empty($email)) {
        array_push($errors, "$usuario");
    }
    if (empty($pass1)) {
        array_push($errors, "$usuario");
    }
    if ($pass1 != $pass2) {
        array_push($errors, "LAS 2 CONTRASEÑASTIENEN NO COINCIDEN");
    }
    $user_check_query = "SELECT * FROM users WHERE username='$usuario' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $usuario) {
            array_push($errors, "EL USUARIO YA EXISTE");
        }
        if ($user['email'] === $email) {
            array_push($errors, "EL CORREO ELECTRÓNICO YA EXISTE");
        }
    }
    if (count($errors) == 0) {
        $password = md5($pass1);
        $query = "INSERT INTO users (`username`, `email`, `password`) 
  			  VALUES('$usuario', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "ACABAS DE INICIAR SESSIÓN";
        header('location: index.php');
    }
}



?>