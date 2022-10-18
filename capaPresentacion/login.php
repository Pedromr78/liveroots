
<?php
/** Incluye las clases. */
include '../capaNegocio/usuario.php';
/** Inicia sesión. */
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Living Roots</title>
        <link rel="stylesheet" href="index.css" type="text/css" media="screen" />


    </head>
</head>

<body>
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

                        <a class="navbar-brand" href="index.php">Inicio</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Productos
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Venta</a></li>
                                        <li><a class="dropdown-item" href="#">Info Productos</a></li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Info Colaboradores</a></li>
                                    </ul>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Informacion general
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="topconocidos.html">Top Conocidos</a></li>
                                        <li><a class="dropdown-item" href="#">Conocidos</a></li>
                                        <li><a class="dropdown-item" href="#">Distintos Tipos</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Informacion tienda
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Temaperaturas</a></li>
                                        <li><a class="dropdown-item" href="#">Localidad</a></li>
                                        <li><a class="dropdown-item" href="#" data-bs-target="#myModal"
                                                data-bs-toggle="modal">Formulario</a></li>

                                    </ul>
                                </li>
                       
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php ">
                                       Login/Register
                                    </a>
                                   
                                </li>
                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>

                        </div>

                    </div>
		
            </div>
							<?php
			if (isset($_SESSION['usuario'])) {
				echo 'Usuario: ' . $_SESSION['usuario']->getNombre();
			}
			?>

		
			<?php
			if (isset($_SESSION['usuario'])) {
				/** El usuario ya ha sido validado. */
				echo '<h4>Inicio de usuario registrado o validado</h4>';
			?>
				<script>
					function funcion() {
						window.open("../capaPresentacion/tienda.php","_top");
					}
					let tiempo = setTimeout(funcion, 5000);
				</script>
			<?php

				
			}
			else {
				
				?>
            <table>
                <td>
                    <form action="validausuario.php" method="post">
                    <h1>Login</h1>
                    Correo Electronico:
                    <br>
                    <input type="text" name="emaillogin"  value="<?php
												   if (isset($_COOKIE['email'])) {
													   echo $_COOKIE['email'];
												   }
												   else {
													   echo '';
												   }
												   ?>">
                    <br>
                    Contraseña:
                    <br>
                    <input type="text" name="contraseñalogin" value="<?php
												   if (isset($_COOKIE['contraseña'])) {
													   echo $_COOKIE['contraseña'];
												   }
												   else {
													   echo '';
												   }
												   ?>">
                    <br>
                    <input type="submit" value="Iniciar">
				
					<input type="checkbox" name="recordar"
											<?php
											if (isset($_COOKIE['recordar'])) {
												echo 'checked';
											}
											else {
												echo '';
											}
											?>>Recordar 
                    </form>
                </td>
              
                <td>
                <form action="registrausuario.php" method="post">
                    <h1>Registred</h1>
                    Nombre:
                    <br>
                    <input type="text" name="nombre">
                    <br>
                    Apellidos:
                    <br>
                    <input type="text" name="apellidos">
                    <br>
                    Correo Electronico:
                    <br>
                    <input type="text" name="email">
                    <br>
                    Fecha de Nacimiento:
                    <br>
                    <input type="date" name="fechanacimiento">
                    <br>
                   Numero de Telefono:
                    <br>
                    <input type="number" name="telefono">
                    <br>
                    Contraseña:
                    <br>
                    <input type="text" name="contraseña">
                    <br>

                    <input type="submit" value="Registrarse">
                    </form>
                </td>

            </table>
			<?php
			}
				?>
        </div>

    </div>
</body>

</html>