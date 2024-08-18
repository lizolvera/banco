<?php
include_once 'Modelo/clsconexion.php';

class clsCliente extends clsconexion{

    public function RealizarMovimientos($idC, $idprestamo, $abono) {
        $result = $this->conectar->query("CALL spInsertaAbono('$idC', '$idprestamo', '$abono', NOW());");
        return $result;   
    }
    
    public function obtenerIdPrestamo($idC) {
        $result = $this->conectar->query("CALL spObtenerIdPrestamo('$idC');");
        return $result;
    }
    
    public function obtenerIdCliente($idCliente) {
        $result = $this->conectar->query("SELECT idcliente FROM tblclientes WHERE idcliente = '$idCliente'");
        $idDelCliente = $result->fetch_assoc();
        return $idDelCliente['idcliente'];
    }

    public function obtenerPrestamoYResta($idCliente) {
        // Realiza la consulta directamente en lugar de usar el procedimiento almacenado
        $result = $this->conectar->query("SELECT prestamo, resta FROM tblprestamos WHERE idcliente = '$idCliente'");
        
        // Verifica si se obtienen resultados
        if ($result) {
            $data = $result->fetch_assoc(); // Obtiene la primera fila de resultados
            $result->free(); // Libera el resultado
            return $data;
        } else {
            return null; // Maneja el caso donde no se obtienen resultados
        }
    }
}
?>