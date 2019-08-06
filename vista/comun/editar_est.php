<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<div style="text-align: right;"></div>
<table style="text-align: left; width: 615px; padding:10px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 425px;"><h2>Editar Estudiante</h2>
</td>
</tr>
<td style="vertical-align: top; text-align: center;">C&eacute;dula:

<input name="cedula_est" id="cedula_est" placeholder="Numeros Enteros." pattern="[0-9]{0,8}" required  maxlength="8" style="text-align:center" onkeyup="MostrarConsulta('../../controlador/Administrador.php?peticion=17&cedula_est='+document.getElementById('cedula_est').value);"><br><br>


</td>
</tr>
</tbody>
</table>
<center><div id="horario" style="margin-left:0px;"></div></center>
<center><div id="est" style="margin-left:0px;"></div></center>
<br>
<?php } ?>