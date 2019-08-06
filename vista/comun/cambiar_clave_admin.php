<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<form style="width: 801px;" method="post" onSubmit="MostrarConsulta('../../controlador/Administrador.php?peticion=4'+'&clavea='+document.getElementById('antigua').value+'&claven='+document.getElementById('nueva').value+'&clavern='+document.getElementById('renueva').value); return false">
<div style="text-align: center;"></div>
<table style="text-align: left; width: 333px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 233px;"><h3>Cambiar clave</h3>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 221px;">Clave
antigua:&nbsp;<br>
</td>
<td style="vertical-align: top; width: 233px;"><input
maxlength="20" id="antigua" name="antigua" type="password" required><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 221px;">Clave
nueva:&nbsp;<br>
</td>
<td style="vertical-align: top; width: 233px;"><input
maxlength="20" id="nueva" name="nueva" type="password" required><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 221px;">Reingrese
clave:&nbsp;<br>
</td>
<td style="vertical-align: top; width: 233px;"><input
maxlength="20" id="renueva" name="renueva" type="password" required><br>
</td>
</tr>
<tr>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 233px;"><h3><input type="submit" name="Enviar" value="Enviar"></h3><br>
</td>
</tr>
</tbody>
</table>
<br>
</form>
<?php } ?>