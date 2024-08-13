<?php
    
   
    if (!isset($_SESSION['id'])) {
    header("Location: index.php"); 

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Estilos/bootstrap.min.css" rel="stylesheet">
    <link href="Estilos/style.css" rel="stylesheet">
      

    <title> Banco </title>
</head>

<body >

<!-- Este es el menú -->
<nav class="cabecera-color navbar navbar-expand-lg navbar-dark p-4">
  <div class="container">
    <a href="#"><img src="img/Logo1.png" alt="logo black fire" class="tamaño"></a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/Banco/index?clase=controladorprivado&metodo=inicio">Inicio</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/Banco/index?clase=controladorcliente&metodo=AgregarMovimientos&op=1">Retiros</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/Banco/index?clase=controladorcliente&metodo=AgregarMovimientos&op=2">Depósitos</a>
        </li>
        <li class="nav-item active">    
          <a class="nav-link" href="/Banco/index?clase=controladorreportes&metodo=reporteCuenta&op=3">Estado de cuenta</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/Banco/index?clase=controladorprivado&metodo=cerrar">Cerrar sesión</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href=""><?php echo 'Bienvenido '.$_SESSION['nombre'] ?></a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>


<!-- Este es el cuerpo -->
    <?php include_once($vista); ?> 



<!-- Este es el pie de la pagina -->
<footer>
    <div class="text-center">
        <p> &copy; Sitio desarrollado por GRH 2019 - <?php date('d-m-Y H:i') ?> </p>
    </div>
</footer>

</body>
</html>