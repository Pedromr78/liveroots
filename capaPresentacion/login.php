
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
        <title>Living Roots</title>
        <link rel="stylesheet" href="index.css" type="text/css" media="screen" />


    </head>


<body>
 
        <div class="container-fluid">
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
                               


                                
                            <li class="nav-item dropdown ">
										<a id="info3" class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Informacion Cuidados
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											<li><a class="dropdown-item" href="topconocidos.php">Top Conocidos</a></li>
											<li><a class="dropdown-item" href="infoCuidados.php">Info Cuidados</a></li>

										</ul>
									</li>
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
					let tiempo = setTimeout(funcion, 1000);
				</script>
			<?php

				
			}
			else {
				
				?>
						<div class="row row-cols-2 justify-content-center">
         	<div class="col  bg-light rounded border border-secondary col-md-2 m-lg-5" id="productos">
                    <form class="m-lg-3" action="validausuario.php" method="post">
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
					<br>
				
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
                </div>
			<div class="col  bg-light rounded border border-secondary col-md-2 m-lg-5" id="productos">
                <form class="m-lg-3" action="registrausuario.php" method="post">
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
                    <div id="erroremail"></div>
                    <input type="text" name="email" id="email">
                    <br>
                    Fecha de Nacimiento:
                    <br>
					<div id="errorfechanacimiento"></div>
                    <input type="date" name="fechanacimiento" id="fechanacimiento">
                    <br>
                   Numero de Telefono:
                    <br>
					<div id="errortelefono"></div>
                    <input type="number" name="telefono" id="telefono">
                    <br>
                    Contraseña:
					<div id="errorcontra"></div>
                    <input type="text" name="contraseña" id="contraseña">
                    <br>

                    <input type="submit" value="Registrarse" id="registrarse">
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