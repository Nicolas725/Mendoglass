<?php
session_start();
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
      <div class="col-5">
      </div>
      <div class="col-5">
      </div>
      <div class="col-md-auto">
        <a href="salir.php" class="btn btn-info btn-md">Cerrar Sesion</a>
      </div>
    </div>
  </div>
  <br><br><br>
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
    <br><br><br><br><br>
     <div class="row row-cols-3">
        <div class="col">
          <?php
          print "<img src=\"iconos/file-excel-icon_34441.ico\">"
          ?>
          <a href="admin_stock.php" class="btn btn-primary">Listado-Stock</a>
        </div>
        <div class="col">
          <?php
          print "<img src=\"iconos/address-book.ico\">"
          ?>
          <a href="admin_clientes.php" class="btn btn-primary">Clientes</a>
        </div>
        <div class="col">
          <?php
          print "<img src=\"iconos/file-powerpoint-icon_34431.ico\">"
          ?>
          <a href="admin_presupuestos.php" class="btn btn-primary">Presupuestos</a>
        </div>
    </div>
    <br><br><br><br><br>
     <div class="row row-cols-3">
        <div class="col">
          <?php
          print "<img src=\"iconos/officedatabase_103574.ico\">"
          ?>
          <a href="admin_incorporacion.php" class="btn btn-primary">Incorporación</a>
        </div>
        <div class="col">
          <?php
          print "<img src=\"iconos/actualizar.ico\">"
          ?>
          <a href="admin_trabajos.php" class="btn btn-primary">Trabajos</a>
        </div>
        <div class="col">
          <?php
          print "<img src=\"iconos/user-id-icon_34334.ico\">"
          ?>
          <a href="admin_usuarios.php" class="btn btn-primary">Listado Usuarios</a>
        </div>
    </div>
  </div>
  <?php
  }
    else{
      header("location: login.php");
    }
  ?>
</body>
</html>
