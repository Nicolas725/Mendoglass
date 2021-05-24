<?php
session_start();
include("conexion_db.php");

$sql="SELECT * FROM usuarios";
$consulta=  $conexion->query($sql);
while ($registro=  mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
  if($_POST['nombre']===$registro['nombre']){
    if($_POST['clave']===$registro['clave']){
      $ucontrol=true;
      $_SESSION['id']=$registro['id'];
      $_SESSION['clave']=$registro['clave'];
      if($registro['estado']==='0'){
        $deshabilitada=true;
      }
    }
  }
}
if($ucontrol){
  if($deshabilitada){
    header("location: index.html");
  }
  else{
    $_SESSION['nombre']="{$_POST['nombre']}";
    $_SESSION['ucontrol']=true;
    header("location: admin_menu.php");
  }}

  else{
    session_destroy();
    header("location: index.html");
  }
  mysqli_close();
?>
