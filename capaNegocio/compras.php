<?php
/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 *
 */
/** Incluye la clase. */
include_once '../capaDatos/bdcompras.php';

class Compras {
	
	
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
	 * Método que comprueba si un usuario existe en la base de datos.
	 *
	 * @access public
	 * @return array	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function añadircompra() {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdcompra = new BDCompras();
		/** Inicializa los atributos del objeto. */
		$bdcompra->setidpro($this->idpro);
		$bdcompra->setemail($this->email);
		$bdcompra->setfecha(date('Y-m-d'));
		$bdcompra->setidcompra($this->idcompra);
		$bdcompra->setcantidad($this->cantidad);
		$bdcompra->setprecio($this->precio);
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdcompra->añadircompra();

	}
	
	
	public function extraerCompra(string $email) {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdcompras = new BDCompras();
		/** Inicializa los atributos del objeto. */
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdcompras->extraerCompra($email);
	}
		public function extraerFactura(string $idcompra, string $email) {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdcompras = new BDCompras();
		/** Inicializa los atributos del objeto. */
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdcompras->extraerFactura($idcompra,$email);
	}
	
}