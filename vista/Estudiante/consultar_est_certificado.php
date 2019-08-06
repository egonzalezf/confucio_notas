<?php
$path = "../../src/";
$path_include = "../comun/";
include("../../modelo/Conexion.Class.php");
$admin = new Conexion();
$admin->verificar_sesion_estudiante();
$admin->conectar();
include($path_include . "top.php");
if (isset($_SESSION['est'])) {
    ?>
    <body onLoad="MostrarConsulta('../../controlador/Estudiante.php?peticion=43&cod_user=<?php echo $_SESSION['cod_user']; ?>');"> 
        <?php
        $pag = "principal_estudiante";
        include($path_include . "menu.php");
        include($path_include . "iniciar_main.php");
        ?>
    <center><div id="resultado" style="float:right;width:120px;"></div></center>
    <div class="row">
        <div class="3u">
            <h3 style="margin-left:24%;">Opciones</h3>
            <?php include($path_include . "menuV_est.php"); ?>									
        </div>
        <div class="9u skel-cell-mainContent">

            <!-- Content -->
            <article class="first">
                <h2><?php if (isset($_SESSION['est'])) echo "Bienvenido:&nbsp;&nbsp;&nbsp;" . strtoupper($_SESSION['nombre_1']) . " " . strtoupper($_SESSION['apellido_1']) . "."; ?></h2>     
                <p>
                <div id="resultado2" style="margin-left:2%;"></div>
                </p>
            </article>							
        </div>
    </div>
    <br> <br> <br>            				

    <?php
    include($path_include . "final_main.php");
}
?>           
</body><?php include($path_include . "pie.php"); ?>
</html>