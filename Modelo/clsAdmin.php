<?php
include_once 'Modelo/clsconexion.php';

class clsAdmin extends clsconexion {
    public function ingresarClientes($nombre, $ap, $am, $rol) {
        $result = $this->conectar->query("CALL spAltaClientes('$nombre', '$ap', '$am', '$rol');");
        return $result;   
    }
}

?> 