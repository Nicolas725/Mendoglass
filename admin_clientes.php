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
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


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
    <div class="container">
      <div class="row align-items-end">
        <div class="col-4">
          <a href="admin_clientes_filtros.php" class="btn btn-info btn-md">Filtrar</a>
          <a href="admin_crear_cliente.php" class="btn btn-info btn-md">Nuevo Regitro</a>
        </div>
        <div class="col-4">
        </div>
        <div class="col-md-auto">
        </div>
      </div>
    </div>
    <br><br>
      <div class="row justify-content-md-center">
          <table class="table">
            <thead class="thead-dark">
            <tr>
              <th>N° Cta Cte</th>
              <th>CUIT/DNI</th>
              <th>Sit. Fiscal</th>
              <th>Cliente</th>
              <th>Ing Brutos</th>
              <th>Direccion</th>
              <th>Correo</th>
              <th>Tel</th>
              <th>Actividad</th>
              <th>Descuentos</th>
              <th>Modificar</th>
              <th>Eliminar</th>
            </tr>
          </thead>

            <?php
            /*if(!isset($_POST['frmSearch'])){
            $opcion = $_POST['frmSearch'];
            echo $opcion;
            echo "estoy aca";
          }*/
          /*if(!isset($_POST['dateFrom'])){
          $new_date = date('Y-m-d', strtotime($_POST['dateFrom']));
          echo $new_date;
        }*/
        $sql="(SELECT
        NRO_CTA_CTE,
        CUIT_DNI,
        SITUACION_FISCAL,
        CLIENTE,
        TASA_ING_BRUTOS,
        DIRECCION,
        CORREO,
        TELEFONOS,
        ACTIVIDAD,
        DESCUENTOS


        FROM

        clientes
        )
        ";
        $result=mysqli_query($conexion,$sql);
        while($ver=mysqli_fetch_row($result)){
          ?>
          <tbody>

          <tr>
            <th><?php echo $ver[0] ?></th>
            <th><?php echo $ver[1] ?></th>
            <th><?php echo $ver[2] ?></th>
            <th><?php echo $ver[3] ?></th>
            <th><?php echo $ver[4] ?></th>
            <th><?php echo $ver[5] ?></th>
            <th><?php echo $ver[6] ?></th>
            <th><?php echo $ver[7] ?></th>
            <th><?php echo $ver[8] ?></th>
            <th><?php echo $ver[9] ?></th>
            <th><a href="modificar_clientes.php" class="btn btn-primary">Seleccionar</a></th>
            <th><a href="eliminar_clientes.php" class="btn btn-primary">Eliminar</a></th>
          </tr>
        </tbody>

          <?php
        }
        ?>
      </table>
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
