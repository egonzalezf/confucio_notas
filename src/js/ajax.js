function dirigir(uno,dos,tres){
	alert(uno);
	uno=uno+"&user="+dos+"&pass="+tres;
	MostrarConsulta(uno);
}
var globalTodo=0;
function multiconsultas(){
		globalTodo=1;		
}


function EnviarConsultaNotas(total){
	
	total=total-1;
	cont=0;
	var notas="";
	for(i=1;i<=total;i++){
		var inscripcion=document.getElementById('i'+i).value;
		var nota=document.getElementById(i).value;
		if(nota!="")if(isNaN(nota)){ alert('Error: Una de las notas no es numerica!.'); return 0;}
		if(nota>=0 && nota<=20){
		if(nota!=""){
		notas=notas+inscripcion;
		notas=notas+',';
		notas=notas+nota;
		cont++;
		if(i<total)notas=notas+',';
		}
		}else{alert('Error: Una de las notas esta fuera del rango 0 y 20.'); return 0;}
		
	}
	if(notas!="")MostrarConsulta('../../controlador/Profesor.php?peticion=43&campo=nota&tabla=inscripcion&valor='+cont+','+notas);
	else alert('Ninguna nota a cambiar.');
}

function submitdata(datos)
{   
    var r=confirm("Desea eliminar realmente? esta acción es permanente!.");

    if(r==true)
    {
        MostrarConsulta(datos);
    }
    else
    {
        alert("Transacción cancelada");
		return 0;
    }   
}




function objetoAjax(){
        var xmlhttp=false;
        try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
                try {
                   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                        xmlhttp = false;
                }
        }

        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
}

