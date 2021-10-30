<?php

require_once "../../Controladores/cursosC.php";
require_once "../../Modelos/cursosM.php";

require_once "../../Controladores/usuariosC.php";
require_once "../../Modelos/usuariosM.php";


class pdfInscriptosMateria{

public function pdfInscriptos(){

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);

$pdf->AddPage();

$link = $_SERVER['REQUEST_URI'];

$exp = explode("/", $link);

$columna = "id";
$valor = $exp[5];

$materia = cursosC::VerCursos2C($columna, $valor);

$columna = "id";
$valor = $exp[6];

$comision = cursosC::VerComisiones2C($columna, $valor);

$html1 = <<<EOF

	
	<br><br>

	<h1> Universidad Mariano</h1>

	<h2>Inscritos para el curso: $materia[nombre]</h2>

	<h2>Horario: $comision[numero] - Dias: $comision[dias] - Hora: $comision[horario]</h2>

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black width:115px;">Código</td>
			<td style="border: 1px solid black width:115px;">Carnet</td>
			<td style="border: 1px solid black width:250px;">Alumno</td>

		</tr>

	</table>

EOF;


$pdf->writeHTML($html1, false, false, false, false, '');

$columna = "id_curso";
$valor = $exp[5];

$inscriptos = CursosC::VerInscMateriasC($columna, $valor);

foreach ($inscriptos as $key => $value) {
	
$columna = "id";
$valor = $value["id_alumno"];

$alumnos = usuariosC::VerUsuarios2C($columna, $valor);

foreach ($alumnos as $key => $v) {
	
if($value["id_comision"] == $exp[6]){

$columna = "id";
$valor = $exp[6];

$comision = cursosC::VerComisiones2C($columna, $valor);

$html2 = <<<EOF

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black width:115px;">$value[id_comision]</td>
			<td style="border: 1px solid black width:115px;">$v[carnet]</td>
			<td style="border: 1px solid black width:250px;">$v[apellido], $v[nombre]</td>

		</tr>

	</table>

EOF;


$pdf->writeHTML($html2, false, false, false, false, '');

}

}

}

$pdf->Output('Insc-Comision-'.$comision["numero"].'-'.$materia["nombre"].'.pdf');


}

}

$a = new pdfInscriptosMateria();
$a -> pdfInscriptos();