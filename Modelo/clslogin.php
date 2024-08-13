<?php
include_once 'Modelo/clsconexion.php';

class clslogin extends clsconexion{

	public function ConsultaCliente($NIP) {
			
         $result2=$this->conectar->query("CALL spConsultaUsuario('$nombre')");
         $resp2=$result2->fetch_assoc();
		 return $resp2;
	}
	
}
?>