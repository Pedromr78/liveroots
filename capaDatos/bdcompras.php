<?php
/**
 * bdcompras.php
 * Módulo secundario que implementa la clase BDCompras.
 *
 */
/** Incluye la clase. */
include_once '../capaDatos/bdplantas.php';

class BDCompras extends BDPlantas {
	
	
	/**
	 * @var integer Precio.
	 * @access private
	 */
	private int $precio;

	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private int $idpro;
		/**
	 * @var String Codigo de Compra.
	 * @access private
	 */
	private string $idcompra;

	/**
	 * @var integer Cantidad.
	 * @access private
	 */
	private int $cantidad;

	/**
	 * @var String email.
	 * @access private
	 */
	private string $email;

	/**
	 * @var String fecha.
	 * @access private
	 */
	private string $fecha;

	/**
	 * Método que inicializa el atributo idProducto.
	 *
	 * @access public
	 * @param integer $idpro Identificador del producto.
	 * @return void
	 */
	public function setidpro(int $idpro): void {
		$this->idpro = $idpro;
	}
	/**
	 * Método que inicializa el atributo compra.
	 *
	 * @access public
	 * @param String $idcompra Identificador de la compra.
	 * @return void
	 */
	public function setidcompra(string $idcompra): void {
		$this->idcompra = $idcompra;
	}

	/**
	 * Método que inicializa el atributo precio.
	 *
	 * @access public
	 * @param integer $precio Precio de total de la compra.
	 * @return void
	 */
	public function setprecio(int $precio): void {
		$this->precio = $precio;
	}

	/**
	 * Método que inicializa el atributo cantidad.
	 *
	 * @access public
	 * @param integer $cantidad Identificador de la promoción.
	 * @return void
	 */
	public function setcantidad(int $cantidad): void {
		$this->cantidad = $cantidad;
	}

	/**
	 * Método que inicializa el atributo email.
	 *
	 * @access public
	 * @param String $email que relaciona la compra.
	 * @return void
	 */
	public function setemail(string $email): void {
		$this->email = $email;
	}

	/**
	 * Método que inicializa el atributo fecha.
	 *
	 * @access public
	 * @param DateTime $fecha Fecha de la compra.
	 * @return void
	 */
	public function setfecha(string $fecha): void {
		$this->fecha = $fecha;
	}

	
	/**
	 * Método que devuelve el valor del atributo precio.
	 *
	 * @access public
	 * @return integer precio de la compra.
	 */
	public function getprecio(): int {
		return $this->precio;
	}

	
	
	/**
	 * Método que devuelve el valor del atributo idProducto.
	 *
	 * @access public
	 * @return integer Identificador del producto.
	 */
	public function getidpro(): int {
		return $this->idpro;
	}
	/**
	 * Método que devuelve el valor del atributo idcompra.
	 *
	 * @access public
	 * @return String Identificador de la compra.
	 */
	public function getidcompra(): string {
		return $this->idcompra;
	}

	/**
	 * Método que devuelve el valor del atributo Cantidad.
	 *
	 * @access public
	 * @return integer Cantidad de producto en la compra.
	 */
	public function getcantidad(): int {
		return $this->cantidad;
	}

	/**
	 * Método que devuelve el valor del atributo email.
	 *
	 * @access public
	 * @return String email del usuario.
	 */
	public function getemail(): string {
		return $this->email;
	}

	/**
	 * Método que devuelve el valor del atributo fecha.
	 *
	 * @access public
	 * @return DateTime Fecha de la compra.
	 */
	public function getfecha(): string {
		return $this->fecha->format('d/m/Y');
	}
	
