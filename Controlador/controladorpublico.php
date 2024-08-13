<?php
include_once 'Modelo/clslogin.php';

class controladorpublico
{
	private $vista;
	
	public function inicio()
	{		
		$vista="Vistas/Inicio/frmcontenidopublico.php";
        include_once("Vistas/frmpublica.php");
	}	
	
	public function login()
{
    $acceso = new clslogin();

    if(!empty($_POST))
    {
        $NOM = $_POST['txtNombre'];
        $datos = $acceso->ConsultaCliente($NOM);

        if($datos) {
            session_start();
            $_SESSION['id'] = $datos['idcliente'];
            $_SESSION['nombre'] = $datos['nombre_completo'];
            $_SESSION['rol'] = $datos['rol'];

            if ($datos['rol'] == 'admin') {  // Suponiendo que 'admin' es el rol del administrador
                $vista = "Vistas/Inicio/frmcontenidoAdmin.php";
                include_once("Vistas/frmAdmin.php");
            } else {
                $vista = "Vistas/Inicio/frmcontenidoCliente.php";
                include_once("Vistas/frmCliente.php");
            }
        } else {
            header("Location: index.php");  // Usuario no encontrado
        }
    }
    else
    {
        $vista = "Vistas/Usuario/login.php";
        include_once("Vistas/frmpublica.php");
    }
}

}
	