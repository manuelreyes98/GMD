<?php
require('bd/conexion.php');
$query="SELECT idtipo,nombre FROM tipo ORDER BY nombre ASC";
$resultado= $conn->query($query);

?>

<html>
  <head>
    <title>Venta</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script language="javascript" src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script language="javascript">
        $(document).ready(function(){
          $("#cmb_tipo").change(function () {
   
            //$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
            
            $("#cmb_tipo option:selected").each(function () {
              idtipo = $(this).val();
              $.POST("cbmventa/getproducto.php", { idtipo : idtipo }, function(data){ $("#cmb_producto").html(data);
              });            
            });
          })
        });

      $(document).ready(function(){
        $("#cbx_municipio").change(function () {
          $("#cbx_municipio option:selected").each(function () {
            id_municipio = $(this).val();
            $.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
              $("#cbx_localidad").html(data);
            });            
          });
        })
      });
        
  
      </script>

  </head>


  <body>

    <h1>Registro ventas</h1>
    <br/>
    <form id='combo' name='combo' method='POST' action='guardar_venta.php'>

      <div>selecciona el tipo de producto: <select id="cmb_tipo" name="cmb_tipo">

        <option value="0">seleccionar tipo de producto: 
        </option>
        <?php while ($row=$resultado->fetch_assoc()){ ?>
          <option value="<?php $row['idtipo']?>">
            <?php echo $row['nombre']; ?>              
            </option>
        <?php
        } 
        ?>
      </select>
      </div>

      <div>
        Selecciona el producto: <select id="cmb_producto" name="cmb_producto">
          
        </select>
      </div>

    </form>
  </body>
  </html>

