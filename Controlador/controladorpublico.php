<?php
include_once 'Modelo/clslogin.php';

class controladorpublico
{
    private $vista;
    
    public function inicio()
    {        
        $vista = "Vistas/Inicio/frmcontenidopublico.php";
        include_once("Vistas/frmpublica.php");
    }    
    
    public function login()
    {
        $acceso = new clslogin();

        if (!empty($_POST)) {

            $NOM = $_POST['txtNombre'];
            $CONTRA = $_POST['txtContra'];

            $datos = $acceso->ConsultaCliente($NOM, $CONTRA);

            // Verificar si se obtuvieron resultados
            if ($datos && !empty($datos['idcliente'])) {
                // Iniciar la sesión y almacenar los datos del usuario
                session_start();
                $_SESSION['id'] = $datos['idcliente'];
                $_SESSION['nombre'] = $datos['nombre_completo'];
                $_SESSION['rol'] = $datos['rol'];

                if ($datos['rol'] == 'admin') {
                    $vista = "Vistas/Inicio/frmcontenidoAdmin.php";
                    include_once("Vistas/frmAdmin.php");
                } else {
                    $vista = "Vistas/Inicio/frmcontenidoCliente.php";
                    include_once("Vistas/frmCliente.php");
                }
            } else {
                // Si los datos no coinciden, redirigir a la página de inicio de sesión
                $vista = "Vistas/Usuario/login.php";
                include_once("Vistas/frmpublica.php");
                echo "<script>alert('Usuario o contraseña incorrectos');</script>";
            }
        } else {
            // Si el formulario no se envió, mostrar la vista de inicio de sesión
            $vista = "Vistas/Usuario/login.php";
            include_once("Vistas/frmpublica.php");
        }
    }
}
?>