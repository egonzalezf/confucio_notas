<?php
$path = "../../src/";
$path_include = "../comun/";
include("../../modelo/Conexion.Class.php");
$admin = new Conexion();
$admin->verificar_sesion_profesor();
$admin->conectar();
include($path_include . "top.php");

if (isset($_SESSION['prof'])) {
    ?>
    <body onLoad="MostrarConsulta('../../controlador/Profesor.php?peticion=3&cod_user=<?php echo $_SESSION['cod_user']; ?>');">
        <?php
        $pag = "principal_profesor";
        include($path_include . "menu.php");
        include($path_include . "iniciar_main.php");
        ?>

    <center><div id="resultado" style="float:right;width:120px;"></div></center>
    <div class="row">
        <div class="3u">
            <h3 style="margin-left:24%;">Opciones</h3>
    <?php include($path_include . "menuV_prof.php"); ?>
        </div>
        <div class="9u skel-cell-mainContent">

            <!-- Content -->
            <article class="first">
                <!--<?php var_dump($_SESSION) ?>;-->
                <?php
                $sql = "select * from profesor where cod_user='" . $cod_user . "'";
                $resultado = pg_query($sql);
                $datos = pg_fetch_array($resultado);
                $_SESSION['nombre_1'] = $datos['nombre_1'];
                $_SESSION['apellido_1'] = $datos['apellido_1'];
                ?>

                <h2><?php if (isset($_SESSION['prof'])) echo "Bienvenido:&nbsp;&nbsp;&nbsp;" . strtoupper($_SESSION['correo']) . ""; ?></h2>
                <center>
                    <p>
                    <div  style="margin-right:22%;" id="resultado2"></div>
                    </p>
                </center>
            </article>							
        </div>
    </div>
    <br> 
    <?php
    include($path_include . "final_main.php");
}
?>
</body><?php include($path_include . "pie.php"); ?>
</html>