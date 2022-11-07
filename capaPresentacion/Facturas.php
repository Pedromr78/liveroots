
<?php
/** Incluye la clase. */
ob_start();
include '../capaNegocio/usuario.php';
include '../capaNegocio/productos.php';
include '../capaNegocio/compras.php';
include '../capaNegocio/cart.php';

session_start();

/** Inicia sesión. */
?>
<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Living Roots</title>

	<title></title>

</head>

<body>
	 <div class="total">
        <div class="container-fluid">
            <header>
                <div class="row">
                    <div class="col">
						  <img src="../capaPresentacion/img/logo.png" width="200"> 
                    </div>
                    <div class="titulo col">
                    
					   <h1>Living Roots</h1>
                    </div>
                    <div class="col"></div>
                </div>
            </header>
			
			
			
			
<?php
			
			if (isset($_SESSION['usuario'])) {
				$total = 0;
				$idfactura= $_POST['idfactura'];
				$compras= new Compras();
				$producto = new Productos();
				$compra=$compras->extraerFactura($idfactura,$_SESSION['usuario']->getEmail());
					?> 
			<h4>Usuario <?php echo $_SESSION['usuario']->getNombre();?></h4>
				<h4>Nº de pedido <?php echo $compra[0]->getidcompra() ?></h4> 
				
					<?php
	
				foreach ($compra as $fila) {
						$datosproductos = $producto->leerProductos($fila->getidpro());
						?> 
			
				<p><?php echo $datosproductos[0]->getnombreProducto()?> x<?php echo $fila->getcantidad()?> <?php echo $fila->getprecio() ?>$ iva incluido (21%)</p>
				
			<?php
				$iva=$fila->getprecio()* 0.21;
				$precio = $fila->getprecio()+$iva;
			
				echo $precio;
			$cantipro = $fila->getcantidad();
			$conjun = $cantipro * $precio;
			$total += $conjun;
				}
			?> 
				<hr>
			<?php	
			
					echo '<h3>Total ' . $total . ' $<h3>';
			}
				?>


		</div>
</div>
	
</body>
 		

</html>
<?php
$html= ob_get_clean();

include_once '../capaPresentacion/librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$compras= new Compras();


$compra=$compras->extraerFactura($idfactura,$_SESSION['usuario']->getEmail());
$nombrearchivo=$compra[0]->getidcompra();


$options= $dompdf->getOptions();
$options ->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$dompdf->stream("$nombrearchivo.pdf",array("Attachment"=> false));


?>