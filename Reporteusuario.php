<?php
//background-image: url('https://images8.alphacoders.com/921/thumb-1920-921560.jpg');

session_start();
if(empty($_SESSION['active']))
{
  header('location:login.php');
}

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Reporte_Usuario.xls");  //File name extension was wrong
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
         .posicionc{
        position: sticky;
        left: 250;
        float: center;
        display: inline-block;
      }



          
    </style>

  </head>


  <body style="background-color:#white; ">
 

<center><h2>DATOS DE USUARIO</h2></center>


<table class="table table-responsive table-bordered table-hover table-striped">

<thead class="thead-dark">
         <tr>
           <th> Id </th>
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
              <th> Telefono </th>
              </tr>
    </thead>
    <tbody>
        


                      <?php

                      
                      require ("conexion.php");
                      $idusuario= $_GET['id'];
                      $query = mysqli_query($conn,"SELECT u.idusuario,u.nombre,u.apellido,u.nickname,u.correo,u.clave,u.ciudad,u.direccion,u.telefono,u.fecha_registro,u.fecha_naci,r.rol FROM usuario u INNER JOIN rol r ON u.idrol = r.idrol WHERE u.idusuario=$idusuario");

                      $resultado=mysqli_num_rows($query);

                      if($resultado>0){
                        while($resultado=mysqli_fetch_array($query)){


                    ?>



        <tr>
    <td><?php echo $resultado['idusuario']?></td>
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
    <td><?php echo $resultado['telefono']?></td>
    

    </tr>


<?php
    }
    }


  ?>

</table>


<h2 class="posicionc">HISTORIAL VENTAS</h2>


<table class="table table-responsive table-bordered table-hover table-striped">

<thead class="thead-dark">
         <tr>
           
          <th> Id_Producto </th>
          <th> Fecha </th>
          <th> Cantidad</th>
          <th> Pago Total</th>
          <th> Metodo pago</th>

          </tr>
    </thead>
    <tbody>
        


                      <?php

                      
                      require("bd/conexion.php");
                      $idusuario= $_GET['id'];
                       $result = $conn->query("SELECT v.cantidad,v.fecha,m.m_nombre,v.idusuario,v.idventa,v.pagar,p.nombre FROM venta v INNER JOIN producto p ON v.idproducto = p.idproducto INNER JOIN metodo_pago m ON v.idmetodo = m.idmetodo WHERE idusuario =$idusuario");
                      if($result){
                        while ($row = $result->fetch_object()){


                
                    echo "
                            <tr>
                             
                              <td>$row->nombre</td>
                              <td>$row->fecha</td>
                              <td>$row->cantidad</td>
                              <td>$$row->pagar</td>
                              <td>$row->m_nombre</td>
                             

                            <tr>
                          ";


                         

                  }
                }
                  ?>

</table>

</body>













































