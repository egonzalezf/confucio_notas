<?php
$path = "src/";
$path_include = "vista/comun/";
$tema = "src/thema_boostrap/";
    
include("modelo/Conexion.Class.php");
$conexion = new Conexion();
$conexion->verificar_sesion_on_admin();
?>
<?php include($path_include . "top.php"); ?>
<head>
    <!-- Bootstrap Core CSS 
    <link href="<?php echo $tema; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

    <!-- Theme CSS 
    <link href="<?php echo $tema; ?>css/freelancer.min.css" rel="stylesheet">-->
</head>
<body>
    <?php $pag = "sistema";
    include($path_include . "menu.php");
    ?>
<?php include($path_include . "iniciar_main.php"); ?>
    <div style= background-repeat:no-repeat;background-position:right;">
        <br><center>
            <h2 style="font-family:Arial, Helvetica, sans-serif; font-style:italic;font-weight:bold;">Ingresa al Sistema</h2>
            <form action="sistema" method="post" onSubmit="MostrarConsulta('controlador/Publico.php?peticion=1' + '&user=' + document.getElementById('usuario').value + '&pass=' + document.getElementById('clave').value);
                    return false">
                <img src="src/images/usuario.png"><br>
                <input type="text" id="usuario" name="usuario" maxlength="20" style="height:30px; width:200px; padding-left:10px;" required><br>
                <img src="src/images/clave.png"><br>
                <input type="password" id="clave" name="clave" maxlength="20" style="height:30px; width:200px; padding-left:10px;" required><br><br>
                <input type="submit" name="Iniciar Session" value="Iniciar Session"><br>
            </form>
            <div id="resultado"></div>
        </center><br><br>
    </div>
    
<?php include($path_include . "final_main.php"); ?>
</body>
<?php include($path_include . "pie.php"); ?>
</html>