function MostrarConsulta(datos){
		//alert(datos);
        divResultado = document.getElementById('resultado');
		divResultado2 = document.getElementById('resultado2');
		divResultado3 = document.getElementById('resultado3');
		divResultado4 = document.getElementById('horario');
		divResultado5 = document.getElementById('est');
		enlace = document.getElementById('enlace');
		divResultado.innerHTML = '<img src="../../src/images/incio.gif">';
        ajax=objetoAjax();
        ajax.open("GET", datos);
        ajax.onreadystatechange=function() {
                if (ajax.readyState==4) {
                        //alert(ajax.responseText);
						var n;
						n=ajax.responseText.indexOf("Sesion Iniciada admin"); 
					    if(n>-1)location.href="vista/Administrador/principal_admin.php";
						
						n=ajax.responseText.indexOf("Sesion Iniciada profesor"); 
					    if(n>-1)location.href="vista/Profesor/principal_profesor.php";
						
						n=ajax.responseText.indexOf("Sesion Iniciada estudiante"); 
					    if(n>-1)location.href="vista/Estudiante/principal_estudiante.php";
						
						n=ajax.responseText.indexOf("Error al iniciar sesion"); 
					    if(n>-1)divResultado.innerHTML = ajax.responseText;

						//divResultado.innerHTML = ajax.responseText;
						n=ajax.responseText.indexOf("Sesion terminada"); 
					    if(n>-1)location.href="../../index.php";
						
						var r=ajax.responseText.indexOf("Datos de Administrador"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
						}
						
						var r=ajax.responseText.indexOf("Inscripcion"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
						}
						
					     var r=ajax.responseText.indexOf("Datos de Estudiante"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
						}
						
						 var r=ajax.responseText.indexOf("Datos de Profesor"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
						}
						
						
						var r=ajax.responseText.indexOf("Campo 'activo' cambiado exitosamente");
						var r1=ajax.responseText.indexOf("No se pudo cambiar Campo 'activo'");
						var r2=ajax.responseText.indexOf("No hay cupo en la secci&oacute;n");
						var r3=ajax.responseText.indexOf("No se puede gestionar secci&oacute;n"); 
					    if(r>-1 || r1>-1 || r2>-1 || r3>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='visible';
						}
						
						
						var r=ajax.responseText.indexOf("Campo 'Secci&oacute;n' cambiado exitosamente");
						var r1=ajax.responseText.indexOf("No se pudo cambiar Campo 'Secci&oacute;n'");
						var r2=ajax.responseText.indexOf("El estado de la secci&oacute;n debe estar"); 
						var r3=ajax.responseText.indexOf("No se pudo cambiar 'secci&oacute;n', debe colocar opción diferente");
					    if(r>-1 || r1>-1 || r2>-1 || r3>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='visible';
						}
						
						
						var r=ajax.responseText.indexOf("Consultar estad&iacute;sticas"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
							
						}
						
						
						var r=ajax.responseText.indexOf("Editar Administrador"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							document.getElementById('enlace').style.visibility='hidden';
							divResultado2.innerHTML = ajax.responseText;
							
						}
						
						var r=ajax.responseText.indexOf("estad&iacute;sticas"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado3.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';	
						}
						
						var r=ajax.responseText.indexOf("Editar inscripci&oacute;n"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							document.getElementById('enlace').style.visibility='hidden';
							divResultado2.innerHTML = ajax.responseText;
							
						}

						var r=ajax.responseText.indexOf("Cambiar clave"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						
						var r=ajax.responseText.indexOf("Registrar Estudiante"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						
						var r=ajax.responseText.indexOf("Registrar idioma"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						
						
						var r=ajax.responseText.indexOf("Registrar horario"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}

						var r=ajax.responseText.indexOf("Registrar Secci&oacute;n"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						
						var r=ajax.responseText.indexOf("Elegir nivel"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						
						var r=ajax.responseText.indexOf("Inscribir Estudiante"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						
						
						
						var r=ajax.responseText.indexOf("Inscripcion realizada");
						var r2=ajax.responseText.indexOf("Inscripcion NO realizada");
						var r3=ajax.responseText.indexOf("Estudiante no esta registrado");
						var r4=ajax.responseText.indexOf("Seccion llena");
						var r5=ajax.responseText.indexOf("Ya tiene una inscripcion abierta");
					    if(r>-1){
							divResultado.innerHTML = "";
							alert(ajax.responseText);
							location.href="../Administrador/inscribir_est_admin.php";
						}

						 if(r2>-1 || r3>-1 || r4>-1 || r5>-1){
							divResultado.innerHTML = "";
							alert(ajax.responseText);
						}
						
						
						
						var r=ajax.responseText.indexOf("Validar Inscripci&oacute;n"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						
						var r=ajax.responseText.indexOf("Consultar secci&oacute;n"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
							
						}
						
						var r=ajax.responseText.indexOf("Editar secci&oacute;n"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
							
						}
						
						var r=ajax.responseText.indexOf("Estudiantes avanzados satisfactoriamente");
						var r2=ajax.responseText.indexOf("No se pudo avanzar estudiantes"); 
						var r2=ajax.responseText.indexOf("La secci&oacute;n destino no es del mismo idioma"); 
						var r2=ajax.responseText.indexOf("La secci&oacute;n destino no cumple con la cantidad minima de cupos"); 
					    if(r>-1 || r2>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							alert(ajax.responseText);
							document.getElementById('enlace').style.visibility='visible';
							
						}
						
						
						
						var r=ajax.responseText.indexOf("Avanzar secci&oacute;n"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
							
						}
						
						var r=ajax.responseText.indexOf("Consultar Estudiante"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
							
						}
						
						var r=ajax.responseText.indexOf("Consultar Profesor"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
							
						}
						
						var r=ajax.responseText.indexOf("Editar Estudiante"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							document.getElementById('enlace').style.visibility='hidden';
							divResultado2.innerHTML = ajax.responseText;
							
						}
						
						var r=ajax.responseText.indexOf("Eliminar horario"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							document.getElementById('enlace').style.visibility='hidden';
							divResultado2.innerHTML = ajax.responseText;
							
						}
						
						var r=ajax.responseText.indexOf("Invalidar Inscripci&oacute;n"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						
						
						
						var r=ajax.responseText.indexOf("Clave cambiada exitosamente"); 
						var r1=ajax.responseText.indexOf("No se pudo cambiar clave");
						var r2=ajax.responseText.indexOf("La clave actual es incorrecta, verifique");
						var r3=ajax.responseText.indexOf("Las claves nuevas no son iguales, verifique");
					    if(r>-1 || r1>-1 || r2>-1 || r3>-1){
							divResultado.innerHTML = "";
							divResultado3.innerHTML =ajax.responseText;
						}
						
						var r=ajax.responseText.indexOf("cambiad@ exitosamente"); 
						var r1=ajax.responseText.indexOf("No se pudo cambiar campo: ");
						var r2=ajax.responseText.indexOf("Error al conectar");
						var r3=ajax.responseText.indexOf("Cédula se encuentra registrada.");
						

					    if(r>-1 || r1>-1 || r2>-1 || r3>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML =ajax.responseText;
							if(globalTodo==1){divResultado2.innerHTML ="Todo guardado exitosamente.";globalTodo=0;}
							document.getElementById('enlace').style.visibility='visible';
						}
						
						var r=ajax.responseText.indexOf("Nota cambiada exitosamente"); 
						var r1=ajax.responseText.indexOf("No se pudo cambiar Nota");

					    if(r>-1 || r1>-1){
							divResultado.innerHTML = "";
							alert(ajax.responseText);
							document.getElementById('enlace').style.visibility='hidden';
						}
						
						
						var r=ajax.responseText.indexOf("Horarios"); 
					    if(r>-1){
							divResultado.innerHTML = "";							
							divResultado4.innerHTML =ajax.responseText;
							
						}
						
						var r=ajax.responseText.indexOf("Consulta de estudiante"); 
					    if(r>-1){
							divResultado.innerHTML = "";							
							divResultado4.innerHTML ="";
							divResultado5.innerHTML =ajax.responseText;	
						}
						
						
						
						var r=ajax.responseText.indexOf("Busqueda de Estudiante"); 
					    if(r>-1){
							
							divResultado5.innerHTML = "";	
							divResultado.innerHTML = "";
							divResultado4.innerHTML =ajax.responseText;
							
						}
						
						var r=ajax.responseText.indexOf("Consultar Administrador"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
							
						}
						
						var r=ajax.responseText.indexOf("cedula_est"); 
					    if(r>-1){
							divResultado.innerHTML = "";							
							divResultado4.innerHTML =ajax.responseText;
						}
						
						
						
						var r=ajax.responseText.indexOf("Estudiante registrado exitosamente."); 
						var r1=ajax.responseText.indexOf("No se pudo registrar estudiante."); 
						
						
						
					    if(r>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							location.href="registrar_est_admin.php";
						}
						if(r1>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
						}
						if(r2>-1){
						divResultado.innerHTML = "";							
							alert(ajax.responseText);	
						}
						if(r3>-1){
						divResultado.innerHTML = "";							
							alert(ajax.responseText);	
						}
						
						
						
						
						
						var r=ajax.responseText.indexOf("Debe elegir sección y cedula"); 
						var r1=ajax.responseText.indexOf("Inscripción validada correctamente.");
						var r2=ajax.responseText.indexOf("No se pudo validar inscripción.");
					    if(r>-1 || r2>-1){
							divResultado.innerHTML = "";
							alert(ajax.responseText);
						}
						if(r1>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							location.href="validar_inscripcion_admin.php";
						}
						
						
						var r1=ajax.responseText.indexOf("Inscripción  validada correctamente.");
						var r2=ajax.responseText.indexOf("No  se pudo validar inscripción.");
					    if(r>-1 || r2>-1){
							divResultado.innerHTML = "";
							alert(ajax.responseText);
						}
						if(r1>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							location.href="editar_est_admin.php";
						}
						
						
						 
						var r1=ajax.responseText.indexOf("Inscripción invalidada correctamente.");
						var r2=ajax.responseText.indexOf("No se pudo invalidar inscripción.");
					    if(r>-1 || r2>-1){
							divResultado.innerHTML = "";
							alert(ajax.responseText);
						}
						if(r1>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							location.href="invalidar_inscripcion_admin.php";
						}
						
						var r=ajax.responseText.indexOf("Consulta de secciones"); 
					    if(r>-1){
							divResultado.innerHTML = "";							
							divResultado4.innerHTML =ajax.responseText;
							divResultado5.innerHTML ="";
						}
						
						var r=ajax.responseText.indexOf("USUARIO BORRADO EXITOSAMENTE"); 
						var r1=ajax.responseText.indexOf("NO SE PUDO BORRAR USUARIO"); 
						
					    if(r>-1 || r1>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							divResultado2.innerHTML =ajax.responseText;
							document.getElementById('enlace').style.visibility='visible';
						}
						
						
						var r=ajax.responseText.indexOf("Editar Datos de Estudiante");
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
						}
						
						var r=ajax.responseText.indexOf("Editar Datos de Secci&oacute;n");
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
						}
						
						var r=ajax.responseText.indexOf("Editar Datos de Profesor");
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
						}
						
						
						var r=ajax.responseText.indexOf("Idioma registrado exitosamente."); 
						var r1=ajax.responseText.indexOf("No se pudo registrar idioma."); 
						var r2=ajax.responseText.indexOf("idioma ya exite");
						
						
					    if(r>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							location.href="registrar_idioma_admin.php";
						}
						if(r1>-1 || r2>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
						}
						
						var r=ajax.responseText.indexOf("Seccion registrada exitosamente."); 
						var r1=ajax.responseText.indexOf("No se pudo registrar seccion."); 
						var r2=ajax.responseText.indexOf("seccion ya exite");
						
						
						
					    if(r>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							location.href="registrar_seccion_admin.php";
						}
						if(r1>-1 || r2>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
						}
						
						
						
						var r=ajax.responseText.indexOf("Horario registrado exitosamente."); 
						var r1=ajax.responseText.indexOf("No se pudo registrar horario."); 
						var r2=ajax.responseText.indexOf("horario ya exite");
						
						
						
					    if(r>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							location.href="registrar_horario_admin.php";
						}
						if(r1>-1 || r2>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
						}
						
						
						var r=ajax.responseText.indexOf("Eliminar idioma"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							
						}
						
						var r=ajax.responseText.indexOf("Editar idioma"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
							
						}
						
						
						var r=ajax.responseText.indexOf("IDIOMA BORRADO EXITOSAMENTE"); 
						var r1=ajax.responseText.indexOf("NO SE PUDO BORRAR IDIOMA"); 
						
					    if(r>-1 || r1>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							divResultado5.innerHTML ="";
							location.href="../Administrador/eliminar_idioma_admin.php";
						}
						
						
						var r=ajax.responseText.indexOf("INSCRIPCION BORRADO EXITOSAMENTE"); 
						var r1=ajax.responseText.indexOf("NO SE PUDO BORRAR INSCRIPCION"); 
						
					    if(r>-1 || r1>-1){				
							alert(ajax.responseText);
							location.href="../Administrador/editar_est_admin.php";
						}
						
						
						var r=ajax.responseText.indexOf("HORARIO BORRADO EXITOSAMENTE"); 
						var r1=ajax.responseText.indexOf("NO SE PUDO BORRAR HORARIO"); 
						
					    if(r>-1 || r1>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							divResultado5.innerHTML ="";
							location.href="../Administrador/eliminar_horario_admin.php";
						}
												
						
						var r=ajax.responseText.indexOf("Registrar Administrador"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						var r=ajax.responseText.indexOf("Registrar Profesor"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
						}
						
					
					   var r=ajax.responseText.indexOf("Profesor registrado exitosamente."); 
						var r1=ajax.responseText.indexOf("No se pudo registrar profesor."); 
						
						
					    if(r>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							location.href="registrar_profesor_admin.php";
						}
						if(r1>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
						}
						
						var r=ajax.responseText.indexOf("Editar Profesor"); 
					    if(r>-1){
							divResultado.innerHTML = "";
							divResultado2.innerHTML = ajax.responseText;
							document.getElementById('enlace').style.visibility='hidden';
							
						}
						
					
						
						
						var r=ajax.responseText.indexOf("Administrador registrado exitosamente."); 
						var r1=ajax.responseText.indexOf("No se pudo registrar administrador."); 
						var r2=ajax.responseText.indexOf("Error al insertar:");
						var r3=ajax.responseText.indexOf("Cédula ya registrada.");
						
						
					    if(r>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
							location.href="registrar_admin_admin.php";
						}
						if(r1>-1){
							divResultado.innerHTML = "";							
							alert(ajax.responseText);
						}
						if(r2>-1){
						divResultado.innerHTML = "";							
							alert(ajax.responseText);	
						}
						if(r3>-1){
						divResultado.innerHTML = "";							
							alert(ajax.responseText);	
						}
						
						
						

						
                }
        }
        ajax.send(null)
}// JavaScript Document