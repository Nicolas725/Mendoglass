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
      include("./conexion_db.php");

      $sqlSelect = "select distinct rubro,categoria from stock";
      $result=mysqli_query($conexion,$sqlSelect);
      if (! empty($result)) {
    ?>
      <table class='table'>
          <thead class="thead-dark">
              <tr>
                <th scope="col">Rubro</th>
                <th scope="col">Categorias</th>
                <th scope="col">Seleccionar</th>
              </tr>
          </thead>
    <?php
      foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
          ?>
          <tbody>
              <tr>
                  <form action="listado_categorias.php" method="post">
                      <div class="">
                        <td> <?php  echo $row['rubro']; ?></td>
                        <td> <?php  echo $row['categoria']; ?></td>
                      </div>
                      <div class="">
                        <td> <button type="submit" name="category" id="category" class="btn btn-primary" value="<?php  echo $row['categoria']; ?>" >Ver</button> </td>
                      </div>
                  </form>
              </tr>
    <?php
      }
      ?>
          </tbody>
      </table>
    <?php
    }
    ?>
  </div>
  <?php
  }
    else{
      header("location: login.php");
    }
  ?>
</body>
</html>
