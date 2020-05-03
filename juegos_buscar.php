<?php
$mysqli= new mysqli('localhost','root','','gmd');
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

      .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 450px;
    caret-color:red;
    transition: width 0.4s linear;
    }

   

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    text-decoration:none;
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Productos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item " href="juegos.php">Juegos</a>
                  <a class="dropdown-item " href="accesorios.php">Accesorios</a>
                </div>
              </li> 
        
          </ul>


             </div>


                      <?php

                       include ("conexion.php");
                        //if (isset($_POST['submit'])) {
                        //REQUEST RECIBE DATOS POR EL POST Y POR EL GET
                        $busqueda= strtolower( $_REQUEST['busqueda']);

                        if(empty($busqueda)){
                          //SI EL CAMPO BUSQUEDA ESTA VACIO, TE VA A REDIRECCIONAR A LA PAGINA PRINCIPAL
                          header("location:login.php");
                        }
                       
                        
                        ?>

<form action="juegos_buscar.php" method="get">
        
               <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          <input class="search_input" type="text" name="busqueda"  value="<?php echo $busqueda; ?>" >
          <a href="#" class="search_icon"></i></a>
                    <a href="#" ><img class="tamano2" src="imagenes/buscar.png"></a> 
                  </div>
                  </div>
                </div>
          
              </form>




        </div>
      </div>
    </div>

        </div>

        <div class="posiciond">
          <ul class="nav">


             <li class="tamano">
              <a href="login.php"><img class="tamano2" src="imagenes/usuario.png"></a>  
            </li>             
            </ul>
          </div>

      </nav>
   
</div>

    <div >


     <br>
    <br>
    <div class="container">
    <div class="row row-cols-3">
        <?php 
          require("bd/conexion.php");
          

          $query= "SELECT * FROM producto where nombre like '%$busqueda%' and estado=1";
          $resultado=$conn->query($query);

          while ($row=$resultado->fetch_assoc()) {
            
    
            
          ?>


            <div class='col'>

              <div class='card' style='width: 18rem;'>
                <img class="card-img-top" style="width:286px; height:180px; " src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?> "alt="..."/>
                  <div class='card-body' style="background-color: #222222;">
                    <h5 class='card-title' style="color:#FFFFFF;"> <?php echo $row['nombre'];?> </h5>
                    <p class='card-text' style="color:#FFFFFF;"> <?php echo $row['descripcion'];?> </p>
                    <?php

                    if ($row['cantidad']==0) {
                    
                      echo "<input type='button' value='No disponible' class='btn btn-danger' >";

                    }
                    else{

                    ?>
                    <form method="POST" action="pagcompra.php">
                      <input type="hidden" name="idproducto" value="<?php   echo $row['idproducto'];?>">

                       <input type="submit" value="Comprar" class="btn btn-success">
                    </form>
                  <?php  
                  }
                  ?>
                  </div>
              </div>
            </div>
          <?php         

          }

          ?>

          

    </div>
     
  </body>

</html>

    