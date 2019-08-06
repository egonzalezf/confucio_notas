<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<div style="text-align: right;"></div>
<table style="text-align: left; width: 600px; padding:10px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 425px;"><h2>Editar secci&oacute;n</h2>
</td>
</tr>
<td style="vertical-align: top; text-align: center;">Sección:

<select name="cod_seccion" id="cod_seccion" required x-moz-errormessage="Seleccione una opción" style="width:250px">
<option selected="selected"></option>
<?php
include("../../modelo/AdministradorModel.Class.php");
$objeto=new AdministradorModelo();
$objeto->obtener_seccion_nivel_todas(1);
$objeto->obtener_seccion_nivel_todas(2);
$objeto->obtener_seccion_nivel_todas(3);
$objeto->obtener_seccion_nivel_todas(4);
$objeto->obtener_seccion_nivel_todas(5);
$objeto->desconectar();
?>
</select>
<br /><br />
<input type="submit" onclick="MostrarConsulta('../../controlador/Administrador.php?peticion=35&cod_seccion='+document.getElementById('cod_seccion').value);" value="Consultar" />
</td>
</tr>
</tbody>
</table>
<center><div id="horario" style="margin-left:-130px;"></div></center>
<center><div id="est" style="margin-left:-300px;"></div></center>
<br>
<?php } ?>
