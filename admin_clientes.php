<?php
session_start();
include("./conexion_db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="bootstrap-4.6.0/css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="bootstrap-4.6.0/font-awesome.min.css">
  <script src="bootstrap-4.6.0/jquery/jquery-3.5.1.min.js"></script>
  <script src="bootstrap-4.6.0/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
	<script src="js/funcionesI.js"></script>
	<script src="bootstrap-4.6.0/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>



  <title>Mendoglass</title>

</head>
<body background="fondos/marfil.jpg">
  <?php
    if($_SESSION['ucontrol']){
  ?>
  <br>
  <div class="container">
    <div class="row align-items-end">
      <div class="col-4">
      </div>
      <div class="col-4">
      </div>
      <div class="col-md-auto">
        <a href="admin_menu.php" class="btn btn-info btn-md">Volver</a>
        <a href="salir.php" class="btn btn-info btn-md">Cerrar Sesion</a>
      </div>
    </div>
  </div>
  <br><br>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col">
      </div>
      <div class="col">
          <?php
            print "<img src=\"logo/logo_mendoglass2.png\">"
          ?>
      </div>
      <div class="col">
      </div>
    </div>
    <br><br>
    <br><br>
    </div>

    <div class="container">
      <div id="clientes_tabla"></div>
    </div>

    <div class="modal fade" id="modalNuevoI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agrega nuevo cliente</h4>
          </div>
          <div class="modal-body">
            <label>N° Cta Cte</label>
            <input type="number" name="" id="ctacte" class="form-control input-sm" placeholder="Ingrese el numero de cta cte" required oninvalid="this.setCustomValidity('Ingrese el numero de cta cte aqui')" oninput="this.setCustomValidity('')">
            <label>CUIT/DNI</label>
            <input type="text" name="" id="cuitdni" class="form-control input-sm" placeholder="Ingrese el CUIT o DNI" required oninvalid="this.setCustomValidity('Ingrese el CUIT o DNI aqui')"  oninput="this.setCustomValidity('')">
            <label>Situacion Fiscal</label>
            <input type="text" name="" id="sitf" class="form-control input-sm" placeholder="Ingrese la situacion fiscal" required oninvalid="this.setCustomValidity('Ingrese la situacion fiscal aqui')"  oninput="this.setCustomValidity('')">
            <label>Cliente</label>
            <input type="text" name="" id="nomcliente" class="form-control input-sm" placeholder="Ingrese el nombre del cliente" required oninvalid="this.setCustomValidity('Ingrese el nombre del cliente aqui')"  oninput="this.setCustomValidity('')">
            <label>Ingresos Brutos</label>
            <input type="number" name="" id="ingb" class="form-control input-sm" placeholder="Ingrese codigo de ingresos brutos" required oninvalid="this.setCustomValidity('Ingrese el codigo de ingresos brutos aqui')"  oninput="this.setCustomValidity('')">
            <label>Direccion</label>
            <input type="text" name="" id="dir" class="form-control input-sm" placeholder="Ingrese la direccion del cliente" required oninvalid="this.setCustomValidity('Ingrese la direccion del cliente aqui')"  oninput="this.setCustomValidity('')">
            <label>Correo</label>
            <input type="text" name="" id="mail" class="form-control input-sm" placeholder="Ingrese el correo" required oninvalid="this.setCustomValidity('Ingrese el correo aqui')"  oninput="this.setCustomValidity('')">
            <label>Telefono</label>
            <input type="text" name="" id="tel" class="form-control input-sm" placeholder="Ingrese el telefono" required oninvalid="this.setCustomValidity('Ingrese el telefono aqui')"  oninput="this.setCustomValidity('')">
            <label>Actividad</label>
            <input type="text" name="" id="job" class="form-control input-sm" placeholder="Ingrese la actividad del cliente" required oninvalid="this.setCustomValidity('Ingrese la actividad del cliente aqui')"  oninput="this.setCustomValidity('')">
            <label>Descuentos</label>
            <input type="number" name="" id="desc" class="form-control input-sm" placeholder="Ingrese el descuento" required oninvalid="this.setCustomValidity('Ingrese el descuento aqui')"  oninput="this.setCustomValidity('')">


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevoI">Agregar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalEdicionI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
          </div>
          <div class="modal-body">

            <input type="number" hidden="" id="id_cliu">

            <label>N° Cta Cte</label>
            <input type="number" name="" id="ctacteu" class="form-control input-sm" placeholder="Ingrese el numero de cta cte" required oninvalid="this.setCustomValidity('Ingrese el numero de cta cte aqui')" oninput="this.setCustomValidity('')">
            <label>CUIT/DNI</label>
            <input type="text" name="" id="cuitdniu" class="form-control input-sm" placeholder="Ingrese el CUIT o DNI" required oninvalid="this.setCustomValidity('Ingrese el CUIT o DNI aqui')"  oninput="this.setCustomValidity('')">
            <label>Situacion Fiscal</label>
            <input type="text" name="" id="sitfu" class="form-control input-sm" placeholder="Ingrese la situacion fiscal" required oninvalid="this.setCustomValidity('Ingrese la situacion fiscal aqui')"  oninput="this.setCustomValidity('')">
            <label>Cliente</label>
            <input type="text" name="" id="nomclienteu" class="form-control input-sm" placeholder="Ingrese el nombre del cliente" required oninvalid="this.setCustomValidity('Ingrese el nombre del cliente aqui')"  oninput="this.setCustomValidity('')">
            <label>Ingresos Brutos</label>
            <input type="number" name="" id="ingbu" class="form-control input-sm" placeholder="Ingrese codigo de ingresos brutos" required oninvalid="this.setCustomValidity('Ingrese el codigo de ingresos brutos aqui')"  oninput="this.setCustomValidity('')">
            <label>Direccion</label>
            <input type="text" name="" id="diru" class="form-control input-sm" placeholder="Ingrese la direccion del cliente" required oninvalid="this.setCustomValidity('Ingrese la direccion del cliente aqui')"  oninput="this.setCustomValidity('')">
            <label>Correo</label>
            <input type="text" name="" id="mailu" class="form-control input-sm" placeholder="Ingrese el correo" required oninvalid="this.setCustomValidity('Ingrese el correo aqui')"  oninput="this.setCustomValidity('')">
            <label>Telefono</label>
            <input type="text" name="" id="telu" class="form-control input-sm" placeholder="Ingrese el telefono" required oninvalid="this.setCustomValidity('Ingrese el telefono aqui')"  oninput="this.setCustomValidity('')">
            <label>Actividad</label>
            <input type="text" name="" id="jobu" class="form-control input-sm" placeholder="Ingrese la actividad del cliente" required oninvalid="this.setCustomValidity('Ingrese la actividad del cliente aqui')"  oninput="this.setCustomValidity('')">
            <label>Descuentos</label>
            <input type="number" name="" id="descu" class="form-control input-sm" placeholder="Ingrese el descuento" required oninvalid="this.setCustomValidity('Ingrese el descuento aqui')"  oninput="this.setCustomValidity('')">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" id="actualizadatosI" data-dismiss="modal">Actualizar</button>
        </div>
      </div>
    </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('#clientes_tabla').load('clientes_tabla.php');
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
    $('#guardarnuevoI').click(function(){
      ctacte=$('#ctacte').val();
      cuitdni=$('#cuitdni').val();
      sitf=$('#sitf').val();
      nomcliente=$('#nomcliente').val();
      ingb=$('#ingb').val();
      dir=$('#dir').val();
      mail=$('#mail').val();
      tel=$('#tel').val();
      job=$('#job').val();
      desc=$('#desc').val();
      agregardatosI(ctacte,cuitdni,sitf,nomcliente,ingb,dir,mail,tel,job,desc);
    });

    $('#actualizadatosI').click(function(){
      actualizaDatosI();
    });
    });
    </script>

  <?php
  }
    else{
      header("location: login.php");
    }
  ?>
</body>
</html>
