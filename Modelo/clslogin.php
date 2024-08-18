<?php
include_once 'Modelo/clsconexion.php';
class clslogin extends clsconexion{
		
	public function ConsultaCliente($NOM, $CONTRA) {
        $result2 = $this->conectar->query("CALL spConsultaUsuario('$NOM', '$CONTRA')");
        $resp2 = $result2->fetch_assoc();
        return $resp2;
    }	
}
?>