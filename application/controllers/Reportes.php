<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->library('My_tcpdf');
		date_default_timezone_set('America/Mexico_City');
		}

	public function aprendizajes(){
		$pdf = new My_tcpdf_page(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

				$pdf->SetCreator(PDF_CREATOR);
				$pdf->SetAuthor('PE');
				$pdf->SetTitle('ficha_aprendizajes_esperados');
				$pdf->SetSubject('');
				$pdf->SetKeywords('');
				$this->pinta_encabezado_aprendizaje($pdf);

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
