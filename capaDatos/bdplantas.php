<?php

/**
 * bdplantas.php
 * Módulo secundario que implementa la clase abstracta BDPlantas.
 *
 * @author Nombre alumno
 * @abstract
 */

abstract class BDPlantas {

	/**
	 * @var PDO Conexión con el servidor de bases de datos.
	 * @access protected 
	 */
	protected $pdocon = null;

	/** 
	 * @const string Nombre del origen de datos.
	 */
	const DSN = "mysql:host=localhost;dbname=BDbonsai";

	/** 
	 * @const string Nombre del usuario del servidor de bases de datos.
	 */
	const USUARIO = "UBDPlantas";

	/** 
	 * @const string Contraseña del usuario.
	 */
	const CONTRASEÑA = "Lo-1234-lo";

	/** 
	 * @const array[] Opciones de conexión específicas del controlador.
	 */
	const OPCIONES = array(PDO::MYSQL_ATTR_INIT_COMMAND => 
		'SET CHARACTER SET utf8');	
	
	/**
	 * Constructor de la clase.
	 * 
	 * 
	 */
	public function __construct() {
		/** Establece la conexión con el servidor de bases de datos. */
		$this->pdocon = new PDO(self::DSN, self::USUARIO, self::CONTRASEÑA, 
		self::OPCIONES);
	}

	/**
	 * Destructor de la clase.
	 * 
	 * @access public
	 */
	public function __destruct() {
		/** Cierra la conexión con el servidor de bases de datos. */
		$this->pdocon = null;
	}

	/**
	 * Método que devuelve el valor de la conexión.
	 * 
	 * @access public
	 * @return PDO Conexión con el servidor de bases de datos.
	 */
	public function getPdocon() {
		return $this->pdocon;
	}

}
