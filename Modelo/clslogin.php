<?php
include_once 'Modelo/clsconexion.php';

class clslogin extends clsconexion{

	public function ConsultaUsuario($NIP) {
			
         $result=$this->conectar->query("CALL spLogin('$NIP',@respuesta);");
         $result=$this->conectar->query("Select @respuesta as respuesta");
         $resp=$result->fetch_assoc();
  
		 return $resp;
	}
	public function ConsultaCliente($NIP) {
			
         $result2=$this->conectar->query("CALL spTraeCliente('$NIP')");
         $resp2=$result2->fetch_assoc();
		 return $resp2;
	}
	
}
?>