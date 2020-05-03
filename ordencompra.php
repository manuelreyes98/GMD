<?php
require("bd/conexion.php");
date_default_timezone_set('America/Bogota');
$fecha_actual=date("y-m-d H:i:s");
$id=$_POST["idproducto"];
$nomprod = $_POST["nomprod"];
$precio=$_POST["precio"];
$cantidad=$_POST["cantidad"];
$metodo_pago=$_POST["metodo_pago"];
$totalcantidad=$_POST['totalcantidad'];
$correo = $_POST["correo"];
$nick = $_POST["nick"];
$idusuario=$_POST['idusuario'];
$quitarcantidad=$totalcantidad-$cantidad;
$pagar=$precio*$cantidad;


$query = " UPDATE 	producto SET `cantidad`='$quitarcantidad' where idproducto='$id';

			INSERT INTO `venta` (`idventa`, `idusuario`, `idproducto`, `fecha`, `cantidad`, `pagar`, `estado`, `idmetodo`) VALUES (NULL,'$idusuario','$id','$fecha_actual','$cantidad','$pagar','1','$metodo_pago');

		";

$result=$conn->multi_query($query);

if ($result) {
	require ("correo_compra.php");
	echo "guardado con exito";
	?>
	<script>
    window.location.replace("https://gmd1.000webhostapp.com/juegos.php");
    </script>
    
      <?php  

 }

	
 else {
  echo "Se ha presentado un error: " . $query . "<br>" . mysqli_error($conn);

 }


 mysqli_close($conn);

?>
