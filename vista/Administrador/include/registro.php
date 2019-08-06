<script>
function descarga(archivo) {
window.open(archivo);  
}
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confucio|Listado</title>
    <link href="../src/data-tables/DT_bootstrap.css" rel="stylesheet">
      <link rel="stylesheet" href="../src/thema_boostrap/vendor/bootstrap/css/bootstrap.min.css">
    
<link href="../src/css/demo_table.css" rel="stylesheet">
<!--archivos para el diseño de los alert-->
<script src="../src/js/bundled.js"></script>
<link rel="stylesheet" type="text/css" href="../src/js/jquery-confirm.css"/>
<script type="text/javascript" src="../src/js/jquery-confirm.js"> </script>
<!--fin de las hojas para el diseño de los archivos alert-->

</head>
<body>








    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
         
       
        </div>
     
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
      
      <br>
      
      
       <div id="main-content">
    <div class="page-content">
      
      
      <div class="row">
        <div class="col-md-12">
          <div class="block-web">
           <div class="header">
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header">Listado de Estudiantes registrados</h3>
            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>


                      <th>Cedula</th>
                      <th>Nombre(s)</th>
                      <th>Apellido(s)</th>
                      <th class="hidden-phone">Nivel</th>
                      <th class="hidden-phone">Calidficación</th>
                      <th class="hidden-phone">Fecha</th>
                      <th class="hidden-phone">Opciones</th>
                      <th class="hidden-phone">Imprimir</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <tr class="gradeA">

                    <?php
require("conexion.php");
if(!$conectar)
{
	echo "An error occurred.\n";
	exit;
}
 
$sql="SELECT*FROM certificado";
 
$result = pg_query($conectar, $sql);
if(!$result)
{
	echo "An error occurred.\n";
	exit;
}
 
	while ($row = pg_fetch_array($result))
{	
         
?>

                      <td> <?php echo $row["cedula"];?></td>
                      <td><?php echo $row["nombre"];?></td>
                      <td><?php echo $row["apellido"];?></td>
                      <td><?php echo $row["nivel"];?></td>
                      <td><?php echo $row["calificacion"];?></td>
                      <td><?php echo $row["fecha"];?></td>
                      <td><button><a href="editar.php?id_persona=<?php echo $row['id_persona']; ?>" ></i>Actualizar</a></button>
                      <!--<button><a href="" ></i>Eliminar</a></button>-->
                      <a onclick='preguntar(<?php echo $row["cedula"];?>)'>  
              <button >&nbsp;Eliminar</button></a>

            <script>
                    function preguntar(cedula) {
                      $.confirm({
                        theme:'supervan',
                        title:'Confucio',
                      content:'Seguro que desea eliminar la persona con la cedula:&nbsp;'+cedula+'?' ,
                          buttons: {
                          "Si Estoy Seguro": function() {
                            $.alert({
                              theme:'supervan',
                              title:'Confucio',
                              content:"Ha eliminado a la persona del registro",});
                          location.href='eliminar.php?id_persona='+cedula;
                          },
                          "No":  {
                          }
                        }});
                    }
                  
					</script>
                      
                      </td>
                      
                      <td><button><a title="Imprimir Certificado de Participacion" onclick=" descarga('PDF/certificado.php?id_persona=<?php echo $row['id_persona']; ?>')" ><i class='fa fa-print'></i>Imprimir certificado</a></button></td>
                </tr>
                <?php
}

?>
 
    
                  </tbody>
               
                </table><button><a href="../home.php">volver</a></button>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->
      
      
      
    
      
<script src="../src/js/jquery-2.1.0.js"></script>


<script src="../src/data-tables/jquery.dataTables.js"></script>

<script src="../src/data-tables/dynamic_table_init.js"></script>


</body>
</html>