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
	private string $email;
	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private DateTime $fechañadida;


	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setidpro(int $idpro): void
	{
		$this->idpro = $idpro;
	}
	
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setemail(string $email): void
	{
		$this->email = $email;
	}
	
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setfechañadida(DateTime $fechaañadida): void
	{
		$this->fechañadida = $fechaañadida;
	}
	
	
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getidpro(): int
	{
		return $this->idpro;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getemail(): string
	{
		return $this->email;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getfechañadida(): DateTime
	{
		return $this->fechañadida;
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
		$bdcart->setfechañadida($this->fechañadida);
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdcart->añadircarrito();
		
	}
	
	
	
	}