<?php

require("bd/conexion.php");

$nombre = $_POST["nomprod"];
$descripcion = $_POST["descripcionprod"];
$valorp = $_POST["valorp"];
$cantidad = $_POST["cantidad"];
$categoria = $_POST["categoria"];
$genero = $_POST["tipo"];
$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


$sql = "INSERT INTO `producto` (`idproducto`, `nombre`, `descripcion`, `valorund`, `cantidad`, `imagen`, `idcategoria`, `idtipo`) VALUES (NULL,'$nombre','$descripcion','$valorp','$cantidad','$imagen','$categoria','$genero');";

if (mysqli_query($conn, $sql)) {

 }

 else {
  echo "Se ha presentado un error: " . $sql . "<br>" . mysqli_error($conn);
 }


 mysqli_close($conn);
 
header("location:productos.php");

//cambie cosas de la imagen
?>