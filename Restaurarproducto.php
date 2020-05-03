<?php

$idproducto=$_POST["id"];

require("bd/conexion.php");
 

 
$sql = " UPDATE producto set  estado='1' where idproducto='$idproducto';";


if (mysqli_query($conn,$sql)) {
      echo "Exito al restaurar";
} 

else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);





?>
 <script>
        window.location.replace("https://gmd1.000webhostapp.com/productos_eliminados.php");
    </script>