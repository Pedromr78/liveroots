<?php

/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 *
 */
/** Incluye la clase. */
include_once '../capaDatos/bdcart.php';

class Cart {

	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private int $idpro;

	/**
	 * @var integer Cantidad del Producto.
	 * @access private
	 */
	private int $cantidad;

	/**
	 * @var String email Usuario.
	 * @access private
	 */
	private string $email;

	/**
	 * @var Date Fecha que se añade al carrito.
	 * @access private
	 */
	private string $fechañadida;

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
	 * Método que inicializa el atributo cantidad.
	 *
	 * @access public
	 * @param integer $cantidad Cantidad de unidades añadidas al carrito.
	 * @return void
	 */
	public function setcantidad(int $cantidad): void {
		$this->cantidad = $cantidad;
	}

	/**
	 * Método que inicializa el atributo email.
	 *
	 * @access public
	 * @param String $email Identificador que enlaza los productos con el usuario.
	 * @return void
	 */
	public function setemail(string $email): void {
		$this->email = $email;
	}

	/**
	 * Método que inicializa el atributo fecha que se añade el producto.
	 *
	 * @access public
	 * @param Date $fechaañadida fecha que se añade el producto.
	 * @return void
	 */
	public function setfechañadida(string $fechaañadida): void {
		$this->fechañadida = $fechaañadida;
	}

	/**
	 * Método que devuelve el valor del atributo idProducto.
	 *
	 * @access public
	 * @return Int Identificador del producto.
	 */
	public function getidpro(): int {
		return $this->idpro;
	}

	/**
	 * Método que devuelve el valor del atributo cantidad.
	 *
	 * @access public
	 * @return Int Cantidad de unidades que añades al carrito del producto.
	 */
	public function getcantidad(): int {
		return $this->cantidad;
	}

	/**
	 * Método que devuelve el valor del email.
	 *
	 * @access public
	 * @return String Email del usuario que enlaza el producto.
	 */
	public function getemail(): string {
		return $this->email;
	}

	/**
	 * Método que devuelve el valor del atributo fecha.
	 *
	 * @access public
	 * @return DateTime Fecha que se añade el producto.
	 */
	public function getfechañadida(): string {
		return $this->fechañadida;
	}

	/**
	 * Método que inserta un producto al carrito
	 *
	 * @access public
	 * @return array	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function añadircarrito() {

		/** @var BDCart Instancia un objeto de la clase. */
		$bdcart = new BDCart();
		/** Inicializa los atributos del objeto. */
		$bdcart->setidpro($this->idpro);
		$bdcart->setemail($this->email);
		$bdcart->setfechañadida(date('Y-m-d'));
		$bdcart->setcantidad($this->cantidad);
		/** Añade el producto al carrito. */
		return $bdcart->añadircarrito();

	}

	/**
	 * Método que extrae los productos del carrito  del usuario.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function extraerProducto() {

		/** @var BDCart Instancia un objeto de la clase. */
		$bdcart = new BDCart();
		/** Inicializa los atributos del objeto. */
		$bdcart->setemail($this->email);
		/** Extrae los productos de un usuario. */
		return $bdcart->extraerProducto();
	}
	/**
	 * Método que comprueba si existe el producto en el carrito.
	 *
	 * @access public
	 * @return boolean	True si existe
	 * 					False en otro caso.
	 */
	public function existeProducto() {

		/** @var BDCart Instancia un objeto de la clase. */
		$bdcart = new BDCart();
		/** Inicializa los atributos del objeto. */
		$bdcart->setemail($this->email);
		$bdcart->setidpro($this->idpro);
		/** El producto no existe. */
		if(!$bdcart->existeProducto()){
			return true;
		}
		/** Comprueba si existe el producto. */
		else{
			return false;
		}
	}
	/**
	 * Método que elimina los productos del carrito.
	 *
	 * @access public
	 * @return boolean	True si existe
	 * 					False en otro caso.
	 */
	public function eliminaProducto() {


		/** @var BDCart Instancia un objeto de la clase. */
		$bdcart = new BDCart();
		/** Inicializa los atributos del objeto. */
		$bdcart->setemail($this->email);
		$bdcart->setidpro($this->idpro);
		/** Elimina los productos del carrito. */
		$bdcart->eliminaProducto();
		}

	}



