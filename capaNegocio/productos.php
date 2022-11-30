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
	 * @var integer cantidad del producto.
	 * @access private
	 */
	private string $tipo;
		/**
	 * @var integer cantidad del producto.
	 * @access private
	 */
	private int $descuento;

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setcodProducto(int $codProducto): void {
		$this->codProducto = $codProducto;
	}

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setnombreProducto(string $nombreProducto): void {
		$this->nombreProducto = $nombreProducto;
	}

	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setdescripcion(string $descripcion): void {
		$this->descripcion = $descripcion;
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
	public function setimg(string $img): void {
		$this->img = $img;
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
	public function settipo(string $tipo): void {
		$this->tipo = $tipo;
	}
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setdescuento(int $descuento): void {
		$this->descuento = $descuento;
	}

	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getcodProducto(): int {
		return $this->codProducto;
	}

	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getnombreProducto(): string {
		return $this->nombreProducto;
	}

	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getdescripcion(): string {
		return $this->descripcion;
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
	public function getimg(): string {
		return $this->img;
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
	public function gettipo(): string {
		return $this->tipo;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getdescuento(): int {
		return $this->descuento;
	}

	/**
	 * Método que comprueba si un usuario existe en la base de datos.
	 *
	 * @access public
	 * @return array	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function extraerProductos($inicio,$final) {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdproducto->extraerProductos($inicio,$final);
	}

	public function leerProductos() {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->setcodProducto($this->codProducto);
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdproducto->leerProductos();
	}

						/**
	 * Método que comprueba si un usuario existe en la base de datos.
	 *
	 * @access public
	 * @return array	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function Filtro($inicio,$final) {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->settipo($this->tipo);
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdproducto->Filtro($inicio,$final);
	}
		/**
	 * Método que comprueba si un usuario existe en la base de datos.
	 *
	 * @access public
	 * @return array	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function buscador(string $valor,$inicio) {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		return $bdproducto->buscador($valor,$inicio);
	}
	public function añadeproducto() {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
				$bdproducto->setcodProducto($this->codProducto);
				$bdproducto->setnombreProducto($this->nombreProducto);
				$bdproducto->setdescripcion($this->descripcion);
				$bdproducto->setcantidad($this->cantidad);
				$bdproducto->setimg($this->img);
				$bdproducto->setprecio($this->precio);
				$bdproducto->settipo($this->tipo);
				$bdproducto->setdescuento($this->descuento);
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		$bdproducto->añadeproducto();
	}
	public function eliminaproducto() {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->setcodProducto($this->codProducto);
			
		/** Comprueba si existe el usuario. */
		/** El usuario no existe. */
		$bdproducto->eliminaproducto();
	}
	public function modificaProducto() {
		
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->setcodProducto($this->codProducto);
		$bdproducto->setcantidad($this->cantidad);
		$bdproducto->setprecio($this->precio);
		$bdproducto->setdescuento($this->descuento);
		
		$bdproducto->modificaProducto();
	}
	public function reduceCantidadProducto() {
		
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->setcodProducto($this->codProducto);
		$bdproducto->setcantidad($this->cantidad);
		
		
		$bdproducto->reduceCantidadProducto();
	}
	
	public function numeropaginas(){
		$bdproducto = new BDProductos();
		
		
			$paginas=ceil($bdproducto->numeropaginas()/10);
		
		return $paginas;
	}
		public function paginasFiltro(){
		$bdproducto = new BDProductos();
		
			$bdproducto->settipo($this->tipo);
			$paginas=ceil($bdproducto->paginasFiltro()/10);
		
		return $paginas;
	}
	
		public function paginasbuscador($tipo){
		$bdproducto = new BDProductos();
		
		
			$paginas=ceil($bdproducto->paginasbuscador($tipo)/10);
		
		return $paginas;
	}

}
