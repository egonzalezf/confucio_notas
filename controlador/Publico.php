<?php
include("../modelo/Conexion.Class.php");

class Publico extends Conexion{

	function login_model($user, $pass){
		if(!preg_match('/[^a-zA-Z0-9\s]/', $user) && !preg_match('/[^a-zA-Z0-9\s]/',  $pass))parent::login($user,md5($pass));	
	}
}

$objeto=new Publico();
if(isset($_GET["peticion"]) && $_GET["peticion"]=="1" && isset($_GET["user"]) && $_GET["user"]!="" && isset($_GET["pass"]) && $_GET["pass"]!=""){ 
$objeto->login_model($_GET["user"], $_GET["pass"]);
}


?>