<?php if (!isset($_SESSION['admin']))
    session_start();
if (isset($_SESSION['admin'])) {
    ?>
    <div id="menu">
        <ul>
            <li class="nivel1 primera"><a href="#" class="nivel1">ADMINISTRADOR</a>
                <ul class="nivel2">
                    <li class="primera"><a href="registrar_admin_admin.php">REGISTRAR ADMINISTRADOR</a></li>
                    <li class="primera"><a href="editar_admin_admin.php">EDITAR ADMINISTRADOR</a></li>
                    <li class="primera"><a href="consultar_admin_admin.php">BORRAR ADMINISTRADOR</a></li>
                </ul>
            </li>
            <li class="nivel1 primera"><a href="#" class="nivel1">PRIVILEGIOS</a>
                <ul class="nivel2">
                    <li class="primera"><a href="privilegio_admin_admin.php">DAR PRIVILEGIOS A PROFESOR</a></li>
                    <li class="primera"><a href="quitar_privilegio_admin_admin.php">RESTRINGIR PRIVILEGIOS A PROFESOR</a></li>
                </ul>
            </li>
            <li class="nivel1 primera"><a href="#" class="nivel1">INSCRIPCIÓN</a>
                <ul class="nivel2">
                    <li class="primera"><a href="registrar_est_admin.php">REGISTRAR ESTUDIANTE</a></li>
                    <li class="primera"><a href="editar_est_admin.php">EDITAR ESTUDIANTE</a></li>
                    <li class="primera"><a href="consultar_est_admin.php">BORRAR ESTUDIANTE</a></li>
                    <li class="primera"><a href="inscribir_est_admin.php">ACTIVAR ESTUDIANTE</a></li>
                    <li><a href="validar_inscripcion_admin.php">VALIDAR INSCRIPCIÓN</a></li>
                    <li><a href="invalidar_inscripcion_admin.php">INVALIDAR INSCRIPCIÓN</a></li>
                </ul>
            </li>
            <li class="nivel1 primera"><a href="#" class="nivel1">PROFESOR</a>
                <ul class="nivel2">
                    <li class="primera"><a href="consultar_profesor_todos_admin.php">CONSULTAR PROFESOR</a></li>
                    <li class="primera"><a href="registrar_profesor_admin.php">REGISTRAR PROFESOR</a></li>
                    <li class="primera"><a href="editar_profesor_admin.php">EDITAR PROFESOR</a></li>
                    <li class="primera"><a href="consultar_profesor_admin.php">BORRAR PROFESOR</a></li>
                </ul>
            </li>
            <li class="nivel1 primera"><a href="#" class="nivel1">IDIOMA</a>
                <ul class="nivel2">
                    <li class="primera"><a href="registrar_idioma_admin.php">REGISTRAR IDIOMA</a></li>
                    <li class="primera"><a href="editar_idioma_admin.php">EDITAR IDIOMA</a></li>
                    <li class="primera"><a href="eliminar_idioma_admin.php">ELIMINAR IDIOMA</a></li>
                </ul>
            </li>
            <li class="nivel1"><a href="#" class="nivel1">SECCIÓN</a>
                <ul class="nivel2">
                    <li class="primera"><a href="consultar_seccion_admin.php">CONSULTAR SECCIÓN</a></li>
                    <li class="primera"><a href="registrar_seccion_admin.php">REGISTRAR SECCIÓN</a></li>
                    <li class="primera"><a href="editar_seccion_admin.php">EDITAR SECCIÓN</a></li>
                    <li class="segunda"><a href="#">AVANZAR SECCIÓN</a>
                        <ul class="nivel3">
                            <li class="segunda"><a href="avanzar_seccion_admin_4to.php">4TO NIVEL</a></li>
                            <li class="segunda"><a href="avanzar_seccion_admin_3ro.php">3ER NIVEL</a></li>
                            <li class="segunda"><a href="avanzar_seccion_admin_2do.php">2DO NIVEL</a></li>
                            <li class="segunda"><a href="avanzar_seccion_admin_1ro.php">1ER NIVEL</a></li>
                        </ul>
                    </li>
                </ul>        
            </li>
            <li class="nivel1 primera"><a href="#" class="nivel1">HORARIOS</a>
                <ul class="nivel2">
                    <li class="primera"><a href="registrar_horario_admin.php">REGISTRAR HORARIO</a></li>
                    <!--<li class="primera"><a href="editar_horario_admin.php">EDITAR HORARIO</a></li>-->
                    <li class="primera"><a href="eliminar_horario_admin.php">ELIMINAR HORARIO</a></li>
                </ul>
            </li>
            <li class="nivel1 primera"><a href="#" class="nivel1">CERTIFICADOS</a>
                <ul class="nivel2">
                    <li class="primera"><a href="home.php">EMITIR CERTIFICADOS</a></li>
                    <!--<li class="primera"><a href="editar_horario_admin.php">EDITAR HORARIO</a></li>
                    <li class="primera"><a href="eliminar_horario_admin.php">ELIMINAR HORARIO</a></li>-->
                </ul>
            </li>
            <li class="nivel1"><a href="consultar_estadisticas_admin.php" class="nivel1">ESTADÍSTICAS</a></li>

            <?php
            if (isset($_SESSION['prof'])) {
                echo'<li class="nivel1"><a href="vista/Profesor/principal_profesor.php" class="nivel1">MENU PROFESOR</a></li>';
            }
            ?>

            <?php
            if (!isset($_SESSION['prof'])) {
                echo '<li class="nivel1"><a href="#" class="nivel1">CUENTA</a>
        		<ul class="nivel2">
					<li class="primera"><a href="cambiar_clave_admin.php">CAMBIAR CLAVE</a></li>
                    <li><a href="editar_cuenta_admin.php">EDITAR CUENTA</a></li>
				</ul>
        </li>';
            }
            ?>
            <!--<li class="nivel1"><a href="#" class="nivel1">Opción 5</a></li>
            <li class="nivel1"><a href="#" class="nivel1">Opción 6</a></li>
            <li class="nivel1"><a href="#" class="nivel1">Opción 7</a></li>-->
            <li class="nivel1"><a href="#" onclick="MostrarConsulta('../../controlador/Administrador.php?peticion=2')" class="nivel1">CERRAR SESIÓN</a></li>
        </ul>
    </div>
<?php } ?>