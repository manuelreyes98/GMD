<?php
$mysqli= new mysqli('localhost','id13283997_root','shZ2W!klIih{VSaW','id13283997_gmd');
session_start();

if(isset($_SESSION['IdUser'])!= NULL){
  
$_SESSION['IdUser'];

?>
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
    
      .blaco{

        color:#FFFFFF;
      }


          
    </style>

  </head>


<!-- SCRIPT DE MENSAJE -->



      <script type="text/javascript">
      function ConfirmDelete()
      {
        var respuesta=confirm("Estas seguro que deseas comprar el articulo ?" )

          if (respuesta == true){

            alert("¡Gracias por comprar!");
            return  true;
            

            
          }

          else{
            alert("¡Haz cancelado la compra!");

            return  false;
          }
      }

    </script>

  <body style="background-color:#323232;">
   
        <nav class="navbar navbar-expand-md navbar-dark  sticky-top" style="background-color: #222222;">

          <a href="index.php" class="navbar-brand"><img style="width:150px;height:30px;" src="imagenes/logo6.png"></a>
 
        <div>
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


      <?php

      require("bd/conexion.php");

        $idproducto=$_POST["idproducto"];

        date_default_timezone_set('America/Bogota');
        $fecha=date("y-m-d H:i:s");


        $query= "SELECT * FROM producto where idproducto='$idproducto'";
        $resultado=$conn->query($query);

        while ($row=$resultado->fetch_assoc()) {

           ?>

                <img class="card-img-top" style="width:286px; height:180px; " src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?> "alt="..."/>
                  <h2 class="blaco">Informacion del producto:</h2>

                  <h4 class="blaco">Nombre:</h4>
                  <p class="blaco"><?php echo $row['nombre'];?></p>
                  <h4 class="blaco">Descripcion:</h4>
                    <p class="blaco"> <?php echo $row['descripcion'];?> </p>
                    <h4 class="blaco">Precion unitario:</h4>
                    <p class="blaco"> <?php echo $row['valorund'];?> </p>
                  <h4 class="blaco">Cantidad:</h4> 
                  
                   <?php

                    if ($row['cantidad']==0) {
                    
                      echo "<input type='button' value='No disponible' class='btn btn-danger' >";

                    }
                    else{

                    ?>

                    <form method="POST" action="ordencompra.php">
                      <input type="hidden" name="idproducto" value="<?php   echo $row['idproducto'];?>">
                      <input type="hidden" name="precio" value="<?php   echo $row['valorund'];?>">
                      <input type="hidden" name="nomprod" value="<?php   echo $row['nombre'];?>">
                      <input type="hidden" name="idusuario" value="<?php echo $_SESSION['IdUser'];?>">
                      <input type="hidden" name="correo" value="<?php echo $_SESSION['correo'];?>">
                      <input type="hidden" name="nick" value="<?php echo $_SESSION['nick'];?>">
                      
                       <input type="hidden" type="datetime" name="fecha" value="" placeholder="<?=$fecha?>">

                       <select name="cantidad" required >
                   

                          <option value="0">Seleccione:</option>
                            <?php

                            for ($i=1; $i<= $row['cantidad'] ; $i++) { 

                              
                              
                                echo "<option>$i</option>";

                            }
                          

                            ?>
                  
                       </select>
                       <h4 class="blaco">Metodo de pago:</h4> 

                       <select  name="metodo_pago" required>
                          <option value="">Seleccione:</option>      
                            <?php
                              $query = $mysqli -> query ("SELECT * FROM metodo_pago");
                              while ($valores = mysqli_fetch_array($query)) {
                               echo '<option value="'.$valores["idmetodo"].'">'.$valores["m_nombre"].'</option>';
                                
                              }


                            ?>

                            <?php $i=$i-1;?>
                  
                        </select>
                        <input type="hidden" name="totalcantidad" value="<?php echo $i;?>">
      

                        <br/>
                        <br/>

                      <input type="submit" value="comprar"   onclick="return ConfirmDelete()" class="btn btn-success" >
                      
                      
                      <input type="button" class="btn btn-danger" onclick="history.go(-1)" name="Cancelar" value="Cancelar">
                    </form>
                    <?php  
                    }
                    ?>
                   
                  </div>
              </div>
            </div>
          <?php         

        }
        
        }

      else{
          ?>
       
        <script>
        window.location.replace("https://gmd1.000webhostapp.com/login.php");
        </script>
        
      <?php
      }

      ?>

    </div>

     
  </body>

</html>

    



    