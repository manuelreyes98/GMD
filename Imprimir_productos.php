<?php

$mysqli= new mysqli('localhost','id13283997_root','shZ2W!klIih{VSaW','id13283997_gmd');

  session_start();
  
if(empty($_SESSION['active']))
{
  header('location:login.php');
}


header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Reporte_productos.xls");  //File name extension was wrong
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
        left: 350;
        float: center;
        display: inline-block;
      }


          
    </style>

  </head>


  <body style="background-color:white; ">
 
      
      <div class="card text-center">
 
      <div class="card-body">
      <center><h2>LISTA PRODUCTOS</h2></center>

      </div>
    </div>

<div class="posicionc">
    <table class="table table-responsive table-bordered table-hover table-striped">
     
      <thead class="thead-dark">
   
         <tr>
          <th> Nombre producto </th>
          <th> Precio unitario</th>
          <th> Cantidad</th>
          <th> Tipo</th>
          
        </tr>

      </thead>
          
        <tbody>

 <?php

        require("bd/conexion.php");

           $query = mysqli_query($conn,"SELECT p.nombre,p.valorund,p.cantidad,c.c_nombre FROM producto p INNER JOIN categoria c on p.idcategoria=c.idcategoria  where p.estado = 1 ");

            $result=mysqli_num_rows($query);


            if($result>0){
              while($result=mysqli_fetch_array($query)){

 ?>

                <tr>
                  <td><?php echo $result['nombre']?></td>
                  <td><?php echo $result['valorund']?></td>
                  <td><?php echo $result['cantidad']?></td>
                  <td><?php echo $result['c_nombre']?></td>
            
                </tr>

              
             
          <?php  
              
        
          } 

            $conn->next_result();

        }


       ?>


  </table>
 
</div>



  </body>
</html>