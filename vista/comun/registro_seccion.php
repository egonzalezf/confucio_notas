<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<form method="post" name="est" onSubmit="MostrarConsulta('../../controlador/Administrador.php?peticion=34'+'&cod_seccion='+document.getElementById('cod_seccion').value+'&cod_idioma='+document.getElementById('cod_idioma').value+'&nivel='+document.getElementById('nivel').value+'&maximo_de_est='+document.getElementById('maximo_de_est').value+'&cod_profesor='+document.getElementById('cod_profesor').value+'&estado='+document.getElementById('estado').value); return false">
<div style="text-align(*): right;"></div>
<table class="datos-editar" style="text-align(*): left; width(*): 615px; padding(*):10px;" border="0"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align(*): top; width(*): 425px;"><h2>Registrar Secci&oacute;n</h2>
</td>
</tr>

<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Cod de seccion(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="10" name="cod_seccion" id="cod_seccion" placeholder="letras y numeros" pattern="[A-Z{ }a-záéíóúAÉÍÓÚÑñ0123456789]{1,10}" required><br><!--^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$-->
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Idioma(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="cod_idioma" id="cod_idioma" required x-moz-errormessage="Seleccione una opción" placeholder="Seleccione una opción" style="width(*):100px">
<option selected="selected"></option>
<?php
include("../../modelo/AdministradorModel.Class.php");
$objeto=new AdministradorModelo();
$objeto->obtener_idioma();
$objeto->desconectar();
?>
</select>
<br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Nivel(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="nivel" id="nivel" required x-moz-errormessage="Seleccione una opción" placeholder="Seleccione una opción" style="width(*):100px">
<option selected="selected"></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
<br>
</td>
</tr>

<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">M&aacute;ximo de estudiantes(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="10" name="maximo_de_est" id="maximo_de_est" placeholder="Numeros Enteros." pattern="[0-9]{0,8}" required><br><!--^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$-->
</td>
</tr>

<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Profesor(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="cod_profesor" id="cod_profesor" required x-moz-errormessage="Seleccione una opción" placeholder="Seleccione una opción" style="width(*):100px">
<option selected="selected"></option>
<?php


$objeto->obtener_profesor_lista();
$objeto->desconectar();
?>
</select>
<br>
</td>
</tr>


<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Estado(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="estado" id="estado" required x-moz-errormessage="Seleccione una opción" placeholder="Seleccione una opción" style="width(*):100px">
<option selected="selected"></option>
<option value="a">activo</option>
<option value="i">inactivo</option>
</select>
<br>
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