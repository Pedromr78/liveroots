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



			<div class="container-fluid ">
				<header class="navbar-light bg-light row border-top border-bottom border-secondary">

					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<div class="container-fluid">

							<a class="navbar-brand" href="tienda.php "><img class="img-fluid" src="img/logo titulo.png" width="170"></a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item dropdown">
										<a id="produ3" class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Productos
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											<li><form action="tienda.php" method="post"><input type="submit" class="dropdown-item" href="#" value="Bonsais" name="productosbonsai"></form></li>
											<li><form action="tienda.php" method="post"><input type="submit" class="dropdown-item" href="#" value="Prebonsais" name="productosprebonsai"></form></li>
											<li><form action="tienda.php" method="post"><input type="submit" class="dropdown-item" href="#" value="Plantones" name="productosplanton"></form></li>
										</ul>
									</li>


									<li class="nav-item dropdown ">
										<a id="info3" class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
									<input class="btn  btn-outline-dark" type="submit" name="botonsearch" value="Search">
								</form>
								<ul class="navbar-nav  m-lg-2">
									<li class="nav-item dropdown ">


										<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
														<button class="bg-light border border-0" type="submit" name="cierrasesion">cierra sesion</button>
													</form></a></li>
										</ul>



									</li>
									<li class="nav-item dropdown m-auto">
										<a href="carrito.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"  class="bi bi-basket" viewBox="0 0 16 16"> 
											<path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 
												  1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 
												  9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 
												  0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.
												  5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/> </svg>
										</a>
									</li>
								</ul>
							</div>

						</div>




					</nav>   

				</header>
				<br>

				<div class="row row-cols-4 col-md-8 m-auto mt-5 bg-light rounded border border-secondary" id="productos">


					<?php
					if (isset($_POST['productosbonsai'])) {
						$producto = new Productos();
						$nose = $producto->extraerBonsai();

						foreach ($nose as $fila) {
							?>
							<div class="col p-5">
								<form action="producto.php" method="post">
									<button class="bg-light border border-0" type="submit"  name="cesta"> 
										<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
										<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
										<h4><?php echo $fila->getnombreProducto() ?></h4>
										<?php
										if($fila->getdescuento()>0){
											?> 
											<p style="color:#D8F065;">¡Descuento<?php echo $fila->getdescuento()?>%!</p>
										<?php
										}
										?> 

										<h3><?php echo $fila->getprecio() ?>$</h3>
										
										
									</button>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 
										<?php
									}
									?> 
								</form>
							</div>


							<?php
						}
					} else if (isset($_POST['productosprebonsai'])) {
						$producto = new Productos();
						$nose = $producto->extraerPrebonsai();

						foreach ($nose as $fila) {
							?>
							<div class="col p-5">
								<form action="producto.php" method="post">
									<button class="bg-light border border-0" type="submit"  name="cesta"> 
										<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
										<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
										<h4><?php echo $fila->getnombreProducto() ?></h4>
										<?php
										if($fila->getdescuento()>0){
											?> 
											<p style="color:#D8F065;">¡Descuento<?php echo $fila->getdescuento()?>%!</p>
										<?php
										}
										?> 
										<h3>Precio: <?php echo $fila->getprecio() ?>$</h3>
									</button>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 


										<?php
									}
									?> 
								</form>
							</div>


							<?php
						}
					} else if (isset($_POST['productosplanton'])) {
						$producto = new Productos();
						$nose = $producto->extraerPlanton();

						foreach ($nose as $fila) {
							?>
							<div class="col p-5">
								<form action="producto.php" method="post">
									<button class="bg-light border border-0" type="submit"  name="cesta"> 
										<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
										<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
										<h4><?php echo $fila->getnombreProducto() ?></h4>
									<?php
										if($fila->getdescuento()>0){
											?> 
											<p style="color:#D8F065;">¡Descuento<?php echo $fila->getdescuento()?>%!</p>
										<?php
										}
										?> 
										<h3>Precio: <?php echo $fila->getprecio() ?>$</h3>
									</button>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 


										<?php
									}
									?> 
								</form>
							</div>


							<?php
						}
					} else if (isset($_POST['botonsearch'])) {
						echo'entra';
						$producto = new Productos();
						$nose = $producto->buscador($_POST['buscador']);

						foreach ($nose as $fila) {
							?>
							<div class="col p-5">
								<form action="producto.php" method="post">
									<button class="bg-light border border-0" type="submit"  name="cesta"> 
										<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
										<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
										<h4><?php echo $fila->getnombreProducto() ?></h4>
										<?php
										if($fila->getdescuento()>0){
											?> 
											<p style="color:#D8F065;">¡Descuento<?php echo $fila->getdescuento()?>%!</p>
										<?php
										}
										?> 
										<h3>Precio: <?php echo $fila->getprecio() ?>$</h3>
									</button>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 


										<?php
									}
									?> 
								</form>
							</div>

							<?php
						}
					} else {
						$producto = new Productos();
						$nose = $producto->extraerProductos();

						foreach ($nose as $fila) {
							?>
							<div class="col p-5">
								<form action="producto.php" method="post">
									<button class="bg-light border border-0" type="submit"  name="cesta"> 
										<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">

										<img class="img-fluid"  src="img/<?php echo $fila->getimg() ?>">
										<h4><?php echo $fila->getnombreProducto() ?></h4>
									<?php
										if($fila->getdescuento()>0){
											?> 
											<p style="color:#D8F065;">¡Descuento<?php echo $fila->getdescuento()?>%!</p>
										<?php
										}
										?> 
										<h3>Precio: <?php echo $fila->getprecio() ?>$</h3>
									</button>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 


										<?php
									}
									?> 
								</form>
							</div>

							<?php
						}
					}
					?>         
				</div>


				<div class="row mb-lg-4">

				</div>

				<footer class="fooder row bg-light border-top border-bottom border-secondary">
					<div class="col text-center">

						<h4>Informacion de contacto</h4>
						<h6>
							Villarrobledo-Albacete <br>
							Telefono:671424198 <br>
							Peropela336@gmail.com
						</h6>
					</div>
					<div class="col text-center">
						<h3>Redes</h3>

						<a href="https://www.facebook.com/profile.php?id=100008619615493"><img class="img-fluid" src="img/facebook.png" width="60"></a>
						<a href="https://www.instagram.com/pedro_mr78/"><img class="img-fluid" src="img/insta.jpg" width="90"></a>
						<a href="www.linkedin.com/in/pedro-montero-rodriguez-9ab7841ab"><img class="img-fluid" src="img/linkedin.jpg" width="60"></a>

					</div>


				</footer>

			</div>

			<?php
		} else {
			?>



			<div class="container-fluid ">
				<header>


					<div class="row navbar-light bg-light border-top border-bottom border-secondary">


						<nav class="navbar navbar-expand-lg navbar-light bg-light p-1">
							<div class="container-fluid">

								<a class="navbar-brand" href="index.php"> <img class="img-fluid" src="img/logo titulo.png" width="170"></a>
								<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
										data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
										aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>

								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav me-auto mb-2 mb-lg-0">




										<li><a class=" nav-link  text-dark dropdown-item" href="infoCuidados.php">Info Cuidados</a></li>
										<li class="nav-item dropdown">
											<a id="produ3" class=" nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
												Productos
											</a>
											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
												<li><form action="tienda.php" method="post"><input type="submit" class="dropdown-item" href="#" value="Bonsais" name="productosbonsai"></form></li>
												<li><form action="tienda.php" method="post"><input type="submit" class="dropdown-item" href="#" value="Prebonsais" name="productosprebonsai"></form></li>
												<li><form action="tienda.php" method="post"><input type="submit" class="dropdown-item" href="#" value="Plantones" name="productosplanton"></form></li>
											</ul>
										</li>


									</ul>

									<a class="nav-link" href="login.php ">
										Login/Register
									</a>

								</div>

							</div>





					</div>

				</header>
				<br>

				<div class="row row-cols-4 col-md-8 m-auto mt-5 bg-light rounded border border-secondary" id="productos">


					<?php
					if (isset($_POST['productosbonsai'])) {
						$producto = new Productos();
						$nose = $producto->extraerBonsai();

						foreach ($nose as $fila) {
							?>
							<div class="col p-5">
								<form action="carrito.php" method="post">
									<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
									<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
									<h4><?php echo $fila->getnombreProducto() ?></h4>
									<p><?php echo $fila->getdescripcion() ?></p>
									<h3><?php echo $fila->getprecio() ?>$</h3>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 

										<a href="login.php"><input  type="button" value="Añadir a la cesta" name="cesta"></a> 

										<?php
									}
									?> 
								</form>
							</div>


							<?php
						}
					} else if (isset($_POST['productosprebonsai'])) {
						$producto = new Productos();
						$nose = $producto->extraerPrebonsai();

						foreach ($nose as $fila) {
							?>
							<div class="col p-5">
								<form action="carrito.php" method="post">
									<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
									<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
									<h4><?php echo $fila->getnombreProducto() ?></h4>
									<p><?php echo $fila->getdescripcion() ?></p>
									<h3>Precio: <?php echo $fila->getprecio() ?>$</h3>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 
										<a href="login.php"><input  type="button" value="Añadir a la cesta" name="cesta"></a> 

										<?php
									}
									?> 
								</form>
							</div>


							<?php
						}
					} else if (isset($_POST['productosplanton'])) {
						$producto = new Productos();
						$nose = $producto->extraerPlanton();

						foreach ($nose as $fila) {
							?>
							<div class="col p-5">
								<form action="carrito.php" method="post">
									<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
									<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
									<h4><?php echo $fila->getnombreProducto() ?></h4>
									<p><?php echo $fila->getdescripcion() ?></p>
									<h3>Precio: <?php echo $fila->getprecio() ?>$</h3>
									<?php
									if ($fila->getcantidad() == 0) {
										echo "No hay en el Stock";
									} else {
										?> 
										<a href="login.php"><input  type="button" value="Añadir a la cesta" name="cesta"></a> 

										<?php
									}
									?> 
								</form>
							</div>


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
								<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
								<h4><?php echo $fila->getnombreProducto() ?></h4>
								<p><?php echo $fila->getdescripcion() ?></p>
								<h3>Precio: <?php echo $fila->getprecio() ?>$</h3>
								<?php
								if ($fila->getcantidad() == 0) {
									echo "No hay en el Stock";
								} else {
									?> 
									<a href="login.php"><input  type="button" value="Añadir a la cesta" name="cesta"></a> 

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
							<form class="col p-5" action="carrito.php" method="post">
								<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
								<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
								<h4><?php echo $fila->getnombreProducto() ?></h4>
								<p><?php echo $fila->getdescripcion() ?></p>
								<h3>Precio: <?php echo $fila->getprecio() ?>$</h3>
								<?php
								if ($fila->getcantidad() == 0) {
									echo "No hay en el Stock";
								} else {
									?> 
									<a href="login.php"><input  type="button" value="Añadir a la cesta" name="cesta"></a> 

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

				<footer class="fooder row bg-light border-top border-bottom border-secondary">
					<div class="col text-center">

						<h4>Informacion de contacto</h4>
						<h6>
							Villarrobledo-Albacete <br>
							Telefono:671424198 <br>
							Peropela336@gmail.com
						</h6>
					</div>
					<div class="col text-center">
						<h3>Redes</h3>

						<a href="https://www.facebook.com/profile.php?id=100008619615493"><img class="img-fluid" src="img/facebook.png" width="60"></a>
						<a href="https://www.instagram.com/pedro_mr78/"><img class="img-fluid" src="img/insta.jpg" width="90"></a>
						<a href="www.linkedin.com/in/pedro-montero-rodriguez-9ab7841ab"><img class="img-fluid" src="img/linkedin.jpg" width="60"></a>

					</div>


				</footer>
			</div>

			<?php
		}
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	</body>



</html>