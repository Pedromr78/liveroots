<?php
include '../capaNegocio/usuario.php';
session_start();
include '../capaNegocio/compras.php';
include '../capaNegocio/productos.php';
require __DIR__ . "/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
if (isset($_SESSION['usuario'])) {
	if ($_SESSION['usuario']->getEmail() == "admin@livingroots.es") {
 if(isset($_POST['compras'])){
$compra=new Compras();
$documento = new Spreadsheet();

$array=$compra->todaslasCompras();

$documento
    ->getProperties()
    ->setCreator("Aquí va el creador, como cadena")
    ->setLastModifiedBy('Parzibyte') // última vez modificado por
    ->setTitle('Mi primer documento creado con PhpSpreadSheet')
    ->setSubject('El asunto')
    ->setDescription('Este documento fue generado para parzibyte.me')
    ->setKeywords('etiquetas o palabras clave separadas por espacios')
    ->setCategory('La categoría');
 
$hoja = $documento->getActiveSheet();
	$hoja->setTitle('Compras');
	$hoja->setCellValue('A1', 'Email');
	$hoja->setCellValue('B1', 'Codigo de Compra');
	$hoja->setCellValue('C1', 'Codigo de Producto');
	$hoja->setCellValue('D1', 'Fecha Compra');
	$hoja->setCellValue('E1', 'Cantidad');
	$hoja->setCellValue('F1', 'Precio');
	$fila=2;
	foreach ($array as$fila2){
		$hoja->setCellValue('A'.$fila,$fila2->getemail());
		$hoja->setCellValue('B'.$fila,$fila2->getidcompra());
		$hoja->setCellValue('C'.$fila,$fila2->getidpro());
		$hoja->setCellValue('D'.$fila,$fila2->getfecha());
		$hoja->setCellValue('E'.$fila,$fila2->getcantidad());
		$hoja->setCellValue('F'.$fila,$fila2->getprecio());
		$fila++;
	}
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="compras.xlsx"');
header('Cache-Control: max-age=0');
 
$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;
}
 else if(isset($_POST['productos'])){
	 
	$productos= new Productos();
$documento = new Spreadsheet();

$array=$productos->extraertodosProductos();

$documento
    ->getProperties()
    ->setCreator("Aquí va el creador, como cadena")
    ->setLastModifiedBy('Parzibyte') // última vez modificado por
    ->setTitle('Mi primer documento creado con PhpSpreadSheet')
    ->setSubject('El asunto')
    ->setDescription('Este documento fue generado para parzibyte.me')
    ->setKeywords('etiquetas o palabras clave separadas por espacios')
    ->setCategory('La categoría');
 
$hoja = $documento->getActiveSheet();
	$hoja->setTitle('Compras');
	$hoja->setCellValue('A1', 'Codigo Producto');
	$hoja->setCellValue('B1', 'Nombre Producto');
	$hoja->setCellValue('C1', 'descripcion');
	$hoja->setCellValue('D1', 'cantidad');
	$hoja->setCellValue('E1', 'precio');
	$hoja->setCellValue('F1', 'tipo');
	$hoja->setCellValue('G1', 'descuento');
	$hoja->setCellValue('H1', 'imagen');
	$fila=2;
	foreach ($array as$fila2){
		$hoja->setCellValue('A'.$fila,$fila2->getcodProducto());
		$hoja->setCellValue('B'.$fila,$fila2->getnombreProducto());
		$hoja->setCellValue('C'.$fila,$fila2->getdescripcion());
		$hoja->setCellValue('D'.$fila,$fila2->getcantidad());
		$hoja->setCellValue('E'.$fila,$fila2->getprecio());
		$hoja->setCellValue('F'.$fila,$fila2->gettipo());
		$hoja->setCellValue('G'.$fila,$fila2->getdescuento());
		$hoja->setCellValue('H'.$fila,$fila2->getimg());
		
		$fila++;
	}
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="productos.xlsx"');
header('Cache-Control: max-age=0');
 
$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;
	 
}

	}

	}

	