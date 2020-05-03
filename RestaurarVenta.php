<?php

$idventa=$_POST["id"];

require("bd/conexion.php");
 

 
$sql = " UPDATE venta set  estado='1' where idventa='$idventa';";


if (mysqli_query($conn,$sql)) {
      echo "Exito al restaurar";
      ?>
    <script>
        window.location.replace("https://gmd1.000webhostapp.com/VentasEliminadas.php");
    </script>
    
      <?php  

 }
 

else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("location:VentasEliminadas.php");



?>