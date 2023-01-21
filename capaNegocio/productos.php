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
	 * @var string Nombre del Producto.
	 * @access private
	 */
	private string $nombreProducto;

	/**
	 * @var string descripcion.
	 * @access private
	 */
	private string $descripcion;

	/**
	 * @var integer cantidad del producto.
	 * @access private
	 */
	private int $cantidad;

	/**
	 * @var string imagen del producto.
	 * @access private
	 */
	private string $img;

	/**
	 * @var integer precio del producto.
	 * @access private
	 */
	private int $precio;

	/**
	 * @var string tipo del producto.
	 * @access private
	 */
	private string $tipo;

	/**
	 * @var integer descuento del producto.
	 * @access private
	 */
	private int $descuento;

	/**
	 * Método que inicializa el atributo codProducto.
	 *
	 * @access public
	 * @param integer $codProducto Identificador del producto.
	 * @return void
	 */
	public function setcodProducto(int $codProducto): void {
		$this->codProducto = $codProducto;
	}

	/**
	 * Método que inicializa el atributo nombreProducto.
	 *
	 * @access public
	 * @param string $nombreProducto nombre del producto.
	 * @return void
	 */
	public function setnombreProducto(string $nombreProducto): void {
		$this->nombreProducto = $nombreProducto;
	}

	/**
	 * Método que inicializa el atributo desccripcion.
	 *
	 * @access public
	 * @param string $descripcion descripcion del producto.
	 * @return void
	 */
	public function setdescripcion(string $descripcion): void {
		$this->descripcion = $descripcion;
	}

	/**
	 * Método que inicializa el atributo cantidad.
	 *
	 * @access public
	 * @param integer $cantidad cantidad del producto.
	 * @return void
	 */
	public function setcantidad(int $cantidad): void {
		$this->cantidad = $cantidad;
	}

	/**
	 * Método que inicializa el atributo img(imagen).
	 *
	 * @access public
	 * @param string $img Imagen del producto.
	 * @return void
	 */
	public function setimg(string $img): void {
		$this->img = $img;
	}

	/**
	 * Método que inicializa el atributo precio.
	 *
	 * @access public
	 * @param integer $precio Precio del producto.
	 * @return void
	 */
	public function setprecio(int $precio): void {
		$this->precio = $precio;
	}

	/**
	 * Método que inicializa el atributo tipo.
	 *
	 * @access public
	 * @param string $tipo atributo que diferencia el tipo de producto.
	 * @return void
	 */
	public function settipo(string $tipo): void {
		$this->tipo = $tipo;
	}

	/**
	 * Método que inicializa el atributo descuento.
	 *
	 * @access public
	 * @param integer $descuento descuento del Producto.
	 * @return void
	 */
	public function setdescuento(int $descuento): void {
		$this->descuento = $descuento;
	}

	/**
	 * Método que devuelve el valor del atributo codProducto.
	 *
	 * @access public
	 * @return Int Identificador del producto.
	 */
	public function getcodProducto(): int {
		return $this->codProducto;
	}

	/**
	 * Método que devuelve el valor del atributo nombreProducto.
	 *
	 * @access public
	 * @return String Nombre del producto.
	 */
	public function getnombreProducto(): string {
		return $this->nombreProducto;
	}

	/**
	 * Método que devuelve el valor del atributo descripcion.
	 *
	 * @access public
	 * @return String descripcion del producto.
	 */
	public function getdescripcion(): string {
		return $this->descripcion;
	}

	/**
	 * Método que devuelve el valor del atributo cantidad.
	 *
	 * @access public
	 * @return Int Cantidad de unidades que tiene el producto.
	 */
	public function getcantidad(): int {
		return $this->cantidad;
	}

	/**
	 * Método que devuelve el valor del atributo img.
	 *
	 * @access public
	 * @return String Imagen del producto para que los clientes lo vean.
	 */
	public function getimg(): string {
		return $this->img;
	}

	/**
	 * Método que devuelve el valor del atributo precio.
	 *
	 * @access public
	 * @return Int Precio del producto.
	 */
	public function getprecio(): int {
		return $this->precio;
	}

	/**
	 * Método que devuelve el valor del atributo tipo.
	 *
	 * @access public
	 * @return String Atributo que diferencia los productos por Tipos.
	 */
	public function gettipo(): string {
		return $this->tipo;
	}

	/**
	 * Método que devuelve el valor del atributo descuento.
	 *
	 * @access public
	 * @return Int Descuento del producto.
	 */
	public function getdescuento(): int {
		return $this->descuento;
	}

	/**
	 * Método que extrae los productos de la base de datos.
	 *
	 * $inicio   Variable que limita el inicio de la consulta
	 * $final    Variable que limita el final de la consulta
	 * @access public
	 * @return array	
	 */
	public function extraerProductos($inicio,$final) {

		/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/**Extrae todos los productos de la base de datos. */
		return $bdproducto->extraerProductos($inicio,$final);
	}
		/**
	 * Método que extrae los productos de la base de datos.
	 *
	 * $inicio   Variable que limita el inicio de la consulta
	 * $final    Variable que limita el final de la consulta
	 * @access public
	 * @return array	
	 */
	public function extraertodosProductos() {

		/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/**Extrae todos los productos de la base de datos. */
		return $bdproducto->extraertodosProductos();
	}
	/**
	 * Método que extrae solo un producto.
	 * 
	 * @access public
	 * @return array	
	 */
	public function leerProductos() {

		/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->setcodProducto($this->codProducto);
		/** Extrae un unico producto de la base de datos. */
		return $bdproducto->leerProductos();
	}

	/**
	 * Método que extrae los productos de la base de datos dependiendo del campo
	 * tipo para filtrar los productos.
	 *
	 * $inicio   Variable que limita el inicio de la consulta
	 * $final    Variable que limita el final de la consulta
	 * @access public
	 * @return array	
	 */
	public function Filtro($inicio,$final) {

		/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->settipo($this->tipo);
		/** Inicializa la funcion de la capa de datos. */
		return $bdproducto->Filtro($inicio,$final);
	}
	/**
	 * Método que extrae los productos de la base de datos que se hayan buscado
	 * en un buscador.
	 *
	 * $valor   Variable que tiene el valor de la busqueda
	 * $final    Variable que limita el final de la consulta
	 * @access public
	 * @return array	
	 */
	public function buscador(string $valor,$inicio) {

		/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		
		/** Inicializa la funcion de la capa de datos. */
		return $bdproducto->buscador($valor,$inicio);
	}
	/**
	 * Método que inserta un nuevo producto en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function añadeproducto() {

		/** @var BDProductos Instancia un objeto de la clase. */
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
		
		/** Inicializa la funcion de la capa de datos. */
		$bdproducto->añadeproducto();
	}
	/**
	 * Método que elimina un producto en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function eliminaproducto() {

		/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->setcodProducto($this->codProducto);
		/** Inicializa la funcion de la capa de datos. */
		$bdproducto->eliminaproducto();
	}
	/**
	 * Método que modifica un producto en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function modificaProducto() {
		
		/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->setcodProducto($this->codProducto);
		$bdproducto->setcantidad($this->cantidad);
		$bdproducto->setprecio($this->precio);
		$bdproducto->setdescuento($this->descuento);
		/** Inicializa la funcion de la capa de datos. */
		$bdproducto->modificaProducto();
	}
	/**
	 * Método que resta cantidad de un producto en la base de datos cuando se 
	 * realiza la compra
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function reduceCantidadProducto() {
		
		/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
		$bdproducto->setcodProducto($this->codProducto);
		$bdproducto->setcantidad($this->cantidad);
		/** Inicializa la funcion de la capa de datos. */
		$bdproducto->reduceCantidadProducto();
	}
	/**
	 * Método que Devuelve el numero de paginas de todos los productos para el
	 * pagination.
	 *
	 * @access public
	 * @return array	
	 */
	public function numeropaginas(){
		/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa la funcion de la capa de datos. */
			$paginas=ceil($bdproducto->numeropaginas()/10);
		/**Devuelve el numero de paginas*/
		return $paginas;
	}
	/**
	 * Método que Devuelve el numero de paginas de los productos para el
	 * pagination filtrados por el tipo de producto.
	 *
	 * @access public
	 * @return array	
	 */
		public function paginasFiltro(){
			/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa los atributos del objeto. */
			$bdproducto->settipo($this->tipo);
			/** Inicializa la funcion de la capa de datos. */
			$paginas=ceil($bdproducto->paginasFiltro()/10);
		/**Devuelve el numero de paginas*/
		return $paginas;
	}
	/**
	 * Método que devuelve el numero de paginas que se creara al buscar los productos 
	 * expecificos en el buscador.
	 *
	 * $tipo   Variable que tiene el valor de la busqueda
	 * @access public
	 * @return array

	 */	
		public function paginasbuscador($tipo){
			/** @var BDProductos Instancia un objeto de la clase. */
		$bdproducto = new BDProductos();
		/** Inicializa la funcion de la capa de datos. */
			$paginas=ceil($bdproducto->paginasbuscador($tipo)/10);
		/**Devuelve el numero de paginas*/
		return $paginas;
	}

}
