<?php
include("Maestra.Class.php");

class AdministradorModelo extends ClaseMaestra{
			
	function login_model($user, $pass){
		parent::login($user,md5($pass));	
	}
	function datos_admin($cod_user){
		
		if(parent::conectar()){
			
			$sql="select * from profesor where cod_user='".$cod_user."'";
			$resultado=pg_query($sql);
			$datos=pg_fetch_array($resultado);
			
			$salida="<table class='table-respuesta datos' border='1'>";
			
			$salida.="<tr>";
			$salida.="<td colspan='2'>";
			$salida.="<h3>Datos de Administrador</h3>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="C&eacute;dula:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.=strtoupper($datos['nacionalidad']).$datos['cedula_prof'];
			$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Codigo de usuario:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="02".$datos['cod_user'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.=$datos['nombre_1'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.=$datos['nombre_2'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.=$datos['apellido_1'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.=$datos['apellido_2'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.=$datos['telefono_1'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.=$datos['telefono_2'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="</table>";
		
			echo $salida;
		}
		parent::desconectar();  
	}
	
	function cambiar_clave($clavea, $claven, $clavern, $claves, $cod_user){
		
		if(!preg_match('/[^a-zA-Z0-9\s]/', $claven) && !preg_match('/[^a-zA-Z0-9\s]/',  $claven))
		
		if($claven==$clavern){
		    if(md5($clavea)==$claves){
				if(parent::conectar()){
					$sql="UPDATE usuario SET clave_user = '".md5($clavern)."' WHERE cod_user = '".$cod_user."';";	
					if(pg_query($sql)){
						echo "Clave cambiada exitosamente!.";
						$_SESSION['clave_user']=md5($clavern);
					}else{
					 echo "No se pudo cambiar clave!.";
					}
				}
		     }else{
					echo "La clave actual es incorrecta, verifique!";
			 } 
		}else{		
				echo "Las claves nuevas no son iguales, verifique!";	
		}
	}
	
	
	
	
	
	function datos_admin_form($cod_user){
		
		if(parent::conectar()){
			
			$sql="select * from profesor where cod_user='".$cod_user."'";
			$resultado=pg_query($sql);
			$datos=pg_fetch_array($resultado);
			
			$sql1="select * from usuario where cod_user='".$cod_user."'";
			$resultado1=pg_query($sql1);
			$datos1=pg_fetch_array($resultado1);
			
			
			$salida="<table class='table-respuesta datos' border='1'>";
			
			$salida.="<tr>";
			$salida.="<td colspan='2'>";
			$salida.="<h3>Editar Datos de Administrador</h3>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Codigo de usuario:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="02".$datos['cod_user'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Nacionalidad:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<select id="nacionalidad" name="nacionalidad" placeholder="Solo letras.">';
			$salida.='<option value="'.$datos['nacionalidad'].'">';
			$salida.=strtoupper($datos['nacionalidad']);
			$salida.='</option>';
			if($datos['nacionalidad']!="v") $salida.='<option value="v">V</option>';
			if($datos['nacionalidad']!="e") $salida.='<option value="e">E</option>';
			$salida.="</select>";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nacionalidad&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nacionalidad').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="C&eacute;dula:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="number" id="cedula" name="cedula" value="'.$datos['cedula_prof'].'" size="20" maxlength="8" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cedula_prof&tabla=profesor&valor='+document.getElementById('cedula').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="nombre1" name="nombre1" value="'.$datos['nombre_1'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre1&tabla=profesor&valor='+document.getElementById('nombre1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="nombre2" name="nombre2" value="'.$datos['nombre_2'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre2&tabla=profesor&valor='+document.getElementById('nombre2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="apellido1" name="apellido1" value="'.$datos['apellido_1'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido1&tabla=profesor&valor='+document.getElementById('apellido1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="apellido2" name="apellido2" value="'.$datos['apellido_2'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido2&tabla=profesor&valor='+document.getElementById('apellido2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="telefono1" name="telefono1" value="'.$datos['telefono_1'].'" size="20" maxlength="11" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono1&tabla=profesor&valor='+document.getElementById('telefono1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="telefono2" name="telefono2" value="'.$datos['telefono_2'].'" size="20" maxlength="11" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&tabla=profesor&valor='+document.getElementById('telefono2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Correo:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="correo" name="correo" value="'.$datos1['correo'].'" size="20" maxlength="150" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=correo&tabla=usuario&valor='+document.getElementById('correo').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="<tr>";
				$salida.="<td colspan='3'>";
				
				
				$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nacionalidad&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nacionalidad').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cedula_prof&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('cedula').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=correo&cod_user=".$datos['cod_user']."&tabla=usuario&valor='+document.getElementById('correo').value".");multiconsultas();".'"'.">Guardar Todo</button>";
				
				
				$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="</table>";
		
			echo $salida;
		}
	}
	
	
	
	function editar_atributo_admin($campo, $valor, $cod, $tabla){
		
		
				
				parent::editar_atributo_reusable($campo, $valor, $cod, $tabla);
			   
		   
	
	}
	
	
		function obtener_horario($seccion){
		if(parent::conectar()){
		$salida='<table class="table-respuesta datos" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="4" rowspan="1"
style="vertical-align: top; width: 285px;background:#399;color:#fff;border:1px solid #ccc;">Horarios<br>
</td>
</tr>';
		$ban=0;
		$sql="SELECT * FROM seccion WHERE cod_seccion = '".$seccion."'";
		$resultado=pg_query($sql);
		
		if($datos=pg_fetch_array($resultado)){
			
			$sql1="SELECT * FROM idioma WHERE cod_idioma = '".$datos['cod_idioma']."'";
			
			$resultado1=pg_query($sql1);
			
	    		if($datos1=pg_fetch_array($resultado1)){
					
				  $salida.='<tr>
				  <td style="border:1px solid #ccc;text-align: center; width: 280px;" colspan="3">'.$datos1['idioma'].' (Cupos:'.$datos['maximo_de_est'].')<br>
				  </td>
				  </tr>';
			
					$sql2="SELECT * FROM horario WHERE cod_seccion = '".$seccion."'";
					$resultado2=pg_query($sql2);
					$salida.='<tr style="border:1px solid #ccc;background:#399;color:#fff;">
							  <td style="vertical-align: top; width: 34px; text-align: center;">dias<br>
								</td>
								<td style="vertical-align: top; width: 280px; text-align: center;">horas<br>
								</td>
								<td style="vertical-align: top; text-align: center;padding-right:5px;">Aula<br>
								</td>
								</tr>';	
					while($datos2=pg_fetch_array($resultado2)){
					
								$salida.='<tr style="border:1px solid #ccc;">
								<td style="text-align:center; width: 34px;">'.$datos2['dia'].'<br>
								</td>
								<td style="text-align:center; width: 280px;">'.$datos2['hora_inicio']."-".$datos2['hora_fin'].'<br>
								</td>
								<td style="text-align:center;">'.$datos2['aula'].'<br>
								</td>
								</tr>';
						$ban=1;
					}
				}
		}
		
		if($ban==0)$salida.='<tr>
				  <td style="border:1px solid #ccc;text-align: center; width: 280px;" colspan="3">No hay horarios cargados<br>
				  </td>
				  </tr>';
		
			$salida.='</tbody>
</table>';	
			parent::desconectar();   
		  echo $salida; 
	
		}
		}
		
				
		
		function obtener_seccion(){
		if(parent::conectar()){
		$sql="SELECT * FROM seccion where maximo_de_est>0";
		$resultado=pg_query($sql);
		while($datos=pg_fetch_array($resultado)){
		echo "<option value='".$datos['cod_seccion']."'>".$datos['cod_seccion']." (Nivel:".$datos['nivel']." Cupos:".$datos['maximo_de_est'].")</option>";
		} 
		}
		}
		
		
		
		function obtener_seccion_nivel($nivel){
		if(parent::conectar()){
		$sql="SELECT * FROM seccion where estado='a' and nivel='".$nivel."'";
		$resultado=pg_query($sql);
		while($datos=pg_fetch_array($resultado)){
			
			$inscritos="select count(*) from inscripcion where cod_seccion='".$datos['cod_seccion']."' and activo='a' and estado='v'";
			$inscritos=pg_query($inscritos);
			$inscritos=pg_fetch_array($inscritos);
			
		echo "<option class='seccion por nivel' value='".$datos['cod_seccion']."'>".$datos['cod_seccion']." (Nivel:".$datos['nivel']." Cupos:".$datos['maximo_de_est']." Inscritos:".$inscritos[0].")</option>";
		} 
		}
		}
		
		
		
		
		function obtener_seccion_nivel_todas($nivel){
		if(parent::conectar()){
		$sql="SELECT * FROM seccion where nivel='".$nivel."'";
		$resultado=pg_query($sql);
		while($datos=pg_fetch_array($resultado)){
			
			$inscritos="select count(*) from inscripcion where cod_seccion='".$datos['cod_seccion']."' and activo='a' and estado='v'";
			$inscritos=pg_query($inscritos);
			$inscritos=pg_fetch_array($inscritos);
			
		echo "<option class='seccion por nivel' value='".$datos['cod_seccion']."'>".$datos['cod_seccion']." (Nivel:".$datos['nivel']." Cupos:".$datos['maximo_de_est']." Inscritos:".$inscritos[0].")</option>";
		} 
		}
		}
		
		
		
		
		function insertar_est($seccion, $nacionalidad, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $telefono1, $telefono2, $direccion, $lugar, $cargo, $year, $mes, $dia, $correo){
			$on="";
			if($seccion!="")$on.="1";else{ $on.="0"; echo "Error al insertar: ".$seccion." no valida."; return 0;}
			if(parent::validarEspacio($nacionalidad))$on.="1";else{ $on.="0"; echo "Error al insertar: nacionalidad ".$nacionalidad." no valida."; return 0;}
			if(parent::cedula($cedula))$on.="1";else{ $on.="0"; echo "Error al insertar: cedula ".$cedula." no valida."; return 0;}
			if(parent::validarEspacio($nombre1))$on.="1";else{ $on.="0"; echo "Error al insertar: nombre ".$nombre1." no valido."; return 0;}
			if($nombre2!="")if(parent::validarEspacio($nombre2))$on.="1";else{ $on.="0"; echo "Error al insertar: nombre ".$nombre2." no valido."; return 0;}
			if(parent::validarEspacio($apellido1))$on.="1";else{ $on.="0"; echo "Error al insertar: apellido ".$apellido1." no valido."; return 0;}
			if($apellido2!="")if(parent::validarEspacio($apellido2))$on.="1";else{ $on.="0"; echo "Error al insertar: apellido ".$apellido2." no valido.";return 0;}
			if(parent::validarTele($telefono1))$on.="1";else{ $on.="0"; echo "Error al insertar: telefono ".$telefono1." no valido.";return 0;}
			if($telefono2!="")if(parent::validarTele($telefono2))$on.="1";else{ $on.="0"; echo "Error al insertar: telefono ".$telefono2." no valido.";return 0;}
			if($direccion!="")$on.="1";else{ $on.="0"; echo "Error al insertar: direccion ".$direccion." no valida.";return 0;}
			if(parent::validarEspacio($lugar))$on.="1";else{ $on.="0"; echo "Error al insertar: lugar ".$lugar." no valido.";return 0;}
			if(parent::validarEspacio($cargo))$on.="1";else{ $on.="0"; echo "Error al insertar: cargo ".$cargo." no valido.";return 0;}
			if(checkdate($mes, $dia, $year))$on.="1";else{ $on.="0"; echo "Error al insertar: fecha no valida.";return 0;}
			if(parent::validarEmail($correo))$on.="1";else{ $on.="0"; echo "Error al insertar: correo".$correo." no valida.";return 0;}
		
			
			 
		if(!strrpos($on, "0")>0)if(parent::conectar()){
		/*para la subida a la db usamos utf8_decode y para mostrar usamos utf8_encode.. en la db debe estar utf8*/
		
		
		if(!$this->chequear_registro("estudiante", "cod_estudiante", substr(md5($cedula), 0, 10))){
			$cod=substr(md5($cedula), 0, 5).rand(0,99999);
			 pg_query("START TRANSACTION");
			 
			$resultado1=pg_query("INSERT INTO usuario (cod_user, nombre_user, clave_user, correo, tipo_user) 
			VALUES ('".$cod."', '".$cedula."ubv', '".md5($cedula)."', '".$correo."', 'e');");
			
			$resultado2=pg_query("INSERT INTO estudiante (cod_estudiante, nacionalidad, cedula_est, nombre_1, nombre_2, apellido_1, apellido_2, telefono_1, telefono_2, direccion, lugar_de_trabajo, cargo, fecha, cod_user) VALUES ('".substr(md5($cedula), 0, 10)."', '".$nacionalidad."', '".$cedula."', '".$nombre1."', '".$nombre2."', '".$apellido1."', '".$apellido2."', '".$telefono1."', '".$telefono2."', '".$direccion."', '".$lugar."', '".$cargo."', '".$year."-".$mes."-".$dia."', '".$cod."');");
			
			$resultado3=pg_query("INSERT INTO inscripcion (cod_inscripcion, fecha, cod_estudiante, cod_seccion, estado, hora, activo) VALUES ('".substr(md5($cedula), 0, 4).rand(1,99999)."i', '".date("d-m-y")."', '".substr(md5($cedula), 0, 10)."', '".$seccion."', 's', '".date("H:i")."', 'a');");
             
				
			if($resultado1 and $resultado2 and $resultado3){pg_query("COMMIT"); echo "Estudiante registrado exitosamente.";}else{ pg_query("ROLLBACK"); echo "No se pudo registrar estudiante.";}
			}else{
				echo "Cédula ya registrada.";
			}
		
		}
		
		
		
		}
		
		
		function obtener_inscrito($seccion){
		if(parent::conectar()){
		$sql="SELECT * FROM inscripcion where cod_seccion='".$seccion."' and estado='s' and activo='a'";
		$resultado=pg_query($sql);
		echo'<select name="cedula_est" id="cedula_est" required x-moz-errormessage="Seleccione una opción">';
		while($datos=pg_fetch_array($resultado)){
	    $sql1="SELECT * FROM estudiante where cod_estudiante='".$datos['cod_estudiante']."'";
		$resultado1=pg_query($sql1);
		$datos1=pg_fetch_array($resultado1);
		echo "<option value='".$datos['cod_estudiante']."'>".strtoupper($datos1['nacionalidad']).$datos1['cedula_est']." (".$datos1['nombre_1']." ".$datos1['nombre_2'].")"."</option>";
		}
		echo"</select><br>";
		echo"<div  style='margin-left:-19%'>N&deg; de Deposito:<input maxlength='15' type='text' name='deposito' id='deposito'></div>";
		}
		}
	
		function validar_inscripcion($seccion, $cod_estudiante, $deposito){
		if(parent::conectar() && parent::cedula($deposito)){
		$sql="UPDATE inscripcion SET estado = 'v', deposito= '".$deposito."' WHERE cod_seccion = '".$seccion."' and cod_estudiante='".$cod_estudiante."';";
		pg_query("START TRANSACTION");
	    $resultado=pg_query($sql);
		$resultado1=pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est-1 WHERE cod_seccion = '".$seccion."';");
		if($resultado and $resultado1){ pg_query("COMMIT"); echo "Inscripción validada correctamente."; }else{ pg_query("ROLLBACK"); echo "No se pudo validar inscripción.";}
		}
		}
		
		
		
		function validar_inscripcion_directo($cod_inscripcion, $deposito){
		if(parent::conectar() && parent::cedula($deposito)){
		$sql="UPDATE inscripcion SET estado = 'v', deposito= '".$deposito."' WHERE cod_inscripcion='".$cod_inscripcion."';";
		pg_query("START TRANSACTION");
		
		$resultado=pg_query("select estado, cod_seccion from inscripcion where cod_inscripcion='".$cod_inscripcion."';");
		$estado=pg_fetch_array($resultado);
		if($estado['estado']=="v")$con=0; elseif($estado['estado']=="s") $con=1;
	    $resultado=pg_query($sql);
		$resultado1=pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est-".$con." WHERE cod_seccion = '".$estado['cod_seccion']."';");
		if($resultado and $resultado1){ pg_query("COMMIT"); echo "Inscripción  validada correctamente."; }else{ pg_query("ROLLBACK"); echo "No  se pudo validar inscripción.";}
		}
		}
		
		
		function validar_inscripcion_activos_inactivos($cod_inscripcion, $deposito){
			
		if($deposito!="")if(parent::conectar() && parent::cedula($deposito)){
		$sql="UPDATE inscripcion SET estado = 'v', deposito= '".$deposito."' WHERE cod_inscripcion='".$cod_inscripcion."';";
		pg_query("START TRANSACTION");
		
		
		
		$resultado=pg_query("select estado, cod_seccion, activo from inscripcion where cod_inscripcion='".$cod_inscripcion."';");
		$estado=pg_fetch_array($resultado);
		
		$resultado2=pg_query("select * from seccion where cod_seccion='".$estado['cod_seccion']."';");
		$estado_c=pg_fetch_array($resultado2);
		
		if($estado['estado']=="v" || $estado_c['estado']=="i")$con=0; 
		if($estado['estado']=="s" && $estado_c['estado']=="a") $con=1;
		if($estado['activo']=="i") $con=0;
		
	    $resultado=pg_query($sql);
		$resultado1=pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est-".$con." WHERE cod_seccion = '".$estado['cod_seccion']."';");
		if($resultado and $resultado1){ pg_query("COMMIT"); echo "Deposito cambiad@ exitosamente!."; }else{ pg_query("ROLLBACK"); echo "No se pudo cambiar campo: Deposito.";}
		}
		
		
		if($deposito=="")if(parent::conectar()){
		$sql="UPDATE inscripcion SET estado = 's', deposito= '".$deposito."' WHERE cod_inscripcion='".$cod_inscripcion."';";
		pg_query("START TRANSACTION");
		
		$resultado=pg_query("select estado, cod_seccion, activo from inscripcion where cod_inscripcion='".$cod_inscripcion."';");
		$estado=pg_fetch_array($resultado);
		
		$resultado2=pg_query("select * from seccion where cod_seccion='".$estado['cod_seccion']."';");
		$estado_c=pg_fetch_array($resultado2);
		
		if($estado['estado']=="s" || $estado_c['estado']=="i")$con=0; 
		if($estado['estado']=="v" && $estado_c['estado']=="a") $con=1;
		if($estado['activo']=="i") $con=0;
		
		
	    $resultado=pg_query($sql);
		$resultado1=pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+".$con." WHERE cod_seccion = '".$estado['cod_seccion']."';");
		if($resultado and $resultado1){ pg_query("COMMIT"); echo "Deposito cambiad@ exitosamente!."; }else{ pg_query("ROLLBACK"); echo "No se pudo cambiar campo: Deposito.";}
		}
		
		
		}
		
		
	
	function obtener_inscrito_validado($seccion){
		if(parent::conectar()){
		$sql="SELECT * FROM inscripcion where cod_seccion='".$seccion."' and estado='v' and activo='a'";
		$resultado=pg_query($sql);
		echo'<select name="cedula_est" id="cedula_est" required x-moz-errormessage="Seleccione una opción">';
		while($datos=pg_fetch_array($resultado)){
	    $sql1="SELECT * FROM estudiante where cod_estudiante='".$datos['cod_estudiante']."'";
		$resultado1=pg_query($sql1);
		$datos1=pg_fetch_array($resultado1);
		echo "<option value='".$datos['cod_estudiante']."'>".strtoupper($datos1['nacionalidad']).$datos1['cedula_est']." (".$datos1['nombre_1']." ".$datos1['nombre_2'].")"."</option>";
		}
		echo"</select>"; 
		}
		}
		
		function invalidar_inscripcion($seccion, $cod_estudiante){
		if(parent::conectar()){
		$sql="UPDATE inscripcion SET estado = 's', deposito= '' WHERE cod_seccion = '".$seccion."' and cod_estudiante='".$cod_estudiante."';";
		pg_query("START TRANSACTION");
	    $resultado=pg_query($sql);
		$resultado1=pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+1 WHERE cod_seccion = '".$seccion."';");
		if($resultado and $resultado1){ pg_query("COMMIT"); echo "Inscripción invalidada correctamente."; }else{ pg_query("ROLLBACK"); echo "No se pudo invalidar inscripción.";}
		}
		}
		
		
		function obtener_seccion_cuadro($seccion, $estado){
			$ban=0;
		if(parent::conectar()){
		$sql="SELECT * FROM seccion where cod_seccion='".$seccion."'";
		$resultado=pg_query($sql);
		if($datos=pg_fetch_array($resultado)){	
				
		$sql1="SELECT * FROM profesor where cod_profesor='".$datos['cod_profesor']."'";
		$resultado1=pg_query($sql1);
		$datos1=pg_fetch_array($resultado1);	
		
		$sql2="SELECT * FROM idioma where cod_idioma='".$datos['cod_idioma']."'";
		$resultado2=pg_query($sql2);
		$datos2=pg_fetch_array($resultado2);
			
			echo '<br><table class="table-respuesta" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">Consulta de secciones</span><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; width: 143px; text-align: right; background-color: rgb(153, 255, 255);">Sección:<br>
</td>
<td style="vertical-align: top; width: 222px;text-align: center;">'.$seccion.' ('.$datos2['idioma'].')<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: right; background-color: rgb(153, 255, 255);">Profesor:<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; width: 174px;text-align: center;">'.$datos1['nombre_1'].' '.$datos1['apellido_1'].'<br>
</td>
</tr>

<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Estado<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">N&deg; de Deposito<br>
</td>
</tr>';


			
		if($estado=="t")$sql3="SELECT * FROM inscripcion where cod_seccion='".$seccion."' and activo='a'";
		if($estado=="v")$sql3="SELECT * FROM inscripcion where cod_seccion='".$seccion."' and activo='a' and estado='v'";
		if($estado=="s")$sql3="SELECT * FROM inscripcion where cod_seccion='".$seccion."' and activo='a' and estado='s'";
		$resultado3=pg_query($sql3);
		while($datos3=pg_fetch_array($resultado3)){
			//////////
			
		$sql4="SELECT * FROM estudiante where cod_estudiante='".$datos3['cod_estudiante']."'";
		$resultado4=pg_query($sql4);
		if($datos4=pg_fetch_array($resultado4)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=14&cedula_est=".$datos4['cedula_est']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_est'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>
<td style="vertical-align: top; width: 174px;border-top:2px solid #ccc;text-align: center; ">';

if($datos3['estado']=="s") echo "sin validar";
if($datos3['estado']=="v") echo "validado";

echo '<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.$datos3['deposito'].'<br>
</td>
</tr>';
		$ban=1;	
			
		}
		
			/*
			Simplemente somos actores de tu pelicula att. Nairobis Cedeño. 
			*/
		//////////
	
		}
		if($ban==1)echo'<a href="consultar_xls_get_admin.php?seccion='.$seccion.'&estado=v">Descargar xls Validados</a> / <a href="consultar_xls_get_admin.php?seccion='.$seccion.'&estado=s">Descargar xls No Validados</a> / <a href="../comun/planilla.php?seccion='.$seccion.'" target="_blank">Descargar planilla de asistencias</a>';
		////////////	
		
		}
			
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta sección</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
		}

		}
		
		
		
		
		
		
		function obtener_est($cedula){
		if(parent::conectar()){
		$sql="select * from estudiante where cedula_est='".$cedula."';";
	    $resultado=pg_query($sql);
		if($datos=pg_fetch_array($resultado)){
			echo'<table class="table-respuesta datos-editar margen25" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; background-color: rgb(153, 255, 255);"><span
style="font-weight: bold; font-style: italic;">Consulta de estudiante</span><br>
</td>
</tr>
<tr>
<tr>
<td
style="vertical-align: top; width: 176px; text-align: right; background-color: rgb(102, 204, 204);">Acción:<br>
</td>
<td style="vertical-align: top; width: 227px; text-align: center;"><input
name="Borrar Datos" value="Borrar Datos" type="button"'."onclick=".'"'."submitdata('../../controlador/Administrador.php?peticion=15&cod_user=".$datos['cod_user']."'".')"><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Cedula:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nacionalidad']).''.$datos['cedula_est'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Nombres:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nombre_1'].' '.$datos['nombre_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Apellidos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['apellido_1'].' '.$datos['apellido_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Teléfonos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos['telefono_1'].' - '.$datos['telefono_2'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Dirección:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos['direccion'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Lugar
de trabajo:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos['lugar_de_trabajo'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Cargo:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos['cargo'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Fecha
de nacimiento:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos['fecha'].'<br>
</td>
</tr>
</tbody>
</table>';
		}else{
			echo "Estudiante no encontrado.";
		}
		}
		}
		
		
		
		
		function obtener_est_cuadro($cedula_est){
		if(parent::conectar() && parent::cedula($cedula_est)){
		$ban=0;	 
		
		$sql4="SELECT * FROM estudiante where cedula_est='".$cedula_est."'";
		$resultado4=pg_query($sql4);
		
		
		echo '<table class=table-respuesta Busqueda de Estudiante"><tbody>
		
<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=14&cedula_est=".$datos4['cedula_est']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_est'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>';



		$ban=1;	
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
	}
}
		
	
	
function obtener_est_cuadro_para_form($cedula_est){
		if(parent::conectar() && parent::cedula($cedula_est)){
		$ban=0;	 
		
		$sql4="SELECT * FROM estudiante where cedula_est='".$cedula_est."'";
		$resultado4=pg_query($sql4);
		
		
		echo '<table class="table-respuesta Busqueda de Estudiante"><tbody>
		
<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=18&cod_user=".$datos4['cod_user']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_est'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>';



		$ban=1;	
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
	}
}
		
	
	
	
function datos_est_form($cod_user){
		
		if(parent::conectar()){
			
			$sql="select * from estudiante where cod_user='".$cod_user."'";
			$resultado=pg_query($sql);
			$datos=pg_fetch_array($resultado);
			
			$sql1="select * from usuario where cod_user='".$cod_user."'";
			$resultado1=pg_query($sql1);
			$datos1=pg_fetch_array($resultado1);
			
			
			$salida="<table class='table-respuesta datos-editar' border='1'>";
			
			$salida.="<tr>";
			$salida.="<td colspan='2'>";
			$salida.="<h3>Editar Datos de Estudiante</h3>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Codigo de usuario:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="02".$datos['cod_user'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Nacionalidad:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<select id="nacionalidad" name="nacionalidad" placeholder="Solo letras.">';
			$salida.='<option value="'.$datos['nacionalidad'].'">';
			$salida.=strtoupper($datos['nacionalidad']);
			$salida.='</option>';
			if($datos['nacionalidad']!="v") $salida.='<option value="v">V</option>';
			if($datos['nacionalidad']!="e") $salida.='<option value="e">E</option>';
			$salida.="</select>";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nacionalidad&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('nacionalidad').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="C&eacute;dula:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="number" id="cedula" name="cedula" value="'.$datos['cedula_est'].'" size="20" maxlength="8" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cedula_est&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('cedula').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="nombre1" name="nombre1" value="'.$datos['nombre_1'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre1&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('nombre1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="nombre2" name="nombre2" value="'.$datos['nombre_2'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre2&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('nombre2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="apellido1" name="apellido1" value="'.$datos['apellido_1'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido1&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('apellido1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="apellido2" name="apellido2" value="'.$datos['apellido_2'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido2&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('apellido2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="telefono1" name="telefono1" value="'.$datos['telefono_1'].'" size="20" maxlength="11" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono1&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('telefono1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="telefono2" name="telefono2" value="'.$datos['telefono_2'].'" size="20" maxlength="11" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('telefono2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Direcci&oacute;n:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="direccion" name="direccion" value="'.$datos['direccion'].'" size="20" maxlength="500" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=direccion&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('direccion').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";

			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Cargo:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="cargo" name="cargo" value="'.$datos['cargo'].'" size="20" maxlength="50" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cargo&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('cargo').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";

			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Fecha de nacimiento:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" maxlength="2" value="'.substr($datos['fecha'], 8, 9).'" size="2" name="dia" id="dia" placeholder="dia" required>
<input type="text" maxlength="2" size="2" value="'.substr($datos['fecha'], 5, 2).'" name="mes" id="mes" placeholder="mes" required>
<input type="text" maxlength="4" size="4" name="year" value="'.substr($datos['fecha'], 0, 4).'" id="year" placeholder="año" required>';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=fecha&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('year').value+'-'+document.getElementById('mes').value+'-'+document.getElementById('dia').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Correo:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="correo" name="correo" value="'.$datos1['correo'].'" size="20" maxlength="150" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=correo&cod_user=".$datos['cod_user']."&tabla=usuario&valor='+document.getElementById('correo').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
				$salida.="<td colspan='3'>";
				
				
				$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nacionalidad&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('nacionalidad').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cedula_est&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('cedula').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre1&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('nombre1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre2&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('nombre2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido1&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('apellido1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido2&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('apellido2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono1&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('telefono1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('telefono2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=direccion&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('direccion').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cargo&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('cargo').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=fecha&cod_user=".$datos['cod_user']."&tabla=estudiante&valor='+document.getElementById('year').value+'-'+document.getElementById('mes').value+'-'+document.getElementById('dia').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=correo&cod_user=".$datos['cod_user']."&tabla=usuario&valor='+document.getElementById('correo').value".");multiconsultas();".'"'.">Guardar Todo</button>";
				
				
				$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="</table>";
			
			$salida.="<br><table class='inscripcion' border='1'>";
			

			$salida.="<tr>";
			$salida.="<td colspan='4'>";
			$salida.="<h3>Inscripciones</h3>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td style='vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);'>Fecha";
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);'>Cod Secci&oacute;n";
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 250px; text-align: center; background-color: rgb(0, 204, 204);'>Estado";
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);'>Deposito";
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);'>Hora";
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);'>Nota";
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 250px; text-align: center; background-color: rgb(0, 204, 204);'>Acci&oacute;n";
			$salida.="</td>";
			$salida.="</tr>";
			
			$sql="select * from inscripcion where cod_estudiante='".$datos['cod_estudiante']."'";
			$resultado=pg_query($sql);
			while($datos_inscripcion=pg_fetch_array($resultado)){
			$salida.="<tr>";
			$salida.="<td style='vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center;'>";
			$salida.=$datos_inscripcion['fecha'];
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center;'>";
			$salida.=$datos_inscripcion['cod_seccion'];
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 250px;border-top:2px solid #ccc;text-align: center;'>";
			if($datos_inscripcion['estado']=="s")$salida.="sin validar";
			if($datos_inscripcion['estado']=="v")$salida.="validado";
			$salida.=" - ";
			if($datos_inscripcion['activo']=="a")$salida.="activa";
			if($datos_inscripcion['activo']=="i")$salida.="inactiva";
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center;'>";
			$salida.=$datos_inscripcion['deposito'];
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center;'>";
			$salida.=$datos_inscripcion['hora'];
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center;'>";
			$salida.=$datos_inscripcion['nota'];
			$salida.="</td>";
			$salida.="<td style='vertical-align: top; width:250px;border-top:2px solid #ccc;text-align: center;'>";
			$salida.='<button '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=44&cod_inscripcion=".$datos_inscripcion['cod_inscripcion']."'".')">Editar</button>';
			$salida.='<button '."onclick=".'"'."submitdata('../../controlador/Administrador.php?peticion=20&tabla=inscripcion&campo=cod_inscripcion&cod=".$datos_inscripcion['cod_inscripcion']."'".')">Eliminar</button>';
			$salida.="</td>";
			$salida.="</tr>";
			}
		
			
			$salida.="</table>";
			
			
			
		
			echo $salida;
		}
	}	
	
	
	function registrar_idioma($cod_idioma, $idioma, $niveles){
	if(parent::conectar()){
		if(!$this->chequear_registro("idioma", "cod_idioma", $cod_idioma)){
		$sql="INSERT into idioma(cod_idioma, idioma, niveles) values ('".$cod_idioma."', '".$idioma."', '".$niveles."')";
			if(pg_query($sql)){
				echo "Idioma registrado exitosamente.";	
			}else{
				echo "No se pudo registrar idioma.";
			}
		}else{echo "Código de idioma ya exite.";}	
	}
}
	

	
	function obtener_idioma(){
		if(parent::conectar()){
		$sql="SELECT * FROM idioma";
		$resultado=pg_query($sql);
		while($datos=pg_fetch_array($resultado)){
		echo "<option value='".$datos['cod_idioma']."'>".$datos['idioma']." (C&oacute;digo:".$datos['cod_idioma']." - Niveles:".$datos['niveles'].")</option>";
		} 
		}
		}
		
		
		
		
		function eliminar($cod, $campo, $tabla){
		$sql="";
		$inscrito=0;
		$validadoActivo=0;
		$cod_seccion="";
		if($tabla=="idioma")$sql="DELETE FROM ".$tabla." WHERE ".$campo." = '".$cod."'";
		if($tabla=="usuario"){
			if(parent::conectar()){
			$sql="DELETE FROM ".$tabla." WHERE ".$campo." = '".$cod."'";
			
			$sql_ubicar="select * from usuario where ".$campo." = '".$cod."'";
			$resul_ubicar=pg_query($sql_ubicar);
			$row=pg_fetch_array($resul_ubicar);
			
			if($row['tipo_user']=="e"){
				
				$sql_ubicar="select * from estudiante where ".$campo." = '".$row['cod_user']."'";
				$resul_ubicar=pg_query($sql_ubicar);
				$row=pg_fetch_array($resul_ubicar);
				
				$sql_ubicar="select * from inscripcion where cod_estudiante = '".$row['cod_estudiante']."' and estado='v' and activo='a'";
				$resul_ubicar=pg_query($sql_ubicar);
				if($row=pg_fetch_array($resul_ubicar)){
					
					$inscrito=1;
					$cod_seccion=$row['cod_seccion'];
					
				}
				
			}
			
			parent::desconectar();
	        }//conectar
		}
		
		if($tabla=="inscripcion"){
			$sql="DELETE FROM ".$tabla." WHERE ".$campo." = '".$cod."'";
			if(parent::conectar()){
				$sql_ubicar="select * from ".$tabla." where ".$campo." = '".$cod."'";
				$resul_ubicar=pg_query($sql_ubicar);
				if($row=pg_fetch_array($resul_ubicar)){
					if($row['estado']=="v" && $row['activo']=="a"){
						$validadoActivo=1;	
						$cod_seccion=$row['cod_seccion'];
					}
				}
				parent::desconectar();
			}
			
			
			
		}
		
		if($tabla=="horario")$sql="DELETE FROM ".$tabla." WHERE ".$campo." = '".$cod."'";
		if(parent::conectar()){
		pg_query("START TRANSACTION");
		    if($tabla=="usuario" && $inscrito==1){
				pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+1 WHERE cod_seccion = '".$cod_seccion."';");
			}
			if($tabla=="inscripcion" && $validadoActivo==1){
				pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+1 WHERE cod_seccion = '".$cod_seccion."';");
			}
			if(pg_query($sql)){
			pg_query("COMMIT");
			echo "".strtoupper($tabla." borrado exitosamente.")."";
			}else{
			pg_query("ROLLBACK");
			echo "".strtoupper("No se pudo borrar ".$tabla.".")."";
			}
		
		}
		}
		
		
		
		
		
		function editar_idioma_form($cod_idioma){
		
		if(parent::conectar()){
			
			$sql="select * from idioma where cod_idioma='".$cod_idioma."'";
			$resultado=pg_query($sql);
			$datos=pg_fetch_array($resultado);
			
			
			
			$salida="<table class='table-respuesta datos' border='1'>";
			
			$salida.="<tr>";
			$salida.="<td colspan='2'>";
			$salida.="<h3>Editar idioma</h3>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Codigo de idioma:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="".$datos['cod_idioma'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Idioma:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="idioma" name="idioma" value="'.$datos['idioma'].'" size="20" maxlength="20" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=22&campo=idioma&cod_idioma=".$datos['cod_idioma']."&tabla=idioma&valor='+document.getElementById('idioma').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Niveles:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			
			$salida.='<select id="niveles" name="niveles" placeholder="Solo letras.">';
			$salida.='<option value="'.$datos['niveles'].'">';
			$salida.=$datos['niveles'];
			$salida.='</option>';
			if($datos['niveles']!="1") $salida.='<option value="1">1</option>';
			if($datos['niveles']!="2") $salida.='<option value="2">2</option>';
			if($datos['niveles']!="3") $salida.='<option value="3">3</option>';
			if($datos['niveles']!="4") $salida.='<option value="4">4</option>';
			if($datos['niveles']!="5") $salida.='<option value="5">5</option>';
			$salida.="</select>";
			
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=22&campo=niveles&cod_idioma=".$datos['cod_idioma']."&tabla=idioma&valor='+document.getElementById('niveles').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="</table>";
		
			echo $salida;
		}
	}	





function insertar_admin($nacionalidad, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $telefono1, $telefono2, $correo){
			$on="";
			
			if(parent::validarEspacio($nacionalidad))$on.="1";else{ $on.="0"; echo "Error al insertar: nacionalidad ".$nacionalidad." no valida."; return 0;}
			if(parent::cedula($cedula))$on.="1";else{ $on.="0"; echo "Error al insertar: cedula ".$cedula." no valida."; return 0;}
			if(parent::validarEspacio($nombre1))$on.="1";else{ $on.="0"; echo "Error al insertar: nombre ".$nombre1." no valido."; return 0;}
			if($nombre2!="")if(parent::validarEspacio($nombre2))$on.="1";else{ $on.="0"; echo "Error al insertar: nombre ".$nombre2." no valido."; return 0;}
			if(parent::validarEspacio($apellido1))$on.="1";else{ $on.="0"; echo "Error al insertar: apellido ".$apellido1." no valido."; return 0;}
			if($apellido2!="")if(parent::validarEspacio($apellido2))$on.="1";else{ $on.="0"; echo "Error al insertar: apellido ".$apellido2." no valido.";return 0;}
			if(parent::validarTele($telefono1))$on.="1";else{ $on.="0"; echo "Error al insertar: telefono ".$telefono1." no valido.";return 0;}
			if($telefono2!="")if(parent::validarTele($telefono2))$on.="1";else{ $on.="0"; echo "Error al insertar: telefono ".$telefono2." no valido.";return 0;}
			if(parent::validarEmail($correo))$on.="1";else{ $on.="0"; echo "Error al insertar: correo".$correo." no valida.";return 0;}
		
			
			 
		if(!strrpos($on, "0")>0)if(parent::conectar()){
		/*para la subida a la db usamos utf8_decode y para mostrar usamos utf8_encode.. en la db debe estar utf8*/
		
		
		if(!$this->chequear_registro("profesor", "cod_profesor", substr(md5($cedula), 0, 10))){
			$cod=substr(md5($cedula), 0, 5).rand(0,99999);
			 pg_query("START TRANSACTION");
			$resultado1=pg_query("INSERT INTO usuario (cod_user, nombre_user, clave_user, correo, tipo_user) 
			VALUES ('".$cod."', 'admin".$cedula."ubv', '".md5($cedula)."', '".$correo."', 'a');");
			
			$resultado2=pg_query("INSERT INTO profesor (cod_profesor, nacionalidad, cedula_prof, nombre_1, nombre_2, apellido_1, apellido_2, telefono_1, telefono_2, cod_user) VALUES ('".substr(md5($cedula), 0, 10)."', '".$nacionalidad."', '".$cedula."', '".$nombre1."', '".$nombre2."', '".$apellido1."', '".$apellido2."', '".$telefono1."', '".$telefono2."', '".$cod."');");
		             		
			if($resultado1 and $resultado2){pg_query("COMMIT"); echo "Administrador registrado exitosamente.";}else{ pg_query("ROLLBACK"); echo "No se pudo registrar administrador.";}
			}else{
				echo "Cédula ya registrada.";
			}
		
		}
	}

	
		
	
function obtener_admin_cuadro_para_form($cedula_admin){
		if(parent::conectar() && parent::cedula($cedula_admin)){
		$ban=0;	 
		
		$sql="select cedula_prof from profesor where cod_user='".$_SESSION['cod_user']."'";
		$resultado=pg_query($sql);
		$datos=pg_fetch_array($resultado);
		
		$sql4="SELECT * FROM profesor where cedula_prof='".$cedula_admin."' AND cedula_prof != "."'".$datos['cedula_prof']."'";
		$resultado4=pg_query($sql4);
		$resultado3=pg_query($sql4);
		$verificar3=pg_fetch_array($resultado3);
		
		$user="select * from usuario where cod_user='".$verificar3['cod_user']."'";
		$user=pg_query($user);
		$user=pg_fetch_array($user);
		
        if($user['tipo_user']!="p"){
		echo '<table class="table-respuesta Busqueda de Estudiante"><tbody>
		
<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=25&cod_user=".$datos4['cod_user']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_prof'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>';



		$ban=1;	
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
	}
		}
}	




function datos_admin_form_otros($cod_user){
		
		if(parent::conectar()){
			
			$sql="select * from profesor where cod_user='".$cod_user."'";
			$resultado=pg_query($sql);
			$datos=pg_fetch_array($resultado);
			
			$sql1="select * from usuario where cod_user='".$cod_user."' and (tipo_user='r' or tipo_user='a')";
			$resultado1=pg_query($sql1);
			$datos1=pg_fetch_array($resultado1);
			
			
			$salida="<table class='table-respuesta datos-editar' border='1'>";
			
			$salida.="<tr>";
			$salida.="<td colspan='2'>";
			$salida.="<h3>Editar Datos de Administrador</h3>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Codigo de usuario:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="02".$datos['cod_user'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Nacionalidad:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<select id="nacionalidad" name="nacionalidad" placeholder="Solo letras.">';
			$salida.='<option value="'.$datos['nacionalidad'].'">';
			$salida.=strtoupper($datos['nacionalidad']);
			$salida.='</option>';
			if($datos['nacionalidad']!="v") $salida.='<option value="v">V</option>';
			if($datos['nacionalidad']!="e") $salida.='<option value="e">E</option>';
			$salida.="</select>";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nacionalidad&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nacionalidad').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="C&eacute;dula:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="number" id="cedula" name="cedula" value="'.$datos['cedula_prof'].'" size="20" maxlength="8" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cedula_prof&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('cedula').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="nombre1" name="nombre1" value="'.$datos['nombre_1'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="nombre2" name="nombre2" value="'.$datos['nombre_2'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="apellido1" name="apellido1" value="'.$datos['apellido_1'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="apellido2" name="apellido2" value="'.$datos['apellido_2'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="telefono1" name="telefono1" value="'.$datos['telefono_1'].'" size="20" maxlength="11" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="telefono2" name="telefono2" value="'.$datos['telefono_2'].'" size="20" maxlength="11" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Correo:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="correo" name="correo" value="'.$datos1['correo'].'" size="20" maxlength="150" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=correo&cod_user=".$datos['cod_user']."&tabla=usuario&valor='+document.getElementById('correo').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			
				$salida.="<tr>";
				$salida.="<td colspan='3'>";
				
				
				$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nacionalidad&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nacionalidad').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cedula_prof&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('cedula').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=correo&cod_user=".$datos['cod_user']."&tabla=usuario&valor='+document.getElementById('correo').value".");multiconsultas();".'"'.">Guardar Todo</button>";
				
				
				$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="</table>";
		
			echo $salida;
		}
	}
	
	
	
	
	
	function obtener_admin_cuadro($cedula_admin){
		if(parent::conectar() && parent::cedula($cedula_admin)){
		$ban=0;	 
		
		$sql="select cedula_prof from profesor where cod_user='".$_SESSION['cod_user']."'";
		$resultado=pg_query($sql);
		$datos=pg_fetch_array($resultado);
		
		$sql4="SELECT * FROM profesor where cedula_prof='".$cedula_admin."' AND cedula_prof != "."'".$datos['cedula_prof']."'";
		$resultado4=pg_query($sql4);$sql="select cedula_prof from profesor where cod_user='".$_SESSION['cod_user']."'";
		$resultado=pg_query($sql);
		$datos=pg_fetch_array($resultado);
		
		$sql4="SELECT * FROM profesor where cedula_prof='".$cedula_admin."' AND cedula_prof != "."'".$datos['cedula_prof']."'";
		$resultado4=pg_query($sql4);
		$resultado3=pg_query($sql4);
		$verificar3=pg_fetch_array($resultado3);
		
		$user="select * from usuario where cod_user='".$verificar3['cod_user']."'";
		$user=pg_query($user);
		$user=pg_fetch_array($user);
		
        if($user['tipo_user']!="p"){
		
		
		echo '<table class="table-respuesta Busqueda de Estudiante"><tbody>
		
<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=28&cod_user=".$datos4['cod_user']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_prof'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>';



		$ban=1;	
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
	}
		}
}	
	
	
	
	
	
	
	function obtener_admin($cod_user){
		if(parent::conectar()){
		$sql="select * from profesor where cod_user='".$cod_user."';";
	    $resultado=pg_query($sql);
		if($datos=pg_fetch_array($resultado)){
		$sql2="select * from usuario where cod_user='".$cod_user."' and (tipo_user='a' or tipo_user='r');";
	    $resultado2=pg_query($sql2);
		if($datos2=pg_fetch_array($resultado2)){
			
			echo'<table class="table-respuesta datos" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; background-color: rgb(153, 255, 255);"><span
style="font-weight: bold; font-style: italic;">Datos de Administrador</span><br>
</td>
</tr>
<tr>
<tr>
<td
style="vertical-align: top; width: 176px; text-align: right; background-color: rgb(102, 204, 204);">Acción:<br>
</td>
<td style="vertical-align: top; width: 227px; text-align: center;"><input
name="Borrar Datos" value="Borrar Datos" type="button"'."onclick=".'"'."submitdata('../../controlador/Administrador.php?peticion=15&cod_user=".$datos['cod_user']."'".')"><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Cedula:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nacionalidad']).''.$datos['cedula_prof'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Nombres:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nombre_1'].' '.$datos['nombre_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Apellidos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['apellido_1'].' '.$datos['apellido_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Teléfonos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos['telefono_1'].' - '.$datos['telefono_2'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Correo:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos2['correo'].'<br>
</td>
</tr>

</tbody>
</table>';
		}else{
			echo "Administrador no encontrado.";
		}
		}else{
			echo "Administrador no encontrado.";
		}
		}
		}
		
		
		
		
		
		
		function insertar_profesor($nacionalidad, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $telefono1, $telefono2, $correo){
			$on="";
			
			if(parent::validarEspacio($nacionalidad))$on.="1";else{ $on.="0"; echo "Error al insertar: nacionalidad ".$nacionalidad." no valida."; return 0;}
			if(parent::cedula($cedula))$on.="1";else{ $on.="0"; echo "Error al insertar: cedula ".$cedula." no valida."; return 0;}
			if(parent::validarEspacio($nombre1))$on.="1";else{ $on.="0"; echo "Error al insertar: nombre ".$nombre1." no valido."; return 0;}
			if($nombre2!="")if(parent::validarEspacio($nombre2))$on.="1";else{ $on.="0"; echo "Error al insertar: nombre ".$nombre2." no valido."; return 0;}
			if(parent::validarEspacio($apellido1))$on.="1";else{ $on.="0"; echo "Error al insertar: apellido ".$apellido1." no valido."; return 0;}
			if($apellido2!="")if(parent::validarEspacio($apellido2))$on.="1";else{ $on.="0"; echo "Error al insertar: apellido ".$apellido2." no valido.";return 0;}
			if(parent::validarTele($telefono1))$on.="1";else{ $on.="0"; echo "Error al insertar: telefono ".$telefono1." no valido.";return 0;}
			if($telefono2!="")if(parent::validarTele($telefono2))$on.="1";else{ $on.="0"; echo "Error al insertar: telefono ".$telefono2." no valido.";return 0;}
			if(parent::validarEmail($correo))$on.="1";else{ $on.="0"; echo "Error al insertar: correo".$correo." no valida.";return 0;}
		
			
			 
		if(!strrpos($on, "0")>0)if(parent::conectar()){
		/*para la subida a la db usamos utf8_decode y para mostrar usamos utf8_encode.. en la db debe estar utf8*/
		
		
		if(!$this->chequear_registro("profesor", "cod_profesor", substr(md5($cedula), 0, 10))){
			$cod=substr(md5($cedula), 0, 5).rand(0,99999);
			 pg_query("START TRANSACTION");
			$resultado1=pg_query("INSERT INTO usuario (cod_user, nombre_user, clave_user, correo, tipo_user) 
			VALUES ('".$cod."', 'profesor".$cedula."ubv', '".md5($cedula)."', '".$correo."', 'p');");
			
			$resultado2=pg_query("INSERT INTO profesor (cod_profesor, nacionalidad, cedula_prof, nombre_1, nombre_2, apellido_1, apellido_2, telefono_1, telefono_2, cod_user) VALUES ('".substr(md5($cedula), 0, 10)."', '".$nacionalidad."', '".$cedula."', '".$nombre1."', '".$nombre2."', '".$apellido1."', '".$apellido2."', '".$telefono1."', '".$telefono2."', '".$cod."');");
		             		
			if($resultado1 and $resultado2){pg_query("COMMIT"); echo "Profesor registrado exitosamente.";}else{ pg_query("ROLLBACK"); echo "No se pudo registrar profesor.";}
			}else{
				echo "Cédula ya registrada.";
			}
		
		}
	}

		
	
	
	
	
	
	function obtener_profesor_cuadro_para_form($cedula_profesor){
		if(parent::conectar() && parent::cedula($cedula_profesor)){
		$ban=0;	 

		
		$sql4="SELECT * FROM profesor where cedula_prof='".$cedula_profesor."';";
		$resultado4=pg_query($sql4);
		
		
		echo '<table class="table-respuesta Busqueda de Estudiante"><tbody>
		
<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
			
		$sql="SELECT * FROM usuario where cod_user='".$datos4['cod_user']."' and tipo_user='p';";
		$resultado=pg_query($sql);
		if($dato=pg_fetch_array($resultado)){
		
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=31&cod_user=".$datos4['cod_user']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_prof'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>';



		$ban=1;	
		
		}
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
	}
}	

	
	
	
	
	
	
	
	function obtener_profesor_todos_para_form(){
		if(parent::conectar()){
		$ban=0;	 
		
		
		$sql4="SELECT * FROM profesor";
		$resultado4=pg_query($sql4);
		
		
		echo '<table class="table-respuesta Busqueda de Estudiante"><tbody>
		
<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
			$sql="SELECT * FROM usuario where tipo_user='p' and cod_user='".$datos4['cod_user']."'";
		    $resultado=pg_query($sql);
			if($datos=pg_fetch_array($resultado)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=31&cod_user=".$datos4['cod_user']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_prof'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>';



		$ban=1;	
		
			}
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
	}
}	

	
	
	
	
	
	
	
	
	
function datos_profesor_form_otros($cod_user){
		
		if(parent::conectar()){
			
			$sql="select * from profesor where cod_user='".$cod_user."'";
			$resultado=pg_query($sql);
			$datos=pg_fetch_array($resultado);
			
			$sql1="select * from usuario where cod_user='".$cod_user."'";
			$resultado1=pg_query($sql1);
			$datos1=pg_fetch_array($resultado1);
			
			
			$salida="<table class='table-respuesta datos-editar' border='1'>";
			
			$salida.="<tr>";
			$salida.="<td colspan='2'>";
			$salida.="<h3>Editar Datos de Profesor</h3>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Codigo de usuario:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="02".$datos['cod_user'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Nacionalidad:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<select id="nacionalidad" name="nacionalidad" placeholder="Solo letras.">';
			$salida.='<option value="'.$datos['nacionalidad'].'">';
			$salida.=strtoupper($datos['nacionalidad']);
			$salida.='</option>';
			if($datos['nacionalidad']!="v") $salida.='<option value="v">V</option>';
			if($datos['nacionalidad']!="e") $salida.='<option value="e">E</option>';
			$salida.="</select>";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nacionalidad&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nacionalidad').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="C&eacute;dula:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="number" id="cedula" name="cedula" value="'.$datos['cedula_prof'].'" size="20" maxlength="8" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cedula_prof&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('cedula').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="nombre1" name="nombre1" value="'.$datos['nombre_1'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo nombre:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="nombre2" name="nombre2" value="'.$datos['nombre_2'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="apellido1" name="apellido1" value="'.$datos['apellido_1'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo apellido:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="apellido2" name="apellido2" value="'.$datos['apellido_2'].'" size="20" maxlength="20" placeholder="Solo letras.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Primer tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="telefono1" name="telefono1" value="'.$datos['telefono_1'].'" size="20" maxlength="11" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono1').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Segundo tel&eacute;fono:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="telefono2" name="telefono2" value="'.$datos['telefono_2'].'" size="20" maxlength="11" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono2').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Correo:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="correo" name="correo" value="'.$datos1['correo'].'" size="20" maxlength="150" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=correo&cod_user=".$datos['cod_user']."&tabla=usuario&valor='+document.getElementById('correo').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="<tr>";
				$salida.="<td colspan='3'>";
				
				
				$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nacionalidad&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nacionalidad').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cedula_prof&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('cedula').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nombre2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('nombre2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=apellido2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('apellido2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono1&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono1').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono2').value".");"."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=telefono2&cod_user=".$datos['cod_user']."&tabla=profesor&valor='+document.getElementById('telefono2').value".");multiconsultas();".'"'.">Guardar Todo</button>";
				
				
				$salida.="</td>";
			$salida.="</tr>";
			
			
			$salida.="</table>";
		
			echo $salida;
		}
	}
	
	
	
	
	
	
function obtener_profesor_cuadro($cedula_profesor){
		if(parent::conectar() && parent::cedula($cedula_profesor)){
		$ban=0;	 
		
		
		$sql4="SELECT * FROM profesor where cedula_prof='".$cedula_profesor."';";
		$resultado4=pg_query($sql4);
		
		
		echo '<table class="table-respuesta Busqueda de Estudiante"><tbody>
		
<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
			$sql="SELECT * FROM usuario where cod_user='".$datos4['cod_user']."' and tipo_user='p';";
		$resultado=pg_query($sql);
		if($dato=pg_fetch_array($resultado)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=33&cod_user=".$datos4['cod_user']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_prof'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>';



		$ban=1;	
		
		}
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
	}
}	



function obtener_profesor_cuadro_privilegio($cedula_profesor){
		if(parent::conectar() && parent::cedula($cedula_profesor)){
		$ban=0;	 
		
		
		$sql4="SELECT * FROM profesor where cedula_prof='".$cedula_profesor."';";
		$resultado4=pg_query($sql4);
		
		
		echo '<table class="table-respuesta Busqueda de Estudiante"><tbody>
		
<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
			$sql="SELECT * FROM usuario where cod_user='".$datos4['cod_user']."' and tipo_user='p';";
		$resultado=pg_query($sql);
		if($dato=pg_fetch_array($resultado)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=48&cod_user=".$datos4['cod_user']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_prof'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>';



		$ban=1;	
		
		}
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
	}
}	









function obtener_profesor_cuadro_privilegio_quitar($cedula_profesor){
		if(parent::conectar() && parent::cedula($cedula_profesor)){
		$ban=0;	 
		
		
		$sql4="SELECT * FROM profesor where cedula_prof='".$cedula_profesor."';";
		$resultado4=pg_query($sql4);
		
				echo '<table class="table-respuesta Busqueda de Estudiante"><tbody>
		
<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
			$sql="SELECT * FROM usuario where cod_user='".$datos4['cod_user']."' and tipo_user='r';";
		$resultado=pg_query($sql);
		if($dato=pg_fetch_array($resultado)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=51&cod_user=".$datos4['cod_user']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_prof'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>';



		$ban=1;	
		
		}
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		
	}
}	








	
	
	function obtener_profesor($cod_user){
		if(parent::conectar()){
		$sql="select * from profesor where cod_user='".$cod_user."';";
	    $resultado=pg_query($sql);
		if($datos=pg_fetch_array($resultado)){
		$sql2="select * from usuario where cod_user='".$cod_user."';";
	    $resultado2=pg_query($sql2);
		if($datos2=pg_fetch_array($resultado2)){
			
			echo'<table class="table-respuesta datos" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; background-color: rgb(153, 255, 255);"><span
style="font-weight: bold; font-style: italic;">Datos de Profesor</span><br>
</td>
</tr>
<tr>
<tr>
<td
style="vertical-align: top; width: 176px; text-align: right; background-color: rgb(102, 204, 204);">Acción:<br>
</td>
<td style="vertical-align: top; width: 227px; text-align: center;"><input
name="Borrar Datos" value="Borrar Datos" type="button"'."onclick=".'"'."submitdata('../../controlador/Administrador.php?peticion=15&cod_user=".$datos['cod_user']."'".')"><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Cedula:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nacionalidad']).''.$datos['cedula_prof'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Nombres:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nombre_1'].' '.$datos['nombre_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Apellidos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['apellido_1'].' '.$datos['apellido_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Teléfonos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos['telefono_1'].' - '.$datos['telefono_2'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Correo:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos2['correo'].'<br>
</td>
</tr>

</tbody>
</table>';
		}else{
			echo "Administrador no encontrado.";
		}
		}else{
			echo "Administrador no encontrado.";
		}
		}
		}
		
		
		
		
		
		
		
		
		function obtener_profesor_privilegio($cod_user){
		if(parent::conectar()){
		$sql="select * from profesor where cod_user='".$cod_user."';";
	    $resultado=pg_query($sql);
		if($datos=pg_fetch_array($resultado)){
		$sql2="select * from usuario where cod_user='".$cod_user."';";
	    $resultado2=pg_query($sql2);
		if($datos2=pg_fetch_array($resultado2)){
			
			echo'<table class="table-respuesta datos" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; background-color: rgb(153, 255, 255);"><span
style="font-weight: bold; font-style: italic;">Datos de Profesor</span><br>
</td>
</tr>
<tr>
<tr>
<td
style="vertical-align: top; width: 176px; text-align: right; background-color: rgb(102, 204, 204);">Acción:<br>
</td>
<td style="vertical-align: top; width: 227px; text-align: center;"><input
name="Previligiar" value="Privilegiar" type="button"'."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=tipo_user&tabla=usuario&valor=r&cod_user=".$datos['cod_user']."'".')"><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Cedula:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nacionalidad']).''.$datos['cedula_prof'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Nombres:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nombre_1'].' '.$datos['nombre_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Apellidos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['apellido_1'].' '.$datos['apellido_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Teléfonos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos['telefono_1'].' - '.$datos['telefono_2'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Correo:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos2['correo'].'<br>
</td>
</tr>

</tbody>
</table>';
		}else{
			echo "Administrador no encontrado.";
		}
		}else{
			echo "Administrador no encontrado.";
		}
		}
		}
		
		
		
		
		
		
		
		function obtener_profesor_privilegio_quitar($cod_user){
		if(parent::conectar()){
		$sql="select * from profesor where cod_user='".$cod_user."';";
	    $resultado=pg_query($sql);
		if($datos=pg_fetch_array($resultado)){
		$sql2="select * from usuario where cod_user='".$cod_user."';";
	    $resultado2=pg_query($sql2);
		if($datos2=pg_fetch_array($resultado2)){
			
			echo'<table class="table-respuesta datos" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="2" rowspan="1"
style="vertical-align: top; background-color: rgb(153, 255, 255);"><span
style="font-weight: bold; font-style: italic;">Datos de Profesor</span><br>
</td>
</tr>
<tr>
<tr>
<td
style="vertical-align: top; width: 176px; text-align: right; background-color: rgb(102, 204, 204);">Acción:<br>
</td>
<td style="vertical-align: top; width: 227px; text-align: center;"><input
name="Convertir en administrador" value="Restringir" type="button"'."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=tipo_user&tabla=usuario&valor=p&cod_user=".$datos['cod_user']."'".')"><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Cedula:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nacionalidad']).''.$datos['cedula_prof'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Nombres:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['nombre_1'].' '.$datos['nombre_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(153, 255, 255);">Apellidos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.strtoupper($datos['apellido_1'].' '.$datos['apellido_2']).'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Teléfonos:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos['telefono_1'].' - '.$datos['telefono_2'].'<br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; text-align: right; width: 176px; background-color: rgb(102, 204, 204);">Correo:<br>
</td>
<td style="vertical-align: top; width: 227px;text-align: center;">'.$datos2['correo'].'<br>
</td>
</tr>

</tbody>
</table>';
		}else{
			echo "Administrador no encontrado.";
		}
		}else{
			echo "Administrador no encontrado.";
		}
		}
		}
		
		
		
		
		


function obtener_profesor_lista(){
		if(parent::conectar()){
		$sql="SELECT * FROM profesor";
		$resultado=pg_query($sql);
		while($datos=pg_fetch_array($resultado)){
		echo "<option value='".$datos['cod_profesor']."'>".$datos['cedula_prof']." (".$datos['nombre_1']." - ".$datos['apellido_1'].")</option>";
		} 
		}
		}
	





	function registrar_seccion($cod_seccion, $cod_idioma, $nivel, $maximo_de_est, $cod_profesor, $estado){
		
		
		$on="";
			
		if(parent::validarEspacio($cod_seccion))$on.="1";else{ $on.="0"; echo "Error al insertar: cod_seccion ".$cod_seccion." no valido."; return 0;}
			if(parent::validarEspacio($cod_idioma))$on.="1";else{ $on.="0"; echo "Error al insertar: cod_idioma ".$cod_idioma." no valido."; return 0;}
			if(parent::cedula($nivel))$on.="1";else{ $on.="0"; echo "Error al insertar: nivel ".$nivel." no valido."; return 0;}
			if(parent::cedula($maximo_de_est))$on.="1";else{ $on.="0"; echo "Error al insertar: maximo_de_est ".$maximo_de_est." no valido."; return 0;}
			if($cod_profesor!="")$on.="1";else{ $on.="0"; echo "Error al insertar: cod_profesor ".$cod_profesor." no valido."; return 0;}
			if($estado!="")$on.="1";else{ $on.="0"; echo "Error al insertar: estado ".$estado." no valido."; return 0;}
			
			 
		if(!strrpos($on, "0")>0 && parent::conectar()){
		if(!$this->chequear_registro("seccion", "cod_seccion", $cod_seccion)){
		$sql="INSERT into seccion(cod_seccion, cod_idioma, nivel, maximo_de_est, cod_profesor, estado) values ('".$cod_seccion."', '".$cod_idioma."', '".$nivel."', '".$maximo_de_est."', '".$cod_profesor."', '".$estado."')";
			if(pg_query($sql)){
				echo "Seccion registrada exitosamente.";	
			}else{
				echo "No se pudo registrar seccion.";
			}
		}else{echo "Código de seccion ya exite.";}	
	}
}





		function obtener_seccion_form($cod_seccion){
			
			
			if(parent::conectar()){
			
			$sql="select * from seccion where cod_seccion='".$cod_seccion."'";
			$resultado=pg_query($sql);
			$datos=pg_fetch_array($resultado);
			
			
			$salida="<table class='table-respuesta datos-editar' border='1'>";
			
			$salida.="<tr>";
			$salida.="<td colspan='2'>";
			$salida.="<h3>Editar Datos de Secci&oacute;n</h3>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Codigo de secci&oacute;n:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="".$datos['cod_seccion'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Idioma:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<select name="cod_idioma" id="cod_idioma" required x-moz-errormessage="Seleccione una opción" placeholder="Seleccione una opción" style="width(*):100px">';
			
		$sql_idioma="SELECT * FROM idioma";
		$resultado_idioma=pg_query($sql_idioma);
		while($datos_idioma=pg_fetch_array($resultado_idioma)){
		if($datos_idioma['cod_idioma']!=$datos['cod_idioma'])
		$salida.= "<option value='".$datos_idioma['cod_idioma']."'>".$datos_idioma['idioma']." (C&oacute;digo:".$datos_idioma['cod_idioma']." - Niveles:".$datos_idioma['niveles'].")</option>";
		else $salida.= "<option selected='selected' value='".$datos_idioma['cod_idioma']."'>".$datos_idioma['idioma']." (C&oacute;digo:".$datos_idioma['cod_idioma']." - Niveles:".$datos_idioma['niveles'].")</option>";
		} 
		
			$salida.="</select>";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=36&campo=cod_idioma&cod_seccion=".$datos['cod_seccion']."&tabla=seccion&valor='+document.getElementById('cod_idioma').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Nivel:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			
			$salida.='<select name="nivel" id="nivel" required x-moz-errormessage="Seleccione una opción" placeholder="Seleccione una opción" style="width(*):100px">';
			
$salida.='<option value="'.$datos['nivel'].'" selected="selected">'.$datos['nivel'].'</option>';
if($datos['nivel']!="1")$salida.='<option value="1">1</option>';
if($datos['nivel']!="2")$salida.='<option value="2">2</option>';
if($datos['nivel']!="3")$salida.='<option value="3">3</option>';
if($datos['nivel']!="4")$salida.='<option value="4">4</option>';
if($datos['nivel']!="5")$salida.='<option value="5">5</option>';
$salida.="</select>";
			
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=36&campo=nivel&cod_seccion=".$datos['cod_seccion']."&tabla=seccion&valor='+document.getElementById('nivel').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="M&aacute;ximo de estudiantes:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input name="maximo_de_est" id="maximo_de_est" value="'.$datos['maximo_de_est'].'" maxlength="2" placeholder="Numeros Enteros." pattern="[0-9]{0,8}" required>';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=36&campo=maximo_de_est&cod_seccion=".$datos['cod_seccion']."&tabla=seccion&valor='+document.getElementById('maximo_de_est').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Profesor:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
						
			$salida.='<select name="cod_profesor" id="cod_profesor" style="width(*):100px">';
			
		$sql_profesor="SELECT * FROM profesor";
		$resultado_profesor=pg_query($sql_profesor);
		$ban1=0;
		while($datos_profesor=pg_fetch_array($resultado_profesor)){
			
		if($datos['cod_profesor']==NULL && $ban1==0){
			$salida.= "<option value='' selected='selected'></option>";
			$ban1=1;
		}
		
		if($datos_profesor['cod_profesor']!=$datos['cod_profesor'])
		$salida.= "<option value='".$datos_profesor['cod_profesor']."'>".$datos_profesor['cedula_prof']." (".$datos_profesor['nombre_1']." - ".$datos_profesor['apellido_1'].")</option>";
		
		else $salida.= "<option selected='selected' value='".$datos_profesor['cod_profesor']."'>".$datos_profesor['cedula_prof']." (".$datos_profesor['nombre_1']." - ".$datos_profesor['apellido_1'].")</option>";
		
		} 
		
			$salida.="</select>";
			
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=36&campo=cod_profesor&cod_seccion=".$datos['cod_seccion']."&tabla=seccion&valor='+document.getElementById('cod_profesor').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			
						$salida.="<tr>";
			$salida.="<td>";
			$salida.="Estado:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			
			$salida.='<select name="estado" id="estado" required x-moz-errormessage="Seleccione una opción" placeholder="Seleccione una opción" style="width(*):100px">';
			
$salida.='<option value="'.$datos['estado'].'" selected="selected">';
if($datos['estado']=="a")$salida.='activo';
if($datos['estado']=="i")$salida.='inactivo';
echo '</option>';
if($datos['estado']!="a")$salida.='<option value="a">activo</option>';
if($datos['estado']!="i")$salida.='<option value="i">inactivo</option>';
$salida.="</select>";
			
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=36&campo=estado&cod_seccion=".$datos['cod_seccion']."&tabla=seccion&valor='+document.getElementById('estado').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			
			
			$salida.="</table>";
		
			echo $salida;
		}
			
		}






function registrar_horario($cod_seccion,$dia,$turno,$horae,$horas,$aula){
		
	
		$on="";
			
		if(parent::validarEspacio($cod_seccion))$on.="1";else{ $on.="0"; echo "Error al insertar: cod_seccion ".$cod_seccion." no valido."; return 0;}
			if(parent::validarEspacio($dia))$on.="1";else{ $on.="0"; echo "Error al insertar: dia ".$dia." no valido."; return 0;}
			if(parent::validarEspacio($turno))$on.="1";else{ $on.="0"; echo "Error al insertar: turno ".$turno." no valido."; return 0;}
			if($horae!="")$on.="1";else{ $on.="0"; echo "Error al insertar: hora de entrada ".$horae." no valido."; return 0;}
			if($horas!="")$on.="1";else{ $on.="0"; echo "Error al insertar: hora de salida ".$horas." no valido."; return 0;}
			if($aula!="")$on.="1";else{ $on.="0"; echo "Error al insertar: aula ".$aula." no valido."; return 0;}
			
			 
		if(!strrpos($on, "0")>0 && parent::conectar()){
			
		pg_query("START TRANSACTION");
		$sql="select MAX(cod_horario) from horario";
		$resultado=pg_query($sql);
		$cod_horario=pg_fetch_array($resultado);
		
		
		$sql="INSERT INTO horario VALUES ('".($cod_horario[0]+1)."', '".$cod_seccion."', '".$dia."', '".$turno."', '".$horae."', '".$horas."', '".$aula."');";
			if(pg_query($sql)){
				pg_query("COMMIT");
				echo "Horario registrado exitosamente.";	
			}else{
				pg_query("ROLLBACK");
				echo "No se pudo registrar horario.";
			}
			
	}
}









function obtener_horario_seccion($cod_seccion){
		if(parent::conectar()){
		$ban=0;	 
		
		
		$sql4="SELECT * FROM horario where cod_seccion='".$cod_seccion."';";
		$resultado4=pg_query($sql4);
		
		
		echo '<br><center><table class="table-respuesta datos-editar margen25 margen25-1280 margen25-1024 Busqueda de Estudiante" ><tbody>
		
<tr>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Secci&oacute;n<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Dias<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Turno<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Hora entrada<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Hora salida<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Aula<br>
</td>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Acci&oacute;n<br>
</td>
</tr>';
		
		while($datos4=pg_fetch_array($resultado4)){
			
echo '<tr>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.$datos4['cod_seccion'].'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.$datos4['dia'].'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.$datos4['turno'].'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.$datos4['hora_inicio'].'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.$datos4['hora_fin'].'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.$datos4['aula'].'<br>
</td>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><button '."onclick=".'"'."submitdata('../../controlador/Administrador.php?peticion=39&cod=".$datos4['cod_horario']."'".')">Borrar</button><br>
</td>
</tr>';




		$ban=1;	
			
		}
		
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="7" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta B&uacute;squeda</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table></center>";
		
	}
}	










function obtener_seccion_cuadro_nota($seccion){
			$ban=0;
		if(parent::conectar()){
		$sql="SELECT * FROM seccion where cod_seccion='".$seccion."'";
		$resultado=pg_query($sql);
		if($datos=pg_fetch_array($resultado)){
			/////////////
			
			
		$sql1="SELECT * FROM profesor where cod_profesor='".$datos['cod_profesor']."'";
		$resultado1=pg_query($sql1);
		if($datos1=pg_fetch_array($resultado1)){
			
		////////////	
		$sql2="SELECT * FROM idioma where cod_idioma='".$datos['cod_idioma']."'";
		$resultado2=pg_query($sql2);
		if($datos2=pg_fetch_array($resultado2)){
			
			/////////////////
			
			echo '<br><table class="table-respuesta" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">Consulta de secciónes</span><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; width: 143px; text-align: right; background-color: rgb(153, 255, 255);">Sección:<br>
</td>
<td style="vertical-align: top; width: 222px;text-align: center;">'.$seccion.' ('.$datos2['idioma'].')<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: right; background-color: rgb(153, 255, 255);">Profesor:<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; width: 174px;text-align: center;">'.$datos1['nombre_1'].' '.$datos1['apellido_1'].'<br>
</td>
</tr>

<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Nota<br>
</td>
</tr>';


		$count=1;	
		$sql3="SELECT * FROM inscripcion where cod_seccion='".$seccion."' and estado='v' and activo='a'";
		$resultado3=pg_query($sql3);
		while($datos3=pg_fetch_array($resultado3)){
			//////////
			
		$sql4="SELECT * FROM estudiante where cod_estudiante='".$datos3['cod_estudiante']."'";
		$resultado4=pg_query($sql4);
		if($datos4=pg_fetch_array($resultado4)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=14&cedula_est=".$datos4['cedula_est']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_est'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>
<td style="vertical-align: top; width: 174px;border-top:2px solid #ccc;text-align: center; ">';

echo '<input type="number" maxlength="2" readonly="readonly" size="2" max="20" min="0" value="'.$datos3['nota'].'" name="'.$count.'" id="'.$count.'">';

echo '<br>
</td>
</tr>';

$count++;
		$ban=1;	
			
		}
		
			/*
			Simplemente somos actores de tu pelicula att. Nairobis Cedeño. 
			*/
		//////////
	
		}
		//if($ban==1)echo'<a href="consultar_xls_get_admin.php?seccion='.$seccion.'">Descargar xls</a>';
		////////////	
		
		}
			
		////////////	
		}
			
		//////////////
			
			
			
			
		}
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta sección</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		if($ban==1)echo '<button '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=42&cod_seccion=".$seccion."'".')">Avanzar</button>';
                if($ban==1)echo '<button '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=42&cod_seccion=".$seccion."'".')">Avanzar</button>';
		}

		}
		
		
		
		
		
		
		
		
		
		
function obtener_seccion_cuadro_nota_otras($seccion){
			$ban=0;
		if(parent::conectar()){
		$sql="SELECT * FROM seccion where cod_seccion='".$seccion."'";
		$resultado=pg_query($sql);
		if($datos=pg_fetch_array($resultado)){
			/////////////
			
			
		$sql1="SELECT * FROM profesor where cod_profesor='".$datos['cod_profesor']."'";
		$resultado1=pg_query($sql1);
		if($datos1=pg_fetch_array($resultado1)){
			
		////////////	
		$sql2="SELECT * FROM idioma where cod_idioma='".$datos['cod_idioma']."'";
		$resultado2=pg_query($sql2);
		if($datos2=pg_fetch_array($resultado2)){
			
			/////////////////
			
			echo '<br><table class="table-respuesta" border="1"
cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">Consulta de secciónes</span><br>
</td>
</tr>
<tr>
<td
style="vertical-align: top; width: 143px; text-align: right; background-color: rgb(153, 255, 255);">Sección:<br>
</td>
<td style="vertical-align: top; width: 222px;text-align: center;">'.$seccion.' ('.$datos2['idioma'].')<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: right; background-color: rgb(153, 255, 255);">Profesor:<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; width: 174px;text-align: center;">'.$datos1['nombre_1'].' '.$datos1['apellido_1'].'<br>
</td>
</tr>

<tr>
<td
style="vertical-align: top; width: 143px; text-align: center; background-color: rgb(0, 204, 204);">Cédula<br>
</td>
<td
style="vertical-align: top; width: 222px; text-align: center; background-color: rgb(0, 204, 204);">Nombres<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Apellidos<br>
</td>
<td
style="vertical-align: top; width: 174px; text-align: center; background-color: rgb(0, 204, 204);">Teléfonos<br>
</td>
<td
style="vertical-align: top; width: 167px; text-align: center; background-color: rgb(0, 204, 204);">Nota<br>
</td>
</tr>';


		$count=1;	
		$sql3="SELECT * FROM inscripcion where cod_seccion='".$seccion."' and estado='v' and activo='a'";
		$resultado3=pg_query($sql3);
		while($datos3=pg_fetch_array($resultado3)){
			//////////
			
		$sql4="SELECT * FROM estudiante where cod_estudiante='".$datos3['cod_estudiante']."'";
		$resultado4=pg_query($sql4);
		if($datos4=pg_fetch_array($resultado4)){
			
echo '<tr>
<td style="vertical-align: top; width: 143px; border-top:2px solid #ccc;text-align: center; "><a href="#" '."onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=14&cedula_est=".$datos4['cedula_est']."'".')">'.strtoupper($datos4['nacionalidad']).$datos4['cedula_est'].'</a><br>
</td>
<td style="vertical-align: top; width: 222px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['nombre_1']." ".$datos4['nombre_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['apellido_1']." ".$datos4['apellido_2']).'<br>
</td>
<td style="vertical-align: top; width: 167px;border-top:2px solid #ccc;text-align: center; ">'.strtoupper($datos4['telefono_1']."<br>".$datos4['telefono_2']).'<br>
</td>
<td style="vertical-align: top; width: 174px;border-top:2px solid #ccc;text-align: center; ">';

echo '<input type="number" maxlength="2" readonly="readonly" size="2" max="20" min="0" value="'.$datos3['nota'].'" name="'.$count.'" id="'.$count.'">';

echo '<br>
</td>
</tr>';

$count++;
		$ban=1;	
			
		}
		
			/*
			Simplemente somos actores de tu pelicula att. Nairobis Cedeño. 
			*/
		//////////
	
		}
		//if($ban==1)echo'<a href="consultar_xls_get_admin.php?seccion='.$seccion.'">Descargar xls</a>';
		////////////	
		
		}
			
		////////////	
		}
			
		//////////////
			
			
			
			
		}
		
		if($ban==0){
		
		echo '<tr align="center">
<td colspan="6" rowspan="1"
style="vertical-align: top; background-color: rgb(102, 204, 204);"><span
style="font-weight: bold; font-style: italic;">No existen registros para esta sección</span><br>
</td>
</tr>';	
			
		}
		
		echo "</tbody></table>";
		if($ban==1){$salida="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=47&seccion_old=".$seccion."&seccion_new='+document.getElementById('seccion_2').value".");".'"'.">Avanzar</button>";
		echo $salida;}
		}

		}
		
		
		
		


	function avanzar_seccion($cod_seccion){
		if(parent::conectar()){
		
	    pg_query("START TRANSACTION");
		pg_query("SAVEPOINT avanzar");
		
		$sql="select idioma from seccion, idioma where cod_seccion='".$cod_seccion."' and seccion.cod_idioma=idioma.cod_idioma";
		$resulado=pg_query($sql);
		$idioma=pg_fetch_array($resulado);

		
		$sql="select * from inscripcion where cod_seccion='".$cod_seccion."' and activo='a' and estado='v'";
		$resulado=pg_query($sql);
		
		$contar="select count(*) from inscripcion where cod_seccion='".$cod_seccion."' and activo='a' and estado='v'";
		$contar=pg_query($contar);
		$contar=pg_fetch_array($contar);
				
		$count=0;
		while($inscripciones=pg_fetch_array($resulado)){
			
		if($inscripciones['nota']>=10 && $inscripciones['nota']!=""){
			if(pg_query("insert into egresado (cod_estudiante, idioma, cod_egresado) values('".$inscripciones['cod_estudiante']."', '".$idioma[0]."', '".$inscripciones['cod_inscripcion']."')")){ 
			  if(pg_query("update inscripcion set activo='i' where cod_estudiante='".$inscripciones['cod_estudiante']."' and cod_inscripcion='".$inscripciones['cod_inscripcion']."'")){
				 if(pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+1 WHERE cod_seccion = '".$cod_seccion."'")){
					$count++;
			  	 }
		     }
			}
		}
		
		if($inscripciones['nota']<10 && $inscripciones['nota']!=""){
			/*if(pg_query("insert into inscripcion (cod_inscripcion, fecha, cod_estudiante, cod_seccion, estado, hora, activo) VALUES ('".substr(md5($inscripciones['cod_estudiante']), 0, 4).rand(1,99999)."i', '".date("d-m-y")."', '".$inscripciones['cod_estudiante']."', '".$inscripciones['cod_seccion']."', 's', '".date("H:i")."', 'a');")){ */
			
			  if(pg_query("update inscripcion set activo='i' where cod_estudiante='".$inscripciones['cod_estudiante']."' and cod_inscripcion='".$inscripciones['cod_inscripcion']."'")){
				if(pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+1 WHERE cod_seccion = '".$cod_seccion."'")){
					$count++;
			  	 }
			  }
		   /*}*/
		}
			
		}//fin while
		if($contar[0]==$count){pg_query("COMMIT"); echo "Estudiantes avanzados satisfactoriamente!.";}
		else{ pg_query("ROLLBACK TO SAVEPOINT avanzar"); echo "No se pudo avanzar estudiantes!.";}
		//echo "cambiad@ exitosamente!.".$sql;
		
	}
	}
	
	
	
	

function inscribir_est($cod_seccion, $cedula_est){
	
	if(parent::conectar()){
		
	    pg_query("START TRANSACTION");
		
		$sql="select * from seccion where cod_seccion='".$cod_seccion."'";
		$resultado=pg_query($sql);
		$datos=pg_fetch_array($resultado);
		
		$sql2="select count(*) from inscripcion where cod_estudiante='".substr(md5($cedula_est), 0, 10)."' and activo='a'";
		$resultado2=pg_query($sql2);
		$activo=pg_fetch_array($resultado2);
		
		if($activo[0]==0){
		
		if($datos['maximo_de_est']>0){
			
		 if($this->chequear_registro("estudiante", "cod_estudiante", substr(md5($cedula_est), 0, 10))){
	
			
			if(pg_query("INSERT INTO inscripcion (cod_inscripcion, fecha, cod_estudiante, cod_seccion, estado, hora, activo) VALUES ('".substr(md5($cedula_est), 0, 4).rand(1,99999)."i', '".date("d-m-y")."', '".substr(md5($cedula_est), 0, 10)."', '".$cod_seccion."', 's', '".date("H:i")."', 'a');")){
				 pg_query("COMMIT");
				 echo "Inscripcion realizada.";
			}else{
				 pg_query("ROLLBACK");
				 echo "Inscripcion NO realizada.";
			}
			
			
			
		}else{
			
			echo "Estudiante no esta registrado.".substr(md5($cedula_est), 0, 10);
			
		}
		}else{
			
			echo "Seccion llena.";
			
		}
		
		}else{
			echo "Ya tiene una inscripcion abierta.";
		}
		
		
		}
		
		
	
	
}



function obtener_datos_inscripcion($cod_inscripcion){
	
	if(parent::conectar()){
	$sql="select * from inscripcion where cod_inscripcion='".$cod_inscripcion."'";
	$resultado=pg_query($sql);
	$datos=pg_fetch_array($resultado);
	return $datos;
	}else{
	return NULL;	
	}
}





function obtener_inscripcion_form($cod_inscripcion){
	if(parent::conectar()){
			
			
			$sql1="select * from inscripcion where cod_inscripcion='".$cod_inscripcion."'";
			$resultado1=pg_query($sql1);
			$datos=pg_fetch_array($resultado1);

			$salida="<table class='table-respuesta' border='1'>";
			
			$salida.="<tr>";
			$salida.="<td colspan='2'>";
			$salida.="<h3>Editar inscripci&oacute;n</h3>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Codigo de inscripci&oacute;n:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="02".$datos['cod_inscripcion'];
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Deposito:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="text" id="deposito" name="deposito" value="'.$datos['deposito'].'" size="20" maxlength="15" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=45&campo=deposito&cod_user=".$datos['cod_inscripcion']."&tabla=inscripcion&valor='+document.getElementById('deposito').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Nota:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<input type="number" id="nota" name="nota" value="'.$datos['nota'].'" size="2" max="20" min="0" maxlength="2" placeholder="solo numeros.">';
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=nota&cod_user=".$datos['cod_inscripcion']."&tabla=inscripcion&valor='+document.getElementById('nota').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Activo:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<select id="activo" name="activo" placeholder="Solo letras.">';
			if($datos['activo']=="a") $salida.='<option selected="selected" value="a">activo</option>';
			if($datos['activo']=="i") $salida.='<option selected="selected" value="i">inactivo</option>';
			if($datos['activo']!="a") $salida.='<option value="a">activo</option>';
			if($datos['activo']!="i") $salida.='<option value="i">inactivo</option>';
			$salida.="</select>";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=activo&cod_user=".$datos['cod_inscripcion']."&tabla=inscripcion&valor='+document.getElementById('activo').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
			$salida.="<tr>";
			$salida.="<td>";
			$salida.="Secci&oacute;n:&nbsp;&nbsp;&nbsp;";
			$salida.="</td>";
			$salida.="<td>";
			$salida.='<select name="seccion" id="seccion" required x-moz-errormessage="Seleccione una opción" style="width:250px">';
			$estado=$datos['activo'];
			$sql1="SELECT * FROM seccion where maximo_de_est>0";
			$resultado1=pg_query($sql1);
			$seccion=$datos['cod_seccion'];
			while($datos=pg_fetch_array($resultado1)){
				if($seccion!=$datos['cod_seccion']){
					if($estado==$datos['estado'])$salida.= "<option value='".$datos['cod_seccion']."'>".$datos['cod_seccion']." (Nivel:".$datos['nivel']." Cupos:".$datos['maximo_de_est']." Estado:";
					
					if($datos['estado']=="a") $salida.="activa";
					if($datos['estado']=="i") $salida.="inactiva";
					
					$salida.=")</option>"; }else{
						 $salida.= "<option selected='selected' value='".$datos['cod_seccion']."'>".$datos['cod_seccion']." (Nivel:".$datos['nivel']." Cupos:".$datos['maximo_de_est']." Estado:";
					
					if($datos['estado']=="a") $salida.="activa";
					if($datos['estado']=="i") $salida.="inactiva";
					
					$salida.=")</option>";
		} 
			}
					
			$salida.="</select>";
			$salida.="</td>";
			$salida.="<td>";
			$salida.="<button onclick=".'"'."MostrarConsulta('../../controlador/Administrador.php?peticion=6&campo=cod_seccion&cod_user=".$cod_inscripcion."&tabla=inscripcion&valor='+document.getElementById('seccion').value".");".'"'.">Cambiar</button>";
			$salida.="</td>";
			$salida.="</tr>";
			
	
			
			$salida.="</table>";
		
			echo $salida;
		}
}








function avanzar_seccion_otras($seccion_old, $seccion_new){
		if(parent::conectar()){
		
	    pg_query("START TRANSACTION");
		pg_query("SAVEPOINT avanzar");
		
		$sql="select * from seccion, idioma where cod_seccion='".$seccion_old."' and seccion.cod_idioma=idioma.cod_idioma";
		$resulado=pg_query($sql);
		$idioma=pg_fetch_array($resulado);
		
		$sql="select * from seccion, idioma where cod_seccion='".$seccion_new."' and seccion.cod_idioma=idioma.cod_idioma";
		$resulado=pg_query($sql);
		$idioma2=pg_fetch_array($resulado);


		if($idioma2['idioma']!=$idioma['idioma']){ echo "La secci&oacute;n destino no es del mismo idioma."; return 0; }
		if($idioma2['maximo_de_est']<=$idioma['maximo_de_est']){ echo "La secci&oacute;n destino no cumple con la cantidad minima de cupos."; return 0; }
		
		$sql="select * from inscripcion where cod_seccion='".$seccion_old."' and activo='a' and estado='v'";
		$resulado=pg_query($sql);
		
		$contar="select count(*) from inscripcion where cod_seccion='".$seccion_old."' and activo='a' and estado='v'";
		$contar=pg_query($contar);
		$contar=pg_fetch_array($contar);
				
		$count=0;
		while($inscripciones=pg_fetch_array($resulado)){
			
		if($inscripciones['nota']>=10 && $inscripciones['nota']!=""){

			
			if(pg_query("INSERT INTO inscripcion (cod_inscripcion, fecha, cod_estudiante, cod_seccion, estado, hora, activo) VALUES ('".substr(md5($inscripciones['cod_estudiante']), 0, 4).rand(1,99999)."i', '".date("d-m-y")."', '".$inscripciones['cod_estudiante']."', '".$seccion_new."', 's', '".date("H:i")."', 'a');")){ 
			  if(pg_query("update inscripcion set activo='i' where cod_estudiante='".$inscripciones['cod_estudiante']."' and cod_inscripcion='".$inscripciones['cod_inscripcion']."'")){
				 if(pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+1 WHERE cod_seccion = '".$seccion_old."'")){
					 if(pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est-1 WHERE cod_seccion = '".$seccion_new."'")){
						$count++;
					 }
			  	 }
		     }
			}
		}
		
		if($inscripciones['nota']<10 && $inscripciones['nota']!=""){
			/*if(pg_query("insert into inscripcion (cod_inscripcion, fecha, cod_estudiante, cod_seccion, estado, hora, activo) VALUES ('".substr(md5($inscripciones['cod_estudiante']), 0, 4).rand(1,99999)."i', '".date("d-m-y")."', '".$inscripciones['cod_estudiante']."', '".$inscripciones['cod_seccion']."', 's', '".date("H:i")."', 'a');")){ */
			
			  if(pg_query("update inscripcion set activo='i' where cod_estudiante='".$inscripciones['cod_estudiante']."' and cod_inscripcion='".$inscripciones['cod_inscripcion']."'")){
				if(pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+1 WHERE cod_seccion = '".$seccion_old."'")){
					$count++;
			  	 }
			  }
		   /*}*/
		}
			
		}//fin while
		if($contar[0]==$count){pg_query("COMMIT"); echo "Estudiantes avanzados satisfactoriamente!.";}
		else{ pg_query("ROLLBACK TO SAVEPOINT avanzar"); echo "No se pudo avanzar estudiantes!.";}
		//echo "cambiad@ exitosamente!.".$sql;
		
	}
		}
		
		
		
		
		/*
		var s1 = [2, 6, 7, 10];
        var ticks = ['a', 'b', 'c', 'd'];
		*/
		
		
		
		
		
	function total_inscritos($estado){
		$matriz;
		$i=0;
		
			if(parent::conectar()){
			
			   $sql="select * from seccion where estado='a'";
			   $resultado=pg_query($sql);
			   while($row=pg_fetch_array($resultado)){
				   
				   if($estado=="")$conteo="select count(*) from inscripcion where activo='a' and cod_seccion='".$row['cod_seccion']."'";
				   else $conteo="select count(*) from inscripcion where activo='a' and estado='".$estado."' and cod_seccion='".$row['cod_seccion']."'";
				   $conteo=pg_query($conteo);
				   $conteo=pg_fetch_array($conteo);
				   $matriz[$i][$i]=$conteo[0];
				   $matriz[$i][$i+1]=$row['cod_seccion'];
   				   $i++;
			   }
			   return $matriz;

			}
	}
	
	
	function total_inscritos_idioma($estado){
		$matriz;
		$i=0;
		
			if(parent::conectar()){
			
			 $sqli="select * from idioma";
			 $resultadoi=pg_query($sqli);
			 while($row_i=pg_fetch_array($resultadoi)){
			       $suma=0;
				   $sql="select * from seccion where estado='a' and cod_idioma='".$row_i['cod_idioma']."'";
				   $resultado=pg_query($sql);
				   
				   while($row=pg_fetch_array($resultado)){
					   if($estado!="")$conteo="select count(*) from inscripcion where activo='a' and estado='".$estado."' and  cod_seccion='".$row['cod_seccion']."'";
					   else $conteo="select count(*) from inscripcion where activo='a' and cod_seccion='".$row['cod_seccion']."'";
					   $conteo=pg_query($conteo);
					   $conteo=pg_fetch_array($conteo);
					   $suma+=$conteo[0];  
				   }
			   	   $matriz[$i][$i]=$suma;
				   $matriz[$i][$i+1]=$row_i['cod_idioma'];
   				   $i++;
			
			  
		      } 
			  
			  return $matriz;
			  
			}
	}
	
	
	
	function total_inscritos_nivel($estado){
		$matriz;
		$i=0;
		
			if(parent::conectar()){
			
			 for($i=0;$i<=3;$i++){
			       $suma=0;
				   $sql="select * from seccion where estado='a' and nivel='".($i+1)."'";
				   $resultado=pg_query($sql);
				   while($row=pg_fetch_array($resultado)){
					   if($estado!="")$conteo="select count(*) from inscripcion where activo='a' and estado='".$estado."' and  cod_seccion='".$row['cod_seccion']."'";
					   else $conteo="select count(*) from inscripcion where activo='a' and cod_seccion='".$row['cod_seccion']."'";
					  
					   $conteo=pg_query($conteo);
					   $conteo=pg_fetch_array($conteo);
					   $suma+=$conteo[0];  
				   }
			   	   $matriz[$i][$i]=$suma;
				   $matriz[$i][$i+1]=($i+1);
		      } 
			  
			  return $matriz;
			  
			}
	}
	
	
	
	function aprobados_por_idioma(){
		$matriz;
		$i=0;
		
			if(parent::conectar()){
			
			 $sqli="select * from idioma";
			 $resultadoi=pg_query($sqli);
			 while($row_i=pg_fetch_array($resultadoi)){
			       $suma1=0;
				   $suma2=0;
				   $sql="select * from seccion where estado='a' and cod_idioma='".$row_i['cod_idioma']."'";
				   $resultado=pg_query($sql);
				   
				   while($row=pg_fetch_array($resultado)){
					   $conteoa="select count(*) as conteoa from inscripcion where activo='a' and estado='v' and nota>10 and nota <= 20 and cod_seccion='".$row['cod_seccion']."'";
				   	   $conteor="select count(*) as conteor from inscripcion where activo='a' and estado='v' and nota>-1 and nota <= 10 and cod_seccion='".$row['cod_seccion']."'";
					   $conteoa=pg_query($conteoa);
					   $conteoa=pg_fetch_array($conteoa);
					   $conteor=pg_query($conteor);
					   $conteor=pg_fetch_array($conteor);
					   $suma1+=$conteoa['conteoa'];  
					   $suma2+=$conteor['conteor'];  
				   }
			   	   $matriz[$i][$i]=$suma1;
				   $matriz[$i][$i+1]=$suma2;
				   $matriz[$i][$i+2]=$row_i['cod_idioma'];
   				   $i++;
			
			  
		      } 
			  
			  return $matriz;
			  
			}
			
			

	}
	
	
	
	
	function promedio_notas(){
		$matriz;
		$i=0;
		
			if(parent::conectar()){
			
			   $sql="select * from seccion where estado='a'";
			   $resultado=pg_query($sql);
			   while($row=pg_fetch_array($resultado)){
				   
				   $conteo="select sum(nota)/count(nota) as promedio from inscripcion where activo='a' and estado='v' and cod_seccion='".$row['cod_seccion']."'";
			   	   $conteo=pg_query($conteo);
				   $conteo=pg_fetch_array($conteo);
				   if($conteo['promedio']>=0){
					   $matriz[$i][$i]=round($conteo['promedio'], 2);
					   $matriz[$i][$i+1]=$row['cod_seccion'];
					   $i++;
				   }
   				   
			   }
			   return $matriz;

			}
	}
	
	function total($ar){
		if(parent::conectar()){
			

				   
				   if($ar=="a")$conteo="select count(*) as conteo from inscripcion where activo='a' and estado='v' and nota>10 and nota <= 20";
				   if($ar=="r")$conteo="select count(*) as conteo from inscripcion where activo='a' and estado='v' and nota>-1 and nota <= 10";
			   	   $conteo=pg_query($conteo);
				   $conteo=pg_fetch_array($conteo);
				   
				  
				   
				   return $conteo[0];

			}
		
	}







		
		


}

?>