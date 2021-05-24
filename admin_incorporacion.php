<?php
session_start();

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
include("./conexion_db.php");
require_once ('./vendor/autoload.php');



if (isset($_POST["stock"])) {

  $query3 = "select * from stock";
  $result3 = mysqli_query($conexion, $query3);



    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'excel/' . $_FILES['file']['name'];

        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 0; $i <= $sheetCount; $i ++) {
            $rubro = "";  //rubro
            $categoria = "";
            if (isset($spreadSheetAry[$i][0])) {
                $rubro = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][0]);
                if ($rubro == 1) {
                  $categoria = "FLOAT INC";
                }
                else if ($rubro == 2) {
                  $categoria = "FLOAT BR";
                }
                else if ($rubro == 3) {
                  $categoria = "FLOAT GR";
                }
                else if ($rubro == 4) {
                  $categoria = "FLOAT VERDE";
                }
                else if ($rubro == 5) {
                  $categoria = "ESPEJO INCOLORO";
                }
                else if ($rubro == 6) {
                  $categoria = "ESPEJO BR";
                }
                else if ($rubro == 7) {
                  $categoria = "ESPEJO GR";
                }
                else if ($rubro == 8) {
                  $categoria = "LAMINADOS INCOLOROS";
                }
                else if ($rubro == 9) {
                  $categoria = "LAMINADOS BR";
                }
                else if ($rubro == 10) {
                  $categoria = "LAMINADOS GR";
                }
                else if ($rubro == 11) {
                  $categoria = "LAMINADOS VERDE";
                }
                else if ($rubro == 12) {
                  $categoria = "LAMINADOS LAMINA ESMERILADA";
                }
                else if ($rubro == 13) {
                  $categoria = "LAMINADOS ESPEJADOS";
                }
                else if ($rubro == 15) {
                  $categoria = "MG LAMINADOS";
                }
                else if ($rubro == 16) {
                  $categoria = "CRISTALES ESPECIALES";
                }
                else if ($rubro == 17) {
                  $categoria = "FANTASIAS NACIONALES";
                }
                else if ($rubro == 18) {
                  $categoria = "PRECIOS ESPECIALES";
                }
                else if ($rubro == 19) {
                  $categoria = "OPACID INCOLORO";
                }
                else if ($rubro == 20) {
                  $categoria = "CRISTALES DECORATIVOS";
                }
                else if ($rubro == 21) {
                  $categoria = "PROFILIT";
                }
                else if ($rubro == 22) {
                  $categoria = "MATERIAL PARA DOBLE VIDRIADO";
                }
                else if ($rubro == 23) {
                  $categoria = "SILICONAS";
                }
                else if ($rubro == 24) {
                  $categoria = "FAZON POLIVINIL";
                }
                else if ($rubro == 25) {
                  $categoria = "CALZOS PLASTICOS";
                }
                else if ($rubro == 26) {
                  $categoria = "TRABAJOS DE TALLER";
                }
                else if ($rubro == 27) {
                  $categoria = "KIT MAMPARAS ALUMINIO";
                }
                else if ($rubro == 101) {
                  $categoria = "FRENOS";
                }
                else if ($rubro == 102) {
                  $categoria = "MANIJONES";
                }
                else if ($rubro == 103) {
                  $categoria = "HERRAJES D-E-F-P";
                }
                else if ($rubro == 104) {
                  $categoria = "PUERTAS ESTANDAR COMPLETOS";
                }
                else if ($rubro == 105) {
                  $categoria = "PAÑOS ESTANDAR";
                }
                else if ($rubro == 106) {
                  $categoria = "KIT DE HERRAJES TRADICIONAL COMPLETO";
                }
                else if ($rubro == 108) {
                  $categoria = "KIT DE HERRAJES PARA PUERTAS CON ZOCALON";
                }
                else if ($rubro == 109) {
                  $categoria = "AI-CONJUNTOS DUCHAS";
                }
                else if ($rubro == 110) {
                  $categoria = "PRODUCTOS STANDARD";
                }
                else if ($rubro == 111) {
                  $categoria = "PERFILES U";
                }
                else if ($rubro == 112) {
                  $categoria = "ACCESORIOS CARPINTERIA ESTANDAR";
                }
                else {
                  $categoria = "SIN CATEGORIA";
                }

            }

            $articulo = ""; //articulo
            if (isset($spreadSheetAry[$i][1])) {
              $articulo = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][1]);
              }
              else {
                $articulo = mysqli_real_escape_string($conexion, "SIN ARTICULO");

              }
                //$articulo = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][1]);

                /*if (is_null($articulo) || $articulo == "art") {
                  $articulo = "SIN ARTICULO";
                }*/



            //$categoria = ""; //categoria
            /*if (isset($spreadSheetAry[$i][2])) {
                $categoria= mysqli_real_escape_string($conexion, $spreadSheetAry[$i][2]);
            }*/

            $descripcion = ""; //descripcion
            if (isset($spreadSheetAry[$i][2])) {
                $descripcion = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][2]);
            }

            $costo = ""; //costo
            /*if (isset($spreadSheetAry[$i][4])) {
                $costo = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][4]);
            }*/

            $precio = ""; //precio
            if (isset($spreadSheetAry[$i][3])) {
                $precio = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][3]);
            }


            if (! empty($rubro) || ! empty($articulo) || ! empty($categoria) || ! empty($descripcion) || ! empty($costo) || ! empty($precio)  ) {
                //$query = "insert into stock (rubro,articulo,categoria,descripcion,precio,costo) values(?,?,NULL,?,?,NULL)";
                //$paramType = "ss";
                $paramArray = array(
                    $rubro,
                    $articulo,
                    $categoria,
                    $descripcion,
                    $costo,
                    $precio
                );
                // $insertId = $db->insert($query, $paramType, $paramArray);
                 $query = "insert into stock  (rubro,articulo,categoria,descripcion,costo,precio) values('" . $rubro . "','" . $articulo . "','" . $categoria . "','" . $descripcion . "',NULL, '" . $precio . "')";
                 $result = mysqli_query($conexion, $query);
                 $query1 = "delete from stock where articulo = 'SIN ARTICULO' or categoria = 'SIN CATEGORIA'";
                 $result1 = mysqli_query($conexion, $query1);

                if (! empty($result)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}


if (isset($_POST["cliente"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'excel/' . $_FILES['file']['name'];

        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i <= $sheetCount; $i ++) {
            $num_cta_cte = "";  //rubro
            if (isset($spreadSheetAry[$i][0])) {
                $num_cta_cte = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][0]);
                }

            $nro_cuit_dni = ""; //articulo
            if (isset($spreadSheetAry[$i][1])) {
              $nro_cuit_dni = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][1]);
              }
              /*else {
                $articulo = mysqli_real_escape_string($conexion, "SIN ARTICULO");
              }*/
            $cliente = ""; //descripcion
            if (isset($spreadSheetAry[$i][2])) {
                $cliente = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][2]);
            }

            $situacion_fiscal = ""; //precio
            if (isset($spreadSheetAry[$i][3])) {
                $situacion_fiscal = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][3]);
            }

            $tasa_ing_brutos = ""; //precio
            if (isset($spreadSheetAry[$i][4])) {
                $tasa_ing_brutos = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][4]);
            }

            $direccion = ""; //precio
            if (isset($spreadSheetAry[$i][5])) {
                $direccion = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][5]);
            }

            $correo = ""; //precio
            if (isset($spreadSheetAry[$i][6])) {
                $correo = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][6]);
            }
            else {
              $correo = mysqli_real_escape_string($conexion, "SIN CORREO");
            }

            $tel = ""; //precio
            if (isset($spreadSheetAry[$i][7])) {
                $tel = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][7]);
            }
            else {
              $tel = mysqli_real_escape_string($conexion, "SIN TEL");
            }

            $actividad = ""; //precio
            if (isset($spreadSheetAry[$i][8])) {
                $actividad = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][8]);
            }

            $descuentos = ""; //precio
            if (isset($spreadSheetAry[$i][9])) {
                $descuentos = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][9]);
            }
            else {
              $descuentos = mysqli_real_escape_string($conexion, 0);
            }

            $localidad = ""; //precio
            if (isset($spreadSheetAry[$i][10])) {
                $localidad = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][10]);
            }

            $provincia = ""; //precio
            if (isset($spreadSheetAry[$i][11])) {
                $provincia = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][11]);
            }

            $num_zona = ""; //precio
            if (isset($spreadSheetAry[$i][12])) {
                $num_zona = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][12]);
            }

            $dni_cuit = ""; //precio
            if (isset($spreadSheetAry[$i][13])) {
                $dni_cuit = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][13]);
            }


            if (! empty($num_cta_cte) || ! empty($nro_cuit_dni) || ! empty($cliente) || ! empty($situacion_fiscal) || ! empty($tasa_ing_brutos) || ! empty($direccion) || ! empty($correo) || ! empty($tel)
            || ! empty($actividad) || ! empty($descuentos) || ! empty($localidad) || ! empty($provincia) || ! empty($num_zona) || ! empty($dni_cuit)  ) {
                /*$query = "insert into stock (rubro,articulo,categoria,descripcion,precio,costo) values(?,?,NULL,?,?,NULL)";
                $paramType = "ss";
                $paramArray = array(
                    $rubro,
                    $articulo,
                    $categoria,
                    $descripcion,
                    $costo,
                    $precio
                );
                 $insertId = $db->insert($query, $paramType, $paramArray);*/
                 $query = "insert into clientes  (NRO_CTA_CTE, CUIT_DNI, CLIENTE, SITUACION_FISCAL,	TASA_ING_BRUTOS,	DIRECCION,	CORREO,	TELEFONOS,	ACTIVIDAD,	DESCUENTOS,	LOCALIDAD,	PROVINCIA,	NUMERO_ZONA,	NRO_CUIT_DNI) values
                 ('" . $num_cta_cte . "','" . $nro_cuit_dni . "','" . $cliente . "','" . $situacion_fiscal . "', '" . $tasa_ing_brutos . "', '" . $direccion . "', '" . $correo . "','" . $tel . "',
                 '" . $actividad . "','" . $descuentos . "','" . $localidad . "', '" . $provincia . "','" . $num_zona . "','" . $dni_cuit . "')";
                 $result = mysqli_query($conexion, $query);
                 //$query1 = "delete from stock where articulo = 'SIN ARTICULO' or categoria = 'SIN CATEGORIA'";
                 //$result1 = mysqli_query($conexion, $query1);

                if (! empty($result)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}


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
    <div class="row row-cols-2">
       <div class="col">
         <?php
         print "<img src=\"iconos/officedatabase_103574.ico\">"
         ?>
         <form action="" method="post" name="frmExcelImport"
             id="frmExcelImport" enctype="multipart/form-data">
             <div>
                 <input type="file" name="file" id="file" accept=".xls,.xlsx">
                 <br><br>
                 <button type="submit" id="submit" name="stock"
                     class="btn btn-primary">Incorporar Stock</button>

             </div>

         </form>

       </div>
       <div class="col">
         <?php
         print "<img src=\"iconos/database-icon_34457.ico\">"
         ?>
         <form action="" method="post" name="frmExcelImport"
             id="frmExcelImport" enctype="multipart/form-data">
             <div>
                 <input type="file" name="file" id="file" accept=".xls,.xlsx">
                 <br><br>
                 <button type="submit" id="submit" name="cliente"
                     class="btn btn-primary">Incorporar Clientes</button>
             </div>
         </form>
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
