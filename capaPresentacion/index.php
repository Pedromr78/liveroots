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




       
              

                <div id="carrousel" class="col-md-5 m-auto">



                    <div id="demo" class="carousel slide" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators ">
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"
									data-bs-toggle="tooltip" data-bs-placement="top" title="back"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2" data-bs-toggle="tooltip"
									data-bs-placement="top" title="next"></button>
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner ">
                            <div class="carousel-item active img-thumbnail">
                                <img src="img/banner/bonsai_de_olivo_decoracion_800x800.webp" alt="Los Angeles"
									 class="d-block w-70 mx-auto img-fluid" style="height: 400px;">
                            </div>
                            <div class="carousel-item img-thumbnail">
                                <img src="img/banner/bonsai-de-junipero-viejo-830x622.jpg" alt="Chicago"
									 class="d-block w-70 mx-auto img-fluid" style="height: 400px;">
                            </div>
                            <div class="carousel-item img-thumbnail">
                                <img src="img/banner/KINGII-CENTRO-PROFESIONAL-BONSAI.jpg" alt="New York"
									 class="d-block w-70 mx-auto img-fluid" style="height: 400px;">
                            </div>
                        </div>

                     
                       
                    </div>


                </div>
                




            <div class="info">

                <section>
                    <div class="info2 bg-light">

                        <div class="descripcion m-lg-1">

                            <h2 style="color:forestgreen;">Sabes que son los Bonsais?</h2>
                            <p>es una palabra de origen japonés que significa literalmente bon = "bandeja" + sai =
                                "cultivar"
                                (aunque etimológicamente procede del término chino 盆栽, penzai, que significa pén =
                                "cuenco"
                                +
                                zāi = "planta") y consiste en el arte de cultivar árboles y plantas, normalmente
                                arbustos,
                                controlando su tamaño para que permanezca de un tamaño muy inferior al natural, mediante
                                técnicas, como el trasplante, la poda, el alambrado, el pinzado, etc., y modelando su
                                forma
                                para
                                crear un estilo que nos recuerde una escena de la naturaleza. Es indisociable de la
                                maceta,
                                ya
                                que el bonsái se entiende como el conjunto que conforman árbol y maceta.
                                Es un árbol perenne que puede crecer hasta 25 metros en condiciones excepcionales,
                                aunque
                                generalmente no suele pasar de los 15. Se caracteriza por su amplia copa redondeada y
                                por su
                                fruto, que recibe el nombre de bellota.

                                Su tronco es liso en los ejemplares jóvenes y en los más viejos se resquebraja, agrieta
                                y
                                adopta un color más oscuro.

                                Sus hojas son simples, bastante pequeñas y con pinchos en las puntas, que van
                                desapareciendo
                                en la medida que el árbol va madurando.</p>
                            <h6>Creadores de Bonsai</h6>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Cuenta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="img">
                            <header>

                                <div class="card" style="width: 20rem;">
                                    <img class="rounded float-start" src="img/fotohoja.jpg" alt="Flower" height="400" />

                                    <div class="card-body">
                                        <h5 class="card-title">Mi imagen</h5>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>

                                    </div>
                                </div>

                            </header>
                        </div>
                    </div>
                </section>


               
                    <div class=" info2 bg-light">
                        <article>
                            <div class="descripcion m-lg-1">
                                <header class="header">
                                    <h2 style="color:forestgreen;">This is the title of a blog post</h2>
                                    <p>Posted on <time datetime="2009-06-29T23:31+01:00">14 Octubre 2019</time> by <a
                                            href="#">Pedro
                                            Montero</a> - <a href="#comments">3 comments</a></p>
                                </header>
                                <div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tellus eu
                                        orci
                                        imperdiet nec rutrum lacus blandit. Cras enim nibh, sodales ultricies elementum
                                        vel,
                                        fermentum id tellus. Proin metus odio, ultricies eu pharetra dictum, laoreet id
                                        odio.
                                        Curabitur in odio augue. Morbi congue auctor interdum. Phasellus sit amet metus
                                        justo.
                                        Phasellus vitae tellus orci, at elementum ipsum. In in quam eget diam adipiscing
                                        condimentum. Maecenas gravida diam vitae nisi convallis vulputate quis sit amet
                                        nibh.
                                        Nullam
                                        ut velit tortor. Curabitur ut elit id nisl volutpat consectetur ac ac lorem.
                                        Quisque non
                                        elit et elit lacinia lobortis nec a velit. Sed ac nisl sed enim consequat
                                        porttitor.</p>

                                    <!-- <video src="img/Bonsáis.mp4"  controls autoplay preload="auto" height="200"></video> -->

                                    <p>Pellentesque ut sapien arcu, egestas mollis massa. Fusce lectus leo, fringilla at
                                        aliquet
                                        sit
                                        amet, volutpat non erat. Aenean molestie nibh vitae turpis venenatis vel
                                        accumsan nunc
                                        tincidunt. Suspendisse id purus vel felis auctor mattis non ac erat.
                                        Pellentesque
                                        sodales
                                        venenatis condimentum. Aliquam sit amet nibh nisi, ut pulvinar est. Sed
                                        ullamcorper nisi
                                        vel
                                        tortor volutpat eleifend. Vestibulum iaculis ullamcorper diam consectetur
                                        sagittis.
                                        Quisque
                                        vitae mauris ut elit semper condimentum varius nec nisl. Nulla tempus porttitor
                                        dolor ac
                                        eleifend. Proin vitae purus lectus, a hendrerit ipsum. Aliquam mattis lacinia
                                        risus in
                                        blandit.</p>

                                    <p>Vivamus vitae nulla dolor. Suspendisse eu lacinia justo. Vestibulum a felis ante,
                                        non
                                        aliquam
                                        leo. Aliquam eleifend, est viverra semper luctus, metus purus commodo elit, a
                                        elementum
                                        nisi
                                        lectus vel magna. Praesent faucibus leo sit amet arcu vehicula sed facilisis
                                        eros
                                        aliquet.
                                        Etiam sodales, enim sit amet mollis vestibulum, ipsum sapien accumsan lectus,
                                        eget
                                        ultricies
                                        arcu velit ut diam. Aenean fermentum luctus nulla, eu malesuada urna consequat
                                        in.
                                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                                        turpis
                                        egestas. Pellentesque massa lacus, sodales id facilisis ac, lobortis sed arcu.
                                        Donec
                                        hendrerit fringilla ligula, ac rutrum nulla bibendum id. Cras sapien ligula,
                                        tincidunt
                                        eget
                                        euismod nec, ultricies eu augue. Nulla vitae velit sollicitudin magna mattis
                                        eleifend.
                                        Nam
                                        enim justo, vulputate vitae pretium ac, rutrum at turpis. Aenean id magna neque.
                                        Sed
                                        rhoncus
                                        aliquet viverra.</p>
                                </div>
                                <button type="button" class="btn btn-lg btn-primary" data-toggle="popover" title="Here is Content Heading" data-content="Here is the actual content inside the popover box and below the heading.">
                                    MiPopover
								</button>
                            </div>
                        </article>
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
	<script src="index.js"></script>

</html>