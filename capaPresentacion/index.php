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
            <div id="display" class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
                <button type="button" id="quitar" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path
                            d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z" />
                    </svg></button>
            </div>

            </nav>
            <div class="row mb-lg-4">
                <div class="col">
                    
                    <div class="toast">
                        <div class="toast-header">
                          Este es mi toast
                        </div>
                        <div class="toast-body">
                          Some text inside the toast body
                        </div>
                      </div>
                </div>

                <div id="carrousel" class="col mt-5 m-lg-5 ">



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
                                    class="d-block w-70 mx-auto" style="height: 400px;">
                            </div>
                            <div class="carousel-item img-thumbnail">
                                <img src="img/banner/bonsai-de-junipero-viejo-830x622.jpg" alt="Chicago"
                                    class="d-block w-70 mx-auto" style="height: 400px;">
                            </div>
                            <div class="carousel-item img-thumbnail">
                                <img src="img/banner/KINGII-CENTRO-PROFESIONAL-BONSAI.jpg" alt="New York"
                                    class="d-block w-70 mx-auto" style="height: 400px;">
                            </div>
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev btn bg-secondary" type="button" data-bs-target="#demo"
                            data-bs-slide="prev" data-bs-toggle="tooltip" data-bs-placement="top" title="Back">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next btn bg-secondary" type="button" data-bs-target="#demo"
                            data-bs-slide="next" data-bs-toggle="tooltip" data-bs-placement="top" title="Next">
                            <span class="carousel-control-next-icon bg-secondary"></span>
                        </button>
                    </div>


                </div>
                <div class="col"></div>

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


                <section>
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
                </section>
            </div>

            <footer>
                <div class="fooder">
                    <table>
                        <td>
                            <h4>Informacion</h4>
                            <h6>
                                Villarrobledo-Albacete <br>
                                Calle Socuellamos nº53 <br>
                                Telefono:671424198 <br>
                                Peropela336@gmail.com
                            </h6>
                        </td>
                        <td>
                            <h3>Redes</h3>

                            <img src="img/facebook.png" height="40">
                            <img src="img/insta.jpg" height="40">

                        </td>
                        <td>
                            <h3>Comentarios</h3>
                            <input type="text" name="nombredelacaja">
                        <td>

                    </table>
                </div>
            </footer>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Registrate</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </div>
                        <div class="modal-body mx-3">
                            <div class="md-form mb-4">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="email" id="defaultForm-email" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
                            </div>

                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix grey-text"></i>
                                <input type="password" id="defaultForm-pass" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="defaultForm-pass">Contraseña</label>
                            </div>

                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix grey-text"></i>
                                <input type="text" id="defaultForm-pass" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="defaultForm-pass">Nombre</label>
                            </div>
                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix grey-text"></i>
                                <input type="text" id="defaultForm-pass" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="defaultForm-pass">Apellidos</label>
                            </div>
                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix grey-text"></i>
                                <input type="date" id="defaultForm-pass" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="defaultForm-pass">Fecha de
                                    nacimiento</label>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>


                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-default bg-primary text-white">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasLabel">Colaboradores</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  Pedro montero
                  <br>
                  Juan Camacho
                  <br>
                  Pablo Mecinas
                  <br>
                  Alberto Biosca
                  <br>
                  Antonio de la Fuente
                  <br>
                  Chorizo Jonshon
                </div>
              </div>
        </div>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="index.js"></script>

</html>