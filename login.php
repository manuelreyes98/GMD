<?php
$mysqli= new mysqli('localhost','id13283997_root','shZ2W!klIih{VSaW','id13283997_gmd');
$alert="";
session_start();
if(!empty($_SESSION['active']))
{
  header('location:administrador.php');
}
elseif(!empty($_SESSION['activo']))
{
  header('location:usuario.php');
}

else{ 

if(!empty($_POST))//Si Existe
{
  if(empty($_POST['nick']) || empty($_POST['clave']))
  {
    $alert= '* Ingrese su usuario y su clave';  
    } else{

      require ("conexion.php");
      //LA FUNCION EVITA INYECION DE SQL,QUITA CARACTERES RAROS Y LA MD5 LOS ENCRIPTA
      $nick = $_POST["nick"];
      $clave =md5($_POST["clave"]);
//md5( mysqli_real_escape_string($conn,



    $query = mysqli_query($conn,"SELECT * FROM usuario WHERE nickname = '".$nick."' and clave = '".$clave."' and idrol=1 and estatus = 1");
    $resultado = mysqli_num_rows($query);
    if($resultado>0){
      $fila=mysqli_fetch_array($query);
      
      $_SESSION['active']=true;
      $_SESSION['IdUser']=$fila['idusuario'];
      $_SESSION['correo']=$fila['correo'];
      $_SESSION['nick']=$fila['nickname'];
      $_SESSION['nombre']=$fila['nombre'];
      $_SESSION['apellido']=$fila['apellido'];
      $_SESSION['idrol']=$fila['idrol'];
      $_SESSION['fecha_registro']=$fila['fecha_registro'];

      echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
      echo "<script>location.href='administrador.php'</script>";

    
    }
        else{
      $alert= '* Ha digitado un usuario y/o contraseña incorrecta';
      }
    //estatus = 1")


    $query = mysqli_query($conn,"SELECT * FROM usuario WHERE nickname = '".$nick."' and clave = '".$clave."' and idrol=2 and estatus = 1");
    $resultado = mysqli_num_rows($query);
    if($resultado>0){
      $fila=mysqli_fetch_array($query);
      
      $_SESSION['activo']=true;
      $_SESSION['IdUser']=$fila['idusuario'];
      $_SESSION['correo']=$fila['correo'];
      $_SESSION['nick']=$fila['nickname'];
      $_SESSION['nombre']=$fila['nombre'];
      $_SESSION['apellido']=$fila['apellido'];
      $_SESSION['rol']=$fila['idrol'];
      $_SESSION['fecha_registro']=$fila['fecha_registro'];
      $_SESSION['estatus']=$fila['estatus'];

      echo '<script>alert("BIENVENIDO USUARIO")</script> ';
      echo "<script>location.href='index.php'</script>";

      }
      
    
  
      
    }

    }




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
              <a href=""><img class="tamano2" src="imagenes/buscar.png"></a>            
            </li>
            
           
             <li class="tamano">
              <a href="login.php"><img class="tamano2" src="imagenes/usuario.png"></a>  
            </li>             
            </ul>
          </div>
          

      </nav>



<style type="text/css">
  

html,body{
background-image: url('imagenes/black.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}


.alert{
 color:red;
 font-weight: bolder;
}



</style>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
       <center> <h3>Inicio de sesión</h3></center></center>
      </div>
      <div class="card-body">
        <form method="post" action="">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="*Nickname" name='nick'>
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="*Password" name='clave'>
          </div>
          <div class="alert"><?php echo isset($alert) ? $alert:''; ?></div><!-- En caso de que alert no este vacio, nos va a imprimir el mensaje en caso contrario no pasara nada-->
          <div class="form-group">
           <input type="submit" value="Login" class="btn float-right login_btn"> 
          </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          No esta registrado?<a href="registrousuario.php">Hagalo ya mismo!</a>
        </div>
        <div class="d-flex justify-content-center">
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>



