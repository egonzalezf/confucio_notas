<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<form method="post" name="est" onSubmit="MostrarConsulta('../../controlador/Administrador.php?peticion=8'+'&seccion='+document.getElementById('seccion').value+'&nacionalidad='+document.getElementById('nacionalidad').value+'&cedula='+document.getElementById('cedula').value+'&nombre1='+document.getElementById('nombre1').value+'&nombre2='+document.getElementById('nombre2').value+'&apellido1='+document.getElementById('apellido1').value+'&apellido2='+document.getElementById('apellido2').value+'&telefono1='+document.getElementById('telefono1').value+'&telefono2='+document.getElementById('telefono2').value+'&direccion='+document.getElementById('direccion').value+'&lugar='+document.getElementById('lugar').value+'&cargo='+document.getElementById('cargo').value+'&year='+document.getElementById('year').value+'&mes='+document.getElementById('mes').value+'&dia='+document.getElementById('dia').value+'&correo='+document.getElementById('correo').value); return false">
<div style="text-align(*): right;"></div>
<table class="registrar-est" style="text-align(*): left; width(*): 615px; padding(*):10px;" border="0"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align(*): top; width(*): 425px;"><h2>Registrar Estudiante</h2>
</td>
</tr>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align(*): top; width(*): 425px;"><div id="resultado3"></div>
</td>
</tr>
<tr>
<td style="vertical-align(*): top; text-align(*): right;">Sección(*):<br>
</td>
<td style="vertical-align(*): top;">
<select name="seccion" id="seccion" required x-moz-errormessage="Seleccione una opción" style="width(*):100px" onchange="MostrarConsulta('../../controlador/Administrador.php?peticion=7&seccion='+document.getElementById('seccion').value);">
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
<div id="horario"></div>
</td>
</tr>

<tr>
<td
style="vertical-align(*): top; text-align(*): right; width(*): 170px;">Nacionalidad(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="nacionalidad" id="nacionalidad"s required x-moz-errormessage="Seleccione una opción" style="width(*):100px">
<option selected="selected"></option>
<option value="v">Venezolano</option>
<option value="e">Extranjero</option>
</select>
<br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 190px; text-align(*): right;">Cédula(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="8" name="cedula"  id="cedula" placeholder="Numeros Enteros." pattern="[0-9]{0,8}" required><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Primer
Nombre(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="20" name="nombre1" id="nombre1" placeholder="Solo letras." pattern="[A-Z{ }a-záéíóúAÉÍÓÚÑñ]{1,20}" required><br><!--^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$-->
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Segundo
Nombre(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="20" name="nombre2" id="nombre2" placeholder="Solo letras." pattern="[A-Z{ }a-záéíóúAÉÍÓÚÑñ]{1,20}"><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Primer
Apellido(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="20" name="apellido1" id="apellido1" placeholder="Solo letras." pattern="[A-Z{ }a-záéíóúAÉÍÓÚÑñ]{1,20}" required><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Segundo
Apellido(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="20" name="apellido2" id="apellido2" placeholder="Solo letras." pattern="[A-Z{ }a-záéíóúAÉÍÓÚÑñ]{1,20}"><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Primer
Teléfono(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="11" name="telefono1" id="telefono1" placeholder="solo numeros." pattern="[0-9]{11,11}" required><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Segundo
Teléfono(*):</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="11" name="telefono2" id="telefono2" placeholder="solo numeros." pattern="[0-9]{11,11}"><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Dirección(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><textarea
wrap="hard" cols="50" rows="3" name="direccion" id="direccion" placeholder="Obligatorio." required></textarea><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Lugar de
trabajo(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="100" name="lugar" id="lugar" placeholder="Obligatorio." required><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Cargo(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="100" name="cargo" id="cargo" placeholder="Obligatorio." required><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Fecha de
nacimiento(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<input type="text" maxlength="2" size="2" name="dia" id="dia" placeholder="dia" required>
<input type="text" maxlength="2" size="2" name="mes" id="mes" placeholder="mes" required>
<input type="text" maxlength="4" size="4" name="year" id="year" placeholder="año" required></td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Correo(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input type="email"
maxlength="100" name="correo" id="correo" placeholder="obligatorio." required><br>
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