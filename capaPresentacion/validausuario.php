<?php
/** Incluye la clase. */
include '../capaNegocio/usuario.php';
/** Inicia sesión. */
session_start();
/** Si hemos marcado la casilla de verificación... */
if (isset($_POST['recordar'])) {
	/** Crea las cookies. */
	setcookie('email', $_POST['emaillogin'], time() + (60 * 60 * 24 * 90));
	setcookie('contraseña', $_POST['contraseñalogin'], time() + (60 * 60 * 24 * 90));
	setcookie('fechaSesion', date("Y-m-d H:i:s"), time() + (60 * 60 * 24 * 90));
	setcookie('recordar', 'on', time() + (60 * 60 * 24 * 90));
} else {
	/** En caso contrario, borra las cookies. */
	setcookie('email', '', time() - 3600);
	setcookie('contraseña', '', time() - 3600);
	setcookie('fechaSesion', '', time() - 3600);
	setcookie('recordar', '', time() - 3600);
}
?>

<!--
	* validausuario.php
	* Módulo secundario que valida o autentifica un usuario ya registrado.
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

			<?php
			if (isset($_SESSION['usuario'])) {

				echo 'Usuario: ' . $_SESSION['usuario']->getNombre();
				?>
				<script>
					function funcion() {
						window.open("../capaPresentacion/tienda.php", "_top");
					}
					let tiempo = setTimeout(funcion, 1000);
				</script>
				<?php
			}
			?>

		</nav>
		<article>
			<h3>Validar usuario</h3>
			
				<?php
				// if (!isset($_SESSION['usuario'])) {
				/** Si todos los campos del formulario tienen algún valor... */
				if (!isset($_SESSION['usuario'])) {
					if (!empty($_POST['emaillogin']) && !empty($_POST['contraseñalogin'])) {
						/** @var Usuario Instancia un objeto de la clase Usuario. */
						$usuario = new Usuario();
						/** Inicializa los atributos del objeto. */
						$usuario->setEmail($_POST['emaillogin']);
						$usuario->setContraseña($_POST['contraseñalogin']);
						/** Valida el email y la contraseña del usuario. */
						if ($usuario->validaUsuario()) {
							/** @var Usuario Variable de sesión con el objeto $usuario. */
							$_SESSION['usuario'] = $usuario;
							// /** Usuario validado con éxito. */
							echo '<h4>Usuario validado correctamente</h4>';
							?>
							<script>
			                    function funcion() {
			                        window.open("../capaPresentacion/tienda.php", "_top");
			                    }
			                    let tiempo = setTimeout(funcion, 1000);
							</script>
			<?php
		} else {
			/** No es posible validar el usuario. */
			echo '<h5>Error al validar el usuario</h5>';
			?>
							<script>
			                    function funcion() {
			                        window.open("../capaPresentacion/login.php", "_top");
			                    }
			                    let tiempo = setTimeout(funcion, 1000);
							</script>
			<?php
		}
	} else {
		/** Si algún campo del formulario no está inicializado... */
		if (isset($_POST['email']) || isset($_POST['contraseña'])) {
			echo "<h5>Error al validar el usuario
							<br>Todos los campos son obligatorios</h5>";
			?>
							<script>
			                    function funcion() {
			                        window.open("../capaPresentacion/login.php", "_top");
			                    }
			                    let tiempo = setTimeout(funcion, 1000);
							</script>
			<?php
		}
	}
} else {
	/** Si el usuario no se ha validado. */
	echo '<h5>El usuario no ha sido validado correctamente</h5>';
}
?>
		</article>
	
	</div>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>