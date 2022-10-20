<?php

/**
 * bdusuarios.php
 * Módulo secundario que implementa la clase BDUsuarios.
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
	public function setfechañadida(string $fechaañadida): void {
		$this->fechañadida = $fechaañadida;
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
		return $this->fechañadida;
	}

	/**
	 * Método que inserta un nuevo usuario en la base de datos
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
	 * Método que comprueba si existe el usuario en la base de datos.
	 *
	 * @access public
	 * @return array	True si existe
	 * 					False en otro caso.
	 */
	public function extraerProducto(string $email) {


		$data = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM cart WHERE client_email = :email"
			);

			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':email', $email);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				if ($resultado->rowCount() > 0) {

					foreach ($resultado as $fila) {
						$cart = new Cart();

						$cart->setemail($fila['client_email']);
						$cart->setidpro($fila['id']);
						$cart->setfechañadida($fila['fechañadido']);
						$cart->setcantidad($fila['cantidad']);

						$data[] = $cart;
					}


					return $data;
				}
			}
		}
	}

	/**
	 * Método que comprueba si existe el usuario en la base de datos.
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
						WHERE id = :id AND email = :email");
			/** Vincula un parámetro al nombre de variable especificado. */
			$id = $this->idpro;
			$resultado->bindParam(':id', $id);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Comprueba que el número de filas sea 1. */
				if ($resultado->rowCount() === 1) {
					/** Existe el email del usuario. */
					return true;
				}
			}
		}
		/** No existe el email del usuario. */
		return false;
	}

}
