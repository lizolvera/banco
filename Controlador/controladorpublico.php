<?php
include_once 'Modelo/clslogin.php';
include_once 'Modelo/clsAnuncios.php';

class controladorpublico
{
	private $vista;
	
	public function inicio()
	{		
		$vista="Vistas/Inicio/frmcontenidopublico.php";
        include_once("Vistas/frmpublica.php");
	}	
	public function Anuncios()
	{	
		$info=new clsAnuncios();
		$todoslosproductos = $info->mostrarAnuncios();
				
		$vista="Vistas/Publica/frmAnuncios.php";
        include_once("Vistas/frmpublica.php");
	}	
	public function login()
	{
		
		$acceso=new clslogin();

		if(!empty($_POST))
		{
			
            $NIP=$_POST['txtNIP'];
        	
		    $result = $acceso->ConsultaUsuario($NIP);
		   	$datos=$acceso->ConsultaCliente($NIP);
		
		    if($result==true)
		    {
		      	session_start();
		        $_SESSION['id']=$datos['idcliente'];
		        $_SESSION['nombre']=$datos['vchnombre'];
		       	$vista="Vistas/Inicio/frmcontenidoCliente.php";
        		include_once("Vistas/frmCliente.php");
        		

		    }
		    else
		    {
		    	
		       	header("Location: index.php");  
		    }
		}
		else
		{
			
			$vista="Vistas/Usuario/login.php";
        	include_once("Vistas/frmpublica.php");
		}

		
	}
}
	