<?php
  include '../conexion.php';

  $consulta=ConsultarCertificado($_GET['id_persona']);
  function ConsultarCertificado($id_persona)
  {
    //$sentencia="SELECT * FROM usuario WHERE ci='".$ci."' ";
    $sentencia="SELECT * FROM  certificado WHERE id_persona='".$id_persona."' ";
    $resultado=pg_query($sentencia) or die (pg_last_error());
    
    $filas=pg_fetch_array($resultado);
 
    return [
     $filas['nombre'],$filas['apellido'],$filas['cedula'],$filas['nivel'],$filas['calificacion'],$filas['fecha']
			

    ];


  
      
  }

	include 'plantilla.php';
	//require 'conexion.php';
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	//$resultado = $mysqli->query($query);
	$pdf = new PDF('L','mm','Letter');
	//$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(255,0,0);
	$pdf->SetFont('Arial','B',25);
//texto central
// $pdf->Ln(09);
$pdf->SetX(50);

$pdf->Ln(13);
$pdf->Ln(17);
$pdf->Ln(13);


  $pdf->Cell(250,10,utf8_decode($consulta[0]),0,0,'C');
  $pdf->Ln(8);
  $pdf->Cell(250,10,utf8_decode($consulta[1]),0,0,'C');
	 $pdf->Ln(13);
     $pdf->SetFont('Arial','B',16);
  
//$pdf->Ln(9);
     $pdf->Cell(250,10,'CI . '.$consulta[2],0,0,'C');
//Nivel


$pdf->Ln(16);
//Print 2 MultiCells   justificado
$pdf->SetFont('Arial','B',18);
$pdf->SetTextColor(0,0,0);
$y=$pdf->GetY();
$pdf->SetXY(37,$y);
$pdf->Cell(250,3,utf8_decode($consulta[3]),0,0,'C');
$pdf->Ln(12);


//CANTIDAD DE HORAS ACADEMICAS
$y=$pdf->GetY();
$pdf->SetXY(20,$y);
$pdf->Cell(250,1,"54",0,0,'C');

            

$pdf->Ln(13);

//calificacion
$pdf->SetFont('Arial','B',18);

$y=$pdf->GetY();
$pdf->SetXY(52,$y);
$pdf->MultiCell(170,0,strtoupper(utf8_decode("                       ".$consulta[4])),$border=0, $align="C", $fill=false);
$pdf->SetTextColor(0,0,0);

$pdf->Ln(15);


//pie 
//mes en letras
 $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
 $mes = $mes[(date('m', strtotime($consulta[5]))*1)-1];
//separar año datetime en año y el dia
$date = strtotime($consulta[5]);
$dat = strtotime($consulta[5]);
//LUGAR Y FECHA
$pdf->SetFont('Arial','',15);
$pdf->Ln(23);

//FECHA A LA ESQUINA DERECHA
$pdf->SetFont('Arial','',15);

$pdf->Cell(250,15,'Caracas, '.date("d", $date).' de '.$mes.' '.date("Y", $date),0,1,'C'); 
$pdf->SetFont('Arial','',10);	


$pdf->Ln(6);


	$pdf->Output();

?>