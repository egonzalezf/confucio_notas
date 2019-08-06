<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<div style="text-align: right;"></div>
<table style="text-align: left; width: 600px; padding:10px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; width: 425px;"><h2>Consultar Profesor</h2>
</td>
</tr>
<td style="vertical-align: top; text-align: center;">
<?php
include("../../modelo/AdministradorModel.Class.php");
$objeto=new AdministradorModelo();
$objeto->obtener_profesor_todos_para_form();
$objeto->desconectar();
?>
</td>
</tr>
</tbody>
</table>
<center><div id="horario" style="margin-left:-130px;"></div></center>
<center><div id="est" style="margin-left:-300px;"></div></center>
<br>
<?php } ?>