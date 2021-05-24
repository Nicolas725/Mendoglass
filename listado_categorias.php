<?php
session_start();
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
      include("./conexion_db.php");

      $category = isset($_POST['category']) ? $_POST['category'] : false;

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
