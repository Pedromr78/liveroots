<?php

/** Incluye la clase. */
include_once '../capaDatos/bdplantas.php';

class BDInformacion extends BDPlantas{
	
	
	
	
	
	/**
	 * Método que comprueba si existe el usuario en la base de datos.
	 *
	 * @access public
	 * @return array	True si existe
	 *					False en otro caso.
	 */
	public function extraerinformacion(){
		
		
			$data= array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
				"SELECT *
						FROM Informacion"
			);
			/** Vincula un parámetro al nombre de variable especificado. */
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if($resultado->execute()){
			foreach ($resultado as $fila) {
				
				$informacion = new Informacion();
				
				
				$informacion->setnombre($fila['nombre']);
				$informacion->setdescripcion($fila['descripcion']);
				$informacion->setcuidados($fila['cuidados']);
				$informacion->setimg($fila['img']);
			
				
				$data[] = $informacion;
			}
				return $data;
			
				
				
				
			}
			}
		}
	}
