<?php
include("../modelo/EstudianteModel.Class.php");
$conexion =new EstudianteModelo();
$conexion->verificar_sesion_estudiante();

class Estudiante extends EstudianteModelo{
    function __construct(){
		
	}
	function login_control($user, $pass){
		$admin =new Estudiante();
		$admin->login_model($user, $pass);
	}
	function cerrar_sesion_control(){
	    parent::sesion_off();
	}
	function datos_profesor_control($cod_user){
	    parent::datos_profesor($cod_user);
	}
	function cambiar_clave_control($clavea, $claven, $clavern, $claves, $cod_user){
	    parent::cambiar_clave($clavea, $claven, $clavern, $claves, $cod_user);
	}
	function datos_profesor_form_control($cod_user){
	    parent::datos_profesor_form($cod_user);
	}
	function editar_datos_admin_control($campo,$valor,$cod_user,$tabla){
	    parent::editar_atributo_admin($campo,$valor,$cod_user,$tabla);
	}
	function obtener_horario_control($seccion){
	   	parent::obtener_horario($seccion);
	}
	function insertar_est_control($seccion, $nacionalidad, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $telefono1, $telefono2, $direccion, $lugar, $cargo, $year, $mes, $dia, $correo){
	   	     parent::insertar_est($seccion, $nacionalidad, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $telefono1, $telefono2, $direccion, $lugar, $cargo, $year, $mes, $dia, $correo);
	}
	
	function obtener_inscrito_control($seccion){
		parent::obtener_inscrito($seccion);
	}
	
	function validar_inscripcion_control($seccion, $cedula, $deposito){
		parent::validar_inscripcion($seccion, $cedula, $deposito);
	}
	function obtener_inscrito_validado_control($seccion){
		parent::obtener_inscrito_validado($seccion);
	}
	function invalidar_inscripcion_control($seccion, $cedula){
		parent::invalidar_inscripcion($seccion, $cedula);
	}
	
	function obtener_seccion_cuadro_control($seccion, $cod_profesor){
		parent::obtener_seccion_cuadro($seccion, $cod_profesor);
	}
	
	
	function obtener_est_control($cedula){
		parent::obtener_est($cedula);
	}
	
	function eliminar_est_control($cod){
		parent::eliminar($cod, "cod_user", "usuario");
	}
	function obtener_est_cuadro_control($cedula_est, $cod_profesor){
		parent::obtener_est_cuadro($cedula_est, $cod_profesor);
	}
	function obtener_est_cuadro_control_para_form($cedula_est){
		parent::obtener_est_cuadro_para_form($cedula_est);
	}
	
	function datos_est_form_control($cod_user){
	    parent::datos_est_form($cod_user);
	}
	
	function registrar_idioma_control($cod_idioma, $idioma, $niveles){
	    parent::registrar_idioma($cod_idioma, $idioma, $niveles);
	}
	
	function eliminar_idioma_control($cod, $campo, $tabla){
	    parent::eliminar($cod, $campo, $tabla);
	}	
	
	function editar_idioma_form_control($cod_idioma){
	    parent::editar_idioma_form($cod_idioma);
	}	
	
	function insertar_admin_control($nacionalidad, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $telefono1, $telefono2, $correo){
	   	     parent::insertar_admin($nacionalidad, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $telefono1, $telefono2, $correo);
	}	
	
	function obtener_admin_cuadro_control_para_form($cedula_admin){
			  parent::obtener_admin_cuadro_para_form($cedula_admin);
	}
	function datos_admin_form_otros_control($cod_user){
			  parent::datos_admin_form_otros($cod_user);
	}
	function obtener_admin_cuadro_control($cedula_admin){
			  parent::obtener_admin_cuadro($cedula_admin);
	}
	function obtener_admin_control($cod_user){
		parent::obtener_admin($cod_user);
	}
	function insertar_profesor_control($nacionalidad, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $telefono1, $telefono2, $correo){
	   	     parent::insertar_profesor($nacionalidad, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $telefono1, $telefono2, $correo);
	}
	function obtener_profesor_cuadro_control_para_form($cedula_profesor){
			  parent::obtener_profesor_cuadro_para_form($cedula_profesor);
	}
	function datos_profesor_form_otros_control($cod_user){
			  parent::datos_profesor_form_otros($cod_user);
	}
	function obtener_profesor_cuadro_control($cedula_profesor){
			  parent::obtener_profesor_cuadro($cedula_profesor);
	}
	
