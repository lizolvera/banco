<section class="contacto pb-4">
  <div class="container text-justify">
    <div class="row contactos p-3">
      <div class="col-6 text-center">
        <h2>PRESTAMOS</h2>
        <div class="position-relative d-inline-block">
          <img src="img/tarjeta.png" class="card-img-top img">
          <div id="numeroCuenta" class="position-absolute" style="top: 60%; left: 50%; transform: translate(-50%, -50%); font-size: 34px; color: black;">
            <!-- Aquí se mostrará el Prestamo -->
          </div>
        </div>
        <p>Oscar David y Lizbet </p>
      </div>
      <div class="col-6">
        <form action="/Banco/index?clase=controladorreportes&metodo=reporteCuenta" method="post" name="form1" id="form1" enctype="multipart/form-data">
          
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Id Cuenta</label>
            <input type="text" name="txtId" value="<?php echo $aidiCliente; ?>" class="form-control" placeholder="Ingresa el No de Cuenta" maxlength="16" onkeypress="return soloNumeros(event)" oninput="actualizarNumeroCuenta(this.value)">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Ingresa cantidad de Prestamo</label>
            <input type="text" name="txtPrestamo" class="form-control" placeholder="Ingresa la cantidad a solicitar" maxlength="16" onkeypress="return soloNumeros(event)" oninput="actualizarNumeroCuenta(this.value)">
        </div>
          <input type="submit" name="btnVer" value="Ver" class="btn btn-outline-primary">
        </form>
      </div>
    </div>
  </div>
</section>