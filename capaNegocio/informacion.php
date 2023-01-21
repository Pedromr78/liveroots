<?php

include_once '../capaDatos/bdinformacion.php';

class Informacion {
	
	/**
	 * @var String Codigo del Producto.
	 * @access private
	 */
	private string $nombre;

	/**
	 * @var String Cuidados.
	 * @access private
	 */
	private string $cuidados;
	
	/**
	 * @var String descripcion.
	 * @access private
	 */
	private string $descripcion;
	
	/**
	 * @var string img.
	 * @access private
	 */
	private string $img;

	/**
	 * Método que inicializa el atributo Nombre.
	 *
	 * @access public
	 * @param string $nombre Nombre.
	 * @return void
	 */
	public function setnombre(string $nombre): void
	{
		$this->nombre = $nombre;
	}
	
	/**
	 * Método que inicializa el atributo Cuidados.
	 *
	 * @access public
	 * @param string $cuidados Cuidados.
	 * @return void
	 */
	public function setcuidados(string $cuidados): void
	{
		$this->cuidados = $cuidados;
	}
	/**
	 * Método que inicializa el atributo descripcion.
	 *
	 * @access public
	 * @param string $descripcion descripcion.
	 * @return void
	 */
	public function setdescripcion(string $descripcion): void
	{
		$this->descripcion = $descripcion;
	}
	
		/**
	 * Método que inicializa el atributo img.
	 *
	 * @access public
	 * @param string $img Imagen de cada arbol.
	 * @return void
	 */
	public function setimg(string $img): void
	{
		$this->img = $img;
	}
	
	/**
	 * Método que devuelve el valor del atributo Nombre.
	 *
	 * @access public
	 * @return string Nombre Nombre de cada arbol.
	 */
	public function getnombre(): string
	{
		return $this->nombre;
	}
	/**
	 * Método que devuelve el valor del atributo descripcion.
	 *
	 * @access public
	 * @return string descripcion de cada arbol.
	 */
	public function getdescripcion(): string
	{
		return $this->descripcion;
	}
	/**
	 * Método que devuelve el valor del atributo Cuidados.
	 *
	 * @access public
	 * @return string Cuidados de cada arbol.
	 */
	public function getcuidados(): string
	{
		return $this->cuidados;
	}
	
		/**
	 * Método que devuelve el valor del atributo img.
	 *
	 * @access public
	 * @return string Imagen de cada arbol.
	 */
	public function getimg(): string
	{
		return $this->img;
	}
	

	/**
	 * Método que extrae los datos en la base de datos.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function extraerinformacion() {
	
		/** @var BDInformacion Instancia un objeto de la clase. */
		$bdinformacion = new BDInformacion();
		/** Extrae todos los datos de la base de datos. */
		return $bdinformacion->extraerinformacion();
	}
}