<?php
include("./conexion_db.php");
$id=$_POST['id_cliu'];
$c=$_POST['ctacteu'];
$cd=$_POST['cuitdniu'];
$sf=$_POST['sitfu'];
$nc=$_POST['nomclienteu'];
$ib=$_POST['ingbu'];
$d=$_POST['diru'];
$m=$_POST['mailu'];
$t=$_POST['telu'];
$j=$_POST['jobu'];
$dt=$_POST['descu'];

if ($c && $cd && $sf && $nc && $ib && $d && $m && $t && $j && $dt){
	$sql="UPDATE clientes SET CUIT_DNI='$cd', SITUACION_FISCAL='$sf', CLIENTE='$nc', TASA_ING_BRUTOS=$ib,
  DIRECCION='$d', CORREO='$m', TELEFONOS='$t', ACTIVIDAD='$j', DESCUENTOS=$dt, NRO_CTA_CTE=$c WHERE ID_CLIENTE=$id";
  echo $result=mysqli_query($conexion,$sql);
}
else {
	echo "no hago nada";
}
?>
