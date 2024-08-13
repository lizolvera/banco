<?php
include_once 'Modelo/clsconexion.php';

class clsCliente extends clsconexion{

	public function RealizarMovimientos($noC,$total,$movimiento) {
		$result = $this->conectar->query("CALL spInsertaMovimientos('$noC',$total,'$movimiento');");
		
		return $result;   
	}
///esto le añadi yo
    public function obtenerSaldo($noC) {
        $result = $this->conectar->query("SELECT fltsaldo FROM tblcuenta WHERE vchnum_cuenta = '$noC'");
        $traerSaldo = $result->fetch_assoc();
        return $traerSaldo['fltsaldo'];
    }


    public function obtenerNumerodeCuenta($idCliente) {
        $result = $this->conectar->query("SELECT vchnum_cuenta FROM tblcuenta WHERE idcliente = '$idCliente'");
        $cuenta = $result->fetch_assoc();
        return $cuenta['vchnum_cuenta'];
    }

    public function obtenerIdCliente($idCliente) {
        $result = $this->conectar->query("SELECT idcliente FROM tblcliente WHERE idcliente = '$idCliente'");
        $idDelCliente = $result->fetch_assoc();
        return $idDelCliente['idcliente'];
    }

    public function obtenerNombreCliente($idCliente) {
        $result = $this->conectar->query("SELECT vchNombre FROM tblcliente WHERE idcliente = '$idCliente'");
        $nombreDelCliente = $result->fetch_assoc();
        return $nombreDelCliente['vchNombre'];
    } 

    /* public function obtenerSaldo($noC) {
        $result = $this->conectar->query("CALL obtenerSaldo('$noC')");
        $traerSaldo = $result->fetch_assoc();
        $result->free();
        return $traerSaldo['fltsaldo'];
    }

///$result = $this->conectar->query("CALL obtenerNumerodeCuenta('$idCliente')");
///$result->store_result();
///$cuenta = $result->fetch_assoc();

    public function obtenerNumerodeCuenta($idCliente) {
        $result = $this->conectar->query("CALL obtenerNumerodeCuenta('$idCliente')");
        $cuenta = $result->fetch_assoc();
        $result->free();
        return $cuenta['vchnum_cuenta'];
    }

    public function obtenerIdCliente($idCliente) {
        $result = $this->conectar->query("CALL obtenerIdCliente('$idCliente')");
        $idDelCliente = $result->fetch_assoc();
        $result->free();
        return $idDelCliente['idcliente'];
    }

    public function obtenerNombreCliente($idCliente) {
        $result = $this->conectar->query("CALL obtenerNombreCliente('$idCliente')");
        $nombreDelCliente = $result->fetch_assoc();
        $result->free();
        return $nombreDelCliente['vchNombre'];
    }  */
    ///
    


}
?>