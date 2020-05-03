<?php
require("bd/conexion.php");

$id = $_POST["ide"];
$nombre = $_POST["nomprod"];
$descripcion = $_POST["descripcionprod"];
$cantidad = $_POST["cantidad"];
$valorp = $_POST["valorp"];
$categoria = $_POST["categoriae"];
$genero = $_POST["tipoe"];
@$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

if ($imagen!=null){
	

$sql = "UPDATE producto SET nombre='$nombre', descripcion='$descripcion', valorund='$valorp', cantidad='$cantidad', imagen='$imagen',idcategoria='$categoria', idtipo='$genero' WHERE idproducto='$id'";
}

else{
	
$sql = "UPDATE producto SET nombre='$nombre', descripcion='$descripcion', valorund='$valorp', cantidad='$cantidad',idcategoria='$categoria', idtipo='$genero' WHERE idproducto='$id'";
}





if (mysqli_query($conn, $sql)) {

 }

 else {
  echo "Se ha presentado un error: " . $sql . "<br>" . mysqli_error($conn);
 }


 mysqli_close($conn);
 ?>
   <script>
        window.location.replace("https://gmd1.000webhostapp.com/Editar_productos.php");
    </script>
    
      <?php  



?>