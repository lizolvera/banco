<?php
session_start();
include_once 'Modelo/clsAdmin.php';

class controladoradmin {
    private $vista;

    public function AgregarClientes(){
        $admin = new clsAdmin();

        if(!empty($_POST)){
            $nombre = $_POST['txtNombre'];
            $ap = $_POST['txtAp'];
            $am = $_POST['txtAm'];
            $rol = $_POST['txtRol'];

            // Realizar la inserción
            $result = $admin->ingresarClientes($nombre, $ap, $am, $rol);

            if ($result) {
                echo "<script>alert('Cliente registrado exitosamente.');</script>";
            } else {
                echo "<script>alert('Error al registrar el cliente.');</script>";
            }

            // Redirigir a la vista deseada después de la inserción
            $vista = "Vistas/Admin/frmAltaCliente.php";
            include_once("Vistas/frmAdmin.php");
        } else {
            if ($_GET['op'] == 1) {
                $vista = "Vistas/Admin/frmAltaCliente.php";
            } else if ($_GET['op'] == 2) {
                $vista = "Vistas/Admin/frmAltaPrestamos.php";
            } else if ($_GET['op'] == 3) {
                $vista = "Vistas/Admin/frmReportesAbono.php";
            } else if ($_GET['op'] == 4) {
                $vista = "Vistas/Admin/frmReportesPrestamo.php";
            }else {
                $vista = "Vistas/Admin/frmAltaPrestamos.php";
            }
            include_once("Vistas/frmAdmin.php");
        }
    }
}
