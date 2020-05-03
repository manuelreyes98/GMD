<?php
session_start();
if(empty($_SESSION['active']))
{
  header('location:login.php');
}

require ("bd/conexion.php");
$idusuario= $_GET['id'];

if (empty($_GET['id'])){
    ?>
 	 <script>
    window.location.replace("https://gmd1.000webhostapp.com/crudusuario.php");
    </script>
    
      <?php  

 }


$sql=mysqli_query($conn,"UPDATE  usuario SET estatus = 0 WHERE idusuario=$idusuario");
if($sql){
   
  

echo '<script>alert("USUARIO ELIMINADO CON EXITO")</script> ';
echo "<script>location.href='crudusuario.php'</script>";
}

else{
   $conn->query($sql) or die ("Error al actualizar datos de usuario: ".mysqli_error($conn));
}




