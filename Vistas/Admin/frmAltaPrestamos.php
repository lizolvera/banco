<section class="contacto pb-4">
  <div class="container text-justify">
    <div class="row contactos p-3">
      <div class="col-6 text-center">
        <h2>ALTA PRESTAMOS</h2>
        <div class="position-relative d-inline-block">
          <img src="img/tarjeta.png" class="card-img-top img">
          <div id="numeroCuenta" class="position-absolute" style="top: 60%; left: 50%; transform: translate(-50%, -50%); font-size: 34px; color: black;">
            <!-- Aquí se mostrará el Prestamo -->
          </div>
        </div>
        <p>Oscar David y Lizbet </p>
      </div>
      <div class="col-6">
        <form action="/prestamos/index?clase=controladoradmin2&metodo=AgregarPrestamo" method="post" name="form1" id="form1" enctype="multipart/form-data">
          
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Ingresa cantidad de Prestamo</label>
            <input type="text" name="txtPrestamo" class="form-control" placeholder="Ingresa la cantidad de prestamo" maxlength="16" onkeypress="return soloNumeros(event)">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Ingresa el id de cliente</label>
            <input type="text" name="txtidc" class="form-control" placeholder="Ingresa la id" maxlength="16" onkeypress="return soloNumeros(event)">
          </div>

          <input type="submit" name="btnAltaP" value="Agregar" class="btn btn-outline-primary">
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  ///funcion para permitir solo numeros
   function soloNumeros(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode < 48 || charCode > 57) {
        event.preventDefault();
        return false;
    }
    return true;
  }
</script>