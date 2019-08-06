<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<div style="text-align: right;"></div>
<table style="text-align: left; width: 400px; padding:10px;" border="2"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="3" rowspan="1"
style="vertical-align: top; width: 425px;"><h2>Editar inscripci&oacute;n</h2>
</td>
</tr>



<?php 
if(isset($_GET['cod_inscripcion']) && $_GET['cod_inscripcion']!=""){
	
echo '<tr>
<td
style="vertical-align: top; text-align: right; width: 170px;">Inscripcion N&deg;:<br>
</td>
<td style="vertical-align: top; width: 60px; text-align:center;">'.$_GET['cod_inscripcion'].'
<br>
</td>
<td style="vertical-align: top; text-align: left; width: 50px;">
</td>
</tr>';
  
  
  include("../../modelo/AdministradorModel.Class.php");
$objeto=new AdministradorModelo();
$datos=$objeto->obtener_datos_inscripcion($_GET['cod_inscripcion']);
$objeto->desconectar();

   
   echo '<tr>
<td
style="vertical-align: top; text-align: right; width: 170px;">Deposito:<br>
</td>
<td style="vertical-align: top; width: 60px;">
<input name="deposito" id="deposito" type="text" maxlength="15" value="'.$datos['deposito'].'">
<br>
</td>
<td style="vertical-align: top; text-align: left; width: 0px;">';

$salida='<button '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=40&cod_inscripcion=".$_GET['cod_inscripcion']."&deposito='+document.getElementById('deposito').value)".'"'.'>Editar</button>';
echo $salida;

echo'</td>
</tr>'; 
	
	
	
echo '<tr>
<td
style="vertical-align: top; text-align: right; width: 170px;">Estado:<br>
</td>
<td style="vertical-align: top; width: 60px;">';

if($datos['estado']=="s")echo "sin validar";
if($datos['estado']=="v")echo "validado";

echo '<br>
</td>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=14&cedula_est="."cedula_est"."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_est'].'</a><br>
</td>
</tr>';

}else{
	
}
?>






</tbody>
</table>
<center><div id="horario" style="margin-left:-130px;"></div></center>
<center><div id="est" style="margin-left:-300px;"></div></center>
<br>
<?php } ?>