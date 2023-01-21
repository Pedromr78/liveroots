<?php

/** Incluye la clase. */
include '../capaNegocio/usuario.php';
/** Inicia sesión. */
session_start();
?>

<!--
	* registrausuario.php
	* Módulo secundario que almacena los datos de un nuevo usuario.
	*
-->

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Live Roots</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="icon" type="image/png" href="imagenes/favicon.ico" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="text-center">
	<header>
		<h1><img src="img/logo titulo.png" width="170"></h1>
	</header>
	<nav>



	</nav>
	<article>
		<h3>Registrar usuario</h3>
		<?php
		/** Si el usuario se ha validado. */
		// if (!isset($_SESSION['usuario'])) {
		/** Si todos los campos del formulario tienen algún valor... */
		if (
			!empty($_POST['email']) && !empty($_POST['contraseña']) &&
			!empty($_POST['nombre']) && !empty($_POST['apellidos'])
			&& !empty($_POST['telefono']) && !empty($_POST['fechanacimiento'])
		) {
			/** @var Usuario Instancia un objeto de la clase. */
			$usuario = new Usuario();
			//			
			/** Inicializa la propiedad nombre. */
			$usuario->setEmail($_POST['email']);
			$usuario->setContraseña($_POST['contraseña']);
			$usuario->setNombre($_POST['nombre']);
			$usuario->setApellidos($_POST['apellidos']);
			$usuario->setFechaNacimiento($_POST['fechanacimiento']);
			$usuario->setTelefono($_POST['telefono']);
			/** Comprueba si existe el usuario. */
			if (!$usuario->existeUsuario()) {
				/** Intenta almacenar al usuario y comprueba un posible error. */
				if ($usuario->insertaUsuario()) {

					/** @var Usuario Variable de sesión con los datos del objeto $usuario. */
					$_SESSION['usuario'] = $usuario;
					/** Usuario validado con éxito. */
					echo '<h4>Usuario registrado correctamente</h4>';

		?>
					<script>
						function funcion() {
							window.open("../capaPresentacion/tienda.php","_top");
						}
						let tiempo = setTimeout(funcion, 1000);
					</script>
				<?php
				} else {
					/** Se ha producido un error al registrar el usuario. */
					echo '<h5>Error al registrar el usuario</h5>';
				?>
					<script>
						function funcion() {
							window.open("../capaPresentacion/login.php","_top");
						}
						let tiempo = setTimeout(funcion, 1000);
					</script>
				<?php
				}
			} else {
				/** Se intenta registrar un usuario existente. */
				echo '<h5>El usuario ya existe en la base de datos</h5>';
				?>
				<script>
					function funcion() {
						window.open("../capaPresentacion/login.php","_top");
					}
					let tiempo = setTimeout(funcion, 1000);
				</script>
			<?php
			}
			//final else
			//}
			/*else{
						echo $usuario->mensajeContraseña($_POST['contraseña']);
					}
					*/
		} else {
			/** Si algún campo del formulario no está inicializado... */
			if (
				isset($_POST['email']) || isset($_POST['contraseña']) ||
				isset($_POST['nombre']) || isset($_POST['apellidos']) ||
				isset($_POST['telefono']) || isset($_POST['fechanacimiento']) 
			) {
				echo "<h5>Error al registrar el usuario
							<br>Todos los campos son obligatorios</h5>";
			?>
				<script>
					function funcion() {
						window.open("../capaPresentacion/login.php", "", "");
					}
					let tiempo = setTimeout(funcion, 1000);
				</script>
		<?php
			}
		}
		// } else {
		// 	/** Si el usuario no se ha validado. */
		// 	echo '<h5>El usuario no ha sido validado correctamente</h5>';
		// 	
		?>
		 <script>
			// 		function funcion() {
			// 			window.open("../capaPresentacion/login.php", "", "");
			// 		}
			// 		let tiempo = setTimeout(funcion, 5000);
			// 	
		</script>
		 <?php
			// }
			// 
			?>
	</article>
	</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>