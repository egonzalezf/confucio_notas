<?php

class Conexion{
 
	function conectar(){



		$servidor="127.0.0.1";
		$puerto="5432";
		$baseDeDatos="confucio";
		$usuario="postgres";
		$clave="ubv123$";
/*
        $servidor=getenv(PHP_CONFUCIO_BDHOST);
		$puerto="5432";
		$baseDeDatos=getenv(PHP_CONFUCIO_BDNAME);
		$usuario=getenv(PHP_CONFUCIO_BDUSR);
		$clave=getenv(PHP_CONFUCIO_BDPWD);
*/
   		
		$conexion=pg_connect("host=$servidor port=$puerto dbname=$baseDeDatos user=$usuario password=$clave");
		if(!$conexion){'No se puede conectar al servidor';}
		return true;
	}	
	function desconectar(){
			pg_close();
	}
	function login($usuario, $clave){
		if($this->conectar()){
		$sql="SELECT * FROM usuario "
                   . "WHERE nombre_user='".$usuario."' and clave_user='".$clave."'";
		$resultado=pg_query($sql);
		$datos=pg_fetch_array($resultado);
		$this->sesion_on($datos);
                $this->desconectar();
		}
	}
	function sesion_on($datos){
		
		
		if($datos[0]!=""){
		if(!isset($_SESSION)){session_start();}
		$_SESSION['cod_user']=$datos['cod_user'];
		$_SESSION['clave_user']=$datos['clave_user'];
		$_SESSION['tipo_user']=$datos['tipo_user'];
		$_SESSION['correo']=$datos['correo'];
                $_SESSION['nombre_1']=$datos['nombre_1'];
		$_SESSION['apellido_1']=$datos['apellido_1'];
                
		if($_SESSION['tipo_user']=="a"){
                        
			$_SESSION['admin']=$datos['nombre_user'];
			$_SESSION['cod_administrador']=$datos['cod_administrador'];
			echo "Sesion Iniciada admin! Bienvenido 1234: <b>".$_SESSION['admin']."</b>"; 
		}
		if($_SESSION['tipo_user']=="p"){
			$_SESSION['prof']=$datos['nombre_user'];
				$sql="SELECT * FROM profesor WHERE cod_user='".$datos['cod_user']."'";
				$resultado=pg_query($sql);
				$datos=pg_fetch_array($resultado);
			$_SESSION['cod_profesor']=$datos['cod_profesor'];
			echo "Sesion Iniciada profesor! Bienvenido: <b>".$_SESSION['prof']."</b>";
		}
		if($_SESSION['tipo_user']=="e"){
			$_SESSION['est']=$datos['nombre_user'];
			$_SESSION['cod_estudiante']=$datos['cod_estudiante'];
			echo "Sesion Iniciada estudiante! Bienvenido: <b>".$_SESSION['est']."</b>";
		}
		if($_SESSION['tipo_user']=="r"){
			$_SESSION['prof']=$datos['nombre_user'];
			$_SESSION['admin']=$datos['nombre_user'];
				$sql="SELECT * FROM profesor WHERE cod_user='".$datos['cod_user']."'";
				$resultado=pg_query($sql);
				$datos=pg_fetch_array($resultado);
			$_SESSION['cod_profesor']=$datos['cod_profesor'];
			echo "Sesion Iniciada profesor! Bienvenido: <b>".$_SESSION['prof']."</b>";
		}
		
		}else{
		echo "Error al iniciar sesion!";	
		}	
		
	}
	function sesion_off(){
		unset($_SESSION);
		session_unset();
		iF(session_destroy()) echo "Sesion terminada!.";
	}
	
	function verificar_sesion_admin(){
	
		session_start();
		if(!isset($_SESSION['admin'])) echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../index.php">';
		$verificar=1;
	}
	

	
	function verificar_sesion_on_admin(){
	
		session_start();
		if(isset($_SESSION['admin'])) echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=vista/Administrador/principal_admin.php">';
	}
	
	function verificar_sesion_profesor(){
	
		session_start();
		if(!isset($_SESSION['prof'])) echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../index.php">';
	}
	
	function verificar_sesion_on_profesor(){
	
		session_start();
		if(isset($_SESSION['prof'])) echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=vista/Administrador/principal_profesor.php">';
	}	
	
	
		function verificar_sesion_estudiante(){
	
		session_start();
		if(!isset($_SESSION['est'])) echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../index.php">';
	}
	
	function verificar_sesion_on_estudiante(){
	
		session_start();
		if(isset($_SESSION['est'])) echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=vista/Administrador/principal_estudiante.php">';
	}	
	
	
	
	function chequear_registro($tabla, $campo, $valor){
		$sql="Select ".$campo." from ".$tabla." where ".$campo." = '".$valor."'";
		$dato=pg_fetch_array(pg_query($sql));
		if($dato[0]==$valor){
				return true;	
		}else{
				return false;
		}
	}
	
}

?>
