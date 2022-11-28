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
	 * @var integer Nombre del Producto.
	 * @access private
	 */
	private string $nombreProducto;

	/**
	 * @var integer descripcion.
	 * @access private
	 */
	private string $descripcion;

	/**
	 * @var integer cantidad del producto.
	 * @access private
	 */
	private int $cantidad;

	/**
	 * @var integer cantidad del producto.
	 * @access private
	 */
	private string $img;

	/**
	 * @var integer cantidad del producto.
	 * @access private
	 */
	private int $precio;
			/**
	 * @var integer cantidad del producto.
	 * @access private
	 */
	private string $tipo;
		/**
	 * @var integer cantidad del producto.
	 * @access private
	 */
	private int $descuento;

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
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setnombreProducto(string $nombreProducto): void {
		$this->nombreProducto = $nombreProducto;
	}

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setdescripcion(string $descripcion): void {
		$this->descripcion = $descripcion;
	}

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setcantidad(int $cantidad): void {
		$this->cantidad = $cantidad;
	}

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setimg(string $img): void {
		$this->img = $img;
	}

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setprecio(int $precio): void {
		$this->precio = $precio;
	}
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function settipo(string $tipo): void {
		$this->tipo = $tipo;
	}
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setdescuento(int $descuento): void {
		$this->descuento = $descuento;
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
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getnombreProducto(): string {
		return $this->nombreProducto;
	}

	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getdescripcion(): string {
		return $this->descripcion;
	}

	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getcantidad(): int {
		return $this->cantidad;
	}

	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getimg(): string {
		return $this->img;
	}

	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getprecio(): int {
		return $this->precio;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function gettipo(): string {
		return $this->tipo;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getdescuento(): int {
		return $this->descuento;
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
					$producto->settipo($fila['tipo']);
					$producto->setdescuento($fila['descuento']);

					$data[] = $producto;
				}


				return $data;
			}
		}
	}

	public function leerProductos() {


		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Productos WHERE codProducto = :codProducto"
			);

			/** Vincula un parámetro al nombre de variable especificado. */
			$codProducto=$this->codProducto;
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
						$producto->setdescuento($fila['descuento']);

						$data[] = $producto;
					}


					return $data;
				}
			}
		}
	}
	
	
	/**
	 * Método que comprueba si existe el usuario en la base de datos.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function Filtro() {
		

		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Productos WHERE tipo = :planton"
			);
			/** Vincula un parámetro al nombre de variable especificado. */
			$tipo=$this->tipo;
			$resultado->bindParam(':planton',$tipo);
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
					$producto->setdescuento($fila['descuento']);

					$data[] = $producto;
				}


				return $data;
			}
		}
	}
		/**
	 * Método que comprueba si existe el usuario en la base de datos.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function buscador(string $valor) {
		

		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
						'SELECT *
						FROM Productos 
						WHERE nombreProducto LIKE "%":nombre"%" OR descripcion LIKE "%":nombre"%"'
			);
			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':nombre',$valor);
			
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			$resultado->execute();

				foreach ($resultado as $fila) {

					$producto = new Productos();

					$producto->setcodProducto($fila['codProducto']);
					$producto->setnombreProducto($fila['nombreProducto']);
					$producto->setdescripcion($fila['descripcion']);
					$producto->setcantidad($fila['cantidad']);
					$producto->setimg($fila['img']);
					$producto->setprecio($fila['precio']);
					$producto->setdescuento($fila['descuento']);
					

					$data[] = $producto;
				}


				return $data;
			
		}
	}
	/**
	 * Método que inserta un nuevo usuario en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function añadeproducto() {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"INSERT INTO Productos (codProducto,nombreProducto,descripcion,cantidad,img,precio,tipo,descuento)
						VALUES (:codProducto, :nombreProducto, :descripcion, :cantidad, :img, :precio, :tipo, :descuento)");
			/** Vincula un parámetro al nombre de variable especificado. */
			$codProducto = $this->codProducto;
			$resultado->bindParam(':codProducto', $codProducto);
			$nombreProducto = $this->nombreProducto;
			$resultado->bindParam(':nombreProducto', $nombreProducto);
			$descripcion = $this->descripcion;
			$resultado->bindParam(':descripcion', $descripcion);
			$cantidad = $this->cantidad;
			$resultado->bindParam(':cantidad', $cantidad);
			$img = $this->img;
			$resultado->bindParam(':img', $img);
			$precio = $this->precio;
			$resultado->bindParam(':precio', $precio);
			$tipo = $this->tipo;
			$resultado->bindParam(':tipo', $tipo);
			$descuento = $this->descuento;
			$resultado->bindParam(':descuento', $descuento);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
		$resultado->execute();
		}
		/** Devuelve false si se ha producido un error. */
	
	}
	public function eliminaproducto() {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"DELETE 
						FROM Productos WHERE codProducto = :codProducto");
			/** Vincula un parámetro al nombre de variable especificado. */
			$codProducto = $this->codProducto;
			$resultado->bindParam(':codProducto', $codProducto);
			
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
		$resultado->execute();
		}
		/** Devuelve false si se ha producido un error. */
	
	}
	
	/**
	 * Método que valida un usuario en la base de datos.
	 * 
	 * @access public
	 * @return boolean	True si existe
	 * 					False en otro caso.
	 */
	public function modificaProducto(): bool {

		if ($this->pdocon) {
			$resultado = $this->pdocon->prepare(
				"UPDATE  Productos SET cantidad = :cantidad,
						precio = :precio,
						descuento = :descuento
					 WHERE codProducto = :codProducto");
			$codprod = $this->codProducto;
			$cantidad = $this->cantidad;
			$precio = $this->precio;
			$dscuento = $this->descuento;
			$resultado->bindParam(':codProducto', $codprod);
			$resultado->bindParam(':cantidad', $cantidad);
			$resultado->bindParam(':precio', $precio);
			$resultado->bindParam(':descuento', $dscuento);
			$resultado->execute();
				return true;
			
		}
		return false;
	}
		public function reduceCantidadProducto(): bool {

		if ($this->pdocon) {
			$resultado = $this->pdocon->prepare(
				"UPDATE  Productos SET cantidad = :cantidad
					 WHERE codProducto = :codProducto");
			$codprod = $this->codProducto;
			$cantidad = $this->cantidad;
		
			$resultado->bindParam(':codProducto', $codprod);
			$resultado->bindParam(':cantidad', $cantidad);
	
			$resultado->execute();
				return true;
			
		}
		return false;
	}

	
	
	
	
	
	

}
