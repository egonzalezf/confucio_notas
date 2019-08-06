 <!--archivos para el diseño de los alert-->
 <script src="../src/js/bundled.js"></script>
<link rel="stylesheet" type="text/css" href="../src/js/jquery-confirm.css"/>
<script type="text/javascript" src="../src/js/jquery-confirm.js"> </script>
<!--fin de las hojas para el diseño de los archivos alert-->
<?php
include_once ('conexion.php');
//if(isset($_POST["submit"])){
$id=$_REQUEST["id_persona"];
$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$fecha=$_POST["fecha"];
$nivel=$_POST["nivel"];
$calificacion=$_POST["calificacion"];

$sql = " UPDATE certificado  SET  cedula='$cedula' , nombre='$nombre' ,apellido='$apellido',  fecha='$fecha' ,nivel='$nivel' ,calificacion='$calificacion' where id_persona='$id'  ";
$result = pg_query($conectar, $sql);;

if (! $result){
       echo "<font color='red' >La consulta SQL contiene errores</font>".pg_last_error($conectar);
       exit();
}else

{?>
  
    <script>
  
  $.confirm({
      theme:'supervan',
      title:'Sistema Conub ',
      content:"Datos Personales Modificado Correctamente",
      buttons: {
        "Aceptar!": function() {
          $.alert({
            theme:'supervan',
            title:'Sistema Conub',
            content:"",});
        location.href='registro.php';
        },
       
      }});
  </script>
 <?php
                }
        
  ?>
