 <?php


$conectar = pg_connect("host=localhost dbname=confucio2 user=postgres password=ubv123$")
    or die('No se ha podido conectar: ' . pg_last_error());


/*   $host="host=localhost";
   $user="user=postgres";
   $pass="password=postgres";
   $dbname="dbname=confucio";
   $port="port=5432";
   
   $strCon="$host $port $dbname $user $pass";
   
           $conectar = pg_connect($strCon);
           
           if(!$conectar){
               echo "<script>alert('Sin conexion');</script>";
               echo 'ERROR DE CONEXION CON POSTGRESQL: ' . pg_last_error($conectar);
           } else{
            echo '<script>$.alert({theme:"supervan",title:"<strong>conectado!</strong>",content:"conectado"});</script> ';
               echo "<h3>conectado</h3>";
               return $conectar;
           }*/
?>



