<?php
require('pdf/fpdf.php');
include("../../modelo/EstudianteModel.Class.php");
$admin =new Conexion();
$admin->verificar_sesion_estudiante();
$admin->conectar();

$pdf = new FPDF();
$pdf->AddPage('P','LETTER');
$pdf->SetFont('Arial','',9);
$pdf->Image('../../src/images/certificado_confucio_nivel1.jpeg',87,8,100);

$header = array( 'fecha', 'deposito', 'hora', 'nota', 'cod_seccion');
$objeto=new EstudianteModelo();

$pdf->SetFillColor(255,250,234);
    //$pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
	  
$pdf->Cell(30,25,'',0,1,'C',0,0);
		
    // Datos
	$cont=1;
	$objeto->conectar();
	$sql="select fecha, deposito, hora, nota, cod_seccion from inscripcion where cod_estudiante='".$_GET['cod_estudiante']."'";
	$resultado=pg_query($sql);
	
	$sql1="select nacionalidad, cedula_est, nombre_1, nombre_2, apellido_1, apellido_2 from estudiante  where cod_estudiante='".$_GET['cod_estudiante']."'";
	$resultado1=pg_query($sql1);
	$pdf->SetFont('Arial','',12);
	while($datos=pg_fetch_array($resultado1)){
	$pdf->Ln();
            $pdf->Cell(38,5,"Cedula: ".strtoupper($datos[0].$datos[1]),0,0,'I');$pdf->Ln();

			 $pdf->Cell(38,5,"Primer Nombre: ".utf8_decode($datos[2]),0,0,'I');$pdf->Ln();
			  $pdf->Cell(38,5,"Segundo Nombre: ".utf8_decode($datos[3]),0,0,'I');$pdf->Ln();
			   $pdf->Cell(38,5,"Primer Apellido: ".utf8_decode($datos[4]),0,0,'I');$pdf->Ln();
			   $pdf->Cell(38,5,"Segundo Apellido: ".utf8_decode($datos[5]),0,0,'I');$pdf->Ln();

			$pdf->Ln();
		   
	}
	
	$pdf->SetFont('Arial','',9);
	foreach($header as $col){
			
          $pdf->Cell(38,8,$col,1,0,'C',1);
		}
        $pdf->Ln();
	
	
	while($datos=pg_fetch_array($resultado)){
	
            $pdf->Cell(38,5,$datos[0],1,0,'C');
			 $pdf->Cell(38,5,$datos[1],1,0,'C');
			 $pdf->Cell(38,5,$datos[2],1,0,'C');
			  $pdf->Cell(38,5,$datos[3],1,0,'C');
			   $pdf->Cell(38,5,$datos[4],1,0,'C');

			$pdf->Ln();
		   
	}
	
	
	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(190,5,'____________________________',0,0,'C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(190,5,'Firma y Sello',0,0,'C');
	$pdf->Ln();
	;
	$pdf->Ln();
	
	$pdf->Cell(190,5,'Centro de Idiomas Rosa Luxemburgo - UBV Sede Caracas',0,0,'C');
	
      
       
     // Posici�n: a 1,5 cm del final
    $pdf->SetY(7);
    // Arial italic 8
    $pdf->SetFont('Arial','I',9);
    // N�mero de p�gina
    $pdf->Cell(0,5,"Fecha: ".date('Y:m:d')." Pag ".$pdf->PageNo().'',0,0,'R');


$objeto->desconectar();

$pdf->Output();
?>
