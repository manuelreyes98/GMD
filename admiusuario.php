<?php
session_start();
require ("conexion.php");

date_default_timezone_set("America/Bogota");
$fecha_registro = date("Y-m-d H:i:s"); 
//VALIDANDO QUE TODOS LOS CAMPOS VAYAN LLENOS , SI ESTAN LLENOS SUELTA UN ALERT
  if(!empty($_POST))
    { 
    $alert="";
    
      
      

      
      $fecha_registro = $_POST["fecha_registro"];
      $nombre = $_POST["nombre"];
      $apellido = $_POST["apellido"];
      $nick = $_POST["nick"];
      $fecha = $_POST["fecha"];
      $ciudad = $_POST["ciudad"];
      $telefono = $_POST["telefono"];
      $direccion = $_POST["direccion"];
      $correo = $_POST["correo"];
      $clave = md5($_POST["clave"]);
      $rol=$_POST['rol'];

// REALIZAMOS UN SELECT PARA COMPROBAR QUE NI EL NICK NI EL CORREO SE ENCUENTREN REPETIDOS EN LA BASE DE DATOS


      $sql_u="SELECT * FROM usuario WHERE nickname='$nick'";
      $sql_c="SELECT * FROM usuario WHERE correo='$correo'";
      $res_u=mysqli_query($conn,$sql_u) or die (mysqli_error($conn));
      $res_c=mysqli_query($conn,$sql_c) or die (mysqli_error($conn));



  // REALIZAMOS UN SELECT PARA COMPROBAR QUE NI EL NICK NI EL CORREO SE ENCUENTREN REPETIDOS EN LA BASE DE DATOS

      if(mysqli_num_rows($res_u)>0)   {
      echo '<script>alert("Este Usuario esta en uso")</script> ';
      }elseif (mysqli_num_rows($res_c)>0){
        echo '<script>alert("Este correo esta en uso")</script> ';

      } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Formato de Correo invalido")</script> ';
      }


      else{


//INSERT PARA CREAR NUEVO USUARIO


     $sql="INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`,`nickname`, `fecha_registro`,  `fecha_naci`, `correo`, `clave`, `ciudad`, `direccion`, `idrol`, `telefono`, `estatus`) VALUES (NULL, '$nombre', '$apellido', '$nick', '$fecha_registro', '$fecha', '$correo', '$clave','$ciudad','$direccion','$rol','$telefono','1')";
      
      
        if($sql){
           $conn->query($sql) or die ("Error al ingresar datos de usuario: ".mysqli_error($conn));


        echo '<script>alert("Se ha registrado con exito")</script> ';
         echo "<script>location.href='crudusuario.php'</script>";
        }


        exit ();
       }  
       }



?>




<html>
    <title>ACTUALIZAR USUARIO</title>

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


  <body style="background-color:#white; ">
 
        <nav class="navbar navbar-expand-md navbar-dark  sticky-top" style="background-color: #222222;">

          <a href="index.php" class="navbar-brand"><img style="width:150px;height:30px;" src="imagenes/logo6.png"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navar1" aria-controls="navar1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
 
        <div  class="collapse navbar-collapse" id="navar1">
          <ul class="navbar-nav" >
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#FCFCFC; font-size: 20px;"> Administrar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item " href="crudusuario.php">Administrar usuarios</a>
                  <a class="dropdown-item " href="productos.php">Productos</a>
                  <a class="dropdown-item " href="accesorios.php">Ventas</a>


                </div>
             </li>           
          </ul>

 <p style="color:#FCFCFC;padding-left: 400px;font-size: 20px";>Bienvenido Administrador: <?php echo $_SESSION['nombre']. " ". $_SESSION['apellido']  ?></p>
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
 


  body{
    color: #fff;
    background-image: url('imagenes/tothemoon.jpg');
    font-family: 'Roboto', sans-serif;
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
   <form method="POST" action="">
      <input type="hidden" name="fecha_registro" value="<?php echo $fecha_registro?>"> 
       <input type="hidden" name="idusuario" value="<?php echo $iduser;?>">
    <h2>Registro Nuevo Usuario</h2>
    <p class="hint-text">Bienvenido, por favor ingrese todos los datos(Los campos con astericos son obligatorios).</p>
        <div class="form-group">
      <div class="row">
        <div class="col-xs-6"><input type="text" class="form-control" name="nombre" placeholder=" * Primer nombre" required="required"></div>
        <div class="col-xs-6"><input type="text" class="form-control" name="apellido" placeholder="* Apellido" required="required" required></div>
      </div>          
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="nick" placeholder="* Nickname" required="required"  >
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
          <input type="text" class="form-control" name="telefono" placeholder=" Telefono" >
        </div>     
    <div class="form-group">
            <input type="password" class="form-control" name="clave" placeholder="* Password" required="required"required >
    </div>
      <br>
      <label for="rol" >Tipo de Usuario</label>
            <?php
            // HACEMOS EL WHILE QUE NOS DEVOLVERA EL LISTADO DE SELECT ,SELECCIONALMOS EL ROL PRIMERO
            $query_rol=mysqli_query($conn,"SELECT * FROM rol");
            $resultado_rol=mysqli_num_rows($query_rol); 
            ?>


      <select name="rol" id="rol">

            <?php //QUERY QUE DEVUELVA TODO LOS ROLES
            echo $option;//VA A MOSTRAR LA VARIABLE DE ARRIBA
             if ($resultado_rol>0){
            while ($roles=mysqli_fetch_array($query_rol)){
            ?>


      <option value="<?php echo $roles['idrol'];?>" ><?php echo $roles['rol']?></option>     
         

          <?php


            }
            }
    
            ?>

      </select>
      <br><br>      
    <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Registrar ahora</button>

        </div>
    </form>
 <a href="crudusuario.php"><button type="submit" class="btn btn-success btn-lg btn-block">Volver Atras</button>
</div>
</body>
</html>                            








