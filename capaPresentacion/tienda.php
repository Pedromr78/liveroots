<?php
/** Incluye la clase. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/productos.php';
include '../capaNegocio/informacion.php';
session_start();

/** Inicia sesión. */
	if (isset($_POST['cierrasesion'])) {
			$_SESSION = array();
			/** Finaliza la sesión. */
			session_destroy();
			?>
			<script>
				function funcion() {
					window.open("../capaPresentacion/index.php", "_top");
				}
				let tiempo = setTimeout(funcion, 5);
			</script>
			<?php
		}
if(!$_GET&&!$_POST){
header('Location:tienda.php?pagina=1');}
?>
<!doctype html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Live Roots</title>
		<link rel="stylesheet" href="index.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/tienda.css" type="text/css" media="screen" />


	</head>

	<body>
		<?php
		
		
	
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
										<a id="produ3" class="nav-link  text-dark" href="tienda.php" id="navbarDropdown"  aria-expanded="false">
											Productos
										</a>

									</li>


									<li class="nav-item dropdown ">
										<a id="info3" class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Informacion
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											<li><a class="dropdown-item" href="topconocidos.php">Top Conocidos</a></li>
											<li><a class="dropdown-item" href="infoCuidados.php">Info Cuidados</a></li>

										</ul>
									</li>

								</ul>
								<ul class="nav-item mt-3">
									<form class="d-flex" method="post" action="tienda.php">
										<input class="form-control me-2"  placeholder="Search" aria-label="Search" name="buscador">
										<input class="btn  btn-outline-dark" type="submit" name="botonsearch" value="Search">
									</form>
								</ul>
								<ul class="navbar-item  mt-3">
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
											<li><form action="tienda.php" method="post">
													<button class="dropdown-item" type="submit" name="cierrasesion">cierra sesion</button>
												</form></li>
										</ul>



									</li>

								</ul>
								<ul class="nav-nav mt-3">

									<a href="carrito.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"  class="bi bi-basket" viewBox="0 0 16 16"> 
										<path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 
											  1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 
											  9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 
											  0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.
											  5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/> </svg>
									</a>

								</ul>
							</div>

						</div>




					</nav>   

				</header>


				<div class="row">


					<div class="col col-md-2 mt-5 ">
						<div class="bg-light" id="menu">




							<ul>
								<li class="has-sub"><a title="" href="">Plantas</a>
									<ul class="bg-light rounded border border-secondary">
										<li class="has-sub"><form action="tienda.php?pagina=1&bo=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Bonsais" name="productosbonsai"></form></li>
										<li><form action="tienda.php?pagina=1&prebo=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Prebonsais" name="productosprebonsai"></form></li>
										<li><form action="tienda.php?pagina=1&pla=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Plantones" name="productosplanton"></form></li>
									</ul>
								</li>
								<li class="has-sub"><a title="" href="">Herramientas</a>
									<ul class="bg-light rounded border border-secondary">
										<li class="has-sub"><form action="tienda.php?pagina=1&proti=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Tijeras" name="productostijeras"></form></li>
										<li><form action="tienda.php?pagina=1&prora=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Rastrillos" name="productosrastrillos"></form></li>
										<li><form action="tienda.php?pagina=1&propo=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Podadoras" name="productospodadoras"></form></li>
									</ul>
								</li>
								<li class="has-sub"><a title="" href="">Macetas</a>
									<ul class="bg-light rounded border border-secondary">
										<li class="has-sub"><form action="tienda.php?pagina=1&mao=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Obaladas" name="macetasobaladas"></form></li>
										<li><form action="tienda.php?pagina=1&macu=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Cuadradas" name="macetascuadradas"></form></li>
										<li><form action="tienda.php?pagina=1&maca=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Cascada" name="macetacascada"></form></li>
									</ul>

								</li>
								<li class=""><a title="" href="">Cultivo</a>
									<ul class="bg-light rounded border border-secondary">
										<li class="has-sub"><form action="tienda.php?pagina=1&proa=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Abonos" name="productosabonos"></form></li>
										<li><form action="tienda.php?pagina=1&prosu=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Sustratos" name="productossustratos"></form></li>
									</ul>

								</li>
							</ul>

						</div>
					</div>
					<div class="col mt-5 col-md-8">
						<div class="bg-light rounded border border-secondary">
						<div class="row row-cols-3  " id="productos">


							<?php
							
							if (isset($_GET['bo'])) {
								$iniciar=($_GET['pagina']-1)*9;
								$producto = new Productos();
								$producto->settipo('bonsai');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&bo=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&bo=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&bo=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}else if (isset($_GET['maca'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('macetacascada');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&maca=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&maca=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&maca=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_GET['macu'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('macetacuadrada');
								$nose = $producto->Filtro($iniciar,9);


								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&macu=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&macu=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&macu=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}else if (isset($_GET['mao'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('macetaobalada');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&mao=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&mao=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&mao=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_GET['prosu'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('sustrato');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&prosu=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&prosu=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&prosu=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}else	if (isset($_GET['proa'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('abono');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&proa=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&proa=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&proa=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else 	if (isset($_GET['propo'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('podadora');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&propo=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&propo=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&propo=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else 	if (isset($_GET['prora'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('rastrillos');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&prora=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&prora=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&prora=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}else 	if (isset($_GET['proti'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('tijeras');
						$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&proti=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&proti=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&proti=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_GET['prebo'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('prebonsai');
								$nose = $producto->Filtro($iniciar,9);


								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&prebo=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&prebo=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&prebo=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_GET['pla'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('planton');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav>
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina']<2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&pla=4" >
														Previous</a>
												</li>
												<?php
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&pla=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&pla=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_POST['botonsearch'])) {

								$producto = new Productos();
								$nose = $producto->buscador($_POST['buscador']);
								if (sizeof($nose) < 1) {
									?>
									<h6 class="text-center col-md-12">No se encontraron resultados</h6>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>


									<?php
								} else {

									foreach ($nose as $fila) {
										?>
										<div class="col p-5">
											<form action="producto.php" method="post">
												<button class="bg-light border border-0" type="submit"  name="cesta"> 
													<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
													<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
													<h6><?php echo $fila->getnombreProducto() ?></h6>
													<?php
													if ($fila->getdescuento() > 0) {
														?> 
														<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
														<?php
													} else {
														?> 
														<h4><?php echo $fila->getprecio() ?>€</h4>
														<?php
													}
													?> 
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
							} else {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$nose = $producto->extraerProductos($iniciar,9);
							
								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">

												<img class="img-fluid" width="170" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>

												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									
								?>
									<div class="col-md-12 text-center">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo  $_GET['pagina']<2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>" >
														Previous</a>
												</li>
												<?php
												for ($i=0;$i<$producto->numeropaginas();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->numeropaginas()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}
							?>         
						</div>
						</div>
					</div>
					<div class="col col-md-2">
						<div class=" bg-light mt-5 p-4">
							<h6 class="">Enlaces de interes</h6>

							<a href="https://www.youtube.com/@KaeruEnBonsaiStudio" target="_blank">David Cortizas</a>
							<br>
							<a href="https://www.youtube.com/c/DavidBenaventeBonsai" target="_blank">David Benavente</a>
							<br>
							<a href="https://www.youtube.com/@canaldebonsai1309" target="_blank">Canal de bonsai</a>
							<br>
							<a href="https://www.youtube.com/@BonsaiReleaf" target="_blank" >Bonsai Releaf</a>
							<br>
							<a href="https://www.youtube.com/@Bonsai-Colmenar">Bonsai Colmenar</a>
							<br>
							<a href="https://www.youtube.com/@kingiibonsai2713/featured">kingii bonsai</a>
						</div>

					</div>
				</div>


				<div class="row mb-lg-4">

				</div>

				<footer class="fooder row bg-light border-top border-bottom border-secondary mt-5">
					<div class="col text-center mt-5">

						<h4>Informacion de contacto</h4>
						<h6>
							Villarrobledo-Albacete <br>
							Telefono:671424198 <br>
							Peropela336@gmail.com
						</h6>
					</div>
					<div class="col text-center mt-5">
						<p>&copy; Pagina web de bonsais</p>
					</div>
					<div class="col text-center mt-5">
						<h3>Redes</h3>

						<a href="https://www.facebook.com/profile.php?id=100008619615493" target="_blank"><img class="img-fluid" src="img/facebook.png" width="60"></a>
						<a href="https://www.instagram.com/pedro_mr78/" target="_blank"><img class="img-fluid" src="img/insta.jpg" width="90"></a>
						<a href="https://www.linkedin.com/in/pedro-montero-rodriguez-9ab7841ab/" target="_blank"><img class="img-fluid" src="img/linkedin.jpg" width="60"></a>

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


										<li class="nav-item">
											<a id="produ3" class=" nav-link text-dark" href="tienda.php" id="navbarDropdown" role="button" aria-expanded="false">
												Productos
											</a>
										</li>

										<li class="nav-item dropdown ">
											<a id="info3" class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
												Informacion
											</a>
											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
												<li><a class="dropdown-item" href="topconocidos.php">Top Conocidos</a></li>
												<li><a class="dropdown-item" href="infoCuidados.php">Info Cuidados</a></li>

											</ul>
										</li>



									</ul>
									<ul class="nav-item mt-3">
										<form class="d-flex" method="post" action="tienda.php">
											<input class="form-control me-2"  placeholder="Search" aria-label="Search" name="buscador">
											<input class="btn  btn-outline-dark" type="submit" name="botonsearch" value="Search">
										</form>
									</ul>
									<ul class="nav-item mt-3">
										<a class="nav-link" href="login.php ">
											Login/Register
										</a>
									</ul>

								</div>

							</div>





					</div>

				</header>
				<br>
				<div class="row">


					<div class="col col-md-2 mt-5 ">
						<div class="bg-light" id="menu">




							<ul>
								<li class="has-sub"><a title="" href="">Plantas</a>
									<ul class="bg-light rounded border border-secondary">
										<li class="has-sub"><form action="tienda.php?pagina=1&bo=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Bonsais" name="productosbonsai"></form></li>
										<li><form action="tienda.php?pagina=1&prebo=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Prebonsais" name="productosprebonsai"></form></li>
										<li><form action="tienda.php?pagina=1&pla=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Plantones" name="productosplanton"></form></li>
									</ul>
								</li>
								<li class="has-sub"><a title="" href="">Herramientas</a>
									<ul class="bg-light rounded border border-secondary">
										<li class="has-sub"><form action="tienda.php?pagina=1&proti=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Tijeras" name="productostijeras"></form></li>
										<li><form action="tienda.php?pagina=1&prora=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Rastrillos" name="productosrastrillos"></form></li>
										<li><form action="tienda.php?pagina=1&propo=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Podadoras" name="productospodadoras"></form></li>
									</ul>
								</li>
								<li class="has-sub"><a title="" href="">Macetas</a>
									<ul class="bg-light rounded border border-secondary">
										<li class="has-sub"><form action="tienda.php?pagina=1&mao=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Obaladas" name="macetasobaladas"></form></li>
										<li><form action="tienda.php?pagina=1&macu=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Cuadradas" name="macetascuadradas"></form></li>
										<li><form action="tienda.php?pagina=1&maca=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Cascada" name="macetacascada"></form></li>
									</ul>

								</li>
								<li class=""><a title="" href="">Cultivo</a>
									<ul class="bg-light rounded border border-secondary">
										<li class="has-sub"><form action="tienda.php?pagina=1&proa=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Abonos" name="productosabonos"></form></li>
										<li><form action="tienda.php?pagina=1&prosu=4" method="post"><input type="submit" class="dropdown-item" href="#" value="Sustratos" name="productossustratos"></form></li>
									</ul>

								</li>
							</ul>

						</div>
					</div>
					<div class="col mt-5 col-md-8">
						<div class="bg-light rounded border border-secondary">
						<div class="row row-cols-3  " id="productos">


							<?php
							
							if (isset($_GET['bo'])) {
								$iniciar=($_GET['pagina']-1)*9;
								$producto = new Productos();
								$producto->settipo('bonsai');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&bo=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&bo=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&bo=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}else if (isset($_GET['maca'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('macetacascada');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&maca=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&maca=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&maca=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_GET['macu'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('macetacuadrada');
								$nose = $producto->Filtro($iniciar,9);


								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&macu=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&macu=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&macu=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}else if (isset($_GET['mao'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('macetaobalada');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&mao=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&mao=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&mao=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_GET['prosu'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('sustrato');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&prosu=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&prosu=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&prosu=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}else	if (isset($_GET['proa'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('abono');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&proa=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&proa=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&proa=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else 	if (isset($_GET['propo'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('podadora');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&propo=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&propo=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&propo=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else 	if (isset($_GET['prora'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('rastrillos');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&prora=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&prora=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&prora=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}else 	if (isset($_GET['proti'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('tijeras');
						$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&proti=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&proti=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&proti=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_GET['prebo'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('prebonsai');
								$nose = $producto->Filtro($iniciar,9);


								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina'] < 2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&prebo=4" >
														Previous</a>
												</li>
												<?php
											
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&prebo=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&prebo=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_GET['pla'])) {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$producto->settipo('planton');
								$nose = $producto->Filtro($iniciar,9);

								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
												<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>
												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									?>
									<div class="col-md-12">
									<nav>
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo $_GET['pagina']<2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>&pla=4" >
														Previous</a>
												</li>
												<?php
												for ($i=0;$i<$producto->paginasFiltro();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>&pla=4"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->paginasFiltro()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>&pla=4" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							} else if (isset($_POST['botonsearch'])) {

								$producto = new Productos();
								$nose = $producto->buscador($_POST['buscador']);
								if (sizeof($nose) < 1) {
									?>
									<h6 class="text-center col-md-12">No se encontraron resultados</h6>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>


									<?php
								} else {

									foreach ($nose as $fila) {
										?>
										<div class="col p-5">
											<form action="producto.php" method="post">
												<button class="bg-light border border-0" type="submit"  name="cesta"> 
													<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">
													<img class="img-fluid" width="250" src="img/<?php echo $fila->getimg() ?>">
													<h6><?php echo $fila->getnombreProducto() ?></h6>
													<?php
													if ($fila->getdescuento() > 0) {
														?> 
														<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
														<?php
													} else {
														?> 
														<h4><?php echo $fila->getprecio() ?>€</h4>
														<?php
													}
													?> 
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
							} else {
								$iniciar=($_GET['pagina']-1)*9;
								
								$producto = new Productos();
								$nose = $producto->extraerProductos($iniciar,9);
							
								foreach ($nose as $fila) {
									?>
									<div class="col p-5">
										<form action="producto.php" method="post">
											<button class="bg-light border border-0" type="submit"  name="cesta"> 
												<input type="hidden" name="fila" value="<?php echo $fila->getcodProducto() ?>">

												<img class="img-fluid" width="170" src="img/<?php echo $fila->getimg() ?>">
												<h6><?php echo $fila->getnombreProducto() ?></h6>

												<?php
												if ($fila->getdescuento() > 0) {
													?> 
													<p style="color:#D22900;">¡-<?php echo $fila->getdescuento() ?>%!</p>
													<?php
												} else {
													?> 
													<h4><?php echo $fila->getprecio() ?>€</h4>
													<?php
												}
												?> 
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
									
								?>
									<div class="col-md-12 text-center">
									<nav  aria-label="Page navigation example">
										<?php
										
										?> 
											<ul class="pagination justify-content-center">
												<li class="page-item <?php echo  $_GET['pagina']<2 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']-1?>" >
														Previous</a>
												</li>
												<?php
												for ($i=0;$i<$producto->numeropaginas();$i++) {
													?> 
												
												<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> "><a class="page-link" href="tienda.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
												<?php
												}
												?> 
												<li class="page-item <?php echo $_GET['pagina']>$producto->numeropaginas()-1 ? 'disabled' : '' ?>">
													<a class="page-link" href="tienda.php?pagina=<?php echo $_GET['pagina']+1?>" >
														Next</a>
												</li>
											</ul>
										</nav>
										</div>
								<?php	
							}
							?>         
						</div>
						</div>
					</div>
					<div class="col col-md-2">
						<div class=" bg-light mt-5 p-4">
							<h6 class="">Enlaces de interes</h6>

							<a href="https://www.youtube.com/@KaeruEnBonsaiStudio" target="_blank">David Cortizas</a>
							<br>
							<a href="https://www.youtube.com/c/DavidBenaventeBonsai" target="_blank">David Benavente</a>
							<br>
							<a href="https://www.youtube.com/@canaldebonsai1309" target="_blank">Canal de bonsai</a>
							<br>
							<a href="https://www.youtube.com/@BonsaiReleaf" target="_blank" >Bonsai Releaf</a>
							<br>
							<a href="https://www.youtube.com/@Bonsai-Colmenar">Bonsai Colmenar</a>
							<br>
							<a href="https://www.youtube.com/@kingiibonsai2713/featured">kingii bonsai</a>
						</div>

					</div>
				</div>



				<footer class="fooder row bg-light border-top border-bottom border-secondary mt-5">
					<div class="col text-center mt-5">

						<h4>Informacion de contacto</h4>
						<h6>
							Villarrobledo-Albacete <br>
							Telefono:671424198 <br>
							Peropela336@gmail.com
						</h6>
					</div>
					<div class="col text-center mt-5">
						<p>&copy; Pagina web de bonsais</p>
					</div>
					<div class="col text-center mt-5">
						<h3>Redes</h3>

						<a href="https://www.facebook.com/profile.php?id=100008619615493" target="_blank"><img class="img-fluid" src="img/facebook.png" width="60"></a>
						<a href="https://www.instagram.com/pedro_mr78/" target="_blank"><img class="img-fluid" src="img/insta.jpg" width="90"></a>
						<a href="https://www.linkedin.com/in/pedro-montero-rodriguez-9ab7841ab/" target="_blank"><img class="img-fluid" src="img/linkedin.jpg" width="60"></a>

					</div>


				</footer>
			</div>

			<?php
		}
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	</body>



</html>