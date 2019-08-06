<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<div style="text-align: right;"></div>
<table style="text-align: left; width: 600px; padding:10px;" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1" style="vertical-align: top; width: 425px;"><h2>Consultar estad&iacute;sticas</h2>
</td>
</tr>
<td style="vertical-align: top; text-align: center;">Gr&aacute;ficas
<select id="item" name="item" onchange="MostrarConsulta(document.getElementById('item').value); document.getElementById('enlace-descarga').innerHTML='<a href='+document.getElementById('item').value+' target=_blank>Accede, Imprime y guarda como pdf</a>';">
<option value="">Seleccione un item</option>
<option value="../comun/total_inscritos_estadistica_admin.php">Inscritos validados y no validados</option>
<option value="../comun/total_inscritos_validados_estadistica_admin.php">Inscritos validados</option>
<option value="../comun/total_inscritos_no_validados_estadistica_admin.php">Inscritos no validados</option>
<option value="../comun/total_inscritos_por_idioma.php">Inscritos validados y no validados por idiomas</option>
<option value="../comun/total_inscritos_por_idioma_validados.php">Inscritos validados por idiomas</option>
<option value="../comun/total_inscritos_por_idioma_no_validados.php">Inscritos no validados por idiomas</option>
<option value="../comun/total_inscritos_por_nivel.php">Inscritos validados y no validados por nivel</option>
<option value="../comun/total_inscritos_por_nivel_validados.php">Inscritos validados por nivel</option>
<option value="../comun/total_inscritos_por_nivel_no_validados.php">Inscritos no validados por nivel</option>
<option value="../comun/promedio_nota_inscritos.php">Promedio de notas por secci&oacute;n</option>
<option value="../comun/reprobados_y_aprobados.php">Total de Aprobados y Reprobados</option>
<option value="../comun/reprobados_y_aprobados_por_idioma.php">Aprobados y Reprobados por idioma</option>
</select>
<br />
<div id="enlace-descarga">Accede e imprime, podras guardar como pdf</div>
</td>
</tr>
</tbody>
</table>
<center><div id="horario" style="margin-left:-130px;"></div></center>
<center><div id="est" style="margin-left:-300px;"></div></center>
<br>
<?php } ?>