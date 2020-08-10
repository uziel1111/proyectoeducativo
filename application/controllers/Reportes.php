<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->library('My_tcpdf');
			$this->load->model('Aprendizajesesperados_model');
		date_default_timezone_set('America/Mexico_City');
		}

	public function aprendizajes($idnivel,$idcomponente,$idcampo,$grado,$idasignatura,$ideje,$idtema,$idaprendizaje_esperado){
		$pdf = new My_tcpdf_page(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

				$pdf->SetCreator(PDF_CREATOR);
				$pdf->SetAuthor('PE');
				$pdf->SetTitle('ficha_aprendizajes_esperados');
				$pdf->SetSubject('');
				$pdf->SetKeywords('');
				$this->pinta_encabezado_aprendizaje($pdf);

				$arr_datos = $this->Aprendizajesesperados_model->obtener_arr_ficha_aprendizajesesperados($idnivel,$idcomponente,$idcampo,$grado,$idasignatura,$ideje,$idtema,$idaprendizaje_esperado);
				// echo "<pre>";print_r($arr_datos);die();
				if (count($arr_datos)>0) {
					$arr_datos = $arr_datos[0];
					$nivel = $arr_datos['nivel'];
					$componente = $arr_datos['componente'];
					$campo = $arr_datos['campo'];
					$grado = $arr_datos['grado'];
					$asignatura = $arr_datos['asignatura'];
					$eje = $arr_datos['eje'];
					$tema = $arr_datos['tema'];
					$aprendizaje_esperado = $arr_datos['aprendizaje_esperado'];
					$plan = $arr_datos['plan'];
					$ligas = $arr_datos['ligas'];
					$libros = $arr_datos['libros'];
					$pdf->SetFont('montserrat', '', 12);
						$str_html = <<<EOT
						<style>
						table td{
							border: 1px solid #black;
						}

						</style>
							<table>
						<tr>
							<td width="25%"><b>Nivel: </b><br>$nivel</td>
							<td width="25%"><b>Componente: </b><br>$componente</td>
							<td width="25%"><b>Campo: </b><br>$campo</td>
							<td width="25%"><b>Grado: </b><br>$grado</td>
						</tr>
						<tr>
							<td width="33%"><b>Asignatura: </b><br>$asignatura</td>
							<td width="34%"><b>Eje: </b><br>$eje</td>
							<td width="33%"><b>Plan de estudios: </b><br>$plan</td>
						</tr>
						<tr>
							<td width="100%"><b>Tema: </b><br>$tema</td>
						</tr>
						<tr>
							<td width="100%"><b>Aprendizaje Esperado: </b><br>$aprendizaje_esperado</td>
						</tr>
						<tr>
							<td width="100%"><b>Enlace a libros de texto gratuito: </b><br>$libros</td>
						</tr>
						</table>
EOT;

$html= <<<EOT
$str_html
EOT;
				$pdf->writeHTMLCell($w=0,$h=20,$x=10,$y=25, $html, $border=0, $ln=1, $fill=0, $reseth=true, $aligh='L', $autopadding=true);
			}
			$pdf->Output('ficha_aprendizajes_esperados.pdf', 'I');
	}

	public function pinta_encabezado_aprendizaje($pdf){
	$fecha = date("Y-m-d");
	$arr_aux = explode("-",$fecha);
	$anio_i = $arr_aux[0];
	$mes_i = $arr_aux[1];
	$dia_i = $arr_aux[2];
	$fecha = " Fecha: ".$dia_i."/".$mes_i."/".$anio_i;
	$pdf->SetTextColor(65, 65, 67);
	$pdf->SetMargins(10, 10, 10, true); // set the margins
	// $pdf->SetFooterMargin(50); // set the margins
	$pdf->AddPage('L', 'Legal');
	$pdf->SetAutoPageBreak(TRUE, 10);
	$pdf->SetFont('montserrat', '', 12);
	$pdf->Cell(0, 0, $fecha, 0, 1, 'R');
	$pdf->SetFont('montserratb', '', 17);
	$pdf->Cell(0, 5, 'Ficha del Aprendizaje Esperado', 0, 1, 'C');

	// $pdf->Image($file='assets/img/logoreporte.png', $x=7, $y=12, $w=65, $h=12, $type='', $link='', $align='', $resize=true, $dpi=100, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false);

}

}//class
