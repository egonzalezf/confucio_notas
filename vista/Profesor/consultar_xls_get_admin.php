<?php include("../../modelo/Conexion.Class.php"); 
$admin = new Conexion();
$admin->verificar_sesion_profesor();
if(isset($_SESSION['cod_user'])){
	$admin->conectar();
?>
<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=Reporte.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="application/vnd.ms-excel;" />
</head>
<body>
<TABLE BORDER="1" align="center" CELLPADDING="1" CELLSPACING="1">
<TR>
<TD colspan="3" style="background:#399;color:#fff;font-weight:bold;">Centro de idiomas Rosa Luxemburgo</TD>
<TD colspan="2" style="background:#399;color:#fff;font-weight:bold;">Secci&oacute;n: <?php echo $_GET['seccion']; ?></TD>
</TR>
<TR>
<TD style="background:#399;color:#fff;font-weight:bold;">N&deg;</TD>
<TD style="background:#399;color:#fff;font-weight:bold;">C&eacute;dula</TD>
<TD style="background:#399;color:#fff;font-weight:bold;">Nombres</TD>
<TD style="background:#399;color:#fff;font-weight:bold;">Apellidos</TD>
<TD style="background:#399;color:#fff;font-weight:bold;">Tel&eacute;fono</TD>
</TR>
<?php

$resultado1=pg_query("SELECT * from inscripcion where cod_seccion='".$_GET['seccion']."' and estado='v' and activo='a'");
if($resultado1 === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
$i=0;
while($datos1=pg_fetch_array($resultado1) ){
$i++;
$resultado=pg_query("SELECT nacionalidad, cedula_est, nombre_1, nombre_2, apellido_1, apellido_2, telefono_1 from estudiante where cod_estudiante='".$datos1['cod_estudiante']."'");
if($resultado === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
if($datos=pg_fetch_array($resultado) ){
echo "<TR>
<TD style='background:#399;color:#fff;font-weight:bold;'>".$i."</TD>
<TD>".strtoupper($datos['nacionalidad']).$datos['cedula_est']."</TD>
<TD>".utf8_decode($datos['nombre_1']." ".$datos['nombre_2'])."</TD>
<TD>".utf8_decode($datos['apellido_1']." ".$datos['apellido_2'])."</TD>
<TD>".$datos['telefono_1']."</TD>
</TR>";
}

}

$admin->desconectar();
?>
</table>
</body>
</html>
<?php } ?>
 