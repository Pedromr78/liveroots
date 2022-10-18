<?php

/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 *
 */
/** Incluye la clase. */
include_once '../capaDatos/bdProductos.php';

class Productos {
	
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
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setcodProducto(int $codProducto): void
	{
		$this->codProducto = $codProducto;
	}
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setnombreProducto(string $nombreProducto): void
	{
		$this->nombreProducto = $nombreProducto;
	}
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setdescripcion(string $descripcion): void
	{
		$this->descripcion = $descripcion;
	}
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setcantidad(int $cantidad): void
	{
		$this->cantidad = $cantidad;
	}
	
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setimg(string $img): void
	{
		$this->img = $img;
	}
	
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setprecio(int $precio): void
	{
		$this->precio = $precio;
	}

	
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getcodProducto(): int
	{
		return $this->codProducto;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getnombreProducto(): string
	{
		return $this->nombreProducto;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getdescripcion(): string
	{
		return $this->descripcion;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getcantidad(): int
	{
		return $this->cantidad;
	}

		/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getimg(): string
	{
		return $this->img;
	}
	
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getprecio(): int
	{
		return $this->precio;
	}

	
	/**
	 * Método que comprueba si un usuario existe en la base de datos.
	 *
	 * @access public
	 * @return array	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function extraerProductos() {
		
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
	
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdproducto->extraerProductos();
		
	}
	
		public function leerProductos( int $codProducto) {
		
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
	
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdproducto->leerProductos($codProducto);
		
	}
	
	}