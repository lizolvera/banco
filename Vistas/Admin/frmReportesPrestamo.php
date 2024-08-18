<section class="contacto pb-4">
  <div class="container text-justify">
    <div class="row contactos p-3">
      <div class="col-6 text-center">
        <h2>DEPOSITOS</h2>
        <div class="position-relative d-inline-block">
          <img src="img/lolololol.png" class="card-img-top img">
          <div id="numeroCuenta" class="position-absolute" style="top: 60%; left: 50%; transform: translate(-50%, -50%); font-size: 34px; color: black;">
            <!-- Aquí se mostrará el número de cuenta -->
          </div>
        </div>
        <p>20221019@uthh.edu.mx</p>
      </div>
      <div class="col-6">
        <form action="/prestamos/index?clase=controladorreportes2&metodo=reportePrestamo" method="post" name="form1" id="form1" enctype="multipart/form-data">

          <input type="submit" name="btnGenerar" value="Generar Reportes" class="btn btn-outline-primary">
        </form>
      </div>
    </div>
  </div>
</section>
 
<script>
  // Función para permitir solo números en el campo de texto
  function soloNumeros(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode < 48 || charCode > 57) {
        event.preventDefault();
        return false;
    }
    return true;
  }
</script>