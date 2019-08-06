<?php
?>
 <!--archivos para el diseño de los alert-->
 <script src="../src/js/bundled.js"></script>
<link rel="stylesheet" type="text/css" href="../src/js/jquery-confirm.css"/>
<script type="text/javascript" src="../src/js/jquery-confirm.js"> </script>
<!--fin de las hojas para el diseño de los archivos alert-->
<?php
include_once ('conexion.php');

$id=$_REQUEST["id_persona"];
$sql= "DELETE  FROM certificado WHERE cedula = $id ";
$resultado= pg_query($conectar,$sql);

if (!$resultado) {
echo "<script>
  
$.confirm({
    theme:'supervan',
    title:'Confucio ',
    content:'no se pudo eliminar',
    buttons: {
      'Aceptar!': function() {
        $.alert({
          theme:'supervan',
          title:'Confucio',
          content:'',});
      location.href='registro.php';
      },
     
    }});
</script>";

 // echo "<font color='red'>no se pudo eliminar el registro</font>".pg_last_error($conectar);
} else
{?>
  
    <script>
  
  $.confirm({
      theme:'supervan',
      title:'Confucio ',
      content:"Eliminado Correctamente",
      buttons: {
        "Aceptar!": function() {
          $.alert({
            theme:'supervan',
            title:'Confucio',
            content:"",});
        location.href='registro.php';
        },
       
      }});
  </script>
 <?php
                }
        
  ?>