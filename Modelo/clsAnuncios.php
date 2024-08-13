<?php
include_once 'Modelo/clsconexion.php';

class clsAnuncios extends clsconexion{

	public function mostrarAnuncios() {
		$result = $this->conectar->query("CALL sp_consulta_Anuncios()");
		
		return $result;
		   
	}
	
	
}
?>