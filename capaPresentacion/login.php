
<?php
/** Incluye las clases. */
include '../capaNegocio/usuario.php';
/** Inicia sesión. */
session_start();
?>

<!DOCTYPE html>
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
				<?php
			if (isset($_SESSION['usuario'])) {
				/** El usuario ya ha sido validado. */
			
			
				?>
				<script>
					alert("Inicio de usuario registrado o validado");
					function funcion() {
						window.open("../capaPresentacion/tienda.php", "_top");
					}
					let tiempo = setTimeout(funcion, 100);
				</script>
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
		

		
				<div class="row mt-5 justify-content-center">
						<div class="col col-md-1"><input class="btn btn-primary btn-lg btn-block" type="button" value="Login" id="login"></div>
						<div class="col col-md-1"><input class="btn btn-primary btn-lg btn-block" type="button" value="Registro" id="registro"></div>
				</div>
				<div class="row row-cols-1 justify-content-center mt-4">
					<div class="col  bg-light rounded border border-secondary col-md-4  p-5" id="log">
	                    <form class="" action="validausuario.php" method="post">
							Correo Electronico:
							<br>
							<input class="form-control me-2" type="text" name="emaillogin"  value="<?php
			if (isset($_COOKIE['email'])) {
				echo $_COOKIE['email'];
			} else {
				echo '';
			}
				?>">
							
							Contraseña:
							<br>
							<input class="form-control me-2" type="password" name="contraseñalogin" value="<?php
								   if (isset($_COOKIE['contraseña'])) {
									   echo $_COOKIE['contraseña'];
								   } else {
									   echo '';
								   }
								   ?>">
					
							<div>
							<input class="btn btn-secondary btn-sm mt-2" type="submit" value=" Iniciar ">
							
									
							<input type="checkbox" name="recordar"
								   <?php
								   if (isset($_COOKIE['recordar'])) {
									   echo 'checked';
								   } else {
									   echo '';
								   }
								   ?>>Recordar 
							</div>
	                    </form>
	                </div>
					
					<div class="col  bg-light rounded border border-secondary col-md-4  p-5" id="reg" style="display:none;">
						<form class="m-lg-3" action="registrausuario.php" method="post">
							
							Nombre:
							<br>
							<input class="form-control me-2" type="text" name="nombre">
							
							Apellidos:
							<br>
							<input class="form-control me-2" type="text" name="apellidos">
							
							Correo Electronico:
							<div id="erroremail"></div>
							<input class="form-control me-2" type="text" name="email" id="email">
						
							Fecha de Nacimiento:
							<br>
							<div id="errorfechanacimiento"></div>
							<input class="form-control me-2" type="date" name="fechanacimiento" id="fechanacimiento">
							
							Numero de Telefono:
							<br>
							<div id="errortelefono"></div>
							<input class="form-control me-2" type="number" name="telefono" id="telefono">
						
							Contraseña:
							<div id="errorcontra"></div>
							<input class="form-control me-2" type="password" name="contraseña" id="contraseña">
							
							<input class="btn btn-secondary btn-sm mt-2" type="submit" value="Registrarse" id="registrarse">
	                    </form>
					</div>
					
	<?php
}
?>
			</div>


	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="js/capapresentacion/login.js"></script>
</html>