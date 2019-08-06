<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<form method="post" name="est" onSubmit="MostrarConsulta('../../controlador/Administrador.php?peticion=43'+'&cod_seccion='+document.getElementById('cod_seccion').value+'&cedula_est='+document.getElementById('cedula').value); return false">
<div style="text-align(*): right;"></div>
<table style="text-align(*): left; width(*): 615px; padding(*):10px;" border="0"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align(*): top; width(*): 425px;"><h2>Inscribir Estudiante</h2>
</td>
</tr>



<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">C&eacute;dula(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="8" name="cedula" id="cedula" placeholder="Numeros Enteros." pattern="[0-9]{0,8}" required><br><!--^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$-->
</td>
</tr>



<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Cod de seccion(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">


<select name="cod_seccion" id="cod_seccion" required x-moz-errormessage="Seleccione una opción" style="width:250px">
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

<br><!--^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$-->
</td>
</tr>








<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align(*): top; width(*): 425px;"><button value="Enviar"
name="Enviar">Enviar</button><br>
</td>
</tr>
</tbody>
</table>
<br>
</form>
<?php } ?>