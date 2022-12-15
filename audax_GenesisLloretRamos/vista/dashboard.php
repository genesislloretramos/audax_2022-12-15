<?php
	$titulo = "REGISTRO";
	include('header.php');

?>
<div class="d-flex  justify-content-center">
	<div class="border col-xs-5 col-md-8 p-5 text-primary bg-light ">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<ul class="navbar-nav  w-100">
					<li class="nav-item p-2">
						<a class="nav-link btn btn-outline-primary " href="?">
							INFORMACIÓN PERSONAL
						</a>
					</li>
					<li class="nav-item p-2">
						<a class="nav-link btn btn-outline-primary" href="?nuevo">
							NUEVO CONTRATO
						</a>
					</li>
					<li class="nav-item p-2">
						<a class="nav-link btn btn-outline-primary" href="?listar">
							LISTADO DE CONTRATOS
						</a>
					</li>
					<li class="nav-item p-2">
						<a class="nav-link btn btn-outline-danger" href="?desconectar">
							DESCONECTAR
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<hr>
		<div>
			<?php
				if(isset($_GET["nuevo"])){
					include('dashboard/new.php');			  
				} else if(isset($_GET["listar"])){
					include('dashboard/list.php');
				} else {
					include('dashboard/info.php');
				}
			?>
		</div>
	</div>
</div>
<!-- PIE DE PAGINA -->
<?php include "footer.php"; ?>