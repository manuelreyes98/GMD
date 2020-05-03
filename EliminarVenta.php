<?php

$idventa=$_POST["id"];

require("bd/conexion.php");
 

 
$sql = " UPDATE venta set  estado='0' where idventa='$idventa';";


if (mysqli_query($conn,$sql)) {
      echo "Exito al eliminar";
      ?>
    <script>
        window.location.replace("https://gmd1.000webhostapp.com/ventas.php");
    </script>
    
      <?php  

 }


else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);





?>