<?php



session_start();
if(empty($_SESSION['activo']))
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
       .posicionmensaje{
        position: sticky;
        left: 585;
        float: right;
        display: inline-block;

      }

      .posi{

        position: relative;
        left: 130;

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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Tu perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item " href="usuarioeditar.php">Ver tu Perfil </a>
                      <a class="dropdown-item " href="juegos.php">Juegos</a>
                      

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
    <h5 class="card-title">Bienvenido Usuario: <?php echo $_SESSION['nombre']. " ". $_SESSION['apellido']  ?> </h5>

    <p class="card-text">PERFIL</p>
    
  


  </div>

<div class="container posi" >
  <div class="row">
       <div class="col-sm">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header"> Usuarios</div>
<div class="card-body text-primary">
    <h5 class="card-title"><img class="tamano2" src="imagenes/usuario.png"></h5>
    <p class="card-text"><img class="tamano2" src="imagenes/correcto.png">Edita tu perfil  </p>
    <a href="usuarioeditar.php" class="btn btn-primary">Ir a Perfil</a>
  </div>
</div>
</div>
    
    <div class="col-sm">
    <div class="card border-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Historial de Compras</div>
<div class="card-body text-danger">
    <h5 class="card-title"><img class="tamano2" src="imagenes/caja.png"></h5>
    <p class="card-text"><img class="tamano2" src="imagenes/correcto.png">Observa tu historial de Compras    </p>
    <a href="usuariohistorial.php" class="btn btn-primary">Ir a Historial</a>
  </div>
</div>
</div>



     
  </body>

</html>

    

