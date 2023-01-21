<?php
/** Incluye la clase. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/productos.php';
include '../capaNegocio/cart.php';
include '../capaNegocio/compras.php';
require __DIR__ . "/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

session_start();

/** Inicia sesión. */
?>

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
if(isset($_POST['modicficaproducto'])){
		$producto = new Productos();
			
		$producto->setcodProducto($_POST['modicodpro']);
		$producto->setcantidad($_POST['modicantidadpro']);
		$producto->setprecio($_POST['modipreciopro']);
		$producto->setdescuento($_POST['modidescuentopro']);
	
		$producto->modificaProducto();
	
}


if (isset($_POST['eliminaproducto'])) {

	$producto = new Productos();
	$producto2 = new Productos();

	$producto->setcodProducto($_POST['eliminacodpro']);


	$producto2->setcodProducto($_POST['eliminacodpro']);
	$prod1 =$producto2->leerProductos();
	
	unlink('img/'.$prod1[0]->getimg());
		$producto->eliminaproducto();
}



if (isset($_POST['añadeproducto'])) {

$producto = new Productos();

	$producto->setcodProducto($_POST['añadecodpro']);
	$producto->setnombreProducto($_POST['añadenombrepro']);
	$producto->setdescripcion($_POST['añadedescripcionpro']);
	$producto->setcantidad($_POST['añadecantidadpro']);
	$producto->setimg($_FILES['añadeimgpro']['name']);
	$producto->setprecio($_POST['añadepreciopro']);
	$producto->settipo($_POST['añadetipopro']);
	$producto->setdescuento($_POST['añadedescuentopro']);

	$producto->añadeproducto();
	

	$name = "img/".basename($_FILES['añadeimgpro']['name']);

	move_uploaded_file($_FILES['añadeimgpro']['tmp_name'] , $name);
	?>
	<script>
		alert("producto añadido");
	</script>
	<?php

	

	

}
if (isset($_SESSION['usuario'])) {
	if ($_SESSION['usuario']->getEmail() == "admin@livingroots.es") {
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


			</head>

			<body>

				<div class="container-fluid">
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
									<form class="d-flex" method="post" action="tienda.php?pagina=1&search=4">
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
					<h3 class="text-center mt-5">DATOS EXCEL</h3>
					
						<form action="excel.php" method="post">
							<div class="row row-cols-2 col-md-8 m-auto mt-2 bg-light rounded border border-secondary text-center" id="productos">
						<div class="col p-2">
							<h5>Compras</h5>
							<input class="btn btn-primary mt-1" type="submit" value="descargar" name="compras">
						</div>
					
						<div class="col p-2">
							<h5>Productos</h5>
							<input class="btn btn-primary mt-1" type="submit" value="descargar" name="productos">
						</div>
									</div>
							</form>
				

					<h3 class="text-center mt-5">GESTOR</h3>
					<div class="row row-cols-3 col-md-8 m-auto mt-2 bg-light rounded border border-secondary" id="productos">

						<div class="col p-5">
							<form action="administracion.php" method="post" enctype="multipart/form-data">
								<h2>Añadir producto</h2>
								<p><small>Todos los campos son necesarios</small></p>
								Cod Producto
								<input class="form-control me-2" type="text" name="añadecodpro">
								Nombre Producto
								<input class="form-control me-2" type="text" name="añadenombrepro">
								Descripcion
								<input class="form-control me-2" type="text" name="añadedescripcionpro">
								Cantidad
								<input class="form-control me-2" type="number" name="añadecantidadpro">
								Precio
								<input class="form-control me-2" type="number" name="añadepreciopro">
								Tipo
								<br>
								<select class="form-select" me-2" name="añadetipopro">
									<option value="bonsai">bonsai</option>
									<option value="prebonsai">prebonsai</option>
									<option value="planton">planton</option>
								</select>
								<br>
								Imagen
								<input class="form-control" type="file" name="añadeimgpro" id="añadeimgpro">
								Porcentaje descuento
								<input class="form-control me-2" type="number" name="añadedescuentopro">
								<input class="btn btn-primary mt-1" type="submit" value="Añadir" name="añadeproducto">
							</form>
						</div>
						<div class="col p-5">
							<form action="administracion.php" method="post">
								<h2>Edita Producto</h2>
								<p><small>Todos los campos son necesarios</small></p>
								Añade indentificador<p><small>(Cod Producto)</small></p>
								<input class="form-control me-2" type="text" name="modicodpro">
								
								<hr>
								Modificadores
								<br>
								Cantidad
								<input class="form-control me-2" type="number" name="modicantidadpro">
								Precio
								<input class="form-control me-2" type="number" name="modipreciopro">
								Descuento
								<input class="form-control me-2" type="number" name="modidescuentopro">
								<input class="btn btn-primary mt-1" type="submit" name="modicficaproducto" value="modificar">
							</form>	
						</div>
						<div class="col p-5">
							<form action="administracion.php" method="post">
								<h2>Elimina Producto</h2>
								<p><small>Todos los campos son necesarios</small></p>
								ID Producto
								<input class="form-control me-2" type="number" name="eliminacodpro">
								<input class="btn btn-primary mt-1" type="submit" name="eliminaproducto" value="eliminar">
							</form>	
						</div>


					</div>



				</div>




		<?php
	} else {
		echo'Zona Restringida';
	}
} else {
	echo'Zona Restringida';
}
?>	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	</body>



</html>