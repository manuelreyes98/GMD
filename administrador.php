<?php
$mysqli= new mysqli('localhost','id13283997_root','shZ2W!klIih{VSaW','id13283997_gmd');


session_start();
if(empty($_SESSION['active']))
{
  header('location:login.php');
}

?>



<html>
  <head>
   <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">


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

       p{
   font-family: 'Nunito Sans', sans-serif;


  }
          
    </style>

  </head>






  <body style="background-color:#white; ">
 
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
                  <a class="dropdown-item " href="crudusuario.php">Administrar usuarios</a>
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
              <a href=""><img class="tamano2" src="imagenes/usuario.png"></a>  
            </li>             
            </ul>
          </div>

      </nav>
   
</div>

   

    

 <div class="card text-center">
 

          <a href="index.php" class="navbar-brand"><img style="width:150px;height:30px;" src="imagenes/logo6.png"></a>
 
  <div class="card-body">
    <h5 class="card-title">Bienvenido Administrador: <?php echo $_SESSION['nombre']. " ". $_SESSION['apellido']  ?> </h5>

    <p class="card-text">Podras modificar toda tu tienda a traves de las siguientes opciones:.</p>
    
  


  </div>


<div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header"></a>  Usuarios </div>
  <div class="card-body text-primary">
    <h5 class="card-title"><img class="tamano2" src="imagenes/usuario.png"></h5>
    <p class="card-text"><img class="tamano2" src="imagenes/correcto.png">Podras observar,agregar y editar la base de datos de todos tus usuarios.</p>
    <a href="crudusuario.php" class="btn btn-primary">Ir a usuarios</a>
  </div>
</div>
    </div>
    <div class="col-sm">
    <div class="card border-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Productos</div>
<div class="card-body text-danger">
    <h5 class="card-title"><img class="tamano2" src="imagenes/caja.png"></h5>
    <p class="card-text"><img class="tamano2" src="imagenes/correcto.png">Agrega,modifica o elimina productos.    </p>
    <a href="productos.php" class="btn btn-primary">Ir a productos</a>
  </div>
</div>
    </div>
  
<div class="col-sm">
     <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Ventas</div>
  <div class="card-body text-primary">
    <h5 class="card-title"><img class="tamano2" src="imagenes/ventas.png"></h5>
    <p class="card-text"><img class="tamano2" src="imagenes/correcto.png">Observa las ventas realizadas hasta el momento</p>
    <a href="ventas.php" class="btn btn-primary">Ir a ventas</a>
  </div>
</div>
    </div>
  </div>
</div>


