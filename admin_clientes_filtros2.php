<?php
session_start();
include("./conexion_db.php");
$option = isset($_POST['cuenta']) ? $_POST['cuenta'] : false;
$option1 = isset($_POST['fiscal']) ? $_POST['fiscal'] : false;
$option2 = isset($_POST['activ']) ? $_POST['activ'] : false;

if ($option || $option1 || $option2){

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
      <div class="row justify-content-md-center">
        <div class="col-12">
          <table class="table table-hover table-condensed">
            <td></td>
            <td></td>
            <td></td>
            <td>
              <a href="admin_clientes_filtros.php" class="btn btn-info btn-md">Volver</a>
  					</td>
            <td>
              <a href="salir.php" class="btn btn-info btn-md">Cerrar Sesion</a>
  					</td>
          </table>
        </div>
        <br>
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-5">
              <form method="post" action="admin_clientes_filtros3.php">
                <table class="table">
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <?php if ($option) {?>
                        Seleccione la cuenta:
                        <input type="number" name="cuenta" id="cuenta" value="1" min="1" max="999999">
                    </td>
                    <td>
                      <?php } if ($option1) {?>
                        Seleccione la Situación Fiscal:
                        <?php
                        $sql = "SELECT distinct SITUACION_FISCAL FROM clientes";
                        $result = mysqli_query($conexion,$sql);
                        echo "<select name='SITUACION_FISCAL'>";
                        while ($row = mysqli_fetch_array($result)) {
                          echo "<option value='" . $row['SITUACION_FISCAL'] ."'>" . $row['SITUACION_FISCAL'] ."</option>";
                        }
                        echo "</select>";
                      }?>
                    </td>
                    <td>
                      <?php
                      if ($option2) {?>
                        Seleccione la Actividad:
                        <?php
                        $sql = "SELECT distinct ACTIVIDAD FROM clientes";
                        $result = mysqli_query($conexion,$sql);
                        echo "<select name='ACTIVIDAD'>";
                        while ($row = mysqli_fetch_array($result)) {
                          echo "<option value='" . $row['ACTIVIDAD'] ."'>" . $row['ACTIVIDAD'] ."</option>";
                        }
                        echo "</select>";
                        }
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="Filtrar" class="btn btn-primary"></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
              </form>
              <?php
            }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
  </div>
  <?php
  }
    else{
      header("location: login.php");
    }
  ?>
</body>
</html>
