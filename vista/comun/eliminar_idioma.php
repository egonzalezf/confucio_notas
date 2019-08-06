<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<div style="text-align: right;"></div>
<table style="text-align: left; width: 300px; padding:10px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 425px;"><h2>Eliminar idioma</h2>
</td>
</tr>
<td style="vertical-align: top; text-align: center;">Idiomas:


<select name="cod_idioma" id="cod_idioma" required x-moz-errormessage="Seleccione una opción" style="width:150px">
<option selected="selected"></option>
<?php
include("../../modelo/AdministradorModel.Class.php");
$objeto=new AdministradorModelo();
$objeto->obtener_idioma();
$objeto->desconectar();
?>
</select><br><br>
<input type="submit" name="Enviar" value="Enviar" onclick="submitdata('../../controlador/Administrador.php?peticion=20'+'&cod='+document.getElementById('cod_idioma').value+'&tabla=idioma&campo=cod_idioma'); return false"


</td>
</tr>
</tbody>
</table>
<center><div id="horario" style="margin-left:-130px;"></div></center>
<center><div id="est" style="margin-left:-300px;"></div></center>
<br>
<?php } ?>