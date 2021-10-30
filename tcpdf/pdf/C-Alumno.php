<?php

require_once "../../Controladores/usuariosC.php";
require_once "../../Modelos/usuariosM.php";

class pdfCAlumnos{

public function pdfCA(){

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);

$pdf->AddPage();

$link = $_SERVER['REQUEST_URI'];

$exp = explode("/", $link);

$columna = "id";
$valor = $exp[5];

$alumno = UsuariosC::VerUsuariosC($columna, $valor);

$html1 = <<<EOF

	<br><br>

	<h2>Certificado de Alumno/a</h2><br>

	<b>Alumno/a</b>: $alumno[apellido], $alumno[nombre]<br>
	<b>Carnet</b>: $alumno[carnet]<br>

EOF;


$pdf->writeHTML($html1, false, false, false, false, '');

$pdf->Output('Certificado-Alumno-'.$exp[5].'.pdf');


}

}

$c = new pdfCAlumnos();
$c -> pdfCA();