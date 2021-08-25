<?php
include("./conexion_db.php");
$c=$_POST['ctacte'];
$cd=$_POST['cuitdni'];
$sf=$_POST['sitf'];
$nc=$_POST['nomcliente'];
$ib=$_POST['ingb'];
$d=$_POST['dir'];
$m=$_POST['mail'];
$t=$_POST['tel'];
$j=$_POST['job'];
$dt=$_POST['desc'];

if ($c && $cd && $sf && $nc && $ib && $d && $m && $t && $j && $dt){

  $sql="INSERT INTO clientes (CUIT_DNI, SITUACION_FISCAL, CLIENTE, TASA_ING_BRUTOS,
    DIRECCION, CORREO, TELEFONOS, ACTIVIDAD, DESCUENTOS, LOCALIDAD, PROVINCIA,
    NUMERO_ZONA, NRO_CUIT_DNI, NRO_CTA_CTE) VALUES('$cd', '$sf', '$nc', $ib, '$d', '$m', '$t', '$j', $dt, '', '', 0, '', $c)";
	echo $result=mysqli_query($conexion,$sql);
  }
else {
	echo "no hago nada";
}
?>
