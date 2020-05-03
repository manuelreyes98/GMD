<?php
$mysqli= new mysqli('localhost','id13283997_root','shZ2W!klIih{VSaW','id13283997_gmd');
session_start();


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


  <body style="background-color:white; ">
 
        <nav class="navbar navbar-expand-md navbar-dark  sticky-top" style="background-color: #222222;">

          <a href="index.php" class="navbar-brand"><img style="width:150px;height:30px;" src="imagenes/logo6.png"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navar1" aria-controls="navar1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
 
            <div  class="collapse navbar-collapse" id="navar1">
              <ul class="navbar-nav" >
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Tu perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item " href="usuarioeditar.php">Ver tu Perfil </a>
                      <a class="dropdown-item " href="juegos.php">Juegos</a>
                      

                    </div>
                  </li>   
                        
              </ul>

              <div class="posicionmensaje">
        
                <p style="color:white; font-size:20px;">Bienvenido Usuario: <?php echo $_SESSION['nombre']. " ".  $_SESSION['apellido']  ?></p>  

              </div>
            </div>

        <div class="posiciond">
          <ul class="nav">
             <li class="tamano">
              <a href="cerrarsesion.php"><img class="tamano2" src="imagenes/cerrar.png"></a>  
            </li> 
             <li class="tamano">
              <a href="administrador.php"><img class="tamano2" src="imagenes/usuario.png"></a>  
            </li>             
            </ul>
          </div>

      </nav>
      <div class="card text-center">
 
      <div class="card-body">
      <center><h2>Historial de ventas</h2></center>

      </div>
    </div>

<div class="posicionc">
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
//WHERE estatus=1"
    
          $result = $conn->query("SELECT v.cantidad,v.fecha,m.m_nombre,v.idusuario,v.idventa,v.pagar,p.nombre FROM venta v INNER JOIN producto p ON v.idproducto = p.idproducto INNER JOIN metodo_pago m ON v.idmetodo = m.idmetodo WHERE idusuario ='".$_SESSION['IdUser']."'");
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
            
            $result->close();
            $conn->next_result();

          } 

        ?>

  </table>
</div>


  </body>
</html>