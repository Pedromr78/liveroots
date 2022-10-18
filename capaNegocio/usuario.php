<?php

/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 *
 */
/** Incluye la clase. */
include_once '../capaDatos/bdusuarios.php';

class Usuario {

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
	 * Método que comprueba si un usuario existe en la base de datos.
	 *
	 * @access public
	 * @return boolean	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function existeUsuario(): bool {
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdusuario = new BDUsuarios();
		/** Inicializa los atributos del objeto. */
		$bdusuario->setEmail($this->email);
		/** Comprueba si existe el usuario. */
		if ($bdusuario->existeUsuario()) {
			/** El usuario existe. */
			return true;
		}
		/** El usuario no existe. */
		return false;
	}

	/**
	 * Método que inserta un usuario en la base de datos.
	 *
	 * @access public
	 * @return boolean	true éxito
	 * 					false error.
	 */
	public function insertaUsuario(): bool {
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdusuario = new BDUsuarios();
		/** Inicializa el atributo del objeto. */
		$bdusuario->setEmail($this->email);
		$bdusuario->setContraseña($this->contraseña);
		$bdusuario->setNombre($this->nombre);
		$bdusuario->setApellidos($this->apellidos);
		$bdusuario->setFechaNacimiento($this->fechaNacimiento);
		$bdusuario->setTelefono($this->telefono);
		/** Inserta un nuevo usuario y comprueba un posible error. */
		if ($bdusuario->almacenaUsuario()) {
			/** Devuelve true si se ha conseguido. */
			return true;
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}
	
		public function modificaUsuario() : bool {
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdusuario = new BDUsuarios();
		/** Inicializa el atributo del objeto. */
		$bdusuario->setEmail($this->email);
		$bdusuario->setEmail2($this->email2);
		$bdusuario->setContraseña($this->contraseña);
		$bdusuario->setNombre($this->nombre);
		$bdusuario->modificaUsuario();
			/** Devuelve true si se ha conseguido. */
			}


	
	
	

	/**
	 * Método que valida un usuario registrado en la base de datos.
	 *
	 * @access public
	 * @return boolean	true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function validaUsuario(): bool {
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdusuario = new BDUsuarios();
		/** Inicializa los atributos del objeto. */
		$bdusuario->setEmail($this->email);
		$bdusuario->setContraseña($this->contraseña);
		/** Comprueba si existe y gestiona un posible error. */
		if ($bdusuario->validaUsuario()) {
			/** Inicializa la propiedad nombre del usuario, el objeto ya
			 * contiene el email y la contraseña a partir de los datos de las
			 * variables de formulario. */
			$this->nombre = $bdusuario->getNombre();
			/** Devuelve true si se ha conseguido. */
			return true;
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}

	/**
	 * Método que comprueba la contraseña.
	 *
	 * @access public
	 * 					true en caso afirmativo
	 * 					false en caso contrario.
	 */
	public function comprContraseña($contra) {
		/** Creo las variables como contadores y para
		 * caracteres especiales. */
		$numero = 0;
		$letra = 0;
		$especiales = '@%$&-_';
		$especialesbandera = 0;
		/** Me comprueba que este entre 4 y 10 caracteres. */
		if (strlen($contra) < 4 && strlen($contra) > 10) {
			$frase = "La contraseña tiene que tener un tamaño entre 4 y 10";
			/** Devuelve false si no estan entre 4 y 10 caracteres. */
			return false;
		} else {
			/** Me comprueba que no hay esopacios en blanco. */
			if (!str_contains($contra, ' ')) {
				/** Recorre la contraseña. */
				for ($i = 0; $i < strlen($contra); $i++) {
					/** Comprueba si el caracter actual de la contraseña es un digito */
					if (ctype_digit($contra[$i])) {
						$numero += 1;
					}
					/** Comprueba si el caracter actual de la contraseña es una Mayuscula */
					if (ctype_upper($contra[$i])) {
						$letra += 1;
					}
				}
				/** Comprueba si el caracter actual de la contraseña es un digito */
				if (!$numero < 1) {
					/** Comprueba si el caracter actual de la contraseña es una Mayuscula */
					if (!$letra < 1) {
						/** Recorre la variable con caracteres especiales. */
						for ($j = 0; $j < strlen($especiales); $j++) {
							/** Recorre la contraseña. */
							for ($k = 0; $k < strlen($contra); $k++) {
								/** Si la contraseña contiene un carácter especial suma 1 al contador */
								if ($especiales[$j] == $contra[$k]) {
									$especialesbandera += 1;
								}
							}
						}
						/** Si la contraseña contiene un carácter especial me devuelve true. */
						if (!$especialesbandera < 1) {
							return true;
						}
						/** Me devuelve flase si no cumple los requisitos. */ else {
							return false;
						}
					}
					/** Me devuelve flase si no cumple los requisitos. */ else {
						return false;
					}
				}
				/** Me devuelve flase si no cumple los requisitos. */ else {

					return false;
				}
			}
			/** Me devuelve flase si no cumple los requisitos. */ else {

				return false;
			}
		}
	}

	/**
	 * Método que me muestra los mensajes de error.
	 *
	 * @access public
	 * 					return $frase.
	 */
	public function mensajeContraseña($contra) {
		/** Creo las variables como contadores y para
		 * caracteres especiales. */
		$numero = 0;
		$letra = 0;
		$especiales = '@%$&-_';
		$especialesbandera = 0;
		/** Me comprueba que este entre 4 y 10 caracteres. */
		if (strlen($contra) < 4 && strlen($contra) > 10) {
			return $frase = "La contraseña tiene que tener un tamaño entre 4 y 10";
			/** Devuelve la frase si no estan entre 4 y 10 caracteres. */
		} else {
			/** Me comprueba que no hay esopacios en blanco. */
			if (!str_contains($contra, ' ')) {
				/** Recorre la contraseña. */
				for ($i = 0; $i < strlen($contra); $i++) {
					/** Comprueba si el caracter actual de la contraseña es un digito */
					if (ctype_digit($contra[$i])) {
						$numero += 1;
					}
					/** Comprueba si el caracter actual de la contraseña es una Mayuscula */
					if (ctype_upper($contra[$i])) {
						$letra += 1;
					}
				}
				/** Comprueba si el caracter actual de la contraseña es un digito */
				if (!$numero < 1) {
					/** Comprueba si el caracter actual de la contraseña es una Mayuscula */
					if (!$letra < 1) {
						/** Recorre la variable con caracteres especiales. */
						for ($j = 0; $j < strlen($especiales); $j++) {
							/** Recorre la contraseña. */
							for ($k = 0; $k < strlen($contra); $k++) {
								/** Si la contraseña contiene un carácter especial suma 1 al contador */
								if ($especiales[$j] == $contra[$k]) {
									$especialesbandera += 1;
								}
							}
						}
						/** Si la contraseña cumple los requisitos me muestra la frase. */
						if (!$especialesbandera < 1) {

							return $frase = "el usuario se a creado correctamente";
						} 
						/** Si la contraseña no contiene un carácter especial me devuelve la frase. */
						else {

							return $frase = "Tiene que contener minimo los caracteres @%$&-_";
						}
					} 
					/** Si la contraseña no contiene una mayuscula me devuelve la frase. */
					else {

						return $frase = "tiene que contener al menos una mayuscula";
					}
				} 
				/** Si la nocontraseña contiene un carácter numerico me devuelve la frase. */
				else {

					return $frase = "tiene que contener al menos un numero";
				}
			} 	
			/** Si la nocontraseña contiene un espacio en blanco me devuelve la frase. */
			else {

				return $frase = "contiene un espacio en blanco";
			}
		}
	}

}
