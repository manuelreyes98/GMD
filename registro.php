
<?php
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

// REALIZAMOS UN SELECT PARA COMPROBAR QUE NI EL NICK NI EL CORREO SE ENCUENTREN REPETIDOS EN LA BASE DE DATOS


$sql_u="SELECT * FROM usuario WHERE nickname='$nick'";
$sql_c="SELECT * FROM usuario WHERE correo='$correo'";
$res_u=mysqli_query($conn,$sql_u) or die (mysqli_error($conn));
$res_c=mysqli_query($conn,$sql_c) or die (mysqli_error($conn));



//VERIFICAMOS QUE EL CORREO DIGITADO SEA CORRECTO, OSEA QUE TENGA UN ARROBA

if(mysqli_num_rows($res_u)>0)   {
echo '<script>alert("Este Usuario esta en uso")</script> ';
}elseif (mysqli_num_rows($res_c)>0){
	echo '<script>alert("Este correo esta en uso")</script> ';
	echo "<script>location.href='registro.php'</script>";

} elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
	echo '<script>alert("Formato de Correo invalido")</script> ';
	echo "<script>location.href='registro.php'</script>";
}


else{


$sql="INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`,`nickname`, `fecha_registro`,  `fecha_naci`, `correo`, `clave`, `ciudad`, `direccion`, `idrol`, `telefono`) VALUES (NULL, '$nombre', '$apellido', '$nick', '$fecha_registro', '$fecha', '$correo', '$clave','$ciudad','$direccion','2','$telefono')";
	$result=mysqli_query($conn,$sql) or die (mysqli_error($conn));
	 echo '<script>alert("Se ha registrado con exito")</script> ';
    echo "<script>location.href='login.php'</script>";
	exit ();
	 }



