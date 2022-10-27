<?php
/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 *
 */
/** Incluye la clase. */
include_once '../capaDatos/bdplantas.php';

class BDCompras extends BDPlantas {
	
	
	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private int $precio;

	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private int $idpro;
		/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private string $idcompra;

	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private int $cantidad;

	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private string $email;

	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private string $fecha;

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setidpro(int $idpro): void {
		$this->idpro = $idpro;
	}
		/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setidcompra(string $idcompra): void {
		$this->idcompra = $idcompra;
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
	public function setemail(string $email): void {
		$this->email = $email;
	}

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setfecha(string $fecha): void {
		$this->fecha = $fecha;
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
	public function getidpro(): int {
		return $this->idpro;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getidcompra(): string {
		return $this->idcompra;
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
	public function getemail(): string {
		return $this->email;
	}

	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getfecha(): string {
		return $this->fecha->format('d/m/Y');
	}
	
	/**
	 * Método que inserta un nuevo usuario en la base de datos
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
	 * Método que comprueba si existe el usuario en la base de datos.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function extraerCompra(string $email) {


		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Compras WHERE email = :email"
			);

			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':email', $email);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				if ($resultado->rowCount() > 0) {

					foreach ($resultado as $fila) {
						$compra = new Compras();

						$compra->setemail($fila['email']);
						$compra->setidcompra($fila['codCompra']);
						$compra->setidpro($fila['codProducto']);
						$compra->setfecha($fila['fechaCompra']);
						$compra->setcantidad($fila['cantidadProducto']);
						$compra->setprecio($fila['Precio']);

						$data[] = $compra;
					}


					return $data;
				}
			}
		}
	}
		public function extraerFactura(string $idcompra, string $email) {


		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Compras WHERE codCompra = :idcompra AND email = :email");

			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':idcompra', $idcompra);
				$resultado->bindParam(':email', $email);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				if ($resultado->rowCount() > 0) {

					foreach ($resultado as $fila) {
						$compra = new Compras();

						$compra->setemail($fila['email']);
						$compra->setidcompra($fila['codCompra']);
						$compra->setidpro($fila['codProducto']);
						$compra->setfecha($fila['fechaCompra']);
						$compra->setcantidad($fila['cantidadProducto']);
						$compra->setprecio($fila['Precio']);

						$data[] = $compra;
					}


					return $data;
				}
			}
		}
	}

}
