<?php

require('comun/pdf/fpdf.php');
include("../modelo/EstudianteModel.Class.php");
/*
  $admin = new Conexion();
  $admin->verificar_sesion_estudiante();
  $admin->conectar();
 */
$pdf = new FPDF();
$pdf->AddPage('l', 'LETTER');
$pdf->SetFont('Arial', '', 9);

$pdf->Image('../src/images/ConfucioCertificado.png', 0, 0, 280);



//$header = array( 'fecha', 'deposito', 'hora', 'nota', 'cod_seccion');
$objeto = new EstudianteModelo();

$pdf->SetFillColor(255, 250, 234);
//$pdf->SetTextColor(255);
$pdf->SetDrawColor(128, 0, 0);

$pdf->Cell(30, 25, '', 0, 1, 'C', 0, 0);

$texto = 'Certificado impreso electrónicamente, para su verificación visite: confucionotas.ubv.edu.ve/verificar/';

// Datos
$cont = 1;
$objeto->conectar();
$sql = "select fecha, deposito, hora, nota, cod_seccion from inscripcion where cod_estudiante='" . $_GET['cod_estudiante'] . "'";
$resultado = pg_query($sql);
$sql1 = "select upper(nacionalidad ||'-'|| cedula_est) as cedula,
                upper(nombre_1||' '||nombre_2 ) as nombres,
                upper(apellido_1||' '||apellido_2) as apellidos,nota,nivel
                from inscripcion i
                inner join estudiante e on i.cod_estudiante=e.cod_estudiante
                inner join seccion s on i.cod_seccion=s.cod_seccion
                where e.cod_estudiante='" . $_GET['cod_estudiante'] . "'
                and nota>='10'";
$resultado1 = pg_query($sql1);
$pdf->SetFont('Arial', '', 10);
$datos = pg_fetch_array($resultado1);
    
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 25);
   // $pdf->Cell(65);
    $pdf->Cell(0, 8, utf8_decode($datos[1]), 0, 1, 'C');
    $pdf->Cell (0, 8,  utf8_decode($datos[2]), 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    //$pdf->Cell(10);
    $pdf->Cell(0, 5, ($datos[0]), 0, 1, 'C');
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 17);
    $pdf->Cell(154);
    $pdf->Cell(0, 14, '3', 0, 0, 'I');
    $pdf->Ln();
    $pdf->Cell(128);
    $pdf->Cell(0, 8, '54', 0, 0, 'I');
    $pdf->Ln();
    $pdf->Cell(122);
    if ($datos[3] >= 18) {
            $pdf->Cell(0, 16.5, 'Sobresaliente', 0, 0, 'I');
        } elseif ($datos[3] >= 15) {
            $pdf->Cell(0, 16.5, 'Notable', 0, 0, 'I');
        } elseif ($datos[3] >= 12) {
            $pdf->Cell(0, 16.5, 'Aprobado', 0, 0, 'I');
               
    }
    $pdf->Ln(40); 
  

$pdf->Ln();
$pdf->SetY(185.7);
$pdf->SetX(114);
$pdf->Cell(0,2, '2018', 0, 0, 'I');
$pdf->SetY(185.7);
$pdf->SetX(134.5);
$pdf->Cell(0,2, '07', 0, 0, 'I');
$pdf->Ln();
/*$pdf->SetY(192);
$pdf->SetX(128);
$pdf->Cell(0,2, '2017', 0, 0, 'I');*/

$pdf->Ln();
$pdf->SetY(192);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(255, 3.78, utf8_decode($texto) . $_GET['cod_estudiante'] . '', 0, 0, 'C');
$pdf->SetY(7);
// Arial italic 8
$pdf->SetFont('Arial', 'I', 9);
// N�mero de p�gina
//$pdf->Cell(0,5,"Fecha: ".date('Y:m:d')." Pag ".$pdf->PageNo().'',0,0,'R');
//$pdf->Cell(0, 5, "Fecha: " . date('Y:m:d') . "", 0, 0, 'R');
$objeto->desconectar();
$pdf->Output();
?>
