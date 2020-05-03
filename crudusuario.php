<?php
//background-image: url('https://images8.alphacoders.com/921/thumb-1920-921560.jpg');

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
                  <a class="dropdown-item " href="ventas.php">Ventas</a>
                </div>                
              </li>           
         
        </div>
        </ul>

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

   


<center><h2>LISTA USUARIOS</h2></center>



<form action="buscar_usuario.php" method="get" class="form_search">
  
  <input type="text" name="busqueda"  placeholder="Buscar">
  <input type="submit" value="buscar" class="btn_search">

</form>





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
              <th> Editar </th>
              <th> Eliminar </th>
              <th> Imprimir </th>
              </tr>
    </thead>
    <tbody>
        


                      <?php

                      
                      require ("conexion.php");
                      $query = mysqli_query($conn,"SELECT u.idusuario,u.nombre,u.apellido,u.nickname,u.correo,u.clave,u.ciudad,u.direccion,u.telefono,u.fecha_registro,u.fecha_naci,r.rol FROM usuario u INNER JOIN rol r ON u.idrol = r.idrol WHERE estatus=1");

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
       

 <td>
    
     <a href="admieditar.php?id=<?php echo $resultado['idusuario']?>" class="btn btn-primary">Editar</a></td>



<!-- SCRIPT DE MENSAJE -->

      <script type="text/javascript">
      function ConfirmDelete()
      {
        var respuesta=confirm("Estas seguro que deseas eliminar al usuario  <?php echo $resultado['nombre']." ".$resultado['apellido']?> ?" )

          if (respuesta == true){
            return true;
          }
          else{
            return false;
          }
      }

    </script>







      <?php if($resultado["idusuario"]!=1){?>
     <td>   
     <a href="admieliminar.php?id=<?php echo $resultado['idusuario']?>" class="btn btn-danger" type="submit" onclick="return ConfirmDelete()">Eliminar</a></td>
        
      <?php } ?>
    </td>

    <?php if($resultado["idusuario"]!=1){?>

    <td>
    
     <a href="Reporteusuario.php?id=<?php echo $resultado['idusuario']?>" class="btn btn-secondary">Imprimir</a>

      <?php } ?>
   </td>




    </tr>


<?php
    }
    }


  ?>

</table>

<a href="admiusuario.php"><button type="button" class="btn btn-primary btn-lg btn-block">Crear nuevo usuario</button>


<br><br><br>

<a href="administrador.php"><input type='button' value='VOLVER ATRAS' class='btn btn-danger'></a>
<a href="Imprimir_usuarios.php"><input type='button' value='Imprimir Usuarios' class='btn btn-secondary'></a> 







































