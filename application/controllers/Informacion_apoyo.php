<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informacion_apoyo extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			 $this->load->model( 'Informacion_apoyo_model' );
		}

	public function index()
	{
		$nivel = ($this->input->get('nivel')!== null) ? $this->input->get('nivel') : '';
		$area = ($this->input->get('area')!== null) ? $this->input->get('area') : '';
		$grado = ($this->input->get('grado')!== null) ? $this->input->get('grado') : '';

		$c_nivel = $this->Informacion_apoyo_model->obtener_c_nivel();
		$c_area = $this->Informacion_apoyo_model->obtener_c_area();
		$c_grado = $this->Informacion_apoyo_model->obtener_c_grado($nivel);
		


		$datos_tabla = $this->Informacion_apoyo_model->obtener_datos_tabla($nivel, $area, $grado);
		 $data['datos_tabla'] = $datos_tabla;
		 $data['nivel'] = $nivel;
		 $data['area'] = $area;
		 $data['grado'] = $grado;
		 $data['c_nivel'] = $c_nivel;
		 $data['c_area'] = $c_area;
		 $data['c_grado'] = $c_grado;
		 
		 if ($this->input->get('ajax') !== null) {
		 	$vista = $this->load->view( 'informacion_apoyo/info_ajax', $data, TRUE );
                $respuesta = array( 'vista' => $vista );
                Utilerias::enviaDataJson(200, $respuesta,$this);
                exit();
		 }
		 Utilerias::pagina_basica($this, "informacion_apoyo/informacion_apoyo", $data);
	}//index

	function obtener_nivel()
	{
		$area = $this->input->post('area');
		$area_datos = $this->Informacion_apoyo_model->obtener_nivel($area);
		Utilerias::enviaDataJson(200, $area_datos,$this);
        exit();
	}//obtener_nivel

	function obtener_grado()
	{
		$nivel = $this->input->post('nivel');
		$grado_datos = $this->Informacion_apoyo_model->obtener_c_grado($nivel);
		Utilerias::enviaDataJson(200, $grado_datos,$this);
        exit();
	}//obtener_grado
}//class
