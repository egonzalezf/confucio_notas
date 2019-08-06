<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<form method="post" name="est" onSubmit="MostrarConsulta('../../controlador/Administrador.php?peticion=37'+'&cod_seccion='+document.getElementById('seccion').value+'&dia='+document.getElementById('dia').value+'&turno='+document.getElementById('turno').value+'&horae='+document.getElementById('horai').value+':'+document.getElementById('minutoi').value+'&horas='+document.getElementById('horaf').value+':'+document.getElementById('minutof').value+'&aula='+document.getElementById('piso').value+document.getElementById('letra').value); return false">
<div style="text-align(*): right;"></div>
<table class="datos" style="text-align(*): left; width(*): 615px; padding(*):10px;" border="0"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align(*): top; width(*): 425px;"><h2>Registrar horario</h2>
</td>
</tr>

<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Cod de secci&oacute;n(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">

<select name="seccion" id="seccion" required x-moz-errormessage="Seleccione una opción" style="width:100px">
<option selected="selected"></option>
<?php
include("../../modelo/AdministradorModel.Class.php");
$objeto=new AdministradorModelo();
$objeto->obtener_seccion();
$objeto->desconectar();
?>
</select>

<br><!--^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$-->
</td>
</tr>


<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">D&iacute;a(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">

<select name="dia" id="dia" required x-moz-errormessage="Seleccione una opción" style="width(*):100px">
<option selected="selected"></option>
<option value="lunes">lunes</option>
<option value="martes">martes</option>
<option value="miercoles">miercoles</option>
<option value="jueves">jueves</option>
<option value="viernes">viernes</option>
<option value="sabado">sabado</option>
</select>

<br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Turno(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="turno" id="turno" required x-moz-errormessage="Seleccione una opción" style="width(*):100px">
<option selected="selected"></option>
<option value="matutino">matutino</option>
<option value="vespertino">vespertino</option>
<option value="nocturno">nocturno</option>
</select>
<br>
</td>
</tr>


<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Hora entrada(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="horai" id="horai" required x-moz-errormessage="Seleccione una opción" style="width:40px; ">
<option selected="selected"></option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>
:
<select name="minutoi" id="minutoi" required x-moz-errormessage="Seleccione una opción" style="width:40px; ">
<option selected="selected"></option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
<option value="00">00</option>
</select>
<br>
</td>
</tr>


<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Hora final(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="horaf" id="horaf" required x-moz-errormessage="Seleccione una opción" style="width:40px; ">
<option selected="selected"></option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>
:
<select name="minutof" id="minutof" required x-moz-errormessage="Seleccione una opción" style="width:40px; ">
<option selected="selected"></option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
<option value="00">00</option>
</select>
<br>
</td>
</tr>



<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Aula(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="piso" id="piso" required x-moz-errormessage="Seleccione una opción" style="width:40px; ">
<option selected="selected"></option>
<?php 
for($i=2;$i<10;$i++) echo '<option value="'.$i.'">'.$i.'</option>';
?>
</select>
<select name="letra" id="letra" required x-moz-errormessage="Seleccione una opción" style="width:40px; ">
<option selected="selected"></option>
<option value='"A"'>A</option>
<option value='"B"'>B</option>
<option value='"C"'>C</option>
<option value='"D"'>D</option>
<option value='"E"'>E</option>
<option value='"F"'>F</option>
<option value='"G"'>G</option>
<option value='"H"'>H</option>
<option value='"I"'>I</option>
<option value='"J"'>J</option>
<option value='"K"'>K</option>
<option value='"L"'>L</option>
<option value='"M"'>M</option>
<option value='"N"'>N</option>
<option value='"Ñ"'>Ñ</option>
<option value='"O"'>O</option>
<option value='"P"'>P</option>
<option value='"Q"'>Q</option>
<option value='"R"'>R</option>
<option value='"S"'>S</option>
<option value='"T"'>T</option>
<option value='"U"'>U</option>
<option value='"V"'>V</option>
<option value='"W"'>W</option>
<option value='"X"'>X</option>
<option value='"Y"'>Y</option>
<option value='"Z"'>Z</option>

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