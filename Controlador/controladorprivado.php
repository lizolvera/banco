<?php
session_start();
class controladorprivado
{
	private $vista;	
	public function inicio()
	{		
		$vista="Vistas/Inicio/frmcontenidoCliente.php";
        include_once("Vistas/frmCliente.php");
	}	

	public function inicio1()
	{		
		$vista="Vistas/Inicio/frmcontenidoAdmin.php";
        include_once("Vistas/frmAdmin.php");
	}

	public function cerrar()
	{				
		session_destroy();
		header('location:index.php');
	}
}