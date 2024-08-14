<section class="contacto pb-4">
  <div class="container text-justify">
    <div class="row contactos p-3">
      <div class="col-6 text-center">
        <h2>PRESTAMOS</h2>
        
        <div class="position-relative d-inline-block">
          <img src="img/tarjeta.png" class="card-img-top img">
          <div id="numeroCuenta" class="position-absolute" style="top: 60%; left: 50%; transform: translate(-50%, -50%); font-size: 34px; color: black;">
            <!-- Aquí se mostrará el número de cuenta -->

          </div>
        </div>
        <p>20221019@uthh.edu.mx</p>
      </div>
      <div class="col-6">
      
        <form action="/prestamos/index?clase=controladorcliente&metodo=AgregarMovimientos" method="post" name="form1" id="form1" enctype="multipart/form-data">
         

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Id Cliente</label>
            <input type="text" name="txtid" value="<?php echo $datoID; ?>" class="form-control" placeholder="ingresa tu id" maxlength="4" onkeypress="return soloNumeros(event)">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Ingresa la cantidad que desea pedir</label>
            <input type="text" name="txtPrestamo" class="form-control" placeholder="Ingresa la cantidad a pedir" maxlength="6" onkeypress="return soloNumeros(event)">
          </div>
          <input type="submit" name="btnPrestar" value="Prestamo" class="btn btn-outline-primary">
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  // Función para actualizar el número de cuenta en la imagen de la tarjeta
  function actualizarNumeroCuenta(valor) {
    document.getElementById('numeroCuenta').textContent = valor;
  }

  // Al cargar la página, actualizar el número de cuenta en la imagen de la tarjeta
  document.addEventListener('DOMContentLoaded', function() {
    var numeroCuenta = "<?php echo $numerodeCuenta; ?>";
    actualizarNumeroCuenta(numeroCuenta);
  });

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
