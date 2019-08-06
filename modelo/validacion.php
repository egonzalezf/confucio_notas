<?php

function validarEspacio($nombre)
{
	return preg_match("/[a-z:space:]+$/", $nombre);
}





function validarCedula($ced)
{
    $reg = "/^[[:digit:]]+$/";
    return preg_match($reg, $ced);
}
 
/*ejm:
if(validarCedula("1232"))
{
    echo "Cedula correcta";
}
else
{
    echo "Cedula invalida";
}

echo "<br>**************************************<br><br>";*/


function validarEmail($email)
{
    $reg = "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
    return preg_match($reg, $email);
}



/*if(validarEmail("pepito.perez@domain.co.uk"))
{
    echo "Email correcto";
}
else
{
    echo "Email invalido";
}

echo "<br>**************************************<br><br>";*/


function validarUsuario($nombre)
{
	return preg_match("/^[a-z]+$/", $nombre);
}
/*ejm:
if(validarUsuario("yoshi"))
{
	echo "usuario valido";
}
else
{
	echo "usuario invalido";
}
 

echo "<br>**************************************<br><br>";*/

function validarTele($cel)
{
    $reg = "/^[[:digit:]]{11}+$/";
    return preg_match($reg, $cel);
}
 
/*ejm:
if(validarTele("04162182896"))
{
    echo "Cedula correcta";
}
else
{
    echo "Cedula invalida";
}

echo "<br>**************************************<br><br>";*/

function datecheck($input,$format="")
    {
        $separator_type= array(
            
            "-"
           
        );
        foreach ($separator_type as $separator) {
            $find= stripos($input,$separator);
            if($find<>false){
                $separator_used= $separator;
            }
        }
        if($separator_used=='-')$input_array= explode($separator_used,$input);
		
        if ($format=="mdy") {
            return checkdate($input_array[0],$input_array[1],$input_array[2]);
        } elseif ($format=="ymd") {
            return checkdate($input_array[1],$input_array[2],$input_array[0]);
        } else {
            return checkdate($input_array[1],$input_array[0],$input_array[2]);
        }
        $input_array=array();
    }
	
	/*$fecha= "2009-12-31";
 
if(datecheck($fecha, "ymd")==false){
    echo "La fecha no es correcta";
}else{
    echo "La fecha es correcta";
}


echo "<br>**************************************<br><br>";*/


function obligatorio($cadena){

if($cadena=='' || !isset($cadena)){
return false;
}else{ 
return true;
}
}

/*if(obligatorio("")){echo "Cadena valida";}else{echo "Cadena invalida";}

echo "<br>**************************************<br><br>";*/

?>

