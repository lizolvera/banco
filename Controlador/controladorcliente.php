<?php
session_start();
include_once 'Modelo/clsCliente.php';

class controladorcliente {
    private $vista;

    public function AgregarMovimientos() {
        $cliente = new clsCliente();
        $datoID = $_SESSION['id'];
        $datoNombre = $_SESSION['nombre'];

        // Obtener el número de cuenta del cliente logueado
        $aidiCliente = $cliente->obtenerIdCliente($datoID);

        // Verificar los valores antes de la comparación

        if (!empty($_POST)) {
            
            $idC = $_POST['txtId'];
            $prestamoC = $_POST['txtPrestamo'];

            // Verificar si el número de cuenta ingresado es igual al del cliente logueado
            // son 3 === para ver si el valor como el tipo de datos son iguales 
            if ($idC === $aidiCliente) {
                // Obtener el saldo actual de la cuenta
                $saldoActual = $cliente->obtenerSaldo($noC);
                $saldo = $saldoActual;

                if (isset($_POST['btnDepositar'])) {
                    $result = $cliente->RealizarMovimientos($noC, $total, 'DEPOSITO');
                } else {
                    // Checar si el saldo es suficiente para el retiro
                    if ($saldoActual >= $total) {
                        $result = $cliente->RealizarMovimientos($noC, $total, 'RETIRO');
                    } else {
                        // Si el saldo no es suficiente, se pone el error de saldo insuficiente
                        echo "<script>alert('Saldo insuficiente para realizar el retiro.');</script>";
                    }
                }

            } else {
                // Mostrar un mensaje de error si el número de cuenta no coincide
                echo "<script>alert('Datos incorrectos.');</script>";
            }
            $vista = "Vistas/Inicio/frmcontenidoCliente.php";
            include_once("Vistas/frmCliente.php");
        } else {
            if ($_GET['op'] == 1) {
                $vista = "Vistas/Cliente/frmRetiros.php";
                include_once("Vistas/frmCliente.php");
            } else if ($_GET['op'] == 2) {
                $vista = "Vistas/Cliente/frmDepositos.php";
                include_once("Vistas/frmCliente.php");
            } else if ($_GET['op'] == 3) {
                $vista = "Vistas/Cliente/frmEstado.php";
                include_once("Vistas/frmCliente.php");
            } else {
                $vista = "Vistas/Cliente/frmEstado.php";
                include_once("Vistas/frmCliente.php");
            }
        }
    }
}