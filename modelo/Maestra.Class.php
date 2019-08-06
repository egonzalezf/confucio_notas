<?php
include("Conexion.Class.php");
class ClaseMaestra extends Conexion{

function editar_atributo_reusable($campo, $valor, $cod, $tabla){
		
			if(parent::conectar()){
				$sql="";
				$chequeo=0;
				$valor=strtolower($valor);
				if(($campo=="cedula_admin" || $campo=="cedula_est" || $campo=="cedula_prof") && $this->cedula($valor)){
				if(strlen($valor)>8) return 0;
				switch($tabla){
					case "estudiante":
					     if(!parent::chequear_registro($tabla, "cod_estudiante", substr(md5($valor), 0, 10))){
						 $sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."', cod_estudiante='".substr(md5($valor), 0, 10)."' WHERE cod_user = '".$cod."';";
						 $chequeo=1;
						 $campo="cedula estudiante";
						 
						 }else $mensaje="Cédula se encuentra registrada.";
					break;
					case "profesor":
					 	if(!parent::chequear_registro($tabla,"cod_profesor", substr(md5($valor), 0, 10))){
						$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."', cod_profesor='".substr(md5($valor), 0, 10)."' WHERE cod_user = '".$cod."';";
						$chequeo=1;
						$campo="cedula profesor";
						}else $mensaje="Cédula se encuentra registrada.";	
					break;
					case "administrador":
						if(!parent::chequear_registro($tabla,"cod_administrador", substr(md5($valor), 0, 10))){
						$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."', cod_administrador='".substr(md5($valor), 0, 10)."' WHERE cod_user = '".$cod."';"; 
						$chequeo=1;
						$campo="cedula de administrador";
						}else $mensaje="Cédula se encuentra registrada.";
					break;
				}
				}
				
				if($campo=="tipo_user" && $this->validarEspacio($valor)){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_user = '".$cod."';";
				$campo="Rol";
				$chequeo=1;
				}
				
				if($campo=="nacionalidad" && $this->validarEspacio($valor)){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_user = '".$cod."';";
				$chequeo=1;
				}
				
				if($campo=="nombre1" && $this->validarEspacio($valor)){
				$sql="UPDATE ".$tabla." SET nombre_1 = '".$valor."' WHERE cod_user = '".$cod."';";
				$chequeo=1;
				}
				
				if($campo=="nombre2"){
				if($valor!=""){
					if($this->validarEspacio($valor)){
						$sql="UPDATE ".$tabla." SET nombre_2 = '".$valor."' WHERE cod_user = '".$cod."';";
						$chequeo=1;
					}
				}else{$sql="UPDATE ".$tabla." SET nombre_2 = '".$valor."' WHERE cod_user = '".$cod."';";$chequeo=1;}
				}
				
				if($campo=="apellido1" && $this->validarEspacio($valor)){
				$sql="UPDATE ".$tabla." SET apellido_1 = '".$valor."' WHERE cod_user = '".$cod."';";
				$chequeo=1;
				}
				
				if($campo=="apellido2"){
				if($valor!=""){
					if($this->validarEspacio($valor)){
						$sql="UPDATE ".$tabla." SET apellido_2 = '".$valor."' WHERE cod_user = '".$cod."';";
						$chequeo=1;
					}
				}else{$sql="UPDATE ".$tabla." SET apellido_2 = '".$valor."' WHERE cod_user = '".$cod."';";$chequeo=1;}
				}
				
				if($campo=="telefono1" && $this->validarTele($valor)){
				$sql="UPDATE ".$tabla." SET telefono_1 = '".$valor."' WHERE cod_user = '".$cod."';";
				$chequeo=1;
				}
				if($campo=="telefono1"){
				if($valor!=""){
					if($this->validarTele($valor)){
						$sql="UPDATE ".$tabla." SET telefono_1 = '".$valor."' WHERE cod_user = '".$cod."';";
						$chequeo=1;
					}
				}else {$sql="UPDATE ".$tabla." SET telefono_1 = '".$valor."' WHERE cod_user = '".$cod."';";$chequeo=1;}
				}
				if($campo=="telefono2"){
				if($valor!=""){
					if($this->validarTele($valor)){
						$sql="UPDATE ".$tabla." SET telefono_2 = '".$valor."' WHERE cod_user = '".$cod."';";
						$chequeo=1;
					}
				}else {$sql="UPDATE ".$tabla." SET telefono_2 = '".$valor."' WHERE cod_user = '".$cod."';";$chequeo=1;}
				}
				
				if($campo=="correo" && $this->validarEmail($valor)){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_user = '".$cod."';";
				$chequeo=1;
				}
					
				if($campo=="direccion"){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_user = '".$cod."';";
				$chequeo=1;
				}
				
				if($campo=="trabajo"){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_user = '".$cod."';";
				$chequeo=1;
				}
				
				if($campo=="cargo"){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_user = '".$cod."';";
				$chequeo=1;
				}
				
				if($campo=="fecha" && checkdate(substr($valor, 5, 2), substr($valor, 8, 9), substr($valor, 0, 4))){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_user = '".$cod."';";	
				$chequeo=1;
				}
				
				if($campo=="idioma" && $this->validarEspacio($valor)){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_idioma = '".$cod."';";	
				$chequeo=1;
				}
				
				if($campo=="niveles" && $this->cedula($valor)){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_idioma = '".$cod."';";	
				$chequeo=1;
				}
				
				if($campo=="cod_idioma" && $tabla=="seccion" && $this->validarEspacio($valor)){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_seccion = '".$cod."';";
				$chequeo=1;
				}
				
				if($campo=="nivel" && $this->cedula($valor)){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_seccion = '".$cod."';";	
				$chequeo=1;
				}
				
				if($campo=="maximo_de_est" && $this->cedula($valor)){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_seccion = '".$cod."';";
			    $campo="maximo de inscripciones posibles";
				$chequeo=1;
				}
				
				if($campo=="cod_profesor" && $tabla=="seccion" && $valor!=""){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_seccion = '".$cod."';";
				$campo="profesor";
				$chequeo=1;
				}
				
				if($campo=="nota" && $tabla=="inscripcion" && $cod!="nota_en_grupo"){
				
				if($valor!="" && $valor>=0 && $valor<=20){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_inscripcion = '".$cod."';";
				$chequeo=1;
				}
				if($valor==""){
				$sql="UPDATE ".$tabla." SET ".$campo." = NULL WHERE cod_inscripcion = '".$cod."';";
				$chequeo=1;
				}
				
				}
				if($campo=="estado" && $tabla=="seccion"){
				$sql2="select * from inscripcion where cod_seccion='".$cod."' and activo='a'";
				$resultado2=pg_query($sql2);
				while($datos2=pg_fetch_array($resultado2)){
					if($datos2['activo']=="a")$mensaje_2="Lo siento pero exinten inscritos en la seccion.";
				}
				
				if(($valor=="a" || $valor=="i") && !isset($mensaje_2)){
				$sql="UPDATE ".$tabla." SET ".$campo." = '".$valor."' WHERE cod_seccion = '".$cod."';";
				$chequeo=1;
				}else{
				if(isset($mensaje_2))echo $mensaje_2." No se pudo cambiar campo: Estado!.";
				}
				}
				
					
					
				if($campo=="deposito" && $tabla=="inscripcion"){
				
				include("AdministradorModel.Class.php");
				$objeto=new AdministradorModelo();
				$objeto->validar_inscripcion_activos_inactivos($cod, $valor);
		
				}	
				
				
				if($campo=="activo" && $tabla=="inscripcion"){
					
					$sql2="select * from inscripcion where cod_inscripcion='".$cod."'";
					$resultado2=pg_query($sql2);
					$inscripcion=pg_fetch_array($resultado2);
					
					$sql2="select * from seccion where cod_seccion='".$inscripcion['cod_seccion']."'";
					$resultado2=pg_query($sql2);
					$seccion=pg_fetch_array($resultado2);
					
					
				if($valor=="a"){ 
				
					if($inscripcion['activo']!="a"){//
					
					if($inscripcion['estado']=="v"){
						
					   if($seccion['maximo_de_est']>0 && $seccion['estado']=="a"){ 
						
						  pg_query("START TRANSACTION");
							   
						  $resultado1=pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est-1 WHERE cod_seccion = '".$seccion['cod_seccion']."';");
						  $resultado2=pg_query("UPDATE inscripcion SET activo = 'a' WHERE cod_inscripcion='".$inscripcion['cod_inscripcion']."';");
						  if($resultado1 && $resultado2){ pg_query("COMMIT"); echo "Campo 'activo' cambiado exitosamente."; $ban=1;} 
						  else{ pg_query("ROLLBACK"); echo "No se pudo cambiar Campo 'activo'.";$ban=1;}
						  
						}else{
							echo "No hay cupo en la secci&oacute;n.";
							$ban=1;
						}
					}
					
					if($inscripcion['estado']=="s" && $seccion['estado']!=$valor && $seccion['estado']=="i"){
						
						  pg_query("START TRANSACTION");
							  
						  $resultado1=pg_query("UPDATE inscripcion SET activo = 'a' WHERE cod_inscripcion='".$inscripcion['cod_inscripcion']."';");
						  if($resultado1){ pg_query("COMMIT");  echo "Campo 'activo' cambiado exitosamente.s"; $ban=1;}
						  else{ pg_query("ROLLBACK"); echo "No se pudo cambiar Campo 'activo'.";$ban=1;}
							   
					}
					
					
					if($inscripcion['estado']=="s" && $valor=="a" && $seccion['estado']=="a"){
						
						  pg_query("START TRANSACTION");
							  
						  $resultado1=pg_query("UPDATE inscripcion SET activo = 'a' WHERE cod_inscripcion='".$inscripcion['cod_inscripcion']."';");
						  if($resultado1){ pg_query("COMMIT");  echo "Campo 'activo' cambiado exitosamente.s"; $ban=1;}
						  else{ pg_query("ROLLBACK"); echo "No se pudo cambiar Campo 'activo'.";$ban=1;}
							   
					}
					
						   
					
				}else{//
					echo "No se pudo cambiar Campo 'activo', debe colocar opción diferente.";
					$ban=1;
				}
					
				}	
				
				if($valor=="i"){
		
				if($inscripcion['activo']!="i"){//
					
					if($inscripcion['estado']=="v"){
						
					   if($seccion['maximo_de_est']>=0 && $seccion['estado']=="a"){ 
						
						  pg_query("START TRANSACTION");
							   
						  $resultado1=pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+1 WHERE cod_seccion = '".$seccion['cod_seccion']."';");
						  $resultado2=pg_query("UPDATE inscripcion SET activo = 'i' WHERE cod_inscripcion='".$inscripcion['cod_inscripcion']."';");
						  if($resultado1 && $resultado2){ pg_query("COMMIT"); echo "Campo 'activo' cambiado exitosamente."; $ban=1;} 
						  else{ pg_query("ROLLBACK"); echo "No se pudo cambiar Campo 'activo'.";$ban=1;}
						  
						}else{
							echo "No se puede gestionar secci&oacute;n.";
							$ban=1;
						}
					}
					
					if($inscripcion['estado']=="s"){
						
						  pg_query("START TRANSACTION");
							  
						  $resultado1=pg_query("UPDATE inscripcion SET activo = 'i' WHERE cod_inscripcion='".$inscripcion['cod_inscripcion']."';");
						  if($resultado1){ pg_query("COMMIT");  echo "Campo 'activo' cambiado exitosamente."; $ban=1;}
						  else{ pg_query("ROLLBACK"); echo "No se pudo cambiar Campo 'activo'.";$ban=1;}
							   
					}
						   
					
				}else{//
					echo "No se pudo cambiar Campo 'activo', debe colocar opción diferente.";
					$ban=1;
				}
				
				}		
		}
			
			
			
				
				if($campo=="cod_seccion" && $tabla=="inscripcion"){
				
					$sql2="select * from inscripcion where cod_inscripcion='".$cod."'";
					$resultado2=pg_query($sql2);
					$inscripcion=pg_fetch_array($resultado2);
					
					$sql2="select * from seccion where cod_seccion='".$inscripcion['cod_seccion']."'";
					$resultado2=pg_query($sql2);
					$seccion_old=pg_fetch_array($resultado2);

					$sql2="select * from seccion where cod_seccion='".$valor."'";
					$resultado2=pg_query($sql2);
					$seccion_new=pg_fetch_array($resultado2);
					
					if($valor!=$inscripcion['cod_seccion']){
						
					  if($inscripcion['estado']=="v" && $inscripcion['activo']=="a"){
						if($seccion_new['estado']=="a"){
							if($seccion_new['maximo_de_est']>0){
									
								 	$resultado1=pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est+1 WHERE cod_seccion = '".$seccion_old['cod_seccion']."';");
						  			$resultado2=pg_query("UPDATE inscripcion SET cod_seccion = '".$valor."' WHERE cod_inscripcion='".$inscripcion['cod_inscripcion']."';");
									$resultado3=pg_query("UPDATE seccion SET maximo_de_est =maximo_de_est-1 WHERE cod_seccion = '".$seccion_new['cod_seccion']."';");
									
						 			 if($resultado1 && $resultado2 && $resultado3){ pg_query("COMMIT"); echo "Campo 'Secci&oacute;n' cambiado exitosamente."; $ban=1;} 
						  			else{ pg_query("ROLLBACK"); echo "No se pudo cambiar Campo 'Secci&oacute;n'.";$ban=1;}	
									
							}else{echo "No hay cupo en la secci&oacute;n nueva."; $ban=1;}
						}else{echo "El estado de la secci&oacute;n debe estar activo."; $ban=1;}
					  }
					  
					  
					  if($inscripcion['estado']=="v" && $inscripcion['activo']=="i"){
						if($seccion_new['estado']=="i"){
							
									
								 	
						  			$resultado2=pg_query("UPDATE inscripcion SET cod_seccion = '".$valor."' WHERE cod_inscripcion='".$inscripcion['cod_inscripcion']."';");
									
									
						 			 if($resultado2){ pg_query("COMMIT"); echo "Campo 'Secci&oacute;n' cambiado exitosamente."; $ban=1;} 
						  			else{ pg_query("ROLLBACK"); echo "No se pudo cambiar Campo 'Secci&oacute;n'.";$ban=1;}	
									
							
						}else{echo "El estado de la secci&oacute;n debe estar inactivo.";$ban=1;}
					  }
					  
					  
					  
					  if($inscripcion['estado']=="s" && $inscripcion['activo']=="a"){
						if($seccion_new['estado']=="a"){
							
										 	
						  			$resultado2=pg_query("UPDATE inscripcion SET cod_seccion = '".$valor."' WHERE cod_inscripcion='".$inscripcion['cod_inscripcion']."';");
									
									
						 			 if($resultado2){ pg_query("COMMIT"); echo "Campo 'Secci&oacute;n' cambiado exitosamente."; $ban=1;} 
						  			else{ pg_query("ROLLBACK"); echo "No se pudo cambiar Campo 'Secci&oacute;n'.";$ban=1;}	
									
							
						}else{echo "El estado de la secci&oacute;n debe estar activo."; $ban=1;}
					  }
					 
					 
					   if($inscripcion['estado']=="s" && $inscripcion['activo']=="i"){
						if($seccion_new['estado']=="i"){
							
										 	
						  			$resultado2=pg_query("UPDATE inscripcion SET cod_seccion = '".$valor."' WHERE cod_inscripcion='".$inscripcion['cod_inscripcion']."';");
									
									
						 			 if($resultado2){ pg_query("COMMIT"); echo "Campo 'Secci&oacute;n' cambiado exitosamente."; $ban=1;} 
						  			else{ pg_query("ROLLBACK"); echo "No se pudo cambiar Campo 'Secci&oacute;n'.";$ban=1;}	
									
							
						}else{echo "El estado de la secci&oacute;n debe estar activo."; $ban=1;}
					  }
					 
					 
					  

						
					}else{
						echo "No se pudo cambiar 'secci&oacute;n', debe colocar opción diferente.";
						$ban=1;
					}
					
					
		
				}
				
				
				
				
				if($campo=="nota" && $tabla=="inscripcion" && $cod=="nota_en_grupo"){
				
					
						$notas=explode(',', $valor);
						$limit=$notas[0];
						
						for($i=1;$i<=$limit*2;$i=$i+2){
							$notas[$i+1]=$sql="UPDATE ".$tabla." SET ".$campo." = '".$notas[$i+1]."' WHERE cod_inscripcion = '".$notas[$i]."';";
						}
						pg_query("START TRANSACTION");
						pg_query("SAVEPOINT notas");
						for($i=1;$i<=$limit*2;$i=$i+2){
							 $notas[$i]=pg_query($notas[$i+1]);
						}
						$bandera=0;
						for($i=1;$i<=$limit*2;$i=$i+2){
							if(!$notas[$i]){$bandera=1;}
						}
						if($bandera==0){pg_query("COMMIT");echo "Notas cambiad@ exitosamente!.";}
						if($bandera==1){pg_query("ROLLBACK TO SAVEPOINT notas");echo "No se pudo cambiar campo: Notas!.";}
						$chequeo=2;
				}	
			
				
						
				
			if($chequeo==1){
					if(strpos($campo,"1") || strpos($campo,"2")) $campo=substr($campo, 0,  strlen($campo)-1);
				pg_query("START TRANSACTION");
				if(pg_query($sql)){
					pg_query("COMMIT");
					if($campo!="nota")echo $campo." cambiad@ exitosamente!.";
					if($campo=="nota") echo "Nota cambiad@ exitosamente!.";
				}else{
					pg_query("ROLLBACK");
					if($campo!="nota")echo "No se pudo cambiar campo: ".$campo."!.";
					if(isset($mensaje_2))echo $mensaje_2;
					if($campo=="nota") echo "No se pudo cambiar campo: Nota!.";
				}
			}
			if(isset($mensaje_2))$chequeo=1;
			if(isset($ban))$chequeo=1;
			if($chequeo==0){
				 if(isset($mensaje))echo "Cédula se encuentra registrada.";
				 else echo "No se pudo cambiar campo.";
			}
			
			
		    }else{
				
				echo "Error al conectar!";
				
			}
	
	}
	
	function cedula($ced){
    	$reg = "/^[[:digit:]]+$/";
    	return preg_match($reg, $ced);
	}
	
	function validarEspacio($nombre){
	return preg_match("/[a-z:space:ñ0-9]+$/", $nombre);//^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$
	}
	function validarEmail($email){
    $reg = "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
    return preg_match($reg, $email);
	}
	function validarTele($cel){
    $reg = "/^[[:digit:]]{11}+$/";
    return preg_match($reg, $cel);
	}
	
	
}

?>