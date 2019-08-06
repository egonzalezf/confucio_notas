<?php if (!isset($_SESSION['est'])) session_start();
if (isset($_SESSION['est'])) { ?>
    <div id="menu">
        <ul>
            <li class="nivel1 primera"><a href="#" class="nivel1">ESTUDIANTE</a>
                <ul class="nivel2">
                    <li class="primera"><a href="consultar_est_nota.php">CONSULTAR NOTA</a></li>
                    <li class="primera"><a href="consultar_est_certificado.php">CERTIFICADO</a></li>
                </ul>
            </li>
            <li class="nivel1"><a href="#" class="nivel1">CUENTA</a>
                <ul class="nivel2">
                    <li class="primera"><a href="cambiar_clave_estudiante.php">CAMBIAR CLAVE</a></li>
                    <li><a href="editar_cuenta_estudiante.php">EDITAR CUENTA</a></li>
                </ul>
            </li>
            <!--<li class="nivel1"><a href="#" class="nivel1">Opción 5</a></li>
            <li class="nivel1"><a href="#" class="nivel1">Opción 6</a></li>
            <li class="nivel1"><a href="#" class="nivel1">Opción 7</a></li>-->
            <li class="nivel1"><a href="#" onclick="MostrarConsulta('../../controlador/Estudiante.php?peticion=2')" class="nivel1">CERRAR SESIÓN</a></li>
        </ul>
    </div>
<?php } ?>