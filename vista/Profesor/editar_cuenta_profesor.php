<?php $path="../../src/";$path_include="../comun/";?>
<?php include("../../modelo/Conexion.Class.php"); 
$admin =new Conexion();
$admin->verificar_sesion_profesor();
$admin->conectar();
?>
<?php include($path_include."top.php"); 
if(isset($_SESSION['prof'])){?>
	<body onLoad="MostrarConsulta('../../controlador/Profesor.php?peticion=5&cod_user=<?php echo $_SESSION['cod_user']; ?>');">

            
			<?php $pag="principal_admin"; include($path_include."menu.php"); ?>
		    <?php include($path_include."iniciar_main.php"); ?>
                
                
               
               
               <center><div id="resultado" style="float:right;width:120px;"></div></center>
               
              <div class="row">
						<div class="3u">
						
							
							
								
									<h3 style="margin-left:24%;">Opciones</h3>
									
										<?php include($path_include."menuV_prof.php"); ?>
									
								

							
						
						</div>
						<div class="9u skel-cell-mainContent">
					
							<!-- Content -->

								<article class="first">
								
									<h2><?php if (isset($_SESSION['prof'])) echo "Bienvenido:&nbsp;&nbsp;&nbsp;" . strtoupper($_SESSION['nombre_1']) . " " . strtoupper($_SESSION['apellido_1']) . "."; ?></h2>
								<center>
                                	<p>
                                   		<div  style="margin-right:22%;" id="resultado2"></div>
                                    </p>
                                    <a  id="enlace" style="visibility:hidden;margin-right:22%;" href="#" onClick="MostrarConsulta('../../controlador/Profesor.php?peticion=5&cod_user=<?php echo $_SESSION['cod_user']; ?>');">VOLVER</a>
								</center>
								</article>							

						</div>
					</div>
               
             
            
					
					
			
			<?php include($path_include."final_main.php"); 
}?>

	</body><?php include($path_include."pie.php"); ?>
</html>