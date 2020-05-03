<?php
session_start();
if(empty($_SESSION['activo']))
{
  header('location:login.php');
}
require ("conexion.php");
$idusuario= $_GET['id'];

if (empty($_GET['id'])){
 header('Location: usuario.php');
}


$sql=mysqli_query($conn,"UPDATE  usuario SET estatus = 0 WHERE idusuario=$idusuario");
if($sql){
   
  

 echo '<script>alert("USUARIO ELIMINADO CON EXITO")</script> ';
echo "<script>location.href='cerrarsesion.php'</script>";
}
else{
   $conn->query($sql) or die ("Error al actualizar datos de usuario: ".mysqli_error($conn));



}



