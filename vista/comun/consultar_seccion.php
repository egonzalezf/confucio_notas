<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<div style="text-align: right;"></div>
<table style="text-align: left; width: 600px; padding:10px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 425px;"><h2>Consultar secci&oacute;n</h2>
</td>
</tr>
<td style="vertical-align: top; text-align: center;">Sección
<select id="estado" name="estado" onchange="MostrarConsulta('../../controlador/Administrador.php?peticion=13&seccion='+document.getElementById('seccion').value+'&estado='+document.getElementById('estado').value);">
<option value="t">Todos (validados y no validados)</option>
<option value="v">Validados</option>
<option value="s">No validados</option>
</select>
<select name="seccion" id="seccion" required x-moz-errormessage="Seleccione una opción" style="width:250px" onchange="MostrarConsulta('../../controlador/Administrador.php?peticion=13&seccion='+document.getElementById('seccion').value+'&estado='+document.getElementById('estado').value);">
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
<input value="" name="seccion2" id="seccion2" type="text" size="30" style="text-align:center;" placeholder="Ingrese nombre de secci&oacute;n" onkeyup="MostrarConsulta('../../controlador/Administrador.php?peticion=13&seccion='+document.getElementById('seccion2').value+'&estado='+document.getElementById('estado').value);"/>

</td>
</tr>
</tbody>
</table>
<center><div id="horario" style="margin-left:-130px;"></div></center>
<center><div id="est" style="margin-left:-300px;"></div></center>
<br>
<?php } ?>