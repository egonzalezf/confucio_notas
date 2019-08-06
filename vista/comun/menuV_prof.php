<?php if (!isset($_SESSION['prof'])) session_start(); if (isset($_SESSION['prof'])){ ?>
<div id="menu">
	<ul>
    
     
       
    
  		<li class="nivel1 primera"><a href="#" class="nivel1">ESTUDIANTE</a>
        		<ul class="nivel2">
                    <li class="primera"><a href="consultar_est_profesor.php">CONSULTAR ESTUDIANTE</a></li>
				</ul>
        </li>
                     
        <li class="nivel1"><a href="#" class="nivel1">SECCIÓN</a>
        <ul class="nivel2">
        <li class="primera"><a href="consultar_seccion_profesor.php">CONSULTAR SECCIÓN</a></li>

        
		</ul>        
        </li>
        
        <li class="nivel1"><a href="#" class="nivel1">NOTA</a>
        <ul class="nivel2">
    
        <li class="primera"><a href="consultar_seccion_nota_profesor.php">AGREGAR NOTAS</a></li>
        
		</ul>        
        </li>
        
    <?php if (isset($_SESSION['admin'])){ echo '<li class="nivel1"><a href="vista/Administrador/principal_admin.php" class="nivel1">MENU ADMIN</a></li>';} ?>
       
        <li class="nivel1"><a href="#" class="nivel1">CUENTA</a>
        		<ul class="nivel2">
					<li class="primera"><a href="cambiar_clave_profesor.php">CAMBIAR CLAVE</a></li>
                    <li><a href="editar_cuenta_profesor.php">EDITAR CUENTA</a></li>
				</ul>
        </li>
        
        
        <!--<li class="nivel1"><a href="#" class="nivel1">Opción 5</a></li>
        <li class="nivel1"><a href="#" class="nivel1">Opción 6</a></li>
        <li class="nivel1"><a href="#" class="nivel1">Opción 7</a></li>-->
        <li class="nivel1"><a href="#" onclick="MostrarConsulta('../../controlador/Profesor.php?peticion=2')" class="nivel1">CERRAR SESIÓN</a></li>
</ul>
</div>
<?php } ?>