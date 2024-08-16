<?php
    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="Estilos/style.css" rel="stylesheet">
      
    <title>Banco</title>
</head>

<body>

<!-- Este es el menú -->
<nav class="cabecera-color navbar navbar-expand-lg navbar-dark p-4">
    <div class="container">
        <a href="#"><img src="img/bbva-azul.png" alt="logo" class="tamaño"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/prestamos/index?clase=controladorprivado&metodo=inicio1">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/prestamos/index?clase=controladoradmin&metodo=AgregarClientes&op=1">Alta Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/prestamos/index?clase=controladoradmin2&metodo=AgregarPrestamo&op=2">Alta Prestamos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/prestamos/index?clase=controladorreportes&metodo=reporteBonos&op=3">Abonos x Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/prestamos/index?clase=controladorreportes2&metodo=reportePrestamo&op=4">Prestamos x Cliente</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/prestamos/index?clase=controladorprivado&metodo=cerrar">Cerrar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#"><?php echo 'Bienvenido '.$_SESSION['nombre']; ?></a>
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
        <p>&copy; Sitio desarrollado por Oscar y Lizbet 2024 - <?php echo date('d-m-Y H:i'); ?></p>
    </div>
</footer>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var toggleMenu = document.querySelector(".toggle-menu");
        var submenu = document.querySelector(".submenu-1");

        if (toggleMenu) {
            toggleMenu.addEventListener("click", function(event) {
                event.preventDefault(); // Prevenir la acción por defecto del enlace
                submenu.style.display = submenu.style.display === "block" ? "none" : "block";
            });
        }
    });
</script>

</body>
</html>
