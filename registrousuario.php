<?php 
$mysqli= new mysqli('localhost','id13283997_root','shZ2W!klIih{VSaW','id13283997_gmd');
date_default_timezone_set("America/Bogota");
$fecha_registro = date("Y-m-d H:i:s"); 

?>


    
<html>
  <head>
  
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Registro Usuario</title>
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


  <body style="background-color:white; ">
 
          <nav class="navbar navbar-expand-md navbar-dark  sticky-top" style="background-color: #222222;">

          <a href="index.php" class="navbar-brand"><img style="width:150px;height:30px;" src="imagenes/logo6.png"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navar1" aria-controls="navar1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
 
        <div  class="collapse navbar-collapse" id="navar1">
          <ul class="navbar-nav" >
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Productos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item " href="juegos.php">Juegos</a>
                  <a class="dropdown-item " href="accesorios.php">Accesorios</a>
                </div>
              </li>  
        
          </ul>
        </div>

        <div class="posiciond">
          <ul class="nav">

        
            
             <li class="tamano">
              <a href="login.php"><img class="tamano2" src="imagenes/usuario.png"></a>  
            </li>             
            </ul>
          </div>


      </nav>
   



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
 


 
html,body{
background-image: url('imagenes/tothemoon.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 130%;
font-family: 'Numans', sans-serif;
}

    .form-control{
    height: 40px;
    box-shadow: none;
    color: #969fa4;
  }
  .form-control:focus{
    border-color: #5cb85c;
  }
    .form-control, .btn{        
        border-radius: 3px;
    }
  .signup-form{
    width: 400px;
    margin: 0 auto;
    padding: 30px 0;
  }
  .signup-form h2{
    color: #636363;
        margin: 0 0 15px;
    position: relative;
    text-align: center;
    }
  .signup-form h2:before, .signup-form h2:after{
    content: "";
    height: 2px;
    width: 30%;
    background: #d4d4d4;
    position: absolute;
    top: 50%;
    z-index: 2;
  } 
  .signup-form h2:before{
    left: 0;
  }
  .signup-form h2:after{
    right: 0;
  }
    .signup-form .hint-text{
    color: #999;
    margin-bottom: 30px;
    text-align: center;
  }
    .signup-form form{
    color: #999;
    border-radius: 3px;
      margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
  .signup-form .form-group{
    margin-bottom: 20px;
  }
  .signup-form input[type="checkbox"]{
    margin-top: 3px;
  }
  .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;    
    min-width: 140px;
        outline: none !important;
    }
  .signup-form .row div:first-child{
    padding-right: 10px;
  }
  .signup-form .row div:last-child{
    padding-left: 10px;
  }     
    .signup-form a{
    color: #fff;
    text-decoration: underline;
  }
    .signup-form a:hover{
    text-decoration: none;
  }
  .signup-form form a{
    color: #5cb85c;
    text-decoration: none;
  } 
  .signup-form form a:hover{
    text-decoration: underline;
  }  
</style>
</head>
<body>
<div class="signup-form">
   <form method="POST" action="registrovalidacion.php">
      <input type="hidden" name="fecha_registro" value="<?php echo $fecha_registro?>"> 
    <h2>Registro</h2>
    <p class="hint-text">Bienvenido, por favor ingrese todos los datos(Los campos con astericos son obligatorios).</p>
        <div class="form-group">
      <div class="row">
        <div class="col-xs-6"><input type="text" class="form-control" name="nombre" placeholder=" * Primer nombre" required="required"></div>
        <div class="col-xs-6"><input type="text" class="form-control" name="apellido" placeholder="* Apellido" required="required"></div>
      </div>          
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="nick" placeholder="* Nickname" required="required">
        </div>
        <div class="form-group">
          <input type="date" class="form-control" name="fecha" placeholder="* Fecha de nacimiento" required="required">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="correo" placeholder="* Correo Eléctronico" required="required">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="ciudad" placeholder=" Ciudad" >
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="direccion" placeholder=" Direccion" >
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="telefono" placeholder=" Telefono">
        </div>     
    <div class="form-group">
            <input type="password" class="form-control" name="clave" placeholder="* Password" required="required">
    <div>
      <br>
    <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Registrate ahora</button>
        </div>
    </form>
  <div class="text-center">Ya tiene una cuenta? <a href="login.php">Inicia sesión ya</a></div>
</div>
</body>
</html>                            












