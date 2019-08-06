<html>
    <head><title>Confucio|Registrar</title></head>
    <!--archivos para el diseño de los alert-->
<script src="../src/js/bundled.js"></script>
<link rel="stylesheet" type="text/css" href="../src/js/jquery-confirm.css"/>
<script type="text/javascript" src="../src/js/jquery-confirm.js"> </script>
<!--fin de las hojas para el diseño de los archivos alert-->
    <body>

<?php
 include_once ('conexion.php');

//if(isset($_POST["submit"])){

$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$fecha=$_POST["fecha"];
$nivel=$_POST["nivel"];
$calificacion=$_POST["calificacion"];

$sql = "INSERT INTO certificado(cedula,nombre,apellido,fecha,nivel,calificacion)
 VALUES ($cedula,'$nombre','$apellido','$fecha',$nivel,'$calificacion')";

$result= pg_query($sql);

if (!$result ){
   //echo "holaa este es el error". pg_last_error($conectar);
    echo "
    <script>
                  
                  $.confirm({
                      theme:'supervan',
                      title:'Confucio ',
                      content:'UPSS!! La Cedula ya existe en el registro',
                      buttons: {
                        'OK!': function() {
                          $.alert({
                            theme:'supervan',
                            title:'Confucio',
                            content:'',});
                        location.href='../home.php';
                        },
                       
                      }});
                  </script>
    
    
    ";
  
       exit();
}
echo "
    
    <script>
                  
                  $.confirm({
                      theme:'supervan',
                      title:'Confucio ',
                      content:'Registro Guardado Correctamente',
                      buttons: {
                        'OK!': function() {
                          $.alert({
                            theme:'supervan',
                            title:'Confucio',
                            content:'',});
                        location.href='registro.php';
                        },
                       
                      }});
                  </script>
    
    
    ";

//}



?>    </body>
</html>



