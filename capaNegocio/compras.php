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
		return $this->fecha;
	}
	/**
	 * Método que inserta una compra en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function añadircompra() {

		/** @var BDCompras Instancia un objeto de la clase. */
		$bdcompra = new BDCompras();
		/** Inicializa los atributos del objeto. */
		$bdcompra->setidpro($this->idpro);
		$bdcompra->setemail($this->email);
		$bdcompra->setfecha(date('Y-m-d'));
		$bdcompra->setidcompra($this->idcompra);
		$bdcompra->setcantidad($this->cantidad);
		$bdcompra->setprecio($this->precio);
		/**Se realiza una nueva compra. */
		return $bdcompra->añadircompra();

	}
	
	/**
	 * Método que extrae todos los productos de un usuario.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function extraerCompra() {

		/** @var BDCompras Instancia un objeto de la clase. */
		$bdcompras = new BDCompras();
		/** Inicializa los atributos del objeto. */
		$bdcompras->setemail($this->email);
		/** Se muestra las compras de un usuario. */
		return $bdcompras->extraerCompra();
	}
	
	
	/**
	 * Método que extrae los datos de una compra.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
		public function extraerFactura() {

		/** @var BDCompras Instancia un objeto de la clase. */
		$bdcompras = new BDCompras();
		/** Inicializa los atributos del objeto. */
		$bdcompras->setemail($this->email);
		$bdcompras->setidcompra($this->idcompra);
		/** Estrae los datos de una compra. */
		return $bdcompras->extraerFactura();
	}
	/**
	 * Método que extrae todas las compras de la base de datos.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
		public function todaslasCompras() {

		/** @var BDCompras Instancia un objeto de la clase. */
		$bdcompras = new BDCompras();
		/** Extrae todas las compras de la base de datos. */
		return $bdcompras->todaslasCompras();
	}
}