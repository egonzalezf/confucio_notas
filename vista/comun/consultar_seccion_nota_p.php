<?php if (!isset($_SESSION['prof'])) session_start(); if (isset($_SESSION['prof'])){ ?>
<div style="text-align: right;"></div>
<table style="text-align: left; margin-left:-10%; width: 400px; padding:10px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 325px;"><h2>Consultar secci&oacute;n</h2>
</td>
</tr>
<td style="vertical-align: top; text-align: center;">Sección:

<select name="seccion" id="seccion" required x-moz-errormessage="Seleccione una opción" style="width:100px" onchange="MostrarConsulta('../../controlador/Profesor.php?peticion=41&seccion='+document.getElementById('seccion').value);">
<option selected="selected"></option>
<?php
include("../../modelo/ProfesorModel.Class.php");
$objeto=new ProfesorModelo();
$objeto->obtener_seccion_cuenta($_SESSION['cod_profesor']);
$objeto->desconectar();
?>
</select>

</td>
</tr>
</tbody>
</table>
<center><div id="horario" style="margin-left:-130px;"></div></center>
<center><div id="est" style="margin-left:-300px;"></div></center>
<br>
<?php } ?>