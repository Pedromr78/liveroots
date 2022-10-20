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
	private string $fechañadida;

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
	public function setfechañadida(string $fechañadida): void {
		$this->fechañadida = $fechañadida;
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
	public function getfechañadida(): string {
		return $this->fechañadida->format('d/m/Y');
	}

	/**
	 * Método que comprueba si un usuario existe en la base de datos.
	 *
	 * @access public
	 * @return array	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function añadircarrito() {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdcart = new BDCart();
		/** Inicializa los atributos del objeto. */
		$bdcart->setidpro($this->idpro);
		$bdcart->setemail($this->email);
		$bdcart->setfechañadida(date('Y-m-d'));
		$bdcart->setcantidad($this->cantidad);
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdcart->añadircarrito();
	}

	public function extraerProducto(string $email) {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdcart = new BDCart();
		/** Inicializa los atributos del objeto. */
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdcart->extraerProducto($email);
	}
	
	public function existeProducto() {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdcart = new BDCart();
		/** Inicializa los atributos del objeto. */
		$bdcart->setemail($this->email);
		$bdcart->setidpro($this->idpro);
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		if(!$bdcart->existeProducto()){
			return true;
		}
		else{
			return false;
		}
	}
	public function eliminaProducto() {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdcart = new BDCart();
		/** Inicializa los atributos del objeto. */
		$bdcart->setemail($this->email);
		$bdcart->setidpro($this->idpro);
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		$bdcart->eliminaProducto();
	}
	

}
