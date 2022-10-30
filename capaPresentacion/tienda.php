<?php
/** Incluye la clase. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/productos.php';
include '../capaNegocio/informacion.php';
session_start();

/** Inicia sesión. */
?>
<!doctype html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Living Roots</title>
		<link rel="stylesheet" href="index.css" type="text/css" media="screen" />


	</head>

	<body>
		<?php
		if (isset($_POST['cierrasesion'])) {
			$_SESSION = array();
			/** Finaliza la sesión. */
			session_destroy();
			?>
			<script>
	            function funcion() {
	                window.open("../capaPresentacion/index.php", "_top");
	            }
	            let tiempo = setTimeout(funcion, 50);
			</script>
			<?php
		}
		if (isset($_SESSION['usuario'])) {
			?>


			<div class="total">
				<div class="container-fluid">
					<header>
						<div class="row">
							<div class="col">
							</div>
							<div class="titulo col">
								<h1>Living Roots</h1>
							</div>
							<div class="col"></div>
						</div>
					</header>
					<br>
					<div id="header">
						<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
							<div class="container-fluid">

								<a class="navbar-brand" href="tienda.php ">Inicio</a>
								<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>

								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav me-auto mb-2 mb-lg-0">
										<li class="nav-item">
											<a id="produ3" class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
												Productos
											</a>
											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
												<li><form action="tienda.php" method="post"><input type="submit" class="dropdown-item" href="#" value="Bonsais" name="productosbonsai"></form></li>
												<li><form action="tienda.php" method="post"><input type="submit" class="dropdown-item" href="#" value="Prebonsais" name="productosprebonsai"></form></li>
												<li><form action="tienda.php" method="post"><input type="submit" class="dropdown-item" href="#" value="Plantones" name="productosplanton"></form></li>
											</ul>
										</li>


										<li class="nav-item">
											<a id="info3" class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
												Informacion Cuidados
											</a>
											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
												<li><a class="dropdown-item" href="topconocidos.php">Top Conocidos</a></li>
												<li><a class="dropdown-item" href="infoCuidados.php">Info Cuidados</a></li>

											</ul>
										</li>

									</ul>
									<form class="d-flex" metrod="post" action="tienda.php">
										<input class="form-control me-2"  placeholder="Search" aria-label="Search" name="buscador">
										<input class="btn btn-outline-success" type="submit" name="botonsearch" value="Search">
									</form>


								</div>

							</div>
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"> 
									<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/> 
									<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 
										  11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/> </svg>
										  <?php
										  echo $_SESSION['usuario']->getNombre();
										  ?>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
									<li><a class="dropdown-item" href="compras.php">Compras</a></li>
									<?php
									if ($_SESSION['usuario']->getEmail() == "admin@livingroots.es") {
										?>
										<li><a class="dropdown-item" href="administracion.php">Administracion</a></li>
										<?php
									}
									?>
									<li><a class="dropdown-item" href="#"><form action="tienda.php" method="post">
												<input type="submit" value="cierra sesion" name="cierrasesion"> 
											</form></a></li>
								</ul>

							</div>
							<a href="carrito.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"> 
								<path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 
									  1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 
									  9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 
									  0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.
									  5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/> </svg>
							</a>


						</nav>   
					</div>
					<div id="productos">


						<?php
						if (isset($_POST['productosbonsai'])) {
							$producto = new Productos();
							$nose = $producto->extraerBonsai();

							foreach ($nose as $fila) {
								?>
								<form action="carrito.php" method="post">
									<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
									<img width="250" src="img/<?php echo $fila->getimg() ?>">
									<h3><?php echo $fila->getnombreProducto() ?></h3>
									<p><?php echo $fila->getdescripcion() ?></p>
									<p>Precio: <?php echo $fila->getprecio() ?>$</p>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 
										<input type="number" min="1" max="10" name="cantidad" value="1">
										<br>
										<input type="submit" value="Añadir a la cesta" name="cesta"> 

										<?php
									}
									?> 
								</form>
								<br>

								<?php
							}
						} else if (isset($_POST['productosprebonsai'])) {
							$producto = new Productos();
							$nose = $producto->extraerPrebonsai();

							foreach ($nose as $fila) {
								?>
								<form action="carrito.php" method="post">
									<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
									<img width="250" src="img/<?php echo $fila->getimg() ?>">
									<h3><?php echo $fila->getnombreProducto() ?></h3>
									<p><?php echo $fila->getdescripcion() ?></p>
									<p>Precio: <?php echo $fila->getprecio() ?>$</p>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 
										<input type="number" min="1" max="10" name="cantidad" value="1">
										<br>
										<input type="submit" value="Añadir a la cesta" name="cesta"> 

										<?php
									}
									?> 
								</form>
								<br>

								<?php
							}
						} else if (isset($_POST['productosplanton'])) {
							$producto = new Productos();
							$nose = $producto->extraerPlanton();

							foreach ($nose as $fila) {
								?>
								<form action="carrito.php" method="post">
									<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
									<img width="250" src="img/<?php echo $fila->getimg() ?>">
									<h3><?php echo $fila->getnombreProducto() ?></h3>
									<p><?php echo $fila->getdescripcion() ?></p>
									<p>Precio: <?php echo $fila->getprecio() ?>$</p>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 
										<input type="number" min="1" max="10" name="cantidad" value="1">
										<br>
										<input type="submit" value="Añadir a la cesta" name="cesta"> 

										<?php
									}
									?> 
								</form>
								<br>

								<?php
							}
						} else if (isset($_POST['botonsearch'])) {
							echo'entra';
							$producto = new Productos();
							$nose = $producto->buscador($_POST['buscador']);

							foreach ($nose as $fila) {
								?>
								<form action="carrito.php" method="post">
									<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
									<img width="250" src="img/<?php echo $fila->getimg() ?>">
									<h3><?php echo $fila->getnombreProducto() ?></h3>
									<p><?php echo $fila->getdescripcion() ?></p>
									<p>Precio: <?php echo $fila->getprecio() ?>$</p>
			<?php
			if ($fila->getcantidad() == 0) {
				echo "No hay en el Stock";
			} else {
				?> 
										<input type="number" min="1" max="10" name="cantidad" value="1">
										<br>
										<input type="submit" value="Añadir a la cesta" name="cesta"> 

				<?php
			}
			?> 
								</form>
								<br>

			<?php
		}
	} else {
		$producto = new Productos();
		$nose = $producto->extraerProductos();

		foreach ($nose as $fila) {
			?>
								<form action="carrito.php" method="post">
									<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
									<img width="250" src="img/<?php echo $fila->getimg() ?>">
									<h3><?php echo $fila->getnombreProducto() ?></h3>
									<p><?php echo $fila->getdescripcion() ?></p>
									<p>Precio: <?php echo $fila->getprecio() ?>$</p>
			<?php
			if ($fila->getcantidad() == 0) {
				echo "No hay en el Stock";
			} else {
				?> 
										<input type="number" min="1" max="10" name="cantidad" value="1">
										<br>
										<input type="submit" value="Añadir a la cesta" name="cesta"> 

				<?php
			}
			?> 
								</form>
								<br>

			<?php
		}
	}
	?>         
					</div>

					<div class="row mb-lg-4">

					</div>

					<footer>
						<div class="fooder">
							<table>
								<td>
									<h4>Informacion</h4>
									<h6>
										Villarrobledo-Albacete <br>
										Calle Socuellamos nº53 <br>
										Telefono:671424198 <br>
										Peropela336@gmail.com
									</h6>
								</td>
								<td>
									<h3>Redes</h3>

									<img src="img/facebook.png" height="40">
									<img src="img/insta.jpg" height="40">

								</td>
								<td>
									<h3>Comentarios</h3>
									<input type="text" name="nombredelacaja">
								<td>

							</table>
						</div>
					</footer>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header text-center">
									<h4 class="modal-title w-100 font-weight-bold">Registrate</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
								</div>
								<div class="modal-body mx-3">
									<div class="md-form mb-4">
										<i class="fas fa-envelope prefix grey-text"></i>
										<input type="email" id="defaultForm-email" class="form-control validate">
										<label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
									</div>

									<div class="md-form mb-4">
										<i class="fas fa-lock prefix grey-text"></i>
										<input type="password" id="defaultForm-pass" class="form-control validate">
										<label data-error="wrong" data-success="right" for="defaultForm-pass">Contraseña</label>
									</div>

									<div class="md-form mb-4">
										<i class="fas fa-lock prefix grey-text"></i>
										<input type="text" id="defaultForm-pass" class="form-control validate">
										<label data-error="wrong" data-success="right" for="defaultForm-pass">Nombre</label>
									</div>
									<div class="md-form mb-4">
										<i class="fas fa-lock prefix grey-text"></i>
										<input type="text" id="defaultForm-pass" class="form-control validate">
										<label data-error="wrong" data-success="right" for="defaultForm-pass">Apellidos</label>
									</div>
									<div class="md-form mb-4">
										<i class="fas fa-lock prefix grey-text"></i>
										<input type="date" id="defaultForm-pass" class="form-control validate">
										<label data-error="wrong" data-success="right" for="defaultForm-pass">Fecha de
											nacimiento</label>
									</div>
									<div class="progress">
										<div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>


								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button class="btn btn-default bg-primary text-white">Guardar</button>
								</div>
							</div>
						</div>
					</div>
					<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasLabel">
						<div class="offcanvas-header">
							<h5 class="offcanvas-title" id="offcanvasLabel">Colaboradores</h5>
							<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body">
							Pedro montero
							<br>
							Juan Camacho
							<br>
							Pablo Mecinas
							<br>
							Alberto Biosca
							<br>
							Antonio de la Fuente
							<br>
							Chorizo Jonshon
						</div>
					</div>
				</div>
			</div>
	<?php
} else {
	/** Si el usuario no se ha validado. */
	echo '<h5>El usuario no ha sido validado correctamente</h5>';
}
?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	</body>



</html>