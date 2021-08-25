<?php
session_start();
include("./conexion_db.php");

$category = isset($_POST['category']) ? $_POST['category'] : false;
$porcentaje = isset($_POST['porcentaje']) ? $_POST['porcentaje'] : false;
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
        <a href="admin_listar_categorias.php" class="btn btn-info btn-md">Volver</a>
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
    <?php
    echo $porcentaje;
    echo $category;
      $sqlSelect1 = "CALL update_costo_cat($porcentaje,'$category')";
      $result1=mysqli_query($conexion,$sqlSelect1);

      $sqlSelect = "SELECT rubro, articulo, categoria, descripcion, precio FROM stock where categoria ='$category'";
      $result=mysqli_query($conexion,$sqlSelect);
      //if (! empty($result)) {
    ?>
    <h3><?php  echo $category?></h3>

      <table class='table'>
          <thead class="thead-dark">
              <tr>
                  <th scope="col">Rubro</th>
                  <th scope="col">articulo</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Precio</th>

              </tr>
          </thead>
    <?php
      foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
          ?>
          <tbody>
              <tr>
                  <td><?php  echo $row['rubro']; ?></td>
                  <td><?php  echo $row['articulo']; ?></td>
                  <td><?php  echo $row['descripcion']; ?></td>
                  <td><?php  echo $row['precio']; ?></td>
              </tr>
    <?php
      }
      ?>
          </tbody>
      </table>
  </div>
  <?php
  }
    else{
      header("location: login.php");
    }
  ?>
</body>
</html>
