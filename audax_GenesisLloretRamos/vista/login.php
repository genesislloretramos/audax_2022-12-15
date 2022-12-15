<?php
$titulo = "INICIO";
include('header.php');
?>
<!-- FORMULARIO -->
<div class="d-flex align-items-center justify-content-center">
	<form method="post" action="index.php" class="border col-xs-5 col-md-8 p-5 text-primary bg-light">
	<?php include('errors.php'); ?>
		<h2 class="w-100 text-center">INICIAR SESSIÓN</h2>
		<hr>
		<label for="correo">EMAIL</label>
		<input type="email" name="email" class="form-control"/>
		<br>    
		<label for="elpass">ESCRIBE TU CONTRASEÑA</label>
		<input type="password" name="pass" class="form-control"/>
		<br>   
		<input type="submit" value="LOGIN" class="w-100 btn btn-outline-primary" name="LOGIN">
		<hr>
		<strong>¿No tienes una cuenta?</strong>
		<input type="submit" value="REGISTRARSE" class="w-100 btn btn-outline-primary" name="ACT_REGISTRO">
	</form>
</div>
<!-- PIE DE PAGINA -->
<?php include "vista/footer.php"; ?>