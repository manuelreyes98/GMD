<?php

$mysqli= new mysqli('localhost','id13283997_root','shZ2W!klIih{VSaW','id13283997_gmd');


session_start();
if(empty($_SESSION['active']))
{
  header('location:login.php');
}
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Reporte_usuarios.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

?>





<html>
  <head>
  
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>GMD tienda de videojuegos</title>
    <style type="text/css">     
      .tamano{
        width: 50px;
        height:26px;
      }

      .tamano2{
        width: 24px;
        height:24px;
      }

      .posiciond{
        position: sticky;
        left: 1200;
        float: right;
        display: inline-block;
      }


          
    </style>

  </head>



</div>

   
<center><h2>LISTA USUARIOS</h2></center>



<table class="table table-responsive table-bordered table-hover table-striped">

<thead class="thead-dark">
         <tr>
          
              <th> Nombre</th>
              <th>  Apellido </th>
              <th>  Nickname </th>
              <th> Fecha de Registro </th>
              <th> Fecha de Nacimiento </th>
              <th> Correo </th>
              <th> Ciudad </th>
              <th> Direccion </th>
              <th> Telefono </th>
              <th> Rol </th>
             
              </tr>
    </thead>
    <tbody>
        


                      <?php

                      
                      require ("conexion.php");
                      $query = mysqli_query($conn,"SELECT u.idusuario,u.nombre,u.apellido,u.nickname,u.correo,u.clave,u.ciudad,u.direccion,u.telefono,u.fecha_registro,u.fecha_naci,r.rol FROM usuario u INNER JOIN rol r ON u.idrol = r.idrol WHERE estatus=1");

                      $resultado=mysqli_num_rows($query);

                      if($resultado>0){
                        while($resultado=mysqli_fetch_array($query)){


                    ?>



        <tr>

    <td><?php echo $resultado['nombre']?></td>
    <td><?php echo $resultado['apellido']?></td>
    <td><?php echo $resultado['nickname']?></td>
    <td><?php echo $resultado['fecha_registro']?></td>
    <td><?php echo $resultado['fecha_naci']?></td>
    <td><?php echo $resultado['correo']?></td>
    <td><?php echo $resultado['ciudad']?></td>
    <td><?php echo $resultado['direccion']?></td>
    <td><?php echo $resultado['telefono']?></td>
    <td><?php echo $resultado['rol']?></td>

       

 
    </tr>

<?php
    }
    }

  ?>

</table>







































