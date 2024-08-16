<?php
include_once 'Modelo/clsconexion.php';

class clsReportes extends clsconexion {

    public function reporteAbono($nombre,$ap,$am){
        $result = $this->conectar->query("CALL sp_ConsultaAbonoxCliente ('$nombre','$ap','$am');");
        return $result; 
    }

    public function reportePrestamos(){
        $result = $this->conectar->query("CALL spObtenerIdPrestamoCliente();");
        return $result;
    }
}
?>