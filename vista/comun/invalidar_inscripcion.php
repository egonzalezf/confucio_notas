<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<div style="text-align: right;"></div>
<table style="text-align: left; width: 615px; padding:10px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 425px;"><h2>Invalidar Inscripci&oacute;n</h2>
</td>
</tr>
<td style="vertical-align: top; text-align: right;">Sección:<br>
</td>
<td style="vertical-align: top;">
<select name="seccion" id="seccion" required x-moz-errormessage="Seleccione una opción" style="width:100px" onchange="MostrarConsulta('../../controlador/Administrador.php?peticion=11&seccion='+document.getElementById('seccion').value);">
<option selected="selected"></option>
<?php
include("../../modelo/AdministradorModel.Class.php");
$objeto=new AdministradorModelo();
$objeto->obtener_seccion_nivel(1);
$objeto->obtener_seccion_nivel(2);
$objeto->obtener_seccion_nivel(3);
$objeto->obtener_seccion_nivel(4);
$objeto->obtener_seccion_nivel(5);
$objeto->desconectar();
?>
</select>

</td>
</tr>
<tr>
<td
style="vertical-align: top; width: 190px; text-align: right;">Cédula:<br>
</td>
<td style="vertical-align: bottom; width: 425px;"> 
<div id="horario"></div>
</td>
</tr>

<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 425px;"><button onclick="MostrarConsulta('../../controlador/Administrador.php?peticion=12'+'&seccion='+document.getElementById('seccion').value+'&cedula_est='+document.getElementById('cedula_est').value); return false;">Enviar</button><br>

<?php
if(isset($_POST['cedula_est']))echo $_POST['cedula_est'];
?>
</td>
</tr>
</tbody>
</table>
<br>
<?php } ?>