
<?php
include("./conexion_db.php");

$id=$_POST['id_I'];

$sql="DELETE from clientes where ID_CLIENTE='$id'";
echo $result=mysqli_query($conexion,$sql);
?>
