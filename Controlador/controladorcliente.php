<?php
session_start();
include_once 'Modelo/clsCliente.php';

class controladorcliente {
    private $vista;

    public function AgregarAbono() {

        $cliente = new clsCliente();
        $datoID = $_SESSION['id'];

        // Obtener el número de cuenta del cliente logueado
        $aidiCliente = $cliente->obtenerIdCliente($datoID);

        if (!empty($_POST)) {
            
            $idC = $_POST['txtId'];
            $idP = $_POST['txtIdP'];
            $abono = $_POST['txtAbono'];

            // son 3 === para ver si el valor como el tipo de datos son iguales 
            if ($idC === $aidiCliente) {
                // Realizar el abono
                $result = $cliente->RealizarMovimientos($idC, $idP, $abono);
                if ($result) {
                    echo "<script>alert('Abono realizado con éxito.');</script>";
                } else {
                    echo "<script>alert('Error al realizar el abono.');</script>";
                }

            } else {
                // Mostrar un mensaje de error si el número de cuenta no coincide
                echo "<script>alert('Datos incorrectos.');</script>";
            }
            $vista = "Vistas/Inicio/frmcontenidoCliente.php";
            include_once("Vistas/frmCliente.php");
        } else {
            if ($_GET['op'] == 1) {
                $vista = "Vistas/Cliente/frmDepositos.php";
                include_once("Vistas/frmCliente.php");
            } else {
                $vista = "Vistas/Cliente/frmDepositos.php";
                include_once("Vistas/frmCliente.php");
            }
        }
    }
}