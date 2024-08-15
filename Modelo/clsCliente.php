<?php
include_once 'Modelo/clsconexion.php';

class clsCliente extends clsconexion{

    public function RealizarMovimientos($idC, $idprestamo, $abono) {
        $result = $this->conectar->query("CALL spIngresaAbono('$idC', '$idprestamo', '$abono', NOW());");
        return $result;   
    }
    
    public function obtenerIdPrestamo($idC) {
        $result = $this->conectar->query("CALL spObtenerIdPrestamoCliente('$idC');");
        return $result;
    }
    

    public function obtenerIdCliente($idCliente) {
        $result = $this->conectar->query("SELECT idcliente FROM tblclientes WHERE idcliente = '$idCliente'");
        $idDelCliente = $result->fetch_assoc();
        return $idDelCliente['idcliente'];
    }

}
?>