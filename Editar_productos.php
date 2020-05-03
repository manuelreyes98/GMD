<?php
 require("bd/conexion.php");
 session_start();
if(empty($_SESSION['active']))
{
  header('location:login.php');
}
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


  <body style="background-color:#323232; ">
 
        <nav class="navbar navbar-expand-md navbar-dark  sticky-top" style="background-color: #222222;">

          <a href="index.php" class="navbar-brand"><img style="width:150px;height:30px;" src="imagenes/logo6.png"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navar1" aria-controls="navar1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
 
        <div  class="collapse navbar-collapse" id="navar1">
          <ul class="navbar-nav" >
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Administrar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item " href="crudusuario.php">Usuarios</a>
                  <a class="dropdown-item " href="productos.php">Productos</a>
                  <a class="dropdown-item " href="ventas.php">Ventas</a>
                </div>
              </li>            
        
          </ul>
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


<form action="buscar_producto.php" method="get" class="form_search">
  
  <input type="text" name="busqueda"  placeholder="Buscar">
  <input type="submit" value="buscar" class="btn_search">

</form>

    <div class="container">
    <div class="row row-cols-3">
        <?php 
          

          $query= "SELECT * FROM producto where estado='1'";
          $resultado=$conn->query($query);

          while ($row=$resultado->fetch_assoc()) {
            
          ?>

            <div class='col'>

              <div class='card' style='width: 18rem;'>
                <img class="card-img-top" style="width:285px; height:180px; " src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?> "alt="..."/>
                  <div class='card-body' style="background-color: #222222;">
                    <h5 class='card-title' style="color:#FFFFFF;"> <?php echo $row['nombre'];?></h5>
                    <p class='card-text' style="color:#FFFFFF;"> $<?php echo $row['valorund'];?> </p>
                    <p class='card-text' style="color:#FFFFFF;"> <?php echo $row['descripcion'];?> </p>
                    
                    <form method="POST" action="edicion.php">
                    <input type="hidden" name="id" value='<?php echo $row['idproducto'];?>'>
                    <input type="hidden" name="nomprod" value='<?php echo $row['nombre'];?>'>
                    <input type="hidden" name="descripcionprod" value='<?php echo $row['descripcion'];?>'>
                    <input type="hidden" name="valorp" value='<?php echo $row['valorund'];?>'>
                    <input type="hidden" name="cantidad" value='<?php echo $row['cantidad'];?>'>
                    <input type="hidden" name="categoria" value='<?php echo $row['idcategoria'];?>'>
                    <input type="hidden" name="tipo" value='<?php echo $row['idtipo'];?>'>
                    
                    
                    <input class="btn btn-primary" type="submit" value="Editar producto">


                    </form>
                     <form method='POST' action='Eliminarproducto.php'>
                    <input type="hidden" name="id" value='<?php echo $row['idproducto'];?>'>
                    <input class="btn btn-danger" type='submit' value='Eliminar'>
                    </form>

                    
                  </div>


              </div>
            </div>


          <?php         

          }

          ?>

          

    </div>
    <br/>
    <br/>
    <a href="administrador.php"><input type='button' value='atras' class='btn btn-danger'></a>
    <a href="productos_eliminados.php"><input type='button' value='Productos Eliminados' class='btn btn-primary'></a>
    <a href="Imprimir_productos.php"><input type='button' value='Imprimir Productos' class='btn btn-secondary'></a>
    <br/>
    <br/>

     
  </body>

</html>


     
  </body>

</html>

    