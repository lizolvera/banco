<?php
session_start();
include_once 'Modelo/clsAdmin.php';

class controladoradmin2 {
    private $vista;

    public function AgregarPrestamo(){
        $admin = new clsAdmin();

        if(!empty($_POST)){
            $prestamo = $_POST['txtPrestamo'];
            $id= $_POST['txtidc'];

            // Realizar la inserción
            $result = $admin->ingresarPrestamos($prestamo, $id);

            if ($result) {
                echo "<script>alert('Prestamo registrado exitosamente.');</script>";
            } else {
                echo "<script>alert('Error al registrar el Prestamo.');</script>";
            }

            // Redirigir a la vista deseada después de la inserción
            $vista = "Vistas/Admin/frmAltaPrestamos.php";
            include_once("Vistas/frmAdmin.php");
        } else {
            if ($_GET['op'] == 1) {
                $vista = "Vistas/Admin/frmAltaCliente.php";
            } else if ($_GET['op'] == 2) {
                $vista = "Vistas/Admin/frmAltaPrestamos.php";
            } else {
                $vista = "Vistas/Admin/frmAltaPrestamos.php";
            }
            include_once("Vistas/frmAdmin.php");
        }
    }
}
