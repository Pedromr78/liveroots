<?php

/**
 * bdproductos.php
 * Módulo secundario que implementa la clase BDProductos.
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
	 * @var string Nombre del Producto.
	 * @access private
	 */
	private string $nombreProducto;

	/**
	 * @var string descripcion.
	 * @access private
	 */
	private string $descripcion;

	/**
	 * @var integer cantidad del producto.
	 * @access private
	 */
	private int $cantidad;

	/**
	 * @var string imagen del producto.
	 * @access private
	 */
	private string $img;

	/**
	 * @var integer precio del producto.
	 * @access private
	 */
	private int $precio;

	/**
	 * @var string tipo del producto.
	 * @access private
	 */
	private string $tipo;

	/**
	 * @var integer descuento del producto.
	 * @access private
	 */
	private int $descuento;

	/**
	 * Método que inicializa el atributo codProducto.
	 *
	 * @access public
	 * @param integer $codProducto Identificador del producto.
	 * @return void
	 */
	public function setcodProducto(int $codProducto): void {
		$this->codProducto = $codProducto;
	}

	/**
	 * Método que inicializa el atributo nombreProducto.
	 *
	 * @access public
	 * @param string $nombreProducto nombre del producto.
	 * @return void
	 */
	public function setnombreProducto(string $nombreProducto): void {
		$this->nombreProducto = $nombreProducto;
	}

	/**
	 * Método que inicializa el atributo desccripcion.
	 *
	 * @access public
	 * @param string $descripcion descripcion del producto.
	 * @return void
	 */
	public function setdescripcion(string $descripcion): void {
		$this->descripcion = $descripcion;
	}

	/**
	 * Método que inicializa el atributo cantidad.
	 *
	 * @access public
	 * @param integer $cantidad cantidad del producto.
	 * @return void
	 */
	public function setcantidad(int $cantidad): void {
		$this->cantidad = $cantidad;
	}

	/**
	 * Método que inicializa el atributo img(imagen).
	 *
	 * @access public
	 * @param string $img Imagen del producto.
	 * @return void
	 */
	public function setimg(string $img): void {
		$this->img = $img;
	}

	/**
	 * Método que inicializa el atributo precio.
	 *
	 * @access public
	 * @param integer $precio Precio del producto.
	 * @return void
	 */
	public function setprecio(int $precio): void {
		$this->precio = $precio;
	}

	/**
	 * Método que inicializa el atributo tipo.
	 *
	 * @access public
	 * @param string $tipo atributo que diferencia el tipo de producto.
	 * @return void
	 */
	public function settipo(string $tipo): void {
		$this->tipo = $tipo;
	}

	/**
	 * Método que inicializa el atributo descuento.
	 *
	 * @access public
	 * @param integer $descuento descuento del Producto.
	 * @return void
	 */
	public function setdescuento(int $descuento): void {
		$this->descuento = $descuento;
	}

	/**
	 * Método que devuelve el valor del atributo codProducto.
	 *
	 * @access public
	 * @return Int Identificador del producto.
	 */
	public function getcodProducto(): int {
		return $this->codProducto;
	}

	/**
	 * Método que devuelve el valor del atributo nombreProducto.
	 *
	 * @access public
	 * @return String Nombre del producto.
	 */
	public function getnombreProducto(): string {
		return $this->nombreProducto;
	}

	/**
	 * Método que devuelve el valor del atributo descripcion.
	 *
	 * @access public
	 * @return String descripcion del producto.
	 */
	public function getdescripcion(): string {
		return $this->descripcion;
	}

	/**
	 * Método que devuelve el valor del atributo cantidad.
	 *
	 * @access public
	 * @return Int Cantidad de unidades que tiene el producto.
	 */
	public function getcantidad(): int {
		return $this->cantidad;
	}

	/**
	 * Método que devuelve el valor del atributo img.
	 *
	 * @access public
	 * @return String Imagen del producto para que los clientes lo vean.
	 */
	public function getimg(): string {
		return $this->img;
	}

	/**
	 * Método que devuelve el valor del atributo precio.
	 *
	 * @access public
	 * @return Int Precio del producto.
	 */
	public function getprecio(): int {
		return $this->precio;
	}

	/**
	 * Método que devuelve el valor del atributo tipo.
	 *
	 * @access public
	 * @return String Atributo que diferencia los productos por Tipos.
	 */
	public function gettipo(): string {
		return $this->tipo;
	}

	/**
	 * Método que devuelve el valor del atributo descuento.
	 *
	 * @access public
	 * @return Int Descuento del producto.
	 */
	public function getdescuento(): int {
		return $this->descuento;
	}

	/**
	 * Método que extrae los productos de la base de datos.
	 *
	 * $inicio   Variable que limita el inicio de la consulta
	 * $final    Variable que limita el final de la consulta
	 * @access public
	 * @return array	
	 */
	public function extraerProductos($inicio, $final) {

		/*		 * Array que guardara los datos de la base de datos */
		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Productos LIMIT :inicio,:final"
			);
			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':inicio', $inicio, PDO::PARAM_INT);
			$resultado->bindParam(':final', $final, PDO::PARAM_INT);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Se recorre los resultados de la consulta para crear objetos con las diferentes filas */
				foreach ($resultado as $fila) {
					/*					 * Se establece un objeto de la clase Productos */
					$producto = new Productos();
					/*					 * Se inician los atributos del objeto */
					$producto->setcodProducto($fila['codProducto']);
					$producto->setnombreProducto($fila['nombreProducto']);
					$producto->setdescripcion($fila['descripcion']);
					$producto->setcantidad($fila['cantidad']);
					$producto->setimg($fila['img']);
					$producto->setprecio($fila['precio']);
					$producto->settipo($fila['tipo']);
					$producto->setdescuento($fila['descuento']);
					/*					 * Se guardan los objetos en el array */
					$data[] = $producto;
				}
				/** La funcion devuelve el conjuntos de resultados */
				return $data;
			}
		}
	}
		/**
	 * Método que extrae los productos de la base de datos.
	 *
	 * $inicio   Variable que limita el inicio de la consulta
	 * $final    Variable que limita el final de la consulta
	 * @access public
	 * @return array	
	 */
	public function extraertodosProductos() {

		/*		 * Array que guardara los datos de la base de datos */
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
				/** Se recorre los resultados de la consulta para crear objetos con las diferentes filas */
				foreach ($resultado as $fila) {
					/*					 * Se establece un objeto de la clase Productos */
					$producto = new Productos();
					/*					 * Se inician los atributos del objeto */
					$producto->setcodProducto($fila['codProducto']);
					$producto->setnombreProducto($fila['nombreProducto']);
					$producto->setdescripcion($fila['descripcion']);
					$producto->setcantidad($fila['cantidad']);
					$producto->setimg($fila['img']);
					$producto->setprecio($fila['precio']);
					$producto->settipo($fila['tipo']);
					$producto->setdescuento($fila['descuento']);
					/*					 * Se guardan los objetos en el array */
					$data[] = $producto;
				}
				/** La funcion devuelve el conjuntos de resultados */
				return $data;
			}
		}
	}

	/**
	 * Método que Devuelve el numero de paginas de todos los productos para el
	 * pagination.
	 *
	 * @access public
	 * @return array	
	 */
	public function numeropaginas() {

		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Productos"
			);

			/** Ejecuta la sentencia preparada. */
			$resultado->execute();
			/*			 * Devuelve el numero de productos que hay */
			return $resultado->rowCount();
		}
	}

	/**
	 * Método que extrae solo un producto.
	 * 
	 * @access public
	 * @return array	
	 */
	public function leerProductos() {

		/*		 * Array que guardara los datos de la base de datos */
		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Productos WHERE codProducto = :codProducto"
			);

			/** Vincula un parámetro al nombre de variable especificado. */
			$codProducto = $this->codProducto;
			$resultado->bindParam(':codProducto', $codProducto);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				if ($resultado->rowCount() > 0) {
					/** Se recorre los resultados de la consulta para crear objetos con las diferentes filas */
					foreach ($resultado as $fila) {
						/*						 * Se establece un objeto de la clase Productos */
						$producto = new Productos();
						/*						 * Se inician los atributos del objeto */
						$producto->setcodProducto($fila['codProducto']);
						$producto->setnombreProducto($fila['nombreProducto']);
						$producto->setdescripcion($fila['descripcion']);
						$producto->setcantidad($fila['cantidad']);
						$producto->setimg($fila['img']);
						$producto->setprecio($fila['precio']);
						$producto->setdescuento($fila['descuento']);
						/*						 * Se guardan los objetos en el array */
						$data[] = $producto;
					}
					/** La funcion devuelve el conjuntos de resultados */
					return $data;
				}
			}
		}
	}

	/**
	 * Método que extrae los productos de la base de datos dependiendo del campo
	 * tipo para filtrar los productos.
	 *
	 * $inicio   Variable que limita el inicio de la consulta
	 * $final    Variable que limita el final de la consulta
	 * @access public
	 * @return array	
	 */
	public function Filtro($inicio, $final) {

		/*		 * Array que guardara los datos de la base de datos */
		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Productos WHERE tipo = :planton LIMIT :inicio,:final"
			);
			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':inicio', $inicio, PDO::PARAM_INT);
			$resultado->bindParam(':final', $final, PDO::PARAM_INT);
			$tipo = $this->tipo;
			$resultado->bindParam(':planton', $tipo);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Se recorre los resultados de la consulta para crear objetos con las diferentes filas */
				foreach ($resultado as $fila) {
					/*					 * Se establece un objeto de la clase Productos */
					$producto = new Productos();
					/*					 * Se inician los atributos del objeto */
					$producto->setcodProducto($fila['codProducto']);
					$producto->setnombreProducto($fila['nombreProducto']);
					$producto->setdescripcion($fila['descripcion']);
					$producto->setcantidad($fila['cantidad']);
					$producto->setimg($fila['img']);
					$producto->setprecio($fila['precio']);
					$producto->setdescuento($fila['descuento']);
					/*					 * Se guardan los objetos en el array */
					$data[] = $producto;
				}

				/** La funcion devuelve el conjuntos de resultados */
				return $data;
			}
		}
	}

	/**
	 * Método que Devuelve el numero de paginas de los productos para el
	 * pagination filtrados por el tipo de producto.
	 *
	 * @access public
	 * @return array	
	 */
	public function paginasFiltro() {

		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Productos WHERE tipo = :planton"
			);
			/** Vincula un parámetro al nombre de variable especificado. */
			$tipo = $this->tipo;
			$resultado->bindParam(':planton', $tipo);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			$resultado->execute();
			/** La funcion devuelve el numero de productos */
			return $resultado->rowCount();
		}
	}

	/**
	 * Método que extrae los productos de la base de datos que se hayan buscado
	 * en un buscador.
	 *
	 * $valor   Variable que tiene el valor de la busqueda
	 * $final    Variable que limita el final de la consulta
	 * @access public
	 * @return array	
	 */
	public function buscador(string $valor, $inicio) {
		/** Variable que limita el final de la consulta */
		$final = 9;
		/*		 * Array que guardara los datos de la base de datos */
		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				'SELECT *
						FROM Productos 
						WHERE nombreProducto LIKE "%":nombre"%" OR descripcion LIKE "%":nombre"%" LIMIT :inicio,:final'
			);
			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':inicio', $inicio, PDO::PARAM_INT);
			$resultado->bindParam(':final', $final, PDO::PARAM_INT);
			$resultado->bindParam(':nombre', $valor);

			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			$resultado->execute();
			/** Se recorre los resultados de la consulta para crear objetos con las diferentes filas */
			foreach ($resultado as $fila) {
				/*				 * Se establece un objeto de la clase Productos */
				$producto = new Productos();
				/*				 * Se inician los atributos del objeto */
				$producto->setcodProducto($fila['codProducto']);
				$producto->setnombreProducto($fila['nombreProducto']);
				$producto->setdescripcion($fila['descripcion']);
				$producto->setcantidad($fila['cantidad']);
				$producto->setimg($fila['img']);
				$producto->setprecio($fila['precio']);
				$producto->setdescuento($fila['descuento']);

				/*				 * Se guardan los objetos en el array */
				$data[] = $producto;
			}

			/** La funcion devuelve el conjuntos de resultados */
			return $data;
		}
	}

	/**
	 * Método que devuelve el numero de paginas que se creara al buscar los productos 
	 * expecificos en el buscador.
	 *
	 * $tipo   Variable que tiene el valor de la busqueda
	 * @access public
	 * @return array

	 */
	public function paginasbuscador($tipo) {

		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				'SELECT *
						FROM Productos WHERE nombreProducto LIKE "%":nombre"%" OR descripcion LIKE "%":nombre"%"'
			);
			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':nombre', $tipo);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			$resultado->execute();
			/** La funcion devuelve el numero de productos */
			return $resultado->rowCount();
		}
	}

	/**
	 * Método que inserta un nuevo producto en la base de datos
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
	}

	/**
	 * Método que elimina un producto en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
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
	}

	/**
	 * Método que modifica un producto en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function modificaProducto(): bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"UPDATE  Productos SET cantidad = :cantidad,
						precio = :precio,
						descuento = :descuento
					 WHERE codProducto = :codProducto");
			/** Vincula un parámetro al nombre de variable especificado. */
			$codprod = $this->codProducto;
			$cantidad = $this->cantidad;
			$precio = $this->precio;
			$dscuento = $this->descuento;
			$resultado->bindParam(':codProducto', $codprod);
			$resultado->bindParam(':cantidad', $cantidad);
			$resultado->bindParam(':precio', $precio);
			$resultado->bindParam(':descuento', $dscuento);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			$resultado->execute();
			/*			 * Devuelve true si se ejecuta la sentencia */
			return true;
		}
		/*		 * Devuelve false si se ejecuta la sentencia */
		return false;
	}

	/**
	 * Método que resta cantidad de un producto en la base de datos cuando se 
	 * realiza la compra
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function reduceCantidadProducto(): bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"UPDATE  Productos SET cantidad = :cantidad
					 WHERE codProducto = :codProducto");
			/** Vincula un parámetro al nombre de variable especificado. */
			$codprod = $this->codProducto;
			$cantidad = $this->cantidad;
			$resultado->bindParam(':codProducto', $codprod);
			$resultado->bindParam(':cantidad', $cantidad);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			$resultado->execute();
			/*			 * Devuelve true si se ejecuta la sentencia */
			return true;
		}
		/*		 * Devuelve false si se ejecuta la sentencia */
		return false;
	}

}