	function obtener_profesor_control($cod_user){
			  parent::obtener_profesor($cod_user);
	}
	function registrar_seccion_control($cod_seccion, $cod_idioma, $nivel, $maximo_de_est, $cod_profesor){
	    parent::registrar_seccion($cod_seccion, $cod_idioma, $nivel, $maximo_de_est, $cod_profesor);
	}
	function obtener_seccion_form_control($cod_seccion){
		parent::obtener_seccion_form($cod_seccion);
	}
	function registrar_horario_control($cod_seccion,$dia,$turno,$horae,$horas,$aula){
			 parent::registrar_horario($cod_seccion,$dia,$turno,$horae,$horas,$aula);
	}
	function obtener_horario_seccion_control($cod_seccion){
			 parent::obtener_horario_seccion($cod_seccion);
	}
	
	function validar_inscripcion_directo_control($cod_inscripcion, $deposito){
			 parent::validar_inscripcion_directo($cod_inscripcion, $deposito);
	}
	
	function obtener_seccion_cuadro_nota_control($seccion, $cod_profesor){
		parent::obtener_seccion_cuadro_nota($seccion, $cod_profesor);
	}
	
	function editar_nota_control($campo,$valor,$cod_user,$tabla){
	    parent::editar_nota($campo,$valor,$cod_user,$tabla);
	}
	function consultar_nota_control($cod_user){
		parent::consultar_nota($cod_user);
	}
	
	
}
if(isset($_GET["peticion"])) $objeto =new Estudiante();

