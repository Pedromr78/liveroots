<?php

/**
 * bdcart.php
 * Módulo secundario que implementa la clase BDCart.
 *
 */
/** Incluye la clase. */
include_once '../capaDatos/bdplantas.php';

class BDCart extends BDPlantas {

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
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function añadircarrito(): bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"INSERT INTO cart (id, client_email, fechañadido, cantidad)
						VALUES (:id, :client_email, :fechanadido, :cantidad)");
			/** Vincula un parámetro al nombre de variable especificado. */
			$id = $this->idpro;
			$resultado->bindParam(':id', $id);
			$email = $this->email;
			$resultado->bindParam(':client_email', $email);
			$fechañadida = $this->fechañadida;
			$resultado->bindParam(':fechanadido', $fechañadida);
			$cantidad = $this->cantidad;
			$resultado->bindParam(':cantidad', $cantidad);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Devuelve true si se ha conseguido. */
				return true;
			}
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}

	/**
	 * Método que extrae los productos del carrito  del usuario.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function extraerProducto() {

		/** Array que guardara los datos de la base de datos */
		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM cart WHERE client_email = :email"
			);

			/** Vincula un parámetro al nombre de variable especificado. */
			$email = $this->email;
			$resultado->bindParam(':email', $email);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				if ($resultado->rowCount() > 0) {
					/** Se recorre los resultados de la consulta para crear objetos con las diferentes filas */
					foreach ($resultado as $fila) {
						/** Se establece un objeto de la clase */
						$cart = new Cart();
						/** Se inician los atributos del objeto */
						$cart->setemail($fila['client_email']);
						$cart->setidpro($fila['id']);
						$cart->setfechañadida($fila['fechañadido']);
						$cart->setcantidad($fila['cantidad']);
						/** Se guardan los objetos en el array */
						$data[] = $cart;
					}

					/** La funcion devuelve el conjuntos de resultados */
					return $data;
				}
			}
		}
	}

	/**
	 * Método que comprueba si existe el producto en el carrito.
	 *
	 * @access public
	 * @return boolean	True si existe
	 * 					False en otro caso.
	 */
	public function existeProducto(): bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM cart
						WHERE id = :id AND client_email = :email");
			/** Vincula un parámetro al nombre de variable especificado. */
			$id = $this->idpro;
			$resultado->bindParam(':id', $id);
			$email = $this->email;
			$resultado->bindParam(':email', $email);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Comprueba que el número de filas sea 1. */
				if ($resultado->rowCount() === 1) {
					/** Existe el producto. */
					return true;
				}
			}
		}
		/** No existe el producto. */
		return false;
	}

	/**
	 * Método que elimina los productos del carrito.
	 *
	 * @access public
	 * @return boolean	True si existe
	 * 					False en otro caso.
	 */
	public function eliminaProducto(): bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"DELETE
						FROM cart
						WHERE id = :id AND client_email = :email");
			/** Vincula un parámetro al nombre de variable especificado. */
			$id = $this->idpro;
			$resultado->bindParam(':id', $id);
			$email = $this->email;
			$resultado->bindParam(':email', $email);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Devuelve true si se ha conseguido. */
				return true;
			}
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}

}
