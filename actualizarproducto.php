<?php

require("bd/conexion.php");


$idproducto=$_POST["id"];
$nombre = $_POST["nomprod"];
$descripcion = $_POST["descripcionprod"];
$valorp = $_POST["valorp"];
$cantidad = $_POST["cantidad"];
$categoria = $_POST["categoria"];
$genero = $_POST["tipo"];
$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));



$sql = "UPDATE producto SET(idproducto='$idproducto',nombre='$nombre', descripcion='$descripcion', valorund='$valorp',cantidad='$cantidad', imagen='$imagen', idcategoria='$categoria',idtipo='$genero') where idproducto='$idproducto'";

if (mysqli_query($conn, $sql)) {

 }

 else {
  echo "Se ha presentado un error: " . $sql . "<br>" . mysqli_error($conn);
 }


 mysqli_close($conn);
 
header("location:Editar_productos.php");


?>