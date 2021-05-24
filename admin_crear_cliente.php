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
        <a href="admin_clientes.php" class="btn btn-info btn-md">Volver</a>
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
  </div>
    <br><br>

    <?php
   if(isset($_POST['save'])){
       $sql = "INSERT INTO clientes (CUIT_DNI, SITUACION_FISCAL, CLIENTE, TASA_ING_BRUTOS, DIRECCION,
         CORREO, TELEFONOS, ACTIVIDAD, DESCUENTOS, LOCALIDAD, PROVINCIA, NUMERO_ZONA, NRO_CUIT_DNI, NRO_CTA_CTE)
       VALUES ('".$_POST["cuit_dni"]."','".$_POST["situacion_fiscal"]."','".$_POST["cliente"]."',
              '".$_POST["tasa_ing_brutos"]."','".$_POST["direccion"]."','".$_POST["email"]."',
              '".$_POST["telefono"]."','".$_POST["actividad"]."','".$_POST["descuentos"]."',
                '".$_POST["localidad"]."','".$_POST["provincia"]."','".$_POST["num_zona"]."',
                '".$_POST["nro_cuit_dni"]."','".$_POST["num_cta_cte"]."')";
                $result=mysqli_query($conexion,$sql);

   }



   ?>

    <form method="post">
    <label id="first">CUIT DNI:</label><br/>
    <input type="text" name="cuit_dni"><br/>

    <label id="first">SITUACION FISCAL</label><br/>
    <input type="text" name="situacion_fiscal"><br/>

    <label id="first">CLIENTE</label><br/>
    <input type="text" name="cliente"><br/>

    <label id="first">TASA ING BRUTOS:</label><br/>
    <input type="number" name="tasa_ing_brutos"><br/>

    <label id="first">DIRECCION</label><br/>
    <input type="text" name="direccion"><br/>

    <label id="first">CORREO</label><br/>
    <input type="text" name="email"><br/>

    <label id="first">TELEFONOS:</label><br/>
    <input type="text" name="telefono"><br/>

    <label id="first">ACTIVIDAD</label><br/>
    <input type="text" name="actividad"><br/>

    <label id="first">DESCUENTOS</label><br/>
    <input type="number" name="descuentos"><br/>

    <label id="first">LOCALIDAD:</label><br/>
    <input type="text" name="localidad"><br/>

    <label id="first">PROVINCIA</label><br/>
    <input type="text" name="provincia"><br/>

    <label id="first">NUMERO ZONA</label><br/>
    <input type="number" name="num_zona"><br/>

    <label id="first"> NRO CUIT DNI:</label><br/>
    <input type="text" name="nro_cuit_dni"><br/>

    <label id="first">NRO CTA CTE</label><br/>
    <input type="number" name="num_cta_cte"><br/>

    <button type="submit" name="save">save</button>
    </form>



    <?php
    }
      else{
        header("location: login.php");
      }
    ?>
  </body>
  </html>