if(isset($_GET["peticion"]) && $_GET["peticion"]=="1" && isset($_GET["user"]) && $_GET["user"]!="" && isset($_GET["pass"]) && $_GET["pass"]!=""){ 
$objeto->login_control($_GET["user"], $_GET["pass"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="2" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
$objeto->cerrar_sesion_control();
}
if(isset($_GET["peticion"]) && $_GET["peticion"]=="3" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_user"]) && $_GET["cod_user"]!=""){
$objeto->datos_profesor_control($_GET["cod_user"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="4" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["clavea"]) && $_GET["clavea"]!="" && isset($_GET["claven"]) && $_GET["claven"]!="" && isset($_GET["clavern"]) && $_GET["clavern"]!=""){
$objeto->cambiar_clave_control($_GET["clavea"], $_GET["claven"], $_GET["clavern"], $_SESSION['clave_user'], $_SESSION['cod_user']);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="5" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_user"]) && $_GET["cod_user"]!="" ){
$objeto->datos_profesor_form_control($_GET["cod_user"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="6" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["tabla"]) && $_GET["tabla"]!="" && isset($_GET["campo"]) && $_GET["campo"]!="" && isset($_GET["valor"])){
	
if(!isset($_GET["cod_user"]))$objeto->editar_datos_admin_control($_GET["campo"],$_GET["valor"],$_SESSION["cod_user"],$_GET["tabla"]);
else $objeto->editar_datos_admin_control($_GET["campo"],$_GET["valor"],$_GET["cod_user"],$_GET["tabla"]);

}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="7" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["seccion"]) && $_GET["seccion"]!="")$objeto->obtener_horario_control($_GET["seccion"]);
else echo "Elija una secci&oacute;n para ver sus Horarios.";
}
 
if(isset($_GET["peticion"]) && $_GET["peticion"]=="8"){
if(isset($_GET["seccion"]) && $_GET["seccion"]!="" &&
   isset($_GET["nacionalidad"]) && $_GET["nacionalidad"]!="" &&
   isset($_GET["cedula"]) && $_GET["cedula"]!="" &&
   isset($_GET["nombre1"]) && $_GET["nombre1"]!="" &&
   isset($_GET["nombre2"]) &&
   isset($_GET["apellido1"]) && $_GET["apellido1"]!="" &&
   isset($_GET["apellido2"]) && 
   isset($_GET["telefono1"]) && $_GET["telefono1"]!="" &&
   isset($_GET["telefono2"]) && 
   isset($_GET["direccion"]) && $_GET["direccion"]!="" &&
   isset($_GET["lugar"]) && $_GET["lugar"]!="" &&
   isset($_GET["cargo"]) && $_GET["cargo"]!="" &&
   isset($_GET["year"]) && $_GET["year"]!="" &&
   isset($_GET["mes"]) && $_GET["mes"]!="" &&
   isset($_GET["dia"]) && $_GET["dia"]!="" &&
   isset($_GET["correo"]) && $_GET["correo"]!="" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e")$objeto->insertar_est_control($_GET["seccion"], $_GET["nacionalidad"], $_GET["cedula"], $_GET["nombre1"],$_GET["nombre2"], $_GET["apellido1"],$_GET["apellido2"], $_GET["telefono1"], $_GET["telefono2"], $_GET["direccion"],$_GET["lugar"], $_GET["cargo"],$_GET["year"],$_GET["mes"], $_GET["dia"], $_GET["correo"]);
else echo "Elija una secci&oacute;n para ver sus Horarios.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="9" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["seccion"]) && $_GET["seccion"]!="")$objeto->obtener_inscrito_control($_GET["seccion"]);
else echo "Elija una secci&oacute;n para buscar estudiantes.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="10"){
	if(isset($_GET["seccion"]) && $_GET["seccion"]!="" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cedula_est"]) && $_GET["cedula_est"]!="" && isset($_GET["deposito"]) && $_GET["deposito"]!="")$objeto->validar_inscripcion_control($_GET["seccion"], $_GET["cedula_est"], $_GET["deposito"]);
else echo "Debe elegir sección, cedula y deposito";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="11" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["seccion"]) && $_GET["seccion"]!="")$objeto->obtener_inscrito_validado_control($_GET["seccion"]);
else echo "Elija una secci&oacute;n para buscar estudiantes.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="12"){
	if(isset($_GET["seccion"]) && $_GET["seccion"]!="" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cedula_est"]) && $_GET["cedula_est"]!="")$objeto->invalidar_inscripcion_control($_GET["seccion"], $_GET["cedula_est"]);
else echo "Debe elegir sección y cedula.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="13" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["seccion"]) && $_GET["seccion"]!="")$objeto->obtener_seccion_cuadro_control($_GET["seccion"], $_SESSION["cod_profesor"]);
else echo "Elija una secci&oacute;n para buscar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="14" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cedula_est"]) && $_GET["cedula_est"]!="")$objeto->obtener_est_control($_GET["cedula_est"]);
else echo "Debe enviar una cédula.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="15" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cod_user"]) && $_GET["cod_user"]!="")$objeto->eliminar_est_control($_GET["cod_user"]);
else echo "Debe enviar una codigo de usuario.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="16" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cedula_est"]) && $_GET["cedula_est"]!="" && isset($_GET["cod_profesor"]) && $_GET["cod_profesor"]!="")$objeto->obtener_est_cuadro_control($_GET["cedula_est"], $_GET["cod_profesor"]);
else echo "Ingrese cedula del estudiante para buscar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="17" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cedula_est"]) && $_GET["cedula_est"]!="")$objeto->obtener_est_cuadro_control_para_form($_GET["cedula_est"]);
else echo "Ingrese cedula del estudiante para buscar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="18" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_user"]) && $_GET["cod_user"]!="" ){
$objeto->datos_est_form_control($_GET["cod_user"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="19" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cod_idioma"]) && $_GET["cod_idioma"]!="" && isset($_GET["idioma"]) && $_GET["idioma"]!="" && isset($_GET["niveles"]) && $_GET["niveles"]!="")$objeto->registrar_idioma_control($_GET["cod_idioma"],$_GET["idioma"],$_GET["niveles"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="20" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cod"]) && $_GET["cod"]!="" && isset($_GET["campo"]) && $_GET["campo"]!="" && isset($_GET["tabla"]) && $_GET["tabla"]!="")$objeto->eliminar_idioma_control($_GET["cod"], $_GET["campo"], $_GET["tabla"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="21" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cod_idioma"]) && $_GET["cod_idioma"]!="")$objeto->editar_idioma_form_control($_GET["cod_idioma"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="22" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["tabla"]) && $_GET["tabla"]!="" && isset($_GET["campo"]) && $_GET["campo"]!="" && isset($_GET["valor"]) && $_GET["valor"]!="" ){
if(isset($_GET["cod_idioma"]))$objeto->editar_datos_admin_control($_GET["campo"],$_GET["valor"],$_GET["cod_idioma"],$_GET["tabla"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="23"){
if(isset($_GET["nacionalidad"]) && $_GET["nacionalidad"]!="" &&
   isset($_GET["cedula"]) && $_GET["cedula"]!="" &&
   isset($_GET["nombre1"]) && $_GET["nombre1"]!="" &&
   isset($_GET["nombre2"]) &&
   isset($_GET["apellido1"]) && $_GET["apellido1"]!="" &&
   isset($_GET["apellido2"]) && 
   isset($_GET["telefono1"]) && $_GET["telefono1"]!="" &&
   isset($_GET["telefono2"]) &&
   isset($_GET["correo"]) && $_GET["correo"]!="" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e")$objeto->insertar_admin_control($_GET["nacionalidad"], $_GET["cedula"], $_GET["nombre1"],$_GET["nombre2"], $_GET["apellido1"],$_GET["apellido2"], $_GET["telefono1"], $_GET["telefono2"], $_GET["correo"]);
else echo "Falta campo por llenar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="24" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cedula_admin"]) && $_GET["cedula_admin"]!="")$objeto->obtener_admin_cuadro_control_para_form($_GET["cedula_admin"]);
else echo "Ingrese cedula del estudiante para buscar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="25" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_user"]) && $_GET["cod_user"]!="" ){
$objeto->datos_admin_form_otros_control($_GET["cod_user"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="26" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cedula_admin"]) && $_GET["cedula_admin"]!="")$objeto->obtener_admin_cuadro_control_para_form($_GET["cedula_admin"]);
else echo "Ingrese cedula del estudiante para buscar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="27" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cedula_admin"]) && $_GET["cedula_admin"]!="")$objeto->obtener_admin_cuadro_control($_GET["cedula_admin"]);
else echo "Ingrese cedula del estudiante para buscar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="28" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cod_user"]) && $_GET["cod_user"]!="")$objeto->obtener_admin_control($_GET["cod_user"]);
else echo "Ingrese cedula del admin para buscar.";
}


