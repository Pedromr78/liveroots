<?php

/**
 * bdusuarios.php
 * Módulo secundario que implementa la clase BDUsuarios.
 *
 */
/** Incluye la clase. */
include_once '../capaDatos/bdplantas.php';

class BDUsuarios extends BDPlantas {

	/**
	 * @var string Dirección de correo electrónico del usuario.
	 * @access private
	 */
	private string $email;

	/**
	 * @var string Dirección de correo electrónico del usuario.
	 * @access private
	 */
	private string $email2;

	/**
	 * @var string Contraseña del usuario.
	 * @access private
	 */
	private string $contraseña;

	/**
	 * @var string Nombre completo del usuario.
	 * @access private
	 */
	private string $nombre;

	/**
	 * @var string Apelliidos del usuario.
	 * @access private
	 */
	private string $apellidos;

	/**
	 * @var string Telefono del usuario.
	 * @access private
	 */
	private string $telefono;

	/**
	 * @var string Fecha de nacimiento del usuario.
	 * @access private
	 */
	private string $fechaNacimiento;

	/**
	 * Método que inicializa el atributo email.
	 *
	 * @access public
	 * @param string $email Nombre del usuario.
	 * @return void
	 */
	public function setEmail(string $email): void {
		$this->email = $email;
	}

	/**
	 * Método que inicializa el atributo email.
	 *
	 * @access public
	 * @param string $email Nombre del usuario.
	 * @return void
	 */
	public function setEmail2(string $email2): void {
		$this->email2 = $email2;
	}

	/**
	 * Método que inicializa el atributo contraseña.
	 *
	 * @access public
	 * @param string $contraseña Contraseña del usuario.
	 * @return void
	 */
	public function setContraseña(string $contraseña): void {
		$this->contraseña = $contraseña;
	}

	/**
	 * Método que inicializa el atributo nombre.
	 *
	 * @access public
	 * @param string $nombre Nombre del usuario.
	 * @return void
	 */
	public function setNombre(string $nombre): void {
		$this->nombre = $nombre;
	}

	/**
	 * Método que inicializa el atributo email.
	 *
	 * @access public
	 * @param string $email Nombre del usuario.
	 * @return void
	 */
	public function setApellidos(string $apellidos): void {
		$this->apellidos = $apellidos;
	}

	/**
	 * Método que inicializa el atributo email.
	 *
	 * @access public
	 * @param string $email Nombre del usuario.
	 * @return void
	 */
	public function setTelefono(string $telefono): void {
		$this->telefono = $telefono;
	}

	/**
	 * Método que inicializa el atributo email.
	 *
	 * @access public
	 * @param string $email Nombre del usuario.
	 * @return void
	 */
	public function setFechaNacimiento(string $fechaNacimiento): void {
		$this->fechaNacimiento = $fechaNacimiento;
	}

	/**
	 * Método que devuelve el valor del atributo email.
	 *
	 * @access public
	 * @return string Email del usuario.
	 */
	public function getEmail(): string {
		return $this->email;
	}

	/**
	 * Método que devuelve el valor del atributo email.
	 *
	 * @access public
	 * @return string Email del usuario.
	 */
	public function getEmail2(): string {
		return $this->email2;
	}

	/**
	 * Método que devuelve el valor del atributo contraseña.
	 *
	 * @access public
	 * @return string Contraseña del usuario.
	 */
	public function getContraseña(): string {
		return $this->contraseña;
	}

	/**
	 * Método que devuelve el valor del atributo nombre.
	 *
	 * @access public
	 * @return string Nombre completo del usuario.
	 */
	public function getNombre(): string {
		return $this->nombre;
	}

	/**
	 * Método que devuelve el valor del atributo nombre.
	 *
	 * @access public
	 * @return string Nombre completo del usuario.
	 */
	public function getApellidos(): string {
		return $this->apellidos;
	}

	/**
	 * Método que devuelve el valor del atributo nombre.
	 *
	 * @access public
	 * @return string Nombre completo del usuario.
	 */
	public function getTelefono(): string {
		return $this->telefono;
	}

	/**
	 * Método que devuelve el valor del atributo nombre.
	 *
	 * @access public
	 * @return string Nombre completo del usuario.
	 */
	public function getFechaNacimiento(): string {
		return $this->fechaNacimiento;
	}

	/**
	 * Método que comprueba si existe el usuario en la base de datos.
	 *
	 * @access public
	 * @return boolean	True si existe
	 * 					False en otro caso.
	 */
	public function existeUsuario(): bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Usuario
						WHERE email = :email");
			/** Vincula un parámetro al nombre de variable especificado. */
			$email = $this->email;
			$resultado->bindParam(':email', $email);
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

	/**
	 * Método que valida un usuario en la base de datos.
	 * 
	 * @access public
	 * @return boolean	True si existe
	 * 					False en otro caso.
	 */
	public function modificaUsuario(): bool {

		if ($this->pdocon) {
			$resultado = $this->pdocon->prepare(
				"UPDATE  Usuario Set email = :email,
						contraseña = :contrasena,
						nombre = :nombre
					 WHERE email = :email2");
			$email = $this->email;
			$email2 = $this->email2;
			$nombre = $this->nombre;
			$contraseña = $this->contraseña;
			$resultado->bindParam(':email2', $email2);
			$resultado->bindParam(':email', $email);
			$resultado->bindParam(':nombre', $nombre);
			$resultado->bindParam(':contraseña', $contraseña);
			if ($resultado->execute()) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Método que valida un usuario en la base de datos.
	 * 
	 * @access public
	 * @return boolean	True si existe
	 * 					False en otro caso.
	 */
	public function validaUsuario(): bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
					FROM Usuario
					WHERE email = :email AND contraseña = :contrasena");
			/** Vincula un parámetro al nombre de variable especificado. */
			$email = $this->email;
			$resultado->bindParam(':email', $email);
			$contraseña = $this->contraseña;
			$resultado->bindParam(':contrasena', $contraseña);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			$resultado->execute();
			/** Comprueba que el número de filas sea 1. */
			if ($resultado->rowCount() === 1) {
				/** Accede a los valores obtenidos. */
				foreach ($resultado as $fila) {
					/** Inicializa los atributos del objeto. */
					$this->setEmail($fila['email']);
					$this->setContraseña($fila['contraseña']);
					$this->setNombre($fila['nombre']);
				}
				/** Existe el usuario. */
				return true;
			}
		}
		/** No existe el usuario. */
		return false;
	}

	/**
	 * Método que inserta un nuevo usuario en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 * 					False en otro caso
	 */
	public function almacenaUsuario(): bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"INSERT INTO Usuario (email, contraseña, nombre,apellidos,fechanacimiento,telefono)
						VALUES (:email, :contrasena, :nombre, :apellidos, :fechanacimiento, :telefono)");
			/** Vincula un parámetro al nombre de variable especificado. */
			$email = $this->email;
			$resultado->bindParam(':email', $email);
			$contraseña = $this->contraseña;
			$resultado->bindParam(':contrasena', $contraseña);
			$nombre = $this->nombre;
			$resultado->bindParam(':nombre', $nombre);
			$apellidos = $this->apellidos;
			$resultado->bindParam(':apellidos', $apellidos);
			$fechaNacimiento = $this->fechaNacimiento;
			$resultado->bindParam('fechanacimiento', $fechaNacimiento);
			$telefono = $this->telefono;
			$resultado->bindParam('telefono', $telefono);
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
