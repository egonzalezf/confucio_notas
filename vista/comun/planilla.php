<?php if (!isset($_SESSION)) session_start(); if (isset($_SESSION['admin']) || isset($_SESSION['prof'])){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Planilla de control de asistencias</title>

	<style>
		
		.oficio{
	height: 21,59cm;
	width: 35,56cm;
	border: #333 1px solid;
	font-family: "Arial", Times, serif;
	font-size: 10px;
}
		.oficio tr{
	border: #333 1px solid;
	font-family: "Arial", Times, serif;
}
	
	.oficio {
	font-size: 10px;
	font-family: "Arial", Times, serif;
	text-align: center;
}
    .oficio tr td div {
	font-weight: bold;
	font-family: "Arial", Times, serif;
	font-size: 14px;
}
    .oficio tr td {
	font-family: "Arial", Times, serif;
	font-size: 12px;
}
.p2{font-size:12px; font-weight:bold; text-align:left;line-height:20px;}
.p3{font-size:12px; font-weight:bold; text-align:right;line-height:20px;}
    </style>

</head>
<body>
<center>
<?php
if(isset($_GET['seccion']) && $_GET['seccion']!=""){
$seccion=$_GET['seccion'];
include("../../modelo/Conexion.Class.php");
$objeto=new Conexion();
$objeto->conectar();
$sql="select * from seccion where cod_seccion='".$seccion."'";
$resultado=pg_query($sql);
$datos_seccion=pg_fetch_array($resultado);
$sql="select * from profesor where cod_profesor='".$datos_seccion['cod_profesor']."'";
$resultado=pg_query($sql);
$datos_profesor=pg_fetch_array($resultado);
$sql="select * from horario where cod_seccion='".$seccion."'";
$resultado=pg_query($sql);
$resultado_dias=pg_query($sql);
$resultado_horas=pg_query($sql);

$ban=0;
if($datos_profesor['nombre_1']=="" || $datos_profesor['apellido_1']=="" || $datos_profesor['apellido_1']==""){
	$ban=1;
}

?>
<table width="1124" class="" border="0">
	<tr>
	  <td width="44"><img src="../../src/images/ubv14.png" width="80" height="64" alt="ubv" /></td>
	  <td colspan="17"><p class="p2">Rep&uacute;blica Bolivariana de Venezuela<br />
	    Instituto Confucio de la Universisdad Bolivariana de Venezuela Sede Caracas<br />
	    Docente: <u><?php 
				if($ban!=1)echo  strtoupper($datos_profesor['nombre_1']." ".$datos_profesor['apellido_1']); 
				else echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
					?></u>.
        C.I:<u><?php if($ban!=1) echo $datos_profesor['cedula_prof']; 
					 else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></u>. <br /> 
        
        Secci&oacute;n: <u><?php echo strtoupper($datos_seccion['cod_seccion']); ?></u>. 
        
        <u>Aula(s):
        
        <?php
			$ban=0;
			while($datos_horario=pg_fetch_array($resultado)){
				echo $datos_horario['aula'];
				if($ban==0)echo" / ";
				$ban=1;
			}
			if($ban!=1)echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		?>
        </u>.
        <br />
        
        D&iacute;as:<u>
        <?php 
		    $ban=0;
			while($datos_horario=pg_fetch_array($resultado_dias)){
				echo $datos_horario['dia'];
				if($ban==0)echo" / ";
				$ban=1;
			}
	     ?>	
         </u>.
      Horario:<u>
        <?php 
		    $ban=0;
			while($datos_horario=pg_fetch_array($resultado_horas)){
				echo $datos_horario['hora_inicio']."<->".$datos_horario['hora_fin'];
				if($ban==0)echo" / ";
				$ban=1;
			}
	     ?>	
         </u>.
      </p></td>
	  
	  <td colspan="19">
	    <img src="../../src/images/logo_confucio_verde.png" width="85" height="85" alt="ubv" />
      </td>
  </tr>
	<tr>
	  <td height="19" colspan="38"><p align="right">Estudiantes en <span style="color:#F00;">ROJO</span>,  no estan validados.</p></td>
  </tr>
	<tr>
	  <td height="19" colspan="38"><p align="center"><strong>REGISTRO DE ASISTENCIAS</strong>&nbsp;&nbsp; </p></td>
  </tr>
</table>


  </tr>
  
  <?php
  		$sql="select * from inscripcion where cod_seccion='".$datos_seccion['cod_seccion']."' and activo='a'";
		$resultado_ins=pg_query($sql);
		$con=0;
		$i=0;
		$sql="select count(*) from inscripcion where cod_seccion='".$datos_seccion['cod_seccion']."' and activo='a'";
		$resultado_ins_count=pg_query($sql);
		$datos_ins_count=pg_fetch_array($resultado_ins_count);
		$total_ins=$datos_ins_count[0];
		$resto=$total_ins%10;
		
		if($total_ins<=10){
			$heigth=$total_ins*45;
		}else{
			$heigth=450;
		}
		
			echo '
			<table width="1124" class="oficio" border="1" height="'.$heigth.'">
	<tr>
	  <td colspan="4">Datos Generales</td>
	  <td colspan="6">&nbsp;</td>
	  <td colspan="6">&nbsp;</td>
	  <td colspan="6">&nbsp;</td>
	  <td colspan="6">&nbsp;</td>
	  <td colspan="6">&nbsp;</td>
	  <td width="82"><p align="center">Comprobante/Total de Asistencias</p></td>
  </tr>
	<tr>
	  <td width="43">Apellido</td>
	  <td width="41">Nombre</td>
	  <td width="36">C&eacute;dula</td>
	  <td width="42">Telefono</td>
	  <td width="18">&nbsp;&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp; </td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td>&nbsp;</td>
			';
			
	
		
		  while($datos_inscripcion=pg_fetch_array($resultado_ins)){
			 $sql="select * from estudiante where cod_estudiante='".$datos_inscripcion['cod_estudiante']."'";
			 $resultado_est=pg_query($sql); 
			 $datos_est=pg_fetch_array($resultado_est);
			 
			if($con<10){echo '
			<tr>';
			if($datos_inscripcion['estado']=="s"){
				echo'
	  <td width="43" style="color:#F00;">'.$datos_est['apellido_1'].'</td>
	  <td width="41" style="color:#F00;">'.$datos_est['nombre_1'].'</td>
	  <td width="36" style="color:#F00;">'."  ".strtoupper($datos_est['nacionalidad']).$datos_est['cedula_est']."  ".'</td>
	  <td width="42" style="color:#F00;">'.$datos_est['telefono_1'].'</td>';
	  
			}else{
				echo'
	  <td width="43">'.$datos_est['apellido_1'].'</td>
	  <td width="41">'.$datos_est['nombre_1'].'</td>
	  <td width="36">'."  ".strtoupper($datos_est['nacionalidad']).$datos_est['cedula_est']."  ".'</td>
	  <td width="42">'.$datos_est['telefono_1'].'</td>';
			}
	  echo '
	 
	  <td width="18">&nbsp;&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp; </td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
			'; }
			
			if($con==10){
		
			if(($total_ins-$i)<10) $heigth=($total_ins-$i)*45; else $heigth=450;
		
				echo "</table><br><br><br>";
								
				/////
				$sql="select * from seccion where cod_seccion='".$seccion."'";
$resultado=pg_query($sql);
$datos_seccion=pg_fetch_array($resultado);
$sql="select * from profesor where cod_profesor='".$datos_seccion['cod_profesor']."'";
$resultado=pg_query($sql);
$datos_profesor=pg_fetch_array($resultado);
$sql="select * from horario where cod_seccion='".$seccion."'";
$resultado=pg_query($sql);
$resultado_dias=pg_query($sql);
$resultado_horas=pg_query($sql);

$ban=0;
if($datos_profesor['nombre_1']=="" || $datos_profesor['apellido_1']=="" || $datos_profesor['apellido_1']==""){
	$ban=1;
}
				
				?>

                
                <table width="1124" class="" border="0">
	<tr>
	  <td width="44"><img src="../../src/images/logo_ubv.jpg" width="80" height="64" alt="ubv" /></td>
	  <td colspan="17"><p class="p2">Rep&uacute;blica Bolivariana de Venezuela<br />
	    Centro de Idiomas - Sede Caracas<br />
	    Docente: <u><?php 
				if($ban!=1)echo  strtoupper($datos_profesor['nombre_1']." ".$datos_profesor['apellido_1']); 
				else echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
					?></u>.
        C.I:<u><?php if($ban!=1) echo $datos_profesor['cedula_prof']; 
					 else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></u>.  <br /> 
        
        Secci&oacute;n: <u><?php echo strtoupper($datos_seccion['cod_seccion']); ?></u>. 
        
        <u>Aula(s):
        
        <?php
			$ban=0;
			while($datos_horario=pg_fetch_array($resultado)){
				echo $datos_horario['aula'];
				if($ban==0)echo" / ";
				$ban=1;
			}
			if($ban!=1)echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		?>
        </u>.
        <br />
        
        D&iacute;as:<u>
        <?php 
		    $ban=0;
			while($datos_horario=pg_fetch_array($resultado_dias)){
				echo $datos_horario['dia'];
				if($ban==0)echo" / ";
				$ban=1;
			}
	     ?>	
         </u>.
      Horario:<u>
        <?php 
		    $ban=0;
			while($datos_horario=pg_fetch_array($resultado_horas)){
				echo $datos_horario['hora_inicio']."<->".$datos_horario['hora_fin'];
				if($ban==0)echo" / ";
				$ban=1;
			}
	     ?>	
         </u>.
      </p></td>
	  <td colspan="19"><p class="p3">Tramo:___________<br />
      Estudiantes UBV:_____ Aldea:_____Comunidad:______<br />
      Al finalizar el tramo 2014-II - Estudiantes UBV:_____Aldea: _____Comunidad:______</p>
      <div style="float:right;">
      Estudiantes en <span style="color:#F00;">ROJO</span>,  no estan validados.
      </div>
      </td>
      
      <td><img src="../../src/images/ROSA-luxemburgo-logo.png" width="85" height="85" alt="ubv" /></td>
      
  </tr>
	
	<tr>
	  <td height="19" colspan="38"><p align="center"><strong>REGISTRO DE ASISTENCIAS</strong>&nbsp;&nbsp; </p></td>
  </tr>
</table>
<table width="1124" class="oficio" border="1" height="<?php echo $heigth; ?>">
	<tr>
	  <td colspan="7">Datos Generales</td>
	  <td colspan="6">&nbsp;</td>
	  <td colspan="6">&nbsp;</td>
	  <td colspan="6">&nbsp;</td>
	  <td colspan="6">&nbsp;</td>
	  <td colspan="6">&nbsp;</td>
	  <td width="82"><p align="center">Comprobante/Total de Asistencias</p></td>
  </tr>
	<tr>
	  <td width="43">Apellido</td>
	  <td width="41">Nombre</td>
	  <td width="36">C&eacute;dula</td>
	  <td width="42">Telefono</td>
	  <td width="19">com</td>
	  <td width="28">UBV-PFG</td>
	  <td width="25"><p>M.S-PFG</p></td>
	  <td width="18">&nbsp;&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp; </td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>


		<?php
		
		echo '
			<tr>';
			if($datos_inscripcion['estado']=="s"){
				echo'
	  <td width="43" style="color:#F00;">'.$datos_est['apellido_1'].'</td>
	  <td width="41" style="color:#F00;">'.$datos_est['nombre_1'].'</td>
	  <td width="36" style="color:#F00;">'."  ".strtoupper($datos_est['nacionalidad']).$datos_est['cedula_est']."  ".'</td>
	  <td width="42" style="color:#F00;">'.$datos_est['telefono_1'].'</td>';
	  
			}else{
				echo'
	  <td width="43">'.$datos_est['apellido_1'].'</td>
	  <td width="41">'.$datos_est['nombre_1'].'</td>
	  <td width="36">'."  ".strtoupper($datos_est['nacionalidad']).$datos_est['cedula_est']."  ".'</td>
	  <td width="42">'.$datos_est['telefono_1'].'</td>';
			}
	  echo '
	  <td width="19"></td>
	  <td width="28"></td>
	  <td width="25"></td>
	  <td width="18">&nbsp;&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp; </td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td width="18">&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
			';
				
				
			$con=0;
			}//if con==10
			
			$con++;
			$i++;
	
		  }
		  
		  $objeto->desconectar();
}
		  
  ?>
  
	</table>
   
</center>
</body>
</html>
<?php } ?>