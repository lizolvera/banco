<?php
include_once 'Modelo/clsconexion.php';

class clsAdmin extends clsconexion {


    public function ingresarClientes($nombre, $ap, $am, $rol,$contrasenia) {
        $result = $this->conectar->query("CALL spAltaClientes('$nombre', '$ap', '$am', '$rol','$contrasenia');");
        return $result;   
    }

    public function ingresarPrestamos($canPres, $idclien) {
        $fecha = date('Y-m-d'); // Obtener la fecha actual en formato yyyy-mm-dd
        $result = $this->conectar->query("CALL spIngresaPrestamos('$canPres', '$idclien', '$fecha');");
        return $result;
    }
}
?> 