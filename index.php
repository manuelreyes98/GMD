

<html>
  <head>
  
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>GMD tienda de videojuegos</title>
    <style type="text/css"> 
     .posicionc{
        position: relative;
        left: 335;
        float: right;
        display: inline-block;
      }
    
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
    .t {

    
    -webkit-box-shadow: 0px 0px 0px -119px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 0px -119px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 0px -119px rgba(0,0,0,0.75);
        margin: 0 auto;
        
    width: 65%;
  
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
    
    background-color: rgba(255,255,255,0.7);

}


          
    </style>

  </head>


  <body style="background-color:#323232; ">
 
        <nav class="navbar navbar-expand-md navbar-dark  sticky-top" style="background-color: #222222;">

          <a href="" class="navbar-brand"><img style="width:150px;height:30px;" src="imagenes/logo6.png"></a>

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


<form action="juegos_buscar.php" method="get">
        
               <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          <input class="search_input" type="text" name="busqueda" placeholder="Buscar">
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

    <div>

         <?php 
          require("bd/conexion.php");

          $query= "SELECT * FROM producto where idproducto='2' ";
          $resultado=$conn->query($query);

          while ($row=$resultado->fetch_assoc()) {
            
         ?>
      
          <a href=""><img class="img-fluid" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?> "/></a> 
          
          <?php

          }

          ?>

    </div>
     <br>
     <br>
    <center><h1 style="color:#FFFFFF;">Informacion</h1></center>
    <br>
    <br>
      <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-4">
          <div class="card" >
            <img  style="width:615px; height:230px; " src="imagenes/Infociberpunk.jpg" class="card-img-top" alt="...">
            <div class="card-body" style="background-color: #222222;">
              <center><p class="card-text" style="color:#FFFFFF;">Somos 3 jovenes estudiantes del sena en etapa formativa los cuales desarollamos este proyecto con el fin de afianzar nuestros conocimientos en el area del desarrollo web.</p></center>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card">
            <img   style="width:615x; height:230px; " src="imagenes/Infoconsolas.jpg" class="card-img-top" alt="...">
            <div class="card-body" style="background-color: #222222;">
              <center><p class="card-text" style="color:#FFFFFF;">Nuestra misión es satisfacer las necesidades de las personas interesadas en los videojuegos a través de nuestra pagina web ofreciendo al público un catalogo extenso y actualizado de videojuegos asi como tambien accesorios y toda clase de implementos gamer que puedan mejorar la experiencia de nuestros usuarios. Nuestros valores son y serán siempre el mejorar y buscar que GMD se posicione como una de las paginas de referencia a la hora de comprar tu articulo gamer favorito.</p></center>
            </div>
          </div>
        </div>

        <div class="colmb-4">
          <div class="card posicionc"  >
            <img  style="width:700px; height:230px; " src="imagenes/Infomando.jpg" class="card-img-top" alt="...">
            <div class="card-body" style="background-color: #222222;">
              <center><p class="card-text" style="color:#FFFFFF;"> En GMD apuntamos a llegar a más lugares en el territorio colombiano  e incluso a diferentes partes del mundo, con el mejor servicio a clientes, con los juegos y artículos más nuevos y actualizados y principalmente con la mejor comodidad y seguridad que podamos ofrecer.</p></center>
            </div>
          </div>
  </div>

 
</div>


                   <br>
                   <br>


     
  </body>

</html>

    






