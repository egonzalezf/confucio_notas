<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confucio | Actualizar</title>
        <!--enlaces css -->
<link rel="stylesheet" type="text/css" href="../src/css/estilo_index.css">
	<!--f enlaces-->
</head>
 <!--archivos para el diseño de los alert-->
 <script src="../src/js/bundled.js"></script>
<link rel="stylesheet" type="text/css" href="../src/js/jquery-confirm.css"/>
<script type="text/javascript" src="../src/js/jquery-confirm.js"> </script>
<!--fin de las hojas para el diseño de los archivos alert-->
<?php	
 include_once ('conexion.php');
        $id=$_REQUEST["id_persona"];
		$sql="SELECT * FROM certificado  WHERE id_persona='$id' ";
        $result = pg_query($conectar, $sql);;
        $row = pg_fetch_array($result);
		?> 
<body>

        <!--formulario de ingreso-->
<div class="formulario">
<form onSubmit="return valida(this)" action="proceso_editar.php?id_persona=<?php echo $row['id_persona'];?>" method="post"  class="form">
            <h1>Actualiza tus Datos y Guarda tu registro</h1>
            <h5></h5>
   
            <input onkeypress="return val2(event)"  type="text" placeholder="Cedula" name="cedula" maxlength="8" minlength="5"  value="<?php echo $row["cedula"];?>" >
             <input onkeypress="return val(event)" type="text" placeholder="Nombre" name="nombre"  maxlength="25"  value="<?php echo $row["nombre"];?>"  >
              <input onkeypress="return val(event)"  type="text" placeholder="Apellido"  name="apellido" maxlength="25"  value="<?php echo $row["apellido"];?>" >Fecha de certificado :
               <input onkeypress="return val(event)" type="Date" min="1910-01-01" max="2050-12-31" placeholder="fecha de certificado" value="<?php echo $row["fecha"];?>" name="fecha" >

               <select  name="nivel" >
                        <option  value="<?php echo $row["nivel"];?>" name="nivel" selected id="nivel">Nivel...</option>
                        <option  value="1" <?php if($row["nivel"]=='1') print "selected=selected"?>>Nivel 1</option>
                        <option  value="2" <?php if($row["nivel"]=='2') print "selected=selected"?>>Nivel 2</option>
                        <option  value="3" <?php if($row["nivel"]=='3') print "selected=selected"?>>Nivel 3</option>
                        <option  value="4" <?php if($row["nivel"]=='4') print "selected=selected"?>>Nivel 4</option>
                        <option  value="5" <?php if($row["nivel"]=='5') print "selected=selected"?>>Nivel 5</option>
                        </select>       

                      <select  name="calificacion" >
                        <option  value="<?php echo $row["calificacion"];?>" name="calificacion" selected id="calificacion">Calificación...</option>
                        <option  value="Notable" <?php if($row["calificacion"]=='Notable') print "selected=selected"?> >Notable</option>
                        <option  value="Aprobado"  <?php if($row["calificacion"]=='Aprobado') print "selected=selected"?> >Aprobado</option>
                        <option  value="Sobresaliente"   <?php if($row["calificacion"]=='Sobresaliente') print "selected=selected"?> >Sobresaliente</option>
                        </select>       
            <input type="submit" value="Guardar Cambios">
        
        </form>

      <div   class="form">
             
        <button><a href="../principal_admin.php">Volver al inicio</a></button>
            <button><a href="../include/registro.php">Consultar Registros</a></button>
         
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