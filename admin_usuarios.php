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


















  <?php
  }
    else{
      header("location: login.php");
    }
  ?>
</body>
</html>
