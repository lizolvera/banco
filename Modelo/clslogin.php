<?php
include_once 'Modelo/clsconexion.php';

class clslogin extends clsconexion{

	public function ConsultaCliente($NOM) {
		$result2 = $this->conectar->query("CALL spConsultaUsuario('$NOM')");
		$resp2 = $result2->fetch_assoc();
		return $resp2;
	}	
	
}
?>