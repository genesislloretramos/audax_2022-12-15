<?php
$titulo = "REGISTRO";
include('vista/header.php');
?>
<!-- FORMULARIO -->
<div class="d-flex align-items-center justify-content-center">
	<form method="post" action="index.php" class="border col-xs-5 col-md-8 p-5 text-primary bg-light">
		<?php include('errors.php'); ?>
		<h2 class="w-100 text-center">REGISTRARSE</h2>
		<hr>
		<label for="usuario">USUARIO</label>
		<input type="text" name="usuario" class="form-control" />
		<br>
		<label for="email">CORREO ELECTRÓNICO</label>
		<input type="email" name="email" class="form-control" />
		<br>
		<label for="pass1">CONTRASEÑA</label>
		<input type="password" name="pass1" class="form-control" />
		<br>
		<label for="pass2">REPITE LA CONTRASEÑA</label>
		<input type="password" name="pass2" class="form-control" />
		<br>
		<input type="submit" value="REGISTRARSE" class="w-100 btn btn-outline-primary" name="REGISTRARSE" />
		<hr>
		<strong>¿Ya tienes una cuenta?</strong>
		<input type="submit" value="ENTRA EN TU CUENTA" class="w-100 btn btn-outline-primary" name="ACT_LOGIN">
	</form>
</div>
<!-- PIE DE PAGINA -->
<?php include "vista/footer.php"; ?>