if(isset($_GET["peticion"]) && $_GET["peticion"]=="29"){
if(isset($_GET["nacionalidad"]) && $_GET["nacionalidad"]!="" &&
   isset($_GET["cedula"]) && $_GET["cedula"]!="" &&
   isset($_GET["nombre1"]) && $_GET["nombre1"]!="" &&
   isset($_GET["nombre2"]) &&
   isset($_GET["apellido1"]) && $_GET["apellido1"]!="" &&
   isset($_GET["apellido2"]) &&
   isset($_GET["telefono1"]) && $_GET["telefono1"]!="" &&
   isset($_GET["telefono2"]) &&
   isset($_GET["correo"]) && $_GET["correo"]!="" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e")$objeto->insertar_profesor_control($_GET["nacionalidad"], $_GET["cedula"], $_GET["nombre1"],$_GET["nombre2"], $_GET["apellido1"],$_GET["apellido2"], $_GET["telefono1"], $_GET["telefono2"], $_GET["correo"]);
else echo "Falta campo por llenar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="30" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cedula_profesor"]) && $_GET["cedula_profesor"]!="")$objeto->obtener_profesor_cuadro_control_para_form($_GET["cedula_profesor"]);
else echo "Ingrese cedula del estudiante para buscar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="31" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_user"]) && $_GET["cod_user"]!="" ){
$objeto->datos_profesor_form_otros_control($_GET["cod_user"]);
}