	/**
	 * Método que inserta una compra en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function añadircompra(): bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"INSERT INTO compras (email, codCompra, codProducto, fechaCompra, cantidadProducto, Precio)
						VALUES (:email, :idcompra, :idpro, :fecha, :cantidad, :precio)");
			/** Vincula un parámetro al nombre de variable especificado. */
			$idpro = $this->idpro;
			$resultado->bindParam(':idpro', $idpro);
			$idcompra = $this->idcompra;
			$resultado->bindParam(':idcompra', $idcompra);
			$email = $this->email;
			$resultado->bindParam(':email', $email);
			$fecha = $this->fecha;
			$resultado->bindParam(':fecha', $fecha);
			$cantidad = $this->cantidad;
			$resultado->bindParam(':cantidad', $cantidad);
			$precio = $this->precio;
			$resultado->bindParam(':precio', $precio);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Devuelve true si se ha conseguido. */
				return true;
			}
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}
	
	
	/**
	 * Método que extrae todos los productos de un usuario.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function extraerCompra() {

		/** Array que guardara los datos de la base de datos */
		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Compras WHERE email = :email"
			);

			/** Vincula un parámetro al nombre de variable especificado. */
			$email=$this->email;
			$resultado->bindParam(':email', $email);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				if ($resultado->rowCount() > 0) {
					/** Se recorre los resultados de la consulta para crear objetos con las diferentes filas */
					foreach ($resultado as $fila) {
						/** Se establece un objeto de la clase */
						$compra = new Compras();
						/** Se inician los atributos del objeto */
						$compra->setemail($fila['email']);
						$compra->setidcompra($fila['codCompra']);
						$compra->setidpro($fila['codProducto']);
						$compra->setfecha($fila['fechaCompra']);
						$compra->setcantidad($fila['cantidadProducto']);
						$compra->setprecio($fila['Precio']);
						/** Se guardan los objetos en el array */
						$data[] = $compra;
					}

					/** La funcion devuelve el conjuntos de resultados */
					return $data;
				}
			}
		}
	}
	/**
	 * Método que extrae los datos de una compra.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
		public function extraerFactura() {

		/** Array que guardara los datos de la base de datos */
		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Compras WHERE codCompra = :idcompra AND email = :email");

			/** Vincula un parámetro al nombre de variable especificado. */
			$idcompra=$this->idcompra;
			$resultado->bindParam(':idcompra', $idcompra);
			$email=$this->email;
				$resultado->bindParam(':email', $email);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				if ($resultado->rowCount() > 0) {
					/** Se recorre los resultados de la consulta para crear objetos con las diferentes filas */
					foreach ($resultado as $fila) {
						/** Se establece un objeto de la clase */
						$compra = new Compras();
						/** Se inician los atributos del objeto */
						$compra->setemail($fila['email']);
						$compra->setidcompra($fila['codCompra']);
						$compra->setidpro($fila['codProducto']);
						$compra->setfecha($fila['fechaCompra']);
						$compra->setcantidad($fila['cantidadProducto']);
						$compra->setprecio($fila['Precio']);
						/** Se guardan los objetos en el array */
						$data[] = $compra;
					}

					/** La funcion devuelve el conjuntos de resultados */
					return $data;
				}
			}
		}
	}
	
	/**
	 * Método que extrae todas las compras de la base de datos.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function todaslasCompras() {
		/** Array que guardara los datos de la base de datos */
		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Compras"
			);
			
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
					/** Se recorre los resultados de la consulta para crear objetos con las diferentes filas */
				foreach ($resultado as $fila) {
						/** Se establece un objeto de la clase */
					$compra = new Compras();
					/** Se inician los atributos del objeto */
						$compra->setemail($fila['email']);
						$compra->setidcompra($fila['codCompra']);
						$compra->setidpro($fila['codProducto']);
						$compra->setfecha($fila['fechaCompra']);
						$compra->setcantidad($fila['cantidadProducto']);
						$compra->setprecio($fila['Precio']);
						/** Se guardan los objetos en el array */
					$data[] = $compra;
				}

					/** La funcion devuelve el conjuntos de resultados */
				return $data;
			}
		}
	}

	
	
	

}
