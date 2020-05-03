<?php

  $mysqli = new mysqli('localhost', 'root', '', 'gmd');

  session_start();
  
if(empty($_SESSION['active']))
{
  header('location:login.php');
}

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Reporte_ventas.xls");  //File name extension was wrong
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
        left: 260;
        float: center;
        display: inline-block;
      }


          
    </style>

  </head>


  <body style="background-color:white; ">
 
      
      <div class="card text-center">
 
      <div class="card-body">
      <center><h2>LISTA VENTAS</h2></center>

      </div>
    </div>

<div class="posicionc">
    <table class="table table-responsive table-bordered table-hover table-striped">
     
      <thead class="thead-dark">
   
         <tr>
          <th> Usuario </th>
           <th> Nombre producto </th>
          <th> Fecha </th>
          <th> Cantidad</th>
          <th> Pago Total</th>
          <th> Metodo pago</th>
          
        </tr>

      </thead>
          
        <tbody>

 <?php

        require("bd/conexion.php");
//WHERE estatus=1"
    
          $result = $conn->query("SELECT v.cantidad,v.fecha,m.m_nombre,v.idusuario,v.idventa,v.pagar,p.nombre,u.nickname FROM venta v INNER JOIN producto p  ON v.idproducto = p.idproducto INNER JOIN metodo_pago m ON v.idmetodo = m.idmetodo INNER JOIN usuario u ON v.idusuario = u.idusuario where v.estado like '%1%'");
          if($result){
            while ($row = $result->fetch_object()){

              echo "
                <tr>
                  <td>$row->nickname</td>
                  <td>$row->nombre</td>
                  <td>$row->fecha</td>
                  <td>$row->cantidad</td>
                  <td>$$row->pagar</td>
                  <td>$row->m_nombre</td>
                 

                </tr>
              ";
             
            }
            
            $result->close();
            $conn->next_result();

          } 

        ?>

  </table>
 
</div>





  </body>
</html>