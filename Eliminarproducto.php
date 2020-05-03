<?php

$idproducto=$_POST["id"];

require("bd/conexion.php");
 

 
$sql = " UPDATE producto set  estado='0' where idproducto='$idproducto';";


if (mysqli_query($conn,$sql)) {
      echo "Exito al eliminar";
} 

else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);





?>

 <script>
        window.location.replace("https://gmd1.000webhostapp.com/Editar_productos.php");
    </script>