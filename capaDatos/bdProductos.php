<?php

/**
 * bdusuarios.php
 * Módulo secundario que implementa la clase BDUsuarios.
 *
 */
/** Incluye la clase. */
include_once '../capaDatos/bdplantas.php';

class BDProductos extends BDPlantas {

	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private int $codProducto;

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setcodProducto(int $codProducto): void {
		$this->codProducto = $codProducto;
	}

	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getcodProducto(): int {
		return $this->codProducto;
	}

	/**
	 * Método que comprueba si existe el usuario en la base de datos.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function extraerProductos() {


		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Productos"
			);
			/** Vincula un parámetro al nombre de variable especificado. */
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {

				foreach ($resultado as $fila) {

					$producto = new Productos();

					$producto->setcodProducto($fila['codProducto']);
					$producto->setnombreProducto($fila['nombreProducto']);
					$producto->setdescripcion($fila['descripcion']);
					$producto->setcantidad($fila['cantidad']);
					$producto->setimg($fila['img']);
					$producto->setprecio($fila['precio']);

					$data[] = $producto;
				}


				return $data;
			}
		}
	}

	public function leerProductos(int $codProducto) {


		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Productos WHERE codProducto = :codProducto"
			);

			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':codProducto', $codProducto);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				if ($resultado->rowCount() > 0) {

					foreach ($resultado as $fila) {
						$producto = new Productos();

						$producto->setcodProducto($fila['codProducto']);
						$producto->setnombreProducto($fila['nombreProducto']);
						$producto->setdescripcion($fila['descripcion']);
						$producto->setcantidad($fila['cantidad']);
						$producto->setimg($fila['img']);
						$producto->setprecio($fila['precio']);

						$data[] = $producto;
					}


					return $data;
				}
			}
		}
	}

}
