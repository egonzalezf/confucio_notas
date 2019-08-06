<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<form method="post" name="est" onSubmit="MostrarConsulta('../../controlador/Administrador.php?peticion=19'+'&cod_idioma='+document.getElementById('cod_idioma').value+'&idioma='+document.getElementById('idioma').value+'&niveles='+document.getElementById('niveles').value); return false">
<div style="text-align(*): right;"></div>
<table class="table-respuesta datos" style="text-align(*): left; width(*): 615px; padding(*):10px;" border="0"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align(*): top; width(*): 425px;"><h2>Registrar idioma</h2>
</td>
</tr>

<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Cod de idioma(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="20" name="cod_idioma" id="cod_idioma" placeholder="Solo letras." pattern="[A-Z{ }a-záéíóúAÉÍÓÚÑñ]{1,20}" required><br><!--^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$-->
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">Idioma(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;"><input
maxlength="20" name="idioma" id="idioma" placeholder="Solo letras." pattern="[A-Z{ }a-záéíóúAÉÍÓÚÑñ]{1,20}" required><br>
</td>
</tr>
<tr>
<td
style="vertical-align(*): top; width(*): 170px; text-align(*): right;">cantidad de niveles(*):<br>
</td>
<td style="vertical-align(*): top; width(*): 425px;">
<select name="niveles" id="niveles" required x-moz-errormessage="Seleccione una opción" style="width(*):100px">
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