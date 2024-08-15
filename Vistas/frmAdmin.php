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

    <style>
      /* Estilo básico del menú */
.submenu-1 {
    display: none; /* Ocultar el submenú por defecto */
    list-style-type: none;
    padding-left: 0;
    margin: 0;
    background-color: #444;
}

.submenu-1 li {
    padding: 10px;
}

.submenu-1 li a {
    color: white;
    text-decoration: none;
    display: block;
}

.submenu-1 li a:hover {
    background-color: #575757;
}

/* Estilo del menú hamburguesa */
.toggle-menu {
    cursor: pointer;
    color: white;
    text-decoration: none;
    padding: 10px;
    display: block;
    background-color: #333;
}

.toggle-menu:hover {
    background-color: #575757;
}

    </style>
</head>

<body >

<!-- Este es el menú -->
<nav class="cabecera-color navbar navbar-expand-lg navbar-dark p-4">
  <div class="container">
    <a href="#"><img src="img/bbva-azul.png" alt="logo black fire" class="tamaño"></a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/prestamos/index?clase=controladorprivado&metodo=inicio1">Inicio</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/prestamos/index?clase=controladoradmin&metodo=AgregarClientes&op=1">Alta Clientes</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/prestamos/index?clase=controladoradmin2&metodo=AgregarPrestamo&op=2">Alta Prestamos</a>
        </li>
 
        <li><a href="#" class="toggle-menu">Reportes</a>
    <ul class="submenu-1">
        <li><a href="/prestamos/index?clase=controladorreportes&metodo=reporteAbonos&op=3">Ver abonos del cliente</a></li>
        <li><a href="/prestamos/index?clase=controladorreportes&metodo=reportePrestamos&op=4">Ver prestamos del cliente</a></li>
    </ul>
</li>


      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/prestamos/index?clase=controladorprivado&metodo=cerrar">Cerrar sesión</a>
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
        <p> &copy; Sitio desarrollado por Oscar y Lizbet 2024 - <?php date('d-m-Y H:i') ?> </p>
    </div>
</footer>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var toggleMenu = document.querySelector(".toggle-menu");
    var submenu = document.querySelector(".submenu-1");

    toggleMenu.addEventListener("click", function(event) {
        event.preventDefault(); // Prevenir la acción por defecto del enlace
        submenu.style.display = submenu.style.display === "block" ? "none" : "block";
    });
});

</script>

</body>
</html>