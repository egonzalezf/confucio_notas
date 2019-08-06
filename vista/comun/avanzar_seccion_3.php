<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<table style="text-align: left; width: 400px; margin-left:-10%; padding:10px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 425px;"><h2>Avanzar secci&oacute;n 3er nivel</h2>
</td>
</tr>
<td style="vertical-align: top; text-align: center;">Sección:

<select name="seccion" id="seccion" required x-moz-errormessage="Seleccione una opción" style="width:100px" onchange="MostrarConsulta('../../controlador/Administrador.php?peticion=46&seccion='+document.getElementById('seccion').value);">
<option selected="selected"></option>
<?php
include("../../modelo/AdministradorModel.Class.php");
$objeto=new AdministradorModelo();
$objeto->obtener_seccion_nivel(3);
$objeto->desconectar();
?>
</select>
a
<select name="seccion_2" id="seccion_2" required x-moz-errormessage="Seleccione una opción" style="width:100px">
<option selected="selected"></option>
<?php
$objeto->obtener_seccion_nivel(4);
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