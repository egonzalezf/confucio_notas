<?php $path="../../src/";$path_include="../comun/";?>
<?php include("../../modelo/Conexion.Class.php"); 
$admin =new Conexion();
$admin->verificar_sesion_profesor();
$admin->conectar();
?>
<?php include($path_include."top.php");
if(isset($_SESSION['prof'])){
	 ?>
	<body onLoad="MostrarConsulta('../comun/consultar_seccion_p.php');">
         
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
								
									<h2><?php if(isset($_SESSION['prof'])) echo "Bienvenido:&nbsp;&nbsp;&nbsp;".strtoupper($_SESSION['prof'])."."; ?></h2>

									<p>
                                   		<div id="resultado2" style="margin-left:10%;"></div>
                                        <div id="resultado3" style="margin-top:-80px;width:82%;text-align:center;"></div>
                                    </p>
                                    <p>
                                    <div id="resultado5" style="margin-left:10%;text-align:center;"></div>
                                    </p>

								</article>							

						</div>
					</div>
                    <br> <br> <br>
               

				
			<?php include($path_include."pie.php"); ?>
			<?php include($path_include."final_main.php"); 			
}?>
            

	</body>
</html>