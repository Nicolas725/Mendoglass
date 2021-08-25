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
        <a href="admin_stock.php" class="btn btn-info btn-md">Volver</a>
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
    <br><br><br>
    <div class="row justify-content-md-center">
        <table class="table">
          <thead class="thead-dark">
          <tr>
            <th>Rubro</th>
            <th>Artículo</th>
            <th>Categoría</th>
            <th>Descripción</th>
            <th>Costo</th>
            <th>Precio</th>
            <th>Modificar</th>
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
      rubro,
      articulo,
      categoria,
      descripcion,
      costo,
      precio

      FROM

      stock
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
          <th><a href="modificar_stock.php" class="btn btn-primary">Seleccionar</a></th>
        </tr>
      </tbody>

        <?php
      }
      ?>
    </table>
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
