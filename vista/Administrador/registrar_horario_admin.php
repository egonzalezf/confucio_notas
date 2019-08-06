<?php $path="../../src/";$path_include="../comun/";?>
<?php include("../../modelo/Conexion.Class.php"); 
$admin =new Conexion();
$admin->verificar_sesion_admin();
$admin->conectar();
?>
<?php include($path_include."top.php"); 
if(isset($_SESSION['admin'])){?>
	<body onLoad="MostrarConsulta('../comun/registro_horario.php');">
         
			<?php $pag="principal_admin"; include($path_include."menu.php"); ?>
		    <?php include($path_include."iniciar_main.php"); ?>
                
                
               
               
               <center><div id="resultado" style="float:right;width:120px;"></div></center>
               
              <div class="row">
						<div class="3u">
						
							
							
								
									<h3 style="margin-left:24%;">Opciones</h3>
									
										<?php include($path_include."menuV_admin.php"); ?>
									
								

							
						
						</div>
						<div class="9u skel-cell-mainContent">
					
							<!-- Content -->

								<article class="first">
								
									<h2><?php if (isset($_SESSION['admin'])) echo "Bienvenido:&nbsp;&nbsp;&nbsp;" . strtoupper($_SESSION['nombre_1']) . " ". strtoupper($_SESSION['apellido_1']) ."."; ?></h2>

									<p>
                                   		<div id="resultado2" style="margin-left:20%;"></div>
                                        <div id="resultado3" style="margin-top:-80px;width:82%;text-align:center;"></div>
                                    </p>
                                    <p>
                                    <div id="resultado5" style="margin-left:20%;text-align:center;"></div>
                                    </p>

								</article>							

						</div>
					</div>
                    <br> <br> <br>

				
	
			<?php include($path_include."final_main.php"); 
}?>

	</body>		<?php include($path_include."pie.php"); ?>
</html>