if(isset($_GET["peticion"]) && $_GET["peticion"]=="32" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cedula_profesor"]) && $_GET["cedula_profesor"]!="")$objeto->obtener_profesor_cuadro_control($_GET["cedula_profesor"]);
else echo "Ingrese cedula del estudiante para buscar.";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="33" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_user"]) && $_GET["cod_user"]!="" ){
$objeto->obtener_profesor_control($_GET["cod_user"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="34" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_seccion"]) && $_GET["cod_seccion"]!="" && isset($_GET["cod_idioma"]) && $_GET["cod_idioma"]!="" && isset($_GET["nivel"]) && $_GET["nivel"]!="" && isset($_GET["maximo_de_est"]) && $_GET["maximo_de_est"]!="" && isset($_GET["cod_profesor"]) && $_GET["cod_profesor"]!=""){
$objeto->registrar_seccion_control($_GET["cod_seccion"], $_GET["cod_idioma"], $_GET["nivel"], $_GET["maximo_de_est"], $_GET["cod_profesor"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="35" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_seccion"]) && $_GET["cod_seccion"]!=""){
$objeto->obtener_seccion_form_control($_GET["cod_seccion"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="36" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["tabla"]) && $_GET["tabla"]!="" && isset($_GET["campo"]) && $_GET["campo"]!="" && isset($_GET["valor"]) && $_GET["valor"]!="" ){
if(isset($_GET["cod_seccion"]))$objeto->editar_datos_admin_control($_GET["campo"],$_GET["valor"],$_GET["cod_seccion"],$_GET["tabla"]);

}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="37" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cod_seccion"]) && $_GET["cod_seccion"]!="" && isset($_GET["dia"]) && $_GET["dia"]!="" && isset($_GET["turno"]) && $_GET["turno"]!="" && isset($_GET["horae"]) && $_GET["horae"]!="" && isset($_GET["horas"]) && $_GET["horas"]!="" && isset($_GET["aula"]) && $_GET["aula"]!="")$objeto->registrar_horario_control($_GET["cod_seccion"],$_GET["dia"],$_GET["turno"],$_GET["horae"],$_GET["horas"],$_GET["aula"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="38" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_seccion"]) && $_GET["cod_seccion"]!=""){
$objeto->obtener_horario_seccion_control($_GET["cod_seccion"]);
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="39" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["cod"]) && $_GET["cod"]!="")$objeto->eliminar_idioma_control($_GET["cod"], "cod_horario", "horario");
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="40"){
	if(isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_inscripcion"]) && $_GET["cod_inscripcion"]!="" && isset($_GET["deposito"]) && $_GET["deposito"]!="")$objeto->validar_inscripcion_directo_control($_GET["cod_inscripcion"], $_GET["deposito"]);
else echo "Debe elegir sección, cedula y deposito";
}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="41" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e"){
if(isset($_GET["seccion"]) && $_GET["seccion"]!="")$objeto->obtener_seccion_cuadro_nota_control($_GET["seccion"], $_SESSION["cod_profesor"]);
else echo "Elija una secci&oacute;n para buscar.";
}


if(isset($_GET["peticion"]) && $_GET["peticion"]=="42" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["tabla"]) && $_GET["tabla"]!="" && isset($_GET["campo"]) && $_GET["campo"]!="" && isset($_GET["valor"]) && isset($_GET["cod_inscripcion"]) && $_GET["cod_inscripcion"]!=""){
	
	$objeto->editar_datos_admin_control($_GET["campo"],$_GET["valor"],$_GET["cod_inscripcion"],$_GET["tabla"]);

}

if(isset($_GET["peticion"]) && $_GET["peticion"]=="43" && isset($_SESSION["tipo_user"]) && $_SESSION["tipo_user"]=="e" && isset($_GET["cod_user"]) && $_GET["cod_user"]!="" ){
$objeto->consultar_nota_control($_GET["cod_user"]);
}




?>