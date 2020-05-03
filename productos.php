<?php
  $mysqli = new mysqli('localhost', 'id13283997_root', 'shZ2W!klIih{VSaW', 'id13283997_gmd');

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
  
  <form class="was-validated" action="guardadoproductos.php" method="POST" enctype="multipart/form-data">
    
  <div class="col-md-4 mb-3">
      <label for="validationServer02"></label>
      <input type="text" name="nomprod" class="form-control is-valid" id="validationServer02" placeholder="Nombre del producto"  required>
      <div class="valid-feedback">
        
      </div>
    </div>

   <form class="was-validated">
  <div class="col-md-4 mb-3">
    <label for="validationTextarea"></label>
    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Descripcion del producto" name="descripcionprod" required></textarea>
    <div class="invalid-feedback">
      
    </div>
  </div>

  <div class="col-md-3 mb-3">
      <label for="validationTooltip05"></label>
      <input type="text" class="form-control" name= "valorp" id="validationTooltip05" placeholder="Valor del producto" required>
      <div class="invalid-tooltip">
       
      </div>
      <br>


      <div class="col-md-15 mb-3">
      <label for="validationServer03"></label>
      <input type="text" name="cantidad" class="form-control is-valid" id="validationServer02" placeholder="Cantidad"  required>
      <div class="valid-feedback">
        
      </div>
    </div>
    <br>

    
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="validatedCustomFile" name="imagen" accept="image/png,.jpeg,.jpg" required>
    <label class="custom-file-label" for="validatedCustomFile">Seleccione una imagen</label>
    <div class="invalid-feedback"></div>
  </div>
  <br>
  <br>

  <div class="form-group">
    <select class="custom-select" name="tipo" required>
      <option value="">Seleccione el tipo de producto</option>
      
    
    <div class="invalid-feedback">Example invalid custom select feedback</div>
  </div>
        <?php
          $query = $mysqli -> query ("SELECT * FROM tipo");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores["idtipo"].'">'.$valores["nombre"].'</option>';
            
          }

        ?>
        <div class="invalid-feedback">Example invalid custom select feedback</div>
      </select>
      
    <br>
    <br>

    <div class="form-group">
    <select class="custom-select" name="categoria" required>
      <option value="">Seleccione la categoria </option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM categoria");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores["idcategoria"].'">'.$valores["c_nombre"].'</option>';
            
          }

        ?>
        <div class="invalid-feedback">Example invalid custom select feedback</div>
      </select>

      <br>
      <br>

      <input class="btn btn-primary" type="submit" value="Registrar Producto">

    </div>

</form>
      

      
<!--  <?php 

require ("bd/conexion.php");

$result = $conn->query("select * from producto");
while ($res = mysqli_fetch_array($result)){
  echo $res["nombre"] ."<br>";
  echo $res["descripcion"] ."<br>";
  echo $res["valorund"] ."<br>";
  echo $res["cantidad"] ."<br>";
  echo '<img src="'.$res["imagen"].'" width="400" height="600">';
}

    ?>-->
</div>

      <form method = "POST" action="Editar_productos.php">
      <button type="submit" class="btn btn-secondary" style="display: inline-flex;">Consultar productos</button>
      </form>

    </form>

    <a href="administrador.php"><input type='button' value='atras' class='btn btn-primary'></a>

    
    </body>
    </html>