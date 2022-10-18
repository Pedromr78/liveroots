<?php

include_once '../capaDatos/bdinformacion.php';

class Informacion {
	
	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private string $nombre;

	/**
	 * @var integer Nombre del Producto.
	 * @access private
	 */
	private string $descripcion;
	
	/**
	 * @var integer Nombre del Producto.
	 * @access private
	 */
	private string $img;

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setnombre(string $nombre): void
	{
		$this->nombre = $nombre;
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
	public function setimg(string $img): void
	{
		$this->img = $img;
	}
	
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getnombre(): string
	{
		return $this->nombre;
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
	public function getimg(): string
	{
		return $this->img;
	}
	

	/**
	 * Método que comprueba si un usuario existe en la base de datos.
	 *
	 * @access public
	 * @return array	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function extraerinformacion() {
	
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdinformacion = new BDInformacion();
		/** Inicializa los atributos del objeto. */
	
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdinformacion->extraerinformacion();
	}
}