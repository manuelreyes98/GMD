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
                  <a class="dropdown-item " href="juegos.php">Juegos</a>
                  <a class="dropdown-item " href="productos.php">Productos</a>
                  <a class="dropdown-item " href="ventas.php">Ventas</a>
                </div>                
              </li>           
            <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active"><p style="color:#FCFCFC;padding-left: 280px;font-size: 20px";>Bienvenido Administrador: <?php echo $_SESSION['nombre']. " ". $_SESSION['apellido']  ?></p></a>
        </div>

 
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



                      <?php

                       include ("conexion.php");
                        //if (isset($_POST['submit'])) {
                        //REQUEST RECIBE DATOS POR EL POST Y POR EL GET
                        $busqueda= strtolower( $_REQUEST['busqueda']);

                        if(empty($busqueda)){
                          //SI EL CAMPO BUSQUEDA ESTA VACIO, TE VA A REDIRECCIONAR A LA PAGINA PRINCIPAL
                          header("location:crudusuario.php");
                        }
                        
                        ?>


<center>

<form action="buscar_usuario.php" method="get" class="form_search">
  
  <input type="text" name="busqueda"  placeholder="busqueda"  value="<?php echo $busqueda; ?>" ><!--//EL VALUE ES PARA QUE CUANDO INSERTEMOS UN VALOR NO DESAPAREZCA DEL CAMPO Y LO GUARDE-->
  <input type="submit" name="buscar" class="btn_search" value="Buscar">

</form>

</center>


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
                        if($conn){ 
                      
                        $query = mysqli_query( $conn," SELECT   u.idusuario,u.nombre,u.apellido,u.nickname,u.correo,u.clave,u.ciudad,u.direccion,u.telefono,u.fecha_registro,u.fecha_naci,r.rol FROM usuario u INNER JOIN rol r ON u.idrol = r.idrol WHERE  nombre like '%$busqueda%' or apellido like '%$busqueda%' or nickname like '%$busqueda%' or r.rol like '%$busqueda%' ");
                          
                          $resultado_busqueda= mysqli_num_rows($query);
                          if($resultado_busqueda>0){
                            while($dato = mysqli_fetch_array($query)){ 
                  

                        ?>



        <tr>
    <td><?php echo $dato['idusuario']?></td>
    <td><?php echo $dato['nombre']?></td>
    <td><?php echo $dato['apellido']?></td>
    <td><?php echo $dato['nickname']?></td>
    <td><?php echo $dato['fecha_registro']?></td>
    <td><?php echo $dato['fecha_naci']?></td>
    <td><?php echo $dato['correo']?></td>
    <td><?php echo $dato['ciudad']?></td>
    <td><?php echo $dato['direccion']?></td>
    <td><?php echo $dato['telefono']?></td>
    <td><?php echo $dato['rol']?></td>
    <td><?php echo $dato['telefono']?></td>
       

 <td>
    
     <a href="admieditar.php?id=<?php echo $dato['idusuario']?>" class="btn btn-primary">Editar</a></td>



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


      <?php if($dato["idusuario"]!=1){?>
     <td>   
     <a href="admieliminar.php?id=<?php echo $dato['idusuario']?>" class="btn btn-danger" type="submit" onclick="return ConfirmDelete()">Eliminar</a></td>
        
      <?php } ?>

 <td>
    
     <a href="Reporteusuario.php?id=<?php echo $dato['idusuario']?>" class="btn btn-secondary">Imprimir</a></td>

      
   </td>


    </tr>


<?php
         }
        }
      }
                 
  ?>

</table>

<a href="admiusuario.php"><button type="button" class="btn btn-primary btn-lg btn-block">Crear nuevo usuario</button>


<br><br><br>

<a href="crudusuario.php"><input type='button' value='VOLVER ATRAS' class='btn btn-danger'></a>







































