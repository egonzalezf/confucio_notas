<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confucio | Registro</title>
        <!--enlaces css -->
<link rel="stylesheet" type="text/css" href="src/css/estilo_index.css">
<!--f enlaces-->
    <!--archivos para el diseño de los alert-->
    <script src="src/js/bundled.js"></script>
<link rel="stylesheet" type="text/css" href="src/js/jquery-confirm.css"/>
<script type="text/javascript" src="src/js/jquery-confirm.js"> </script>
<!--fin de las hojas para el diseño de los archivos alert-->
</head>
<body>
        <!--formulario de ingreso-->
<div class="formulario">
<form  onSubmit="return valida(this)" action="include/registrar.php" method="post"    class="form">
            <h1>Registrate e imprime tu certificado</h1>
            <h5></h5>
            <input  type="text" placeholder="Cedula" name="cedula" onkeypress="return val2(event)" maxlength="8" minlength="5" autocomplete="off" >
             <input  type="text" placeholder="Nombre" name="nombre"  onkeypress="return val(event, this)"   maxlength="25"  >
              <input type="text" placeholder="Apellido"  name="apellido" onkeypress="return val(event, this)"   maxlength="25" >Fecha de certificado :
               <input type="Date" min="2004-01-01"  placeholder="fecha de certificado" name="fecha" >


               <select  name="nivel" >
               <option  value="none" name="nivel" selected id="nivel">Nivel...</option>
               <option  value="1">Nivel 1</option>
               <option  value="2">Nivel 2</option>
               <option  value="3">Nivel 3</option>
               <option  value="4">Nivel 4</option>
               <option  value="5">Nivel 5</option>
               </select>       

             <select  name="calificacion" >
               <option  value="none">Calificación...</option>
               <option  value="Notable" >Notable</option>
               <option  value="Aprobado"   >Aprobado</option>
               <option  value="Sobresaliente"   >Sobresaliente</option>
               </select>       

            
            <input type="submit" value="Aceptar">
        
        </form>
      <div   class="form">
        <button><a href="principal_admin.php">Volver al inicio</a></button>
        <button><a href="include/registro.php">Consultar Registros</a></button>
         
            </div>

</div>
<!--fin formulario de ingreso-->

<!-- validaciones-->
<script>
function val(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Z a-z]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
//valida que solo se ingrsen numeros
function val2(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[0-9]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

</script>
<!--fin de las validaciones-->





<script>

function valida(p) {
    var yeah = true;
    var er_email = /^(.+\@.+\..+)$/;
    var msg = "Debes llenar estos campos Obligatorios:<br>";
    if(p.elements[0].value == "" )
    {
      msg += "Cedula<br>";
      yeah = false;
    }
    if(p.elements[1].value == "" )
    {
      msg += "Nombre <br>";
      yeah = false;
    }
    if(p.elements[2].value == "" )
    {
      msg += "Apellido<br>";
      yeah = false;
    }
    if(p.elements[3].value == "" )
    {
      msg += "Fecha <br>";
      yeah = false;
    }
    if(p.elements[4].value == "none" )
    {
      msg += "Nivel<br>";
      yeah = false;
    }
    if(p.elements[5].value == "none" )
    {
      msg += "Calificacion<br>";
      yeah = false;
    }
    
  
    if(yeah == false){
          $.alert({theme:'supervan',title:'Confucio  ',content:msg});
          return yeah;
      } 
  }
  
  
  
  
   
  
  </script>
  
</body>
</html>