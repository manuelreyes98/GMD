<?php
session_start();
if(empty($_SESSION['active']))
{
	header('location:login.php');
}


require ("conexion.php");


$fecha_registro = $_POST["fecha_registro"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$nick = $_POST["nick"];
$fecha = $_POST["fecha"];
$ciudad = $_POST["ciudad"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$correo = $_POST["correo"];
$clave = md5($_POST["clave"]);
$rol = $_POST["rol"];
$iduser=$_POST['idusuario'];



// REALIZAMOS UN SELECT PARA COMPROBAR QUE NI EL NICK NI EL CORREO SE ENCUENTREN REPETIDOS EN LA BASE DE DATOS

$sql_u="SELECT * FROM usuario WHERE nickname='$nick'";
$sql_c="SELECT * FROM usuario WHERE correo='$correo'";
$res_u=mysqli_query($conn,$sql_u) or die (mysqli_error($conn));
$res_c=mysqli_query($conn,$sql_c) or die (mysqli_error($conn));

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
 	echo '<script>alert("Formato de correo invalido")</script> ';

}




if(mysqli_num_rows($res_u)>0)   {
echo '<script>alert("Este Usuario esta en uso")</script> ';
 echo "<script>location.href='admieliminar.php'</script>";
}elseif (mysqli_num_rows($res_c)>0){
	echo '<script>alert("Este correo esta en uso")</script> ';
	 echo "<script>location.href='admieliminar.php'</script>";

//VERIFICAMOS QUE EL CORREO DIGITADO SEA CORRECTO, OSEA QUE TENGA UN ARROBA

} elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
	echo '<script>alert("Este correo esta en uso")</script> ';
	 echo "<script>location.href='admieliminar.php'</script>";
}


else{


    //`usuario` (`idusuario`, `nombre`, `apellido`,`nickname`, `hoy`,  `fecha_naci`, `correo`, `clave`, `ciudad`, `direccion`, `idrol`, `telefono`)
$sentecia="UPDATE usuario SET nombre='".$nombre."', apellido='".$apellido."', nickname='".$nick."', fecha_registro='".$fecha_registro."', fecha_naci='".$fecha."', correo='".$correo."', clave='".$clave."', ciudad='".$ciudad."', direccion='".$direccion."' , idrol='".$rol."'WHERE idusuario='".$iduser."' ";

    $conn->query($sentecia) or die ("Error al actualizar datos de usuario: ".mysqli_error($conn));

  

 echo '<script>alert("USUARIO ACTUALIZADO CON EXITO")</script> ';
echo "<script>location.href='crudusuario.php'</script>";
}



