<?php
require('pdf/fpdf.php');
include("../../modelo/EstudianteModel.Class.php");
$admin =new Conexion();
$admin->verificar_sesion_estudiante();
$admin->conectar();

$pdf = new FPDF();
$pdf->AddPage('l','LETTER');
$pdf->SetFont('Arial','',9);
$pdf->Image('../../src/images/certificado_confucio_nivel1.jpeg',0,0,280);

//$header = array( 'fecha', 'deposito', 'hora', 'nota', 'cod_seccion');
$objeto = new EstudianteModelo();

$pdf->SetFillColor(255, 250, 234);
//$pdf->SetTextColor(255);
$pdf->SetDrawColor(128, 0, 0);

$pdf->Cell(30, 25, '', 0, 1, 'C', 0, 0);
$texto = 'Constancia impresa electrónicamente, para validar visite: confucionotas/vista/certificado_estudiante.php?cod_estudiante=';
// Datos
$cont = 1;
$objeto->conectar();
$sql = "select fecha, deposito, hora, nota, cod_seccion from inscripcion where cod_estudiante='" . $_GET['cod_estudiante'] . "'";

$resultado = pg_query($sql);

$sql1 = "select upper(nacionalidad ||'-'|| cedula_est) as cedula,
         upper(nombre_1||' '||nombre_2 ) as nombres,
         upper(apellido_1||' '||apellido_2) as apellidos
               from estudiante  where cod_estudiante='" . $_GET['cod_estudiante'] . "'";
$resultado1 = pg_query($sql1);
$pdf->SetFont('Arial', '', 12);
while ($datos = pg_fetch_array($resultado1)) {
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(15,45,'', 0, 0, 'I');
    $pdf->Cell(105,45,utf8_decode($datos[1]).utf8_decode($datos[2]), 0, 0, 'I');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(55,45,strtoupper($datos[0]), 0, 0, 'I');    
    $pdf->Ln();
}
$pdf->Ln();
$pdf->SetY(192);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(255, 3, utf8_decode($texto) . $_GET['cod_estudiante'] . '', 0, 0, 'C');
$pdf->SetY(7);
// Arial italic 8
$pdf->SetFont('Arial', 'I', 9);
// N�mero de p�gina
//$pdf->Cell(0,5,"Fecha: ".date('Y:m:d')." Pag ".$pdf->PageNo().'',0,0,'R');
$pdf->Cell(0, 5, "Fecha: " . date('Y:m:d') . "", 0, 0, 'R');

$objeto->desconectar();

$pdf->Output();
?>