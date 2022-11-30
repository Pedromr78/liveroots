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
			<title>Live Roots</title>
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
		?>



        <div class="container-fluid">


<?php
if (isset($_SESSION['usuario'])) {
	?>
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
	<?php
} else {
	?>
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
										<form class="d-flex" method="post" action="tienda.php?pagina=1&search=4">
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
	<?php
}
?>
            <br>
			<div class="row row-cols-1 col-md-8 m-auto p-5 bg-light rounded border border-secondary">


                <div class="col p-5">

                    <h5>1º En Shunka-En, un árbol de 800 años de edad, por Kunio Kobayashi</h5>
                    <p>Un árbol notable, conocido además por su vejez, cifrada en de ¡más de 800 años! Su propietario,
                        el
                        maestro Kobayashi, es uno de los más conocidos artistas de Bonsái en el mundo y ha ganado el
                        prestigioso
                        premio del Primer Ministro de Japón 4 veces. Su vivero, Shunka-En, se encuentra en Tokio y está
                        abierto
                        a los visitantes.</p>
                    <img src="img/1ª.jpg" height="500">

				</div>
				<div class="col p-5">
                    <h5>2º Goshin "protector de los espíritus", por John Naka</h5>
                    <p>Goshin ("protector del espíritu") es un Bonsái creado por John Y. Naka. Se trata de una
                        plantación
                        tipo
                        bosque con once enebros Foemina, de las primera que Naka comenzó a formar como Bonsái en el año
                        1948.
                        Naka lo donó a la National Bonsái Foundation en el año 1984, y se muestra en el United States
                        National
                        Arboretum, donde ha estado desde entonces. El árbol se puede encontrar en nuestra galería Top
                        Bonsái.
                    </p>
                    <img src="img/2ª.jpeg" height="600">
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

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	</body>



